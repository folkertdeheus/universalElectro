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
     * Get all brands with logo
     * 
     * @return array
     */
    public function allBrandsWithLogo() : array
    {
        return $this->all('SELECT * FROM `brands` WHERE `image` IS NOT NULL ORDER BY `name` ASC');
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
     * @param float $price
     * @param string $ownArticlenumber
     * @param int $condition
     * @return int
     */
    public function addProducts($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $images, $tags, $price, $ownArticlenumber, $condition) : int
    {
        return $this->none('INSERT INTO `products` (`brand`, `category`, `name`, `articlenumber`, `description_dutch`, `description_english`, `images`, `tags`, `price`, `own_articlenumber`, `conditions`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $images, $tags, $price, $ownArticlenumber, $condition));
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
     * @param float $price
     * @param string $ownArticlenumber
     * @param int $condition
     * @param int $id
     * @return int
     */
    public function editProducts($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $image, $tags, $price, $ownArticlenumber, $condition, $id) : int
    {
        return $this->none('UPDATE `products` SET `brand` = ?, `category` = ?, `name` = ?, `articlenumber` = ?, `description_dutch` = ?, `description_english` = ?, `images` = ?, `tags` = ?, `price` = ?, `own_articlenumber` = ?, `conditions` = ? WHERE `id` = ?', array($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $image, $tags, $price, $ownArticlenumber, $condition, $id));
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
     * Get products by brand
     * 
     * @param int $brand
     * @return array
     */
    public function getProductByBrand($brand) : array
    {
        return $this->all('SELECT * FROM `products` WHERE `brand` =  ?', array($brand));
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
        return $this->all('SELECT * FROM `tickets` WHERE `customer` = ? ORDER BY `id` DESC', array($customer));
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
     * Add ticket through web
     * 
     * @param int $customer
     * @param int $status
     * @param string $subject
     * @param int $category
     * @param int $priority
     * @param boolean $customerNotification
     * @return int
     */
    public function addTickets($customer, $status, $subject, $category, $priority, $customerNotification) : int
    {
        return $this->none('INSERT INTO `tickets` (`customer`, `status`, `subject`, `category`, `priority`, `customer_notification`) VALUES (?, ?, ?, ?, ?, ?)', array($customer, $status, $subject, $category, $priority, $customerNotification));
    }

    /**
     * Get last ticket by customer and subject
     * 
     * @param int $customer
     * @param string $subject
     * @return array
     */
    public function lastTicketByCustomerAndSubject($customer, $subject) : array
    {
        return $this->row('SELECT * FROM `tickets` WHERE `customer` = ? AND `subject` = ? ORDER BY `id` DESC LIMIT 1', array($customer, $subject));
    }

    /**
     * Get ticket by id and customer
     * 
     * @param int $id
     * @param int $customer
     * @return array
     */
    public function getTicket($id, $customer) : array
    {
        return $this->row('SELECT * FROM `tickets` WHERE `id` = ? AND `customer` = ?', array($id, $customer));
    }

    /**
     * Get all tickets ordered by the latest message in the ticket
     * 
     * @return array
     */
    public function getTickets() : array
    {
        // Get all messages, ordered descending, skip user replies
        $messages = $this->all('SELECT * FROM `tickets_messages` WHERE `user` IS NULL ORDER BY `id` DESC');

        // Set ticket id array, need for unique check
        $ticketId = array();

        // Set tickets array
        $tickets = array();

        // Loop through messages
        foreach($messages as $messageKey => $messageValue) {

            // Check if ticket id in message is not yet in array
            if (!in_array($messageValue['ticket'], $ticketId)) {

                // Insert ticket id in array
                array_push($ticketId, $messageValue['ticket']);

                // Get ticket
                $ticket = $this->row('SELECT * FROM `tickets` WHERE `id` = ?', array($messageValue['ticket']));

                // Push ticket into array
                array_push($tickets, $ticket);
            }
        }

        return $tickets;
    }

    /**
     * Count tickets
     * 
     * @return array
     */
    public function countTickets() : int
    {
        return $this->one('SELECT COUNT(*) FROM `tickets`');
    }

    /**
     * Get ticket in CMS
     * 
     * @param int $id
     * @return array
     */
    public function getCMSTicket($id) : array
    {
        return $this->row('SELECT * FROM `tickets` WHERE `id` = ?', array($id));
    }

    /**
     * Edit ticket in CMS
     * 
     * @param int $status
     * @param int $closed
     * @param int $category
     * @param int $priority
     * @param int $id
     * @return int
     */
    public function editTicket($status, $closed, $category, $priority, $id) : int
    {
        return $this->none('UPDATE `tickets` SET `status` = ?, `closed` = ?, `category` = ?, `priority` = ? WHERE `id` = ?', array($status, $closed, $category, $priority, $id));
    }

    /**
     * Edit ticket status
     * 
     * @param int $status
     * @param int $id
     * @return int
     */
    public function setTicketStatus($status, $id) : int
    {
        return $this->none('UPDATE `tickets` SET `status` = ? WHERE `id` = ?', array($status, $id));
    }

    /**
     * Close ticket
     * 
     * @param int $id
     * @param int $customer
     * @return int
     */
    public function closeTicket($id, $customer) : int
    {
        return $this->none('UPDATE `tickets` SET `status` = 2 WHERE `id` = ? AND `customer` = ?', array($id, $customer));
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

    /**
     * ===================================================
     * TICKETS SETTINGS
     * ===================================================
     */

    /**
     * Get ticket settings
     */
    public function getTicketSettings() : array
    {
        return $this->row('SELECT * FROM `tickets_settings`');
    }

    /**
     * Edit ticket settings
     * @param int $initialStatus
     * @return int
     */
    public function editTicketsSettings($initialStatus) : int
    {
        return $this->none('UPDATE `tickets_settings` SET `initial_status` = ?', array($initialStatus));
    }

    /**
     * ===================================================
     * TICKETS MESSAGES
     * ===================================================
     */

    /**
     * Add tickets message through web
     * 
     * @param int $ticket
     * @param int $customer
     * @param string $message
     * @param string $file
     * @return int
     */
    public function addTicketMessage($ticket, $customer, $message, $file) : int
    {
        return $this->none('INSERT INTO `tickets_messages` (`ticket`, `customer`, `message`, `file`) VALUES (?, ?, ?, ?)', array($ticket, $customer, $message, $file));
    }

    /**
     * Get tickets messages by ticket
     * 
     * @param int $ticket
     * @return array
     */
    public function getTicketMessagesByTicket($ticket) : array
    {
        return $this->all('SELECT * FROM `tickets_messages` WHERE `ticket` = ? ORDER BY `id` DESC', array($ticket));
    }

    /**
     * Add ticket message through CMS
     * 
     * @param int $ticket
     * @param int $user
     * @param string $message
     * @param string $file
     * @return int
     */
    public function addTicketMessageThroughCMS($ticket, $user, $message, $file) : int
    {
        return $this->none('INSERT INTO `tickets_messages` (`ticket`, `user`, `message`, `file`) VALUES (?, ?, ?, ?)', array($ticket, $user, $message, $file));
    }

    /**
     * Get last message from ticket
     * 
     * @param int $ticket
     * @return array
     */
    public function getLastMessageFromTicket($ticket) : array
    {
        return $this->row('SELECT * FROM `tickets_messages` WHERE `ticket` = ? ORDER BY `id` DESC LIMIT 1', array($ticket));
    }

    /**
     * ===================================================
     * PRODUCTS CONDITIONS
     * ===================================================
     */

    /**
     * Get all conditions
     */
    public function allConditions() : array
    {
        return $this->all('SELECT * FROM `products_condition`');
    }

    /**
     * Get condition by id
     * 
     * @param int $id
     * @return array
     */
    public function getConditionById($id) : array
    {
        return $this->row('SELECT * FROM `products_condition` WHERE `id` = ?', array($id));
    }

    /**
     * ===================================================
     * QUOTATION
     * ===================================================
     */

    /**
     * Count open quotations by user
     * 
     * @param string $session Cookie ID
     * @return int
     */
    public function countOpenQuotationsFromSession($session) : int
    {
        return $this->one('SELECT COUNT(*) FROM `quotation` WHERE `status` = 1 AND `session` = ?', array($session));
    }

    /**
     * Add quotation
     * 
     * @param int $customer
     * @param string $ip
     * @param string $session Cookie ID
     * @param int $status
     * @return int
     */
    public function addQuotation($customer, $ip, $session, $status) : int
    {
        return $this->none('INSERT INTO `quotation` (`customer`, `ip`, `session`, `status`) VALUES (?, ?, ?, ?)', array($customer, $ip, $session, $status));
    }

    /**
     * Get latest quotation
     * 
     * @param string $session Cookie ID
     * @return array
     */
    public function getLatestQuotationFromSession($session) : array
    {
        return $this->row('SELECT * FROM `quotation` WHERE `session` = ? ORDER BY `id` DESC LIMIT 1', array($session));
    }

    /**
     * Delete quotation
     * 
     * @param string $session Cookie ID
     * @return int
     */
    public function deleteQuotation($session) : int
    {
        return $this->none('DELETE FROM `quotation` WHERE `session` = ?', array($session));
    }

    /**
     * ===================================================
     * QUOTATION PRODUCTS
     * ===================================================
     */

    /**
     * Add quotation product
     * 
     * @param int $quotation
     * @param int $product
     * @param int $amount
     * @return int
     */
    public function addQuotationProduct($quotation, $product, $amount) : int
    {
        return $this->none('INSERT INTO `quotation_products` (`quotation`, `product`, `amount`) VALUES (?, ?, ?)', array($quotation, $product, $amount));
    }

    /**
     * Get products from quotation and session
     * 
     * @param int $quotation
     * @return array
     */
    public function getQuotationProducts($quotation) : array
    {
        return $this->all('SELECT * FROM `quotation_products` WHERE `quotation` = ?', array($quotation));
    }

    /**
     * Remove product form quotation and session
     * 
     * @param int $product
     * @param string $quotation
     * @return int
     */
    public function deleteQuotationProduct($product, $quotation) : int
    {
        return $this->none('DELETE FROM `quotation_products` WHERE `product` = ? AND `quotation` = ?', array($product, $quotation));
    }

    /**
     * Count product in quotation
     * 
     * @param int $product
     * @param int $quotation
     * @return int
     */
    public function countQuotationProduct($product, $quotation) : int
    {
        return $this->one('SELECT COUNT(*) FROM `quotation_products` WHERE `product` = ? AND `quotation` = ?', array($product, $quotation));
    }

    /**
     * Get product in quotation
     * 
     * @param int $product
     * @param int $quotation
     * @return array
     */
    public function getQuotationProduct($product, $quotation) : array
    {
        return $this->row('SELECT * FROM `quotation_products` WHERE `product` = ? AND `quotation` = ?', array($product, $quotation));
    }

    /**
     * Edit product amount
     * @param int $amount
     * @param int $product
     * @param int $quotation
     * @return int
     */
    public function editQuotationProductAmount($amount, $product, $quotation) : int
    {
        return $this->none('UPDATE `quotation_products` SET `amount` = ? WHERE `product` = ? AND `quotation` = ?', array($amount, $product, $quotation));
    }

    /**
     * ===================================================
     * SEARCH
     * ===================================================
     */

    /**
     * Search through database
     * 
     * @param string $search
     * @return array
     */
    public function search($search) : array
    {
        $search = '%'.$search.'%';

        $return = array();

        // Search through products
        $product = $this->all("SELECT * FROM `products` WHERE `name` LIKE ? OR `articlenumber` LIKE ? OR `own_articlenumber` LIKE ? OR `description_dutch` LIKE ? OR `description_english` LIKE ?", array($search, $search, $search, $search, $search));
        
        // Search through brands
        $brands = $this->all("SELECT * FROM `brands` WHERE `name` LIKE ? OR `description` LIKE ?", array($search, $search));

        // Search through categories
        $categories = $this->all("SELECT * FROM `product_categories` WHERE `nl_name` LIKE ? OR `en_name` LIKE ? OR `nl_description` LIKE ? OR `en_description` LIKE ?", array($search, $search, $search, $search));
        
        // Join arrays
        array_push($return, $product);
        array_push($return, $brands);
        array_push($return, $categories);

        return $return;
    }
}