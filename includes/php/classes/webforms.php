<?php

namespace Blackbeard;

class Webforms extends Queries
{

    private $required = []; // array of required POST fields
    private $post = null; // POST data sanitized
    private $salt = null; // Password hash salt, set in constructor
    private $cSalt = null; // Customer password hash salt, set in constructor

    // List accepted forms
    private $forms = [
        'createCustomer',
        'editCustomer',
        'changepassword'
    ];
    
    /**
     * The constructor checks for any sent forms
     * The form name must be in the class variable $forms
     * If the form name is found, call the class method
     */
    function __construct()
    {
        $this->salt = $GLOBALS['salt'];
        $this->cSalt = $GLOBALS['customerSalt'];

        if (isset($_POST['form']) && in_array($_POST['form'],$this->forms)) {
            $form = $_POST['form']; // Direct handling isn't allowed, so one variable needed
            $this->$form();
        }
    }

    /**
     * This function checks if all of the required post fields are POSTed
     * It does this by counting the rows in $required and compare it against the matches found in the POST data
     * It takes the data directly from $this->required and $this->post, as set by $this->setReq
     * 
     * @return boolean
     */
    private function checkReq() : bool
    {
        if (count(array_intersect_key($this->required, $this->post)) == count($this->required)) {
            return true;
        }
        return false;
    }

    /**
     * This function set and sanitizes required post fields
     * This functions also removes empty POST entries
     * 
     * @param string $required, variable length of required POST fields
     */
    private function setReq(...$required) : void
    {
        // Set required array
        foreach($required as $value) {
            $this->required[$value] = null;
        }

        // Remove empty entries
        $this->post = array_filter($_POST);
    }

    /**
     * Add customer through website login page
     */
    public function createCustomer() : void
    {
        // Set required $_POST fields
        $this->setReq('firstname', 'lastname', 'email', 'password', 'rpassword');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Add', 'Adding customer through website failed, not all required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'password' && $key != 'form') {
                $$key = htmlentities($value);
            }
        }

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $this->insertLog('Customers', 'Add', 'Adding customer failed, email is not valid ('.$email.')');
            return;
        }

        // Check if email is unique
        if ($this->countCustomersByEmail($email) != 0) {

            $this->insertLog('Customers', 'Add', 'Adding customer failed, email is not unique ('.$email.')');
            return;
        }

      // Hash password
        $password = hash('whirlpool', $this->cSalt.$_POST['password']);

        // Insert customer
        if ($this->addCustomers($firstname, $insertion, $lastname, $email, $phone, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $password) == 1) {

            // Check if email adress is added, and only exists 1 time
            if ($this->countCustomersByEmail($email) == 1) {

                // Log user in
                $_SESSION['webuser'] = $this->getCustomersByEmail($email)['id'];

                // Succes
                $this->insertLog('Customers', 'Add', 'Added customer '.$firstname.' '.$insertion.' '.$lastname.' with ID '.$this->getCustomerByName($firstname, $lastname)['id'].' through website, and logged in.');

            } else {

                // Partial Succes
                $this->insertLog('Customers', 'Add', 'Added customer '.$firstname.' '.$insertion.' '.$lastname.' with ID '.$this->getCustomerByName($firstname, $lastname)['id'].' through website, but not logged in.');
            }

        } else {
            // Failed
            $this->insertLog('Customers', 'Add', 'Adding customer '.$firstname.' '.$insertion.' '.$lastname.' failed through website.');
        }
    }

    /**
     * Edit customer through website page
     */
    public function editCustomer() : void
    {
        // Set required $_POST fields
        $this->setReq('firstname', 'lastname', 'email');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Edit', 'Editting customer ('.$_SESSION['webuser'].') through website failed, not all required fields are set');
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'password' && $key != 'form') {
                $$key = htmlentities($value);
            }
        }

        if ($this->editCustomerWeb($firstname, $insertion, $lastname, $email, $phone, $company, $billing_street, $billing_housenumber, $billing_postalcode, $billing_city, $billing_provence, $billing_country, $shipping_street, $shipping_housenumber, $shipping_postalcode, $shipping_city, $shipping_provence, $shipping_country, $taxnumber, $_SESSION['webuser']) == 1) {
            
            // Succes
            $this->insertLog('Customers', 'Edit', 'Editting customer '.$lastname.', '.$firstname.' '.$insertion.' ('.$_SESSION['webuser'].') through web');
        
        } else {

            // Failed
            $this->insertLog('Customers', 'Edit', 'Editting customer '.$lastname.', '.$firstname.' '.$insertion.' ('.$_SESSION['webuser'].') failed through web');
        }
    }

    /**
     * Change password through website
     */
    public function changePassword() : void
    {
        // Set required $_POST fields
        $this->setReq('oldpassword', 'newpassword', 'repeatpassword');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed, not all required fields are set');
            return;
        }

        if ($_POST['newpassword'] != $_POST['repeatpassword']) {

            // New password and repeated password did not match
            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed, new password did not match with the repeated password');
            return;
        }

        // Get customer data
        $customer = $this->getCustomer($_SESSION['webuser']);

        // Salt passwords
        $salt = $GLOBALS['customerSalt'];
        $oldPassword = hash('whirlpool', $salt.$_POST['oldpassword']);
        $newPassword = hash('whirlpool', $salt.$_POST['newpassword']);

        if ($oldPassword != $customer['password']) {

            // Old password not correct
            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed, old password was not correct');
            return;
        }

        if ($this->editCustomerPassword($newPassword, $_SESSION['webuser']) == 1) {

            // Succes
            $this->insertLog('Customers', 'Edit', 'Password of '.$customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion'].' ('.$_SESSION['webuser'].') changed');
        
        } else {

            // Failed
            $this->insertLog('Customers', 'Edit', 'Changing password ('.$_SESSION['webuser'].') through website failed');
        }


    }
}