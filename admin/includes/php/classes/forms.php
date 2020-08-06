<?php

/**
 * This file contains the formhandling on all forms (except the login form)
 */

namespace Blackbeard;

class Forms extends Queries
{
    private $required = []; // array of required POST fields
    private $post = null; // POST data sanitized

    // List accepted forms
    private $forms = [
        'addUser',
        'editUser',
        'addBrand'
    ];
    

    /**
     * The constructor checks for any sent forms
     * The form name must be in the class variable $forms
     * If the form name is found, call the class method
     */
    function __construct()
    {
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
    private function checkReq()
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
    function setReq(...$required)
    {
        // Set required array
        foreach($required as $value) {
            $this->required[$value] = null;
        }

        // Remove empty entries
        $this->post = array_filter($_POST);
    }

    /**
     * This function adds a new user of the CMS
     * 
     * @return boolean
     */
    private function addUser()
    {
        // Set required $_POST fields
        $this->setReq('username', 'password', 'rpassword');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {
            return false;
        }

        // Check if the username is unique
        // Fail if not
        if ($this->countUserByUsername($_POST['username']) != 0) {
            return false;
        }

        // Hash password
        $salt = 'BlackbeardOnTheWheel';
        $password = hash('whirlpool', $salt.$_POST['password']);

        // Insert username
        $this->insertUser($_POST['username'], $password);

        // Insert log
        if ($this->countUserByUsername($_POST['username']) == 1) {

            $desc = 'Added new user: '.$_POST['username'].' with ID '.$this->getUserByUsername($_POST['username'])['id'].'. By '.user();
        } else {
            $desc = 'Failed to add new user: '.$_POST['username']. ' by '.user();
        }
        $this->insertLog('Users', 'Add', $desc);
    }

    /**
     * This functions edits a user of the CMS
     * 
     * @return boolean
     */
    private function editUser()
    {
        // Set required $_POST fields
        $this->setReq('username');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {
            return false;
        }

        $user = $this->getUserById($_POST['id']);

        // Check if password is changed or only the username
        if (isset($_POST['password']) && $_POST['password'] != null) {

            // Change password

            // Check if password is the same as the repeated password
            if ($_POST['password'] == $_POST['rpassword']) {

                // Hash password
                $salt = 'BlackbeardOnTheWheel';
                $password = hash('whirlpool', $salt.$_POST['password']);

                // Update password
                $this->updatePassword($password, $_POST['id']);

                // Insert log
                $this->insertLog('Users', 'Edit', 'Editted user password '.$user['username'].' with ID '.$user['id'].'. By '.user());

            } else {
                // Passwords not matching
                // Insert log
                $this->insertLog('Users', 'Edit', 'Editting user password '.$user['username'].' with ID '.$user['id'].' failed: passwords not matching. By '.user());
            }
        }

        // Change username

        // Check if username is unique. If not, don't change it
        if ($this->countUserByUsername($_POST['username']) == 0) {
            
            // Update username
            $this->updateUsername($_POST['username'], $_POST['id']);

            // Insert log
            $this->insertLog('Users', 'Edit', 'Edit user username '.$user['username']. 'with ID '.$user['id'].' changed to '.$_POST['username'].'. By '.user());
        }
    }

    /**
     * Add brand
     * 
     * @return boolean
     */
    public function addBrand()
    {
        // Set required $_POST fields
        $this->setReq('name');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {
            return false;
        }

        // Upload file

        // File naming
        $path = '../includes/brands/';
        $file = basename($_FILES['image']['name']);
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        
        // Accepted files
        $acceptedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
    
        // Check if file exists
        // If exists, rename with number added
        $base = $filename;
        
        // Continue numbering until unique name is found
        for ($i = 1; file_exists($path.$filename.'.'.$extension); $i++) {
            $filename = $base.$i;
        }

        // Check if file is accepted file type
        // If not, stop executing
        if (!in_array($extension, $acceptedFileTypes)) {
            return;
        }

        // Set destination path
        $filepath = $path.$filename.'.'.$extension;

        // Upload file
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
            
            // File upload failed
            $filesError = null;
            foreach($_FILES as $value) {
                $filesError = $filesError.$value.' ';
            }

            // Insert log
            $this->insertLog('Brands', 'Add', 'Add brand failed, image upload error: '.$filesError.'. By '.user());
            return;
        }

        // Continue with database adding

        // Check if brand name is unique
        // If not, stop executing
        if ($this->countBrandByName($_POST['name']) != 0) {
            return false;
        }

        $this->addBrands($_POST['name'], $filepath, $_POST['description'], $_POST['website']);

        // Insert log
        if ($this->countBrandByName($_POST['name']) == 1) {

            // Succes
            $this->insertLog('Brands', 'Add', 'Added brand '.$_POST['name'].' with ID '.$this->getBrandByName($_POST['name'])['id'].'. By '.user());
        } else {

            // Failed
            $this->insertLog('Brands', 'Add', 'Adding brand '.$_POST['name']. 'failed. By '.user());
        }
    }
}