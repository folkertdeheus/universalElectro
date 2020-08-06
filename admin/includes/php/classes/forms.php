<?php

/**
 * This file contains the formhandling on all forms (except the login form)
 */

namespace Blackbeard;

class Forms extends Queries
{
    private $required = []; // array of required POST fields
    private $post = null; // POST data sanitized
    private $salt = $GLOBALS['salt']; // Password hash salt

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

        // Set variables
        $username = htmlentities($_POST['username']);
        $password = $_POST['password']; // No need for checking entities because of hash

        // Check if the username is unique
        // Fail if not
        if ($this->countUserByUsername($username) != 0) {
            return false;
        }

        // Hash password
        $password = hash('whirlpool', $this->salt.$password);

        // Insert username
        $this->insertUser($username, $password);

        // Insert log
        if ($this->countUserByUsername($username) == 1) {

            // Set added description
            $desc = 'Added new user: '.$username.' with ID '.$this->getUserByUsername($username)['id'].'. By '.user();
        
        } else {

            // Set failed description
            $desc = 'Failed to add new user: '.$username. ' by '.user();
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

        // Set variables
        $id = htmlentites($_POST['id']);
        $username = htmlentities($_POST['username']);
        $user = $this->getUserById($id);
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];

        // Check if password is changed or only the username
        if (isset($password) && $password != null) {

            // Change password

            // Check if password is the same as the repeated password
            if ($password == $rpassword) {

                // Hash password
                $password = hash('whirlpool', $this->salt.$password);

                // Update password
                $this->updatePassword($password, $id);

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
        if ($this->countUserByUsername($username) == 0) {
            
            // Update username
            $this->updateUsername($username, $id);

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

        // Set variables
        $name = htmlentities($_POST['name']);
        $description = htmlentities($_POST['description']);
        $website = htmlentities($_POST['website']);

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
        if ($this->countBrandByName($name) != 0) {
            return false;
        }

        // Add brand
        $this->addBrands($name, $filepath, $description, $website);

        // Insert log
        if ($this->countBrandByName($name) == 1) {

            // Succes
            $this->insertLog('Brands', 'Add', 'Added brand '.$name.' with ID '.$this->getBrandByName($name)['id'].'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Brands', 'Add', 'Adding brand '.$name. 'failed. By '.user());
        }
    }
}