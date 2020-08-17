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

    // List accepted forms
    private $forms = [
        'addUser',
        'editUser',
        'addBrand',
        'editBrand',
        'addCategory',
        'editCategory',
        'addProduct',
        'editProduct'
    ];
    

    /**
     * The constructor checks for any sent forms
     * The form name must be in the class variable $forms
     * If the form name is found, call the class method
     */
    function __construct()
    {
        $this->salt = $GLOBALS['salt'];

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
        $this->setReq('name');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Product Categories', 'Add', 'Adding product category '.$name. 'failed, not all required fields are set. By '.user());
            return;
        }

        // Set variables
        $name = htmlentities($_POST['name']);
        $description = htmlentities($_POST['description']);

        // Check if the category name is unique
        if ($this->countCategoriesByName($name) != 0) {

            $this->insertLog('Product Categories', 'Add', 'Adding product category '.$name.' failed, duplicate name. By '.user());
            return;
        }

        // Insert category
        if ($this->addCategories($name, $description) == 1) {
            
            // Succes
            $this->insertLog('Product Categories', 'Add', 'Added product category '.$name.' with ID '.$this->getCategoryByName($name)['id'].'. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Product Categories', 'Add', 'Adding product category '.$name.' failed. By '.user());

        }
    }

    /**
     * Edit category
     */
    private function editCategory() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'id');

        // Check if all required items are posted
        // Fail if not
        if (!$this->checkReq()) {

            $this->insertLog('Product Categories', 'Edit', 'Editting product category failed, not all required fields are set. By '.user());
            return;
        }

        // Set variables
        $name = htmlentities($_POST['name']);
        $description = htmlentities($_POST['description']);
        $id = $this->isId($_POST['id']);

        $category = $this->getCategoryById($id);

        // Check if name is unique, skip own id
        if ($this->countCategoryByNameNotId($name, $category['id']) != 0) {

            $this->insertLog('Product Categories', 'Edit', 'Editting product category '.$category['name'].' to '.$name.' (id '.$category['id'].') failed, new name is not unique. By '.user());
            return;
        }

        // Update category
        // If 1 row was affected, the query was succesful
        if ($this->editCategories($name, $description, $id) == 1) {

            // Succes
            $this->insertLog('Product Categories', 'Edit', 'Editted product category '.$category['name'].' to '.$name.' (id '.$category['id'].'). By '.user());
        
        } else {

            // Failed
            $this->insertLog('Product Categories', 'Edit', 'Editting product category '.$category['name'].' to '.$name.'(id '.$category['id'].') failed. 0 or multiple records affected. By '.user());

        }
    }

    /**
     * Add product
     */
    public function addProduct() : void
    {
        // Set required $_POST fields
        $this->setReq('name', 'brands', 'categories', 'articlenumber', 'nl_description', 'en_description');

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
        if ($this->addProducts($brand, $category, $name, $articleNumber, $nlDescription, $enDescription, $filepaths, $tags, $properties, $specifications, $price, $highlight)) {

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
        $this->setReq('name', 'brands', 'categories', 'articlenumber', 'nl_description', 'en_description', 'id');

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
        if ($this->editProducts($brand, $category, $name, $articleNumber, $nlDescription, $enDescription, $filepaths, $tags, $properties, $specifications, $price, $highlight, $id)) {

            // Succes
            $this->insertLog('Products', 'Edit', 'Editted product '.$name.' with ID '.$id. '. By '.user());
        
        } else {

            // Failed
            $this->insertLog('Products', 'Edit', 'Editting product '.$name.' failed. By '.user());
        }
    }
}