<?php

/**
 * This file contains all of the class queries
 */

namespace Blackbeard;

class Queries extends Db
{
    /**
     * ===================================================
     * USERS
     * ===================================================
     */

    /**
     * Count users
     * 
     * @return int
     */
    public function countUsers() : int
    {
        return $this->one('SELECT COUNT(*) FROM `users`');
    }

    /**
     * All users
     * 
     * @return array
     */
    public function allUsers() : array
    {
        return $this->all('SELECT * FROM `users` ORDER BY `username` ASC');
    }

    /**
     * Count users by username
     * 
     * @param string $username
     * 
     * @return int
     */
    public function countUserByUsername($username) : int
    {
        return $this->one('SELECT COUNT(*) FROM `users` WHERE `username` = ?', array($username));
    }

    /**
     * Insert users
     * 
     * @param string $username
     * @param string $password
     * 
     * @return int
     */
    public function insertUser($username, $password) : int
    {
        return $this->none('INSERT INTO `users` (`username`, `password`) VALUES (?, ?)', array($username, $password));
    }

    /**
     * Get user by username
     * 
     * @param string $username
     * 
     * @return array
     */
    public function getUserByUsername($username) : array
    {
        return $this->row('SELECT * FROM `users` WHERE `username` = ?', array($username));
    }

    /**
     * Get user by id
     * 
     * @param int $id
     * 
     * @return array
     */
    public function getUserById($id) : array
    {
        return $this->row('SELECT * FROM `users` WHERE `id` = ?', array($id));
    }

    /**
     * Edit the user's password
     * 
     * @param string $password
     * @param int $id
     * 
     * @return int
     */
    public function updatePassword($password, $id) : int
    {
        return $this->none('UPDATE `users` SET `password` = ? WHERE `id` = ?', array($password, $id));
    }

    /**
     * Edit the user's username
     * 
     * @param string $username
     * @param int $id
     * 
     * @return int
     */
    public function updateUsername($username, $id) : int
    {
        return $this->none('UPDATE `users` SET `username` = ? WHERE `id` = ?', array($username, $id));
    }

    /**
     * Delete a user
     * 
     * @param int $id
     * 
     * @return int
     */
    public function deleteUser($id) : int
    {
        return $this->none('DELETE FROM `users` WHERE `id` = ?', array($id));
    }

    /**
     * ===================================================
     * LOG
     * ===================================================
     */

    /**
     * Insert log
     * 
     * @param string $tableSource
     * @param string $action
     * @param string $description
     * 
     * @return int
     */
    public function insertLog($tableSource, $action, $description) : int
    {
        return $this->none('INSERT INTO `log` (`table_source`, `action`, `description`) VALUES (?, ?, ?)', array($tableSource, $action, $description));
    }

    /**
     * ===================================================
     * BRANDS
     * ===================================================
     */

     /**
      * Count brands
      *
      * @return int
      */
    public function countBrands() : int
    {
        return $this->one('SELECT COUNT(*) FROM `brands`');
    }

    /**
     * Add brand
     * 
     * @param string $name
     * @param string $image
     * @param string $description
     * @param string $website
     * 
     * @return int
     */
    public function addBrands($name, $image, $description, $website) : int
    {
        return $this->none('INSERT INTO `brands` (`name`, `image`, `description`, `website`) VALUES (?, ?, ?, ?)', array($name, $image, $description, $website));
    }

    /**
     * Count brands by name
     * 
     * @param string $name
     * 
     * @return int
     */
    public function countBrandByName($name) : int
    {
        return $this->one('SELECT COUNT(*) FROM `brands` WHERE `name` = ?', array($name));
    }

    /** 
     * Get brand by name
     * 
     * @param string $name
     * 
     * @return array
     */
    public function getBrandByName($name) : array
    {
        return $this->row('SELECT * FROM `brands` WHERE `name` = ?', array($name));
    }

    /**
     * Get all brands
     * 
     * @return array 
     */
    public function allBrands() : array
    {
        return $this->all('SELECT * FROM `brands` ORDER BY `name` ASC');
    }

    /**
     * Get brand by id
     * 
     * @param int $id
     * 
     * @return array
     */
    public function getBrandById($id) : array
    {
        return $this->row('SELECT * FROM `brands` WHERE `id` = ?', array($id));
    }

    /**
     * Edit brand
     * 
     * @param string $name
     * @param string $image
     * @param string $description
     * @param string $website
     * @param int $id
     * 
     * @return int
     */
    public function editBrands($name, $image, $description, $website, $id) : int
    {
        return $this->none('UPDATE `brands` SET `name` = ?, `image` = ?, `description` = ?, `website` = ? WHERE `id` = ?', array($name, $image, $description, $website, $id));
    }

    /**
     * Delete brand
     * 
     * @param int $id
     * 
     * @return int
     */
    public function deleteBrand($id) : int
    {
        return $this->none('DELETE FROM `brands` WHERE `id` = ?', array($id));
    }

    /**
     * Count brands by name where the id is not the given id
     * 
     * @param string $name
     * @param int $id
     * 
     * @return int
     */
    public function countBrandByNameNotId($name, $id) : int
    {
        return $this->one('SELECT COUNT(*) FROM `brands` WHERE `name` = ? AND `id` != ?', array($name, $id));
    }

    /**
     * ===================================================
     * PRODUCTS
     * ===================================================
     */

    /**
     * Count products
     * 
     * @return int
     */
    public function countProducts() : int
    {
        return $this->one('SELECT COUNT(*) FROM `products`');
    }

    /**
     * Count products by article number
     * 
     * @param string $articlenumber
     * @return int
     */
    public function countProductsByArticlenumber($articlenumber) : int
    {
        return $this->one('SELECT COUNT(*) FROM `products` WHERE `articlenumber` = ?', array($articlenumber));
    }

    /**
     * Insert product
     * 
     * @param int $brand
     * @param int $category
     * @param string $name
     * @param string $articlenumber
     * @param string $description_dutch
     * @param string $description_english
     * @param string $images
     * @param string $tags
     * @param string $properties
     * @param string $specifications
     * @param float $price
     * @param boolean $highlight
     * @param string $ownArticlenumber
     * @return int
     */
    public function addProducts($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $images, $tags, $properties, $specifications, $price, $highlight, $ownArticlenumber) : int
    {
        return $this->none('INSERT INTO `products` (`brand`, `category`, `name`, `articlenumber`, `description_dutch`, `description_english`, `images`, `tags`, `properties`, `specifications`, `price`, `highlight`, `own_articlenumber`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $images, $tags, $properties, $specifications, $price, $highlight, $ownArticlenumber));
    }

    /**
     * Get product by articlenumber
     * 
     * @param string $articlenumber
     * @return array
     */
    public function getProductByArticleNumber($articlenumber) : array
    {
        return $this->row('SELECT * FROM `products` WHERE `articlenumber` = ?', array($articlenumber));
    }

    /**
     * Get all products
     * 
     * @return array
     */
    public function allProducts() : array
    {
        return $this->all('SELECT * FROM `products` ORDER BY `name` ASC');
    }

    /**
     * Get product by id
     * 
     * @param int $id
     * @return array
     */
    public function getProductById($id) : array
    {
        return $this->row('SELECT * FROM `products` WHERE `id` = ?', array($id));
    }

    /**
     * Count products by articlenumber, but skip id
     * 
     * @param string $articlenumber
     * @param int $id
     * @return int
     */
    public function countProductsByArticlenumberNotId($articlenumber, $id) : int
    {
        return $this->one('SELECT COUNT(*) FROM `products` WHERE `articlenumber` = ? AND `id` != ?', array($articlenumber, $id));
    }
    
    /**
     * Get one product with image in product category
     * 
     * @param int $category
     * @return array/boolean
     */
    public function getProductByCategoryWithImage($category)
    {
        return $this->row('SELECT * FROM `products` WHERE `category` = ? AND `images` IS NOT NULL ORDER BY `id` DESC LIMIT 1', array($category));
    }

    /**
     * Edit product
     * 
     * @param int $brand
     * @param int $category
     * @param string $name
     * @param string $articlenumber
     * @param string $description_dutch
     * @param string $description_english
     * @param string $images
     * @param string $tags
     * @param string $properties
     * @param string $specifications
     * @param float $price
     * @param boolean $highlight
     * @param string $ownArticlenumber
     * @param int $id
     * @return int
     */
    public function editProducts($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $image, $tags, $properties, $specifications, $price, $highlight, $ownArticlenumber, $id) : int
    {
        return $this->none('UPDATE `products` SET `brand` = ?, `category` = ?, `name` = ?, `articlenumber` = ?, `description_dutch` = ?, `description_english` = ?, `images` = ?, `tags` = ?, `properties` = ?, `specifications` = ?, `price` = ?, `highlight` = ?, `own_articlenumber` = ? WHERE `id` = ?', array($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $image, $tags, $properties, $specifications, $price, $highlight, $ownArticlenumber, $id));
    }

    /**
     * Delete product
     * 
     * @param int @id
     * @return int
     */
    public function deleteProduct($id) : int
    {
        return $this->none('DELETE FROM `products` WHERE `id` = ?', array($id));
    }

    /**
     * Get products by category
     * 
     * @param int $category
     * @return array
     */
    public function getProductsByCategory($category) : array
    {
        return $this->all('SELECT * FROM `products` WHERE `category` = ?', array($category));
    }

    /**
     * Count products by category and id
     * 
     * @param int $category
     * @param int $id
     * @return int
     */
    public function countProductsByCategoryAndId($category, $id) : int
    {
        return $this->one('SELECT COUNT(*) FROM `products` WHERE `category` = ? AND `id` = ?', array($category, $id));
    }

    /**
     * ===================================================
     * PRODUCT_CATEGORIES
     * ===================================================
     */

    /**
     * Count categories
     * 
     * @return int
     */
    public function countCategories() : int
    {
        return $this->one('SELECT COUNT(*) FROM `product_categories`');
    }

    /**
     * All categories
     * 
     * @return array
     */
    public function allCategories() : array
    {
        return $this->all('SELECT * FROM `product_categories` ORDER BY `nl_name` ASC');
    }

    /**
     * Count categories by name
     * 
     * @param string $nlName
     * @return int
     */
    public function countCategoriesByName($nlName)
    {
        return $this->one('SELECT COUNT(*) FROM `product_categories` WHERE `nl_name` = ?', array($nlName));
    }

    /**
     * Insert category
     * 
     * @param string $nlName
     * @param string $nlDescription
     * @param string $enName
     * @param string $enDescription
     * @return int
     */
    public function addCategories($nlName, $nlDescription, $enName, $enDescription) : int
    {
        return $this->none('INSERT INTO `product_categories` (`nl_name`, `nl_description`, `en_name`, `en_description`) VALUES (?, ?, ?, ?)', array($nlName, $nlDescription, $enName, $enDescription));
    }

    /**
     * Get category by name
     * 
     * @param string $nlName
     * @return array
     */
    public function getCategoryByName($nlName) : array
    {
        return $this->row('SELECT * FROM `product_categories` WHERE `nl_name` = ?', array($nlName));
    }

    /**
     * Get category by id
     * 
     * @param int $id
     * @return array
     */
    public function getCategoryById($id) : array
    {
        return $this->row('SELECT * FROM `product_categories` WHERE `id` = ?', array($id));
    }

    /**
     * Count categories by name and skip id
     * 
     * @param string $nlName
     * @param int $id
     * @return int
     */
    public function countCategoryByNameNotId($nlName, $id) : int
    {
        return $this->one('SELECT COUNT(*) FROM `product_categories` WHERE `nl_name` = ? AND `id` != ?', array($nlName, $id));
    }

    /**
     * Edit categories
     * @param string $nlName
     * @param string $nlDescription
     * @param string $enName
     * @param string $enDescription
     * @return int
     */
    public function editCategories($nlName, $nlDescription, $enName, $enDescription, $id) : int
    {
        return $this->none('UPDATE `product_categories` SET `nl_name` = ?, `nl_description` = ?, `en_name` = ?, `en_description` = ? WHERE `id` = ?', array($nlName, $nlDescription, $enName, $enDescription, $id));
    }

    /**
     * Delete category
     * 
     * @return int
     */
    public function deleteCategory($id) : int
    {
        return $this->none('DELETE FROM `product_categories` WHERE `id` = ?', array($id));
    }

    /**
     * ===================================================
     * LANGUAGES
     * ===================================================
     */

    /**
     * Get languages data
     * Make sure no extra data is pulled, should not be possible to enter new data
     * 
     * @return array
     */
    public function allLanguages() : array
    {
        return $this->row('SELECT * FROM `languages` LIMIT 1');
    }

    /**
     * Edit languages
     * 
     * @param array $array
     * @return int
     */
    public function editLanguages($array) : int
    {
        // Start prepared statement
        $statement = 'UPDATE `languages` SET';

        // Build rows
        foreach($GLOBALS['fieldsArray'] as $key => $value) {
            $statement .= ' `'.$value.'` = ?,';
        }

        // Remove last comma
        $statement = substr($statement, 0, -1);

        // Run query
        return $this->none($statement, $array);
    }

    /**
     * ===================================================
     * LOGS
     * ===================================================
     */

    /**
     * Get all logs
     * 
     * @return array
     */
    public function allLogs() : array
    {
        return $this->all('SELECT * FROM `log` ORDER BY `id` DESC');
    }
    
    /**
     * ===================================================
     * SETTINGS
     * ===================================================
     */

    /**
     * Get all settings
     * Make sure no extra data is pulled, should not be possible to enter new data
     * 
     * @return array
     */
    public function allSettings() : array
    {
        return $this->row('SELECT * FROM `settings` LIMIT 1');
    }

    /**
     * Update settings
     * 
     * @param boolean $webshopPriceGuest
     * @param boolean $webshopPriceAccount
     * @param boolean $webshopCheckout
     * @param boolean $qeActive
     * @param string $homeInitialLanguage
     * @return int
     */
    public function editSettings($webshopPriceGuest, $webshopPriceAccount, $webshopCheckout, $qeActive, $homeInitialLanguage) : int
    {
        return $this->none('UPDATE `settings` SET `webshop_show_prices_on_guest` = ?, `webshop_show_prices_on_account` = ?, `webshop_checkout_button` = ?, `quick_enquiry_active` = ?, `home_initial_language` = ?', array($webshopPriceGuest, $webshopPriceAccount, $webshopCheckout, $qeActive, $homeInitialLanguage));
    }

    /**
     * ===================================================
     * CUSTOMERS
     * ===================================================
     */

    /**
     * Count customers
     * 
     * @return int
     */
    public function countCustomers() : int
    {
        return $this->one('SELECT COUNT(*) FROM `customers`');
    }

    /**
     * Get all customers
     * 
     * @return array
     */
    public function allCustomers() : array
    {
        return $this->all('SELECT * FROM `customers` ORDER BY `lastname` ASC');
    }

    /**
     * Add customers
     * 
     * @param string $firstname
     * @param string $insertion
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param string $company
     * @param string $billingStreet
     * @param string $billingHousenumber
     * @param string $billingPostalcode
     * @param string $billingCity
     * @param string $billingProvence
     * @param string $billingCountry
     * @param string $shippingStreet
     * @param string $shippingHousenumber
     * @param string $shippingPostalcode
     * @param string $shippingCity
     * @param string $shippingProvence
     * @param string $shippingCountry
     * @param string $remarks
     * @param string $password
     * @param string $taxnumber
     * @return int
     */
    public function addCustomers($firstname, $insertion, $lastname, $email, $phone, $company, $billingStreet, $billingHousenumber, $billingPostalcode, $billingCity, $billingProvence, $billingCountry, $shippingStreet, $shippingHousenumber, $shippingPostalcode, $shippingCity, $shippingProvence, $shippingCountry, $remarks, $password, $taxnumber) : int
    {
        return $this->none('INSERT INTO `customers` (`firstname`, `insertion`, `lastname`, `email`, `phone`, `company_name`, `billing_street`, `billing_housenumber`, `billing_postalcode`, `billing_city`, `billing_provence`, `billing_country`, `shipping_street`, `shipping_housenumber`, `shipping_postalcode`, `shipping_city`, `shipping_provence`, `shipping_country`, `remarks`, `password`, `taxnumber`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($firstname, $insertion, $lastname, $email, $phone, $company, $billingStreet, $billingHousenumber, $billingPostalcode, $billingCity, $billingProvence, $billingCountry, $shippingStreet, $shippingHousenumber, $shippingPostalcode, $shippingCity, $shippingProvence, $shippingCountry, $remarks, $password, $taxnumber));
    }

    /**
     * Edit customers
     * 
     * @param string $firstname
     * @param string $insertion
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param string $company
     * @param string $billingStreet
     * @param string $billingHousenumber
     * @param string $billingPostalcode
     * @param string $billingCity
     * @param string $billingProvence
     * @param string $billingCountry
     * @param string $shippingStreet
     * @param string $shippingHousenumber
     * @param string $shippingPostalcode
     * @param string $shippingCity
     * @param string $shippingProvence
     * @param string $shippingCountry
     * @param string $remarks
     * @param string $password
     * @param string $taxnumber
     * @param int $id
     * @return int
     */
    public function editCustomers($firstname, $insertion, $lastname, $email, $phone, $company, $billingStreet, $billingHousenumber, $billingPostalcode, $billingCity, $billingProvence, $billingCountry, $shippingStreet, $shippingHousenumber, $shippingPostalcode, $shippingCity, $shippingProvence, $shippingCountry, $remarks, $password, $taxnumber, $id) : int
    {
        return $this->none('UPDATE `customers` SET `firstname` = ?, `insertion` = ?, `lastname` = ?, `email` = ?, `phone` = ?, `company_name` = ?, `billing_street` = ?, `billing_housenumber` = ?, `billing_postalcode` = ?, `billing_city` = ?, `billing_provence` = ?, `billing_country` = ?, `shipping_street` = ?, `shipping_housenumber` = ?, `shipping_postalcode` = ?, `shipping_city` = ?, `shipping_provence` = ?, `shipping_country` = ?, `remarks` = ?, `password` = ?, `taxnumber` = ? WHERE `id` = ?', array($firstname, $insertion, $lastname, $email, $phone, $company, $billingStreet, $billingHousenumber, $billingPostalcode, $billingCity, $billingProvence, $billingCountry, $shippingStreet, $shippingHousenumber, $shippingPostalcode, $shippingCity, $shippingProvence, $shippingCountry, $remarks, $password, $taxnumber, $id));
    }

    /**
     * Get customer by firstname and lastname
     * 
     * @param string $firstname
     * @param string $lastname
     * @return array
     */
    public function getCustomerByName($firstname, $lastname) : array
    {
        return $this->row('SELECT * FROM `customers` WHERE `firstname` = ? AND `lastname` = ? ORDER BY `id` DESC', array($firstname, $lastname));
    }

    /**
     * Get customer by id
     * 
     * @param int $id
     * @return array
     */
    public function getCustomer($id) : array
    {
        return $this->row('SELECT * FROM `customers` WHERE `id` = ?',array($id));
    }

    /**
     * Delete customer
     * 
     * @param int $id
     * @return int
     */
    public function deleteCustomer($id) : int
    {
        return $this->none('DELETE FROM `customers` WHERE `id` = ?', array($id));
    }

    /**
     * Count customers by email
     * 
     * @param string $email
     * @return int
     */
    public function countCustomersByEmail($email) : int
    {
        return $this->one('SELECT COUNT(*) FROM `customers` WHERE `email` = ?', array($email));
    }

    /** 
     * Get customers by email
     * 
     * @param string $email
     * @return array
     */
    public function getCustomersByEmail($email) : array
    {
        return $this->row('SELECT * FROM `customers` WHERE `email` = ?', array($email));
    }

    /**
     * Edit customer through main website
     * 
     * @param string $firstname
     * @param string $insertion
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param string $company
     * @param string $billingStreet
     * @param string $billingHousenumber
     * @param string $billingPostalcode
     * @param string $billingCity
     * @param string $billingProvence
     * @param string $billingCountry
     * @param string $shippingStreet
     * @param string $shippingHousenumber
     * @param string $shippingPostalcode
     * @param string $shippingCity
     * @param string $shippingProvence
     * @param string $shippingCountry
     * @param string $taxnumber
     * @param int $id
     * @return int
     */
    public function editCustomerWeb($firstname, $insertion, $lastname, $email, $phone, $company, $billingStreet, $billingHousenumber, $billingPostalcode, $billingCity, $billingProvence, $billingCountry, $shippingStreet, $shippingHousenumber, $shippingPostalcode, $shippingCity, $shippingProvence, $shippingCountry, $taxnumber, $id) : int
    {
        return $this->none('UPDATE `customers` SET `firstname` = ?, `insertion` = ?, `lastname` = ?, `email` = ?, `phone` = ?, `company_name` = ?, `billing_street` = ?, `billing_housenumber` = ?, `billing_postalcode` = ?, `billing_city` = ?, `billing_provence` = ?, `billing_country` = ?, `shipping_street` = ?, `shipping_housenumber` = ?, `shipping_postalcode` = ?, `shipping_city` = ?, `shipping_provence` = ?, `shipping_country` = ?, `taxnumber` = ? WHERE `id` = ?', array($firstname, $insertion, $lastname, $email, $phone, $company, $billingStreet, $billingHousenumber, $billingPostalcode, $billingCity, $billingProvence, $billingCountry, $shippingStreet, $shippingHousenumber, $shippingPostalcode, $shippingCity, $shippingProvence, $shippingCountry, $taxnumber, $id));
    }

    /**
     * Change password
     * 
     * @param string $password
     * @param int $id
     * @return int
     */
    public function editCustomerPassword($password, $id) : int
    {
        return $this->none('UPDATE `customers` SET `password` = ? WHERE `id` = ?', array($password, $id));
    }

    /**
     * ===================================================
     * ORDERS
     * ===================================================
     */

    /**
     * Get orders by customer id
     * 
     * @param int $customer
     * @return array
     */
    public function getOrdersByCustomer($customer) : array
    {
        return $this->all('SELECT * FROM `orders` WHERE `customer` = ?', array($customer));
    }

    /**
     * Count orders by customer id
     * 
     * @param int $customer
     * @return int
     */
    public function countOrdersByCustomer($customer) : int
    {
        return $this->one('SELECT COUNT(*) FROM `orders` WHERE `customer` = ?', array($customer));
    }

    /**
     * ===================================================
     * TICKETS
     * ===================================================
     */

    /**
     * Get tickets by customer id
     * 
     * @param int $customer
     * @return array
     */
    public function getTicketsByCustomer($customer) : array
    {
        return $this->all('SELECT * FROM `tickets` WHERE `customer` = ?', array($customer));
    }

    /**
     * Count tickets by customer id
     * 
     * @param int $customer
     * @return int
     */
    public function countTicketsByCustomer($customer) : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets` WHERE `customer` = ?', array($customer));
    }

    /**
     * ===================================================
     * CONTACT
     * ===================================================
     */

    /**
     * Add contact form
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $subject
     * @param string $message
     * @param string $customer
     * @return int
     */
    public function addContact($name, $email, $phone, $subject, $message, $customer) : int
    {
        return $this->none('INSERT INTO `contact` (`name`, `email`, `phone`, `subject`, `message`, `customer`) VALUES (?, ?, ?, ?, ?, ?)', array($name, $email, $phone, $subject, $message, $customer));
    }

    /**
     * Count contact messages
     * 
     * @return int
     */
    public function countContact() : int
    {
        return $this->one('SELECT COUNT(*) FROM `contact`');
    }

    /**
     * All contact messages
     * 
     * @return array
     */
    public function allContact() : array
    {
        return $this->all('SELECT * FROM `contact` ORDER BY `id` DESC');
    }

    /**
     * Get contact message
     * 
     * @param int $id
     * @return array
     */
    public function getContact($id) : array
    {
        return $this->row('SELECT * FROM `contact` WHERE `id` = ?', array($id));
    }

    /**
     * Delete contact message
     * 
     * @param int $id
     * @return int
     */
    public function deleteContact($id) : int
    {
        return $this->none('DELETE FROM `contact` WHERE `id` = ?', array($id));
    }

    /**
     * ===================================================
     * TICKETS CATEGORY
     * ===================================================
     */

    /**
     * Count ticket categories
     * 
     * @return int
     */
    public function countTicketCategories() : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets_category`');
    }

    /**
     * Get all ticket categories
     * 
     * @return array
     */
    public function getTicketCategories() : array
    {
        return $this->all('SELECT * FROM `tickets_category` ORDER BY `name` ASC');
    }

    /**
     * Add ticket category
     * 
     * @param string $name
     * @param boolean $notification
     * @param string $email
     * @return int
     */
    public function addTicketCategories($name, $notification, $email) : int
    {
        return $this->none('INSERT INTO `tickets_category` (`name`, `notification`, `email`) VALUES (?, ?, ?)', array($name, $notification, $email));
    }
    
    /**
     * Count ticket category by name
     * 
     * @param string $name
     * @return int
     */
    public function countTicketCategoryByName($name) : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets_category` WHERE `name` = ?', array($name));
    }

    /**
     * Get ticket category by name
     * 
     * @param string $name
     * @return array
     */
    public function getTicketCategoryByName($name) : array
    {
        return $this->row('SELECT * FROM `tickets_category` WHERE `name` = ?', array($name));
    }

    /**
     * Get ticket category by id
     * 
     * @param int $id
     * @return array
     */
    public function getTicketCategory($id) : array
    {
        return $this->row('SELECT * FROM `tickets_category` WHERE `id` = ?', array($id));
    }

    /**
     * Count ticket categories by name, skip current
     * 
     * @param string $name
     * @param int $id
     * @return int
     */
    public function countTicketCategoryByNameNotThis($name, $id) : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets_category` WHERE `name` = ? AND `id` != ?', array($name, $id));
    }

    /**
     * Edit ticket category
     * 
     * @param string $name
     * @param boolean $notification
     * @param string $email
     * @param int $id
     * @return int
     */
    public function editTicketCategories($name, $notification, $email, $id) : int
    {
        return $this->none('UPDATE `tickets_category` SET `name` = ?, `notification` = ?, `email` = ? WHERE `id` = ?', array($name, $notification, $email, $id));
    }

    /**
     * Delete ticket category
     * 
     * @param int $id
     * @return int
     */
    public function deleteTicketCategories($id) : int
    {
        return $this->none('DELETE FROM `tickets_category` WHERE `id` = ?', array($id));
    }

    /**
     * ===================================================
     * TICKETS STATUS
     * ===================================================
     */

    /**
     * Count ticket statusses
     * 
     * @return int
     */
    public function countTicketStatusses() : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets_status`');
    }

    /**
     * Get all ticket statusses
     * 
     * @return array
     */
    public function getTicketStatusses() : array
    {
        return $this->all('SELECT * FROM `tickets_status`');
    }

    /**
     * Count ticket status by name
     * 
     * @param string $name
     * @return int
     */
    public function countTicketStatusByName($name) : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets_status` WHERE `name` = ?', array($name));
    }

    /**
     * Get ticket status by name
     * 
     * @param string $name
     * @return array
     */
    public function getTicketStatusByName($name) : array
    {
        return $this->row('SELECT * FROM `tickets_status` WHERE `name` = ?', array($name));
    }

    /**
     * Add ticket status
     * 
     * @param string $name
     * @param string $color
     * @return int
     */
    public function addTicketStatusses($name, $color) : int
    {
        return $this->none('INSERT INTO `tickets_status` (`name`, `color`) VALUES (?, ?)', array($name, $color));
    }

    /**
     * Get ticket status
     * 
     * @param int $id
     * @return array
     */
    public function getTicketStatus($id) : array
    {
        return $this->row('SELECT * FROM `tickets_status` WHERE `id` = ?', array($id));
    }

    /**
     * Count tickets status by name, skip id
     * 
     * @param string $name
     * @param int $id
     * @return int
     */
    public function countTicketStatusByNameNotThis($name, $id) : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets_status` WHERE `name` = ? AND `id` != ?', array($name, $id));
    }

    /**
     * Edit ticket status
     * 
     * @param string $name
     * @param string $color
     * @param int $id
     * @return int
     */
    public function editTicketStatusses($name, $color, $id) : int
    {
        return $this->none('UPDATE `tickets_status` SET `name` = ?, `color` = ? WHERE `id` = ?', array($name, $color, $id));
    }

    /**
     * Delete ticket status
     * 
     * @param int $id
     * @return int
     */
    public function deleteTicketStatus($id) : int
    {
        return $this->none('DELETE FROM `tickets_status` WHERE `id` = ?', array($id));
    }
}