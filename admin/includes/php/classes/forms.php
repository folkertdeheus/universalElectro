<?php

/**
 * This file contains the formhandling on all forms (except the login form)
 */

namespace Blackbeard;

class Forms extends Queries
{
    private $required = []; // array of required POST fields
    private $post = null; // POST data sanitized
    private $salt = null; // Password hash salt, set in constructor
    private $cSalt = null; // Customer password hash salt, set in constructor

    // List accepted forms
    private $forms = [
        'addUser',
        'editUser',
        'addBrand',
        'editBrand',
        'addCategory',
        'editCategory',
        'addProduct',
        'editProduct',
        'languages',
        'settings',
        'addCustomer',
        'editCustomer',
        'addTicketCategory',
        'editTicketCategory',
        'addTicketStatus',
        'editTicketStatus'
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

            // Check if value is array (language form)
            if (is_array($value)) {
                
                // Extra loop
                foreach($value as $nKey => $nValue) {
                    $this->required[$nValue] = null;
                }

            } else {
                $this->required[$value] = null;
            }
        }

        // Remove empty entries
        $this->post = array_filter($_POST);
    }

    /**
     * This function checks if an id has not been editted
     */
    private function isId($id) : int
    {
        // First check if the id is numeric
        if (is_numeric($id) && $id != null && $id != false) {

            // htmlentities for possible XSS
            return htmlentities($id);
        }
    }

    /**
     * This function adds a new user of the CMS
     */
    private function addUser() : void
    {
        // Set required $_POST fields
        $this->setReq('username', 'password', 'rpassword');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Users', 'Add', 'Adding new user failed, required fields are not set. By '.user());
            return;
        }

        // Set variables
        $username = htmlentities($_POST['username']);
        $password = $_POST['password']; // No need for checking entities because of hash

        // Check if the username is unique
        // Fail if not
        if ($this->countUserByUsername($username) != 0) {

            $this->insertLog('Users', 'Add', 'Adding new user failed, username '.$username.' not unique. By '.user());
            return;
        }

        // Hash password
        $password = hash('whirlpool', $this->salt.$password);

        // Insert user
        if ($this->insertUser($username, $password) == 1) {

            // Succes
            $this->insertLog('Users', 'Add', 'Added new user: '.$username.' with ID '.$this->getUserByUsername($username)['id'].'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Users', 'Add', 'Failed to add new user: '.$username. ' by '.user());
        }
    }

    /**
     * This functions edits a user of the CMS
     */
    private function editUser() : void
    {
        // Set required $_POST fields
        $this->setReq('username');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Users', 'Edit', 'Editting user failed, required fields are not set. By '.user());
            return;
        }

        // Set variables
        $id = $this->isId($_POST['id']);
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
        if ($this->countUserByUsername($username) != 0) {

            // Insert log
            $this->insertLog('Users', 'Edit', 'Editting user '.$user['username'].' to '.$name.' failed, duplicate username. By '.user());
            return;
        }
            
        // Update username
        if ($this->updateUsername($username, $id) == 1) {

            // Succes
            $this->insertLog('Users', 'Edit', 'Edit user username '.$user['username']. 'with ID '.$user['id'].' changed to '.$_POST['username'].'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Users', 'Edit', 'Edit user username '.$user['username'].' failed. By '.user());
        }
    }

    /**
     * Add brand
     */
    private function addBrand() : void
    {
        // Set required $_POST fields
        $this->setReq('name');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Brands', 'Add', 'Adding brand failed, required fields are not set. By '.user());
            return;
        }

        // Set variables
        $name = htmlentities($_POST['name']);
        $description = htmlentities($_POST['description']);
        $website = htmlentities($_POST['website']);

        // Upload file

        // Check if file is being uploaded
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != null) {

            // File naming
            $path = '../includes/brands/';
            $file = basename($_FILES['image']['name']);
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            
            // Accepted files
            $acceptedFileTypes = $GLOBALS['acceptedImageTypes'];
        
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

                $this->insertLog('Brands', 'Add', 'Add brand failed, image was the wrong type. By '.user());
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
                $this->insertLog('Brands', 'Add', 'Add brand ('.$name.') failed, image upload error: '.$filesError.'. By '.user());
                return;
            }

        // No image uploaded, set filepath null
        } else {

            $filepath = null;
        }

        // Continue with database adding

        // Check if brand name is unique
        // If not, stop executing
        if ($this->countBrandByName($name) != 0) {

            $this->insertLog('Brands', 'Add', 'Add brand failed, duplicate name ('.$name.'). By '.user());
            return;
        }

        // Add brand
        if ($this->addBrands($name, $filepath, $description, $website) == 1) {

            // Succes
            $this->insertLog('Brands', 'Add', 'Added brand '.$name.' with ID '.$this->getBrandByName($name)['id'].'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Brands', 'Add', 'Adding brand '.$name. 'failed. By '.user());
        }
    }

    /**
     * Edit brand
     */
    private function editBrand() : void
    {
        // Set required $_POST fields
        $this->setReq('name');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Brands', 'Edit', 'Editting brand failed, required fields are not set. By '.user());
            return;
        }

        // Set variables
        $name = htmlentities($_POST['name']);
        $description = htmlentities($_POST['description']);
        $website = htmlentities($_POST['website']);
        $id = $this->isId($_POST['id']);

        // Upload file

        // File naming
        $path = '../includes/brands/';
        $file = basename($_FILES['image']['name']);
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        
        // Accepted files
        $acceptedFileTypes = $GLOBALS['acceptedImageTypes'];
    
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
            $this->insertLog('Brands', 'Edit', 'Edit brand failed, image upload error: '.$filesError.'. By '.user());
            return;
        }

        // Continue with database adding

        // Check if brand name is unique
        // If not, stop executing
        if ($this->countBrandByNameNotId($name, $id) != 0) {

            $this->insertLog('Brands', 'Edit', 'Edit brand failed, new name ('.$name.') is not unique');
            return;
        }

        // Get original brand data
        $brand = $this->getBrandById($id);

        // Add brand
        if ($this->editBrands($name, $filepath, $description, $website, $id) == 1) {

            // Succes
            $this->insertLog('Brands', 'Edit', 'Editted brand '.$brand['name'].' to '.$name.' with ID '.$id.'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Brands', 'Edit', 'Editting brand '.$brand['name']. ' with ID '.$id.' failed. By '.user());
        }
    }

    /**
     * Add category
     */
    private function addCategory() : void
    {
        // Set required $_POST fields
        $this->setReq('nl_name', 'en_name');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Product Categories', 'Add', 'Adding product category failed, not all required fields are set. By '.user());
            return;
        }

        // Set variables
        $nlName = htmlentities($_POST['nl_name']);
        $nlDescription = htmlentities($_POST['nl_description']);
        $enName = htmlentities($_POST['en_name']);
        $enDescription = htmlentities($_POST['en_description']);

        // Check if the category name is unique
        if ($this->countCategoriesByName($nlName) != 0) {

            $this->insertLog('Product Categories', 'Add', 'Adding product category '.$nlName.' failed, duplicate name. By '.user());
            return;
        }

        // Insert category
        if ($this->addCategories($nlName, $nlDescription, $enName, $enDescription) == 1) {
            
            // Succes
            $this->insertLog('Product Categories', 'Add', 'Added product category '.$nlName.' with ID '.$this->getCategoryByName($nlName)['id'].'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Product Categories', 'Add', 'Adding product category '.$nlName.' failed. By '.user());

        }
    }

    /**
     * Edit category
     */
    private function editCategory() : void
    {
        // Set required $_POST fields
        $this->setReq('nl_name', 'en_name', 'id');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Product Categories', 'Edit', 'Editting product category failed, not all required fields are set. By '.user());
            return;
        }

        // Set variables
        $nlName = htmlentities($_POST['nl_name']);
        $nlDescription = htmlentities($_POST['nl_description']);
        $enName = htmlentities($_POST['en_name']);
        $enDescription = htmlentities($_POST['en_description']);
        $id = $this->isId($_POST['id']);

        $category = $this->getCategoryById($id);

        // Check if name is unique, skip own id
        if ($this->countCategoryByNameNotId($nlName, $category['id']) != 0) {

            $this->insertLog('Product Categories', 'Edit', 'Editting product category '.$category['nl_name'].' to '.$nlName.' (id '.$category['id'].') failed, new name is not unique. By '.user());
            return;
        }

        // Update category
        // If 1 row was affected, the query was succesful
        if ($this->editCategories($nlName, $nlDescription, $enName, $enDescription, $id) == 1) {

            // Succes
            $this->insertLog('Product Categories', 'Edit', 'Editted product category '.$category['nl_name'].' to '.$nlName.' (id '.$category['id'].'). By '.user());
        
        } else {

            // Failed
            $this->insertLog('Product Categories', 'Edit', 'Editting product category '.$category['nl_name'].' to '.$nlName.'(id '.$category['id'].') failed. 0 or multiple records affected. By '.user());

        }
    }

    /**
     * Add product
     */
    public function addProduct() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'brands', 'categories', 'articlenumber', 'own_articlenumber', 'nl_description', 'en_description');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Products', 'Add', 'Adding product failed, not all required fields are set. By '.user());
            return;
        }

        // Set variables
        $name = htmlentities($_POST['name']);
        $brand = htmlentities($_POST['brands']);
        $category = htmlentities($_POST['categories']);
        $articleNumber = htmlentities($_POST['articlenumber']);
        $nlDescription = htmlentities($_POST['nl_description']);
        $enDescription = htmlentities($_POST['en_description']);
        $properties = htmlentities($_POST['properties']);
        $specifications = htmlentities($_POST['specifications']);
        $price = htmlentities($_POST['price']);
        $tags = htmlentities($_POST['tags']);
        $highlight = $_POST['highlight']; // Will be checked to be 1 or 0
        $ownArticlenumber = htmlentities($_POST['own_articlenumber']);

        // Check if article number is unique
        if ($this->countProductsByArticlenumber($articleNumber) != 0) {

            // Article number is not unique, fail
            $this->insertLog('Products', 'Add', 'Adding '.$name.' failed, articlenumber '.$articleNumber.' is not unique. By '.user());
            return;
        }

        // Check value of highlight
        if ($highlight != 1) {
            $highlight = 0;
        }

        // Upload image(s)
        
        // Flip multidimensional $_FILES array
        $images = [];
        foreach($_FILES['image'] as $filesKey => $filesArray) {

            foreach($filesArray as $fileKey => $fileValue) {

                $images[$fileKey][$filesKey] = $fileValue;
            }
        }

        // Start filepath variable. If no image is uploaded, foreach will not be run and filepath will not be changed
        $filepaths = [];

        if (isset($_FILES['image']['name'][0]) && $_FILES['image']['name'][0] != null) {

            // Loop throug files for upload
            foreach ($images as $imageKey => $imageValue) {
                
                // File naming
                $path = '../includes/products/';
                $file = basename($imageValue['name']);
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                
                // Accepted files
                $acceptedFileTypes = $GLOBALS['acceptedImageTypes'];
            
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

                    $this->insertLog('Products', 'Add', 'Add product failed, image was the wrong type. By '.user());
                    return;
                }

                // Set destination path
                $filepath = $path.$filename.'.'.$extension;
                array_push($filepaths, $filepath);

                // Upload file
                if (!move_uploaded_file($_FILES['image']['tmp_name'][$imageKey], $filepath)) {
                    
                    // File upload failed
                    $filesError = null;
                    foreach($_FILES['image']['error'] as $value) {
                        $filesError = $filesError.$value.' ';
                    }

                    // Insert log
                    $this->insertLog('Products', 'Add', 'Add product ('.$name.') failed, image upload error: '.$filesError.'. By '.user());
                    return;
                }
            }
        }

        // Make json object from files path array
        $filepaths = json_encode($filepaths);
        
        // Insert product
        // If 1 row was affected, the query was succesful
        if ($this->addProducts($brand, $category, $name, $articleNumber, $nlDescription, $enDescription, $filepaths, $tags, $properties, $specifications, $price, $highlight, $ownArticlenumber)) {

            // Succes
            $this->insertLog('Products', 'Add', 'Added product '.$name.' with ID '.$this->getProductByArticleNumber($articleNumber)['id']. '. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Products', 'Add', 'Add product '.$name.' failed. By '.user());
        }
    }

    /**
     * Edit product
     */
    public function editProduct() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'brands', 'categories', 'articlenumber', 'own_articlenumber', 'nl_description', 'en_description', 'id');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Products', 'Edit', 'Editting product failed, not all required fields are set. By '.user());
            return;
        }

        // Set variables
        $name = htmlentities($_POST['name']);
        $brand = htmlentities($_POST['brands']);
        $category = htmlentities($_POST['categories']);
        $articleNumber = htmlentities($_POST['articlenumber']);
        $nlDescription = htmlentities($_POST['nl_description']);
        $enDescription = htmlentities($_POST['en_description']);
        $properties = htmlentities($_POST['properties']);
        $specifications = htmlentities($_POST['specifications']);
        $price = htmlentities($_POST['price']);
        $tags = htmlentities($_POST['tags']);
        $highlight = $_POST['highlight']; // Will be checked to be 1 or 0
        $ownArticlenumber = htmlentities($_POST['own_articlenumber']);
        $id = htmlentities($_POST['id']);

        // Check if article number is unique
        if ($this->countProductsByArticlenumberNotId($articleNumber, $id) != 0) {

            // Article number is not unique, fail
            $this->insertLog('Products', 'Edit', 'Editting '.$name.' failed, articlenumber '.$articleNumber.' is not unique. By '.user());
            return;
        }

        // Check value of highlight
        if ($highlight != 1) {
            $highlight = 0;
        }

        // Upload image(s)
        
        // Flip multidimensional $_FILES array
        $images = [];
        foreach($_FILES['image'] as $filesKey => $filesArray) {

            foreach($filesArray as $fileKey => $fileValue) {

                $images[$fileKey][$filesKey] = $fileValue;
            }
        }

        // Start filepath variable. If no image is uploaded, foreach will not be run and filepath will not be changed
        $filepaths = [];

        if (isset($_FILES['image']['name'][0]) && $_FILES['image']['name'][0] != null) {

            // Loop throug files for upload
            foreach ($images as $imageKey => $imageValue) {
                
                // File naming
                $path = '../includes/products/';
                $file = basename($imageValue['name']);
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                
                // Accepted files
                $acceptedFileTypes = $GLOBALS['acceptedImageTypes'];
            
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

                    $this->insertLog('Products', 'Edit', 'Editting product failed, image was the wrong type. By '.user());
                    return;
                }

                // Set destination path
                $filepath = $path.$filename.'.'.$extension;
                array_push($filepaths, $filepath);

                // Upload file
                if (!move_uploaded_file($_FILES['image']['tmp_name'][$imageKey], $filepath)) {
                    
                    // File upload failed
                    $filesError = null;
                    foreach($_FILES['image']['error'] as $value) {
                        $filesError = $filesError.$value.' ';
                    }

                    // Insert log
                    $this->insertLog('Products', 'Edit', 'Editting product ('.$name.') failed, image upload error: '.$filesError.'. By '.user());
                    return;
                }
            }
        }

        // Make json object from files path array
        $filepaths = json_encode($filepaths);
        
        // Insert product
        // If 1 row was affected, the query was succesful
        if ($this->editProducts($brand, $category, $name, $articleNumber, $nlDescription, $enDescription, $filepaths, $tags, $properties, $specifications, $price, $highlight, $ownArticlenumber, $id) == 1) {

            // Succes
            $this->insertLog('Products', 'Edit', 'Editted product '.$name.' with ID '.$id. '. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Products', 'Edit', 'Editting product '.$name.' failed. By '.user());
        }
    }

    /**
     * Save language settings
     */
    private function languages() : void
    {
        // Set required $_POST fields
        $this->setReq($GLOBALS['fieldsArray']);

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Languages', 'Edit', 'Editting languages failed, not all required fields are set. By '.user());
            return;
        }

        // Start variable to pass to PDO query
        $queryVars = array();

        // Escape all html entities
        foreach($_POST as $key => $value) {
            if ($key != 'form') {
                array_push($queryVars, htmlentities($value));
            }
        }
        
        // Update languages
        if ($this->editLanguages($queryVars) == 1) {

            // Succes
            $this->insertLog('Languages', 'Edit', 'Editted languages. By '.user());

        } else {

            // Failed
            $this->insertLog('Languages', 'Edit', 'Editting languages failed. By '.user());
        }
    }

    /**
     * Save settings
     */
    private function settings() : void
    {
        // No required $_POST data, because when a field is not true, it will not be sent
        // All missing values will be set to 0
        
        // Set form fields
        $fields = [
            'webshop_show_prices_on_guest',
            'webshop_show_prices_on_accounts',
            'webshop_checkout_button',
            'quick_enquiry_active',
            'home_initial_language'
        ];
        
        // Loop through form fields
        foreach($fields as $value) {
            
            if ($value == 'home_initial_language') {
                // Set new string variable
                $$value = $_POST[$value] == 'dutch' ? 'dutch' : 'english';

            } else {
            
                // Set new boolean variable
                $$value = isset($_POST[$value]) && $_POST[$value] == 1 ? 1 : 0;
            }

        }

        if ($this->editSettings($webshop_show_prices_on_guest, $webshop_show_prices_on_accounts, $webshop_checkout_button, $quick_enquiry_active, $home_initial_language) == 1) {

            // Succes
            $this->insertLog('Settings', 'Edit', 'Updated settings. By '.user());
            
        } else {

            // Failed
            $this->insertLog('Settings', 'Edit', 'Update settings failed. By '.user());
        }
    }

    /**
     * Add customer
     */
    private function addCustomer() : void
    {
        // Set required $_POST fields
        $this->setReq('firstname', 'lastname', 'password');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Add', 'Adding customer failed, not all required fields are set. By '.user());
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

            $this->insertLog('Customers', 'Add', 'Adding customer failed, email is not valid. By '.user());
            return;
        }

        // Check if email is unique
        if ($this->countCustomersByEmail($email) != 0) {

            $this->insertLog('Customers', 'Add', 'Adding customer failed, email is not unique. By '.user());
            return;
        }


        // Hash password
        $password = hash('whirlpool', $this->cSalt.$_POST['password']);

        // Insert customer
        if ($this->addCustomers($firstname, $insertion, $lastname, $email, $phone, $company, $billing_street, $billing_housenumber, $billing_postalcode, $billing_city, $billing_provence, $billing_country, $shipping_street, $shipping_housenumber, $shipping_postalcode, $shipping_city, $shipping_provence, $shipping_country, $remarks, $password, $taxnumber) == 1) {

            // Succes
            $this->insertLog('Customers', 'Add', 'Added customer '.$firstname.' '.$insertion.' '.$lastname.' with ID '.$this->getCustomerByName($firstname, $lastname)['id'].'. By '.user());
        
        } else {
            // Failed
            $this->insertLog('Customers', 'Add', 'Adding customer '.$firstname.' '.$insertion.' '.$lastname.' failed. By '.user());
        }
    }

    /**
     * Edit customer
     */
    private function editCustomer() : void
    {
        $customer = $this->getCustomer($_POST['id']);

        // Set required $_POST fields
        $this->setReq('firstname', 'lastname');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Customers', 'Edit', 'Editting customer '.$customer['lastname'].' '.$customer['firstname'].' '.$customer['insertion'].' with id '.$customer['id'].' failed, not all required fields are set. By '.user());
            return;
        }

        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'password' && $key != 'form') {
                $$key = htmlentities($value);
            }
        }

        // Set password default to hashed password in database
        
        $password = $customer['password'];

        // Check if password is reset
        if (isset($_POST['password']) && $_POST['password'] != null) {
            // Hash password
            $password = hash('whirlpool', $this->cSalt.$_POST['password']);
        }

        if ($this->editCustomers($firstname, $insertion, $lastname, $email, $phone, $company, $billing_street, $billing_housenumber, $billing_postalcode, $billing_city, $billing_provence, $billing_country, $shipping_street, $shipping_housenumber, $shipping_postalcode, $shipping_city, $shipping_provence, $shipping_country, $remarks, $password, $taxnumber, $id) == 1) {
        
            // Succes
            $this->insertLog('Customers', 'Edit', 'Editted customer '.$customer['lastname'].' '.$customer['firstname'].' '.$customer['insertion'].' with id '.$customer['id'].'. By '.user());

        } else {

            // Failed
            $this->insertLog('Customers', 'Edit', 'Editting customer '.$customer['lastname'].' '.$customer['firstname'].' '.$customer['insertion'].' with id '.$customer['id'].' failed. By '.user());
        }
    }

    /**
     * Edit ticket category
     */
    private function addTicketCategory() : void
    {
        // Set required $_POST fields
        $this->setReq('name');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Ticket category', 'Add', 'Adding ticket category '.$_POST['name'].' failed, not all required fields are set. By '.user());
            return;
        }

        // Set notification
        $notification = 1;
        if (isset($_POST['notification']) && $_POST['notification'] != 1) {
            $notification = 0;
        }

        // Set email
        $email = null;
        if (isset($_POST['email']) && $_POST['email'] != null) {
            $email = htmlentities($_POST['email']);
        }

        // Set name
        $name = htmlentities($_POST['name']);

        // Check if the name is unique
        if ($this->countTicketCategoryByName($name) != 0) {

            // Not unique, fail
            $this->insertLog('Ticket category', 'Add', 'Adding ticket category failed, name ('.$name.') is not unique. By '.user());
            return;
        }

        if ($this->addTicketCategories($name, $notification, $email) == 1) {

            // Succes
            $this->insertLog('Ticket category', 'Add', 'Added ticket category "'.$name.'" with id '.$this->getTicketCategoryByName($name)['id'].' succesfully. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Ticket category', 'Add', 'Added ticket category "'.$name.'" failed. By '.user());
        }
    }
    
    /**
     * Edit ticket category
     */
    private function editTicketCategory() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'id');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Ticket category', 'Edit', 'Editting ticket category '.$_POST['name'].' failed, not all required fields are set. By '.user());
            return;
        }

        // Set notification
        $notification = 1;
        if (!isset($_POST['notification']) || $_POST['notification'] != 1) {
            $notification = 0;
        }

        // Set email
        $email = null;
        if (isset($_POST['email']) && $_POST['email'] != null) {
            $email = htmlentities($_POST['email']);
        }

        // Set other variables
        $name = htmlentities($_POST['name']);
        $id = htmlentities($_POST['id']);

        // Check if the name is unique
        if ($this->countTicketCategoryByNameNotThis($name, $id) != 0) {

            // Not unique, fail
            $this->insertLog('Ticket category', 'Edit', 'Editting ticket category failed, name ('.$name.') is not unique. By '.user());
            return;
        }

        if ($this->EditTicketCategories($name, $notification, $email, $id) == 1) {

            // Succes
            $this->insertLog('Ticket category', 'Edit', 'Editting ticket category "'.$name.'" with id '.$id.' succesfully. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Ticket category', 'Edit', 'Editting ticket category "'.$name.'" (id: '.$id.') failed. By '.user());
        }
    }

    /**
     * Add ticket status
     */
    public function addTicketStatus() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'color');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Ticket status', 'Add', 'Adding ticket status '.$_POST['name'].' failed, not all required fields are set. By '.user());
            return;
        }
        
        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'form') {
                $$key = htmlentities($value);
            }
        }

        // Check if the name is unique
        if ($this->countTicketStatusByName($name) != 0) {

            // Not unique, fail
            $this->insertLog('Ticket status', 'Add', 'Adding ticket status '.$name.' failed, name is not unique. By '.user());
            return;
        }

        // Insert ticket status
        if ($this->addTicketStatusses($name, $color) == 1) {

            // Succes
            $this->insertLog('Ticket status', 'Add', 'Added ticket status '.$name.' with id '.$this->getTicketStatusByName($name)['id'].'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Ticket status', 'Add', 'Adding ticket status '.$name.' failed. By '.user());
        }
    }

    /**
     * Edit ticket status
     */
    public function editTicketStatus() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'color', 'id');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Ticket status', 'Edit', 'Editting ticket status '.$_POST['name'].' (id: '.$_POST['id'].') failed, not all required fields are set. By '.user());
            return;
        }
        
        // Loop through POST values and set variables
        foreach($_POST as $key => $value) {
            if ($key != 'form') {
                $$key = htmlentities($value);
            }
        }

        // Check if the name is unique
        if ($this->countTicketStatusByNameNotThis($name, $id) != 0) {

            // Not unique, fail
            $this->insertLog('Ticket status', 'Edit', 'Editting ticket status '.$name.' (id: '.$id.') failed, name is not unique. By '.user());
            return;
        }

        // Edit ticket status
        if ($this->editTicketStatusses($name, $color, $id) == 1) {

            // Succes
            $this->insertLog('Ticket status', 'Edit', 'Editted ticket status '.$name.' (id: '.$id.'). By '.user());
        
        } else {

            // Failed
            $this->insertLog('Ticket status', 'Edit', 'Editting ticket status '.$name.' failed. By '.user());
        }
    }
}