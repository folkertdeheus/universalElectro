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
     * @return int
     */
    public function addProducts($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $images, $tags, $properties, $specifications, $price, $highlight) : int
    {
        return $this->none('INSERT INTO `products` (`brand`, `category`, `name`, `articlenumber`, `description_dutch`, `description_english`, `images`, `tags`, `properties`, `specifications`, `price`, `highlight`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $images, $tags, $properties, $specifications, $price, $highlight));
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
     * @return int
     */
    public function editProducts($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $image, $tags, $properties, $specifications, $price, $highlight, $id) : int
    {
        return $this->none('UPDATE `products` SET `brand` = ?, `category` = ?, `name` = ?, `articlenumber` = ?, `description_dutch` = ?, `description_english` = ?, `images` = ?, `tags` = ?, `properties` = ?, `specifications` = ?, `price` = ?, `highlight` = ? WHERE `id` = ?', array($brand, $category, $name, $articlenumber, $description_dutch, $description_english, $image, $tags, $properties, $specifications, $price, $highlight, $id));
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
     * @param string $nlHeaderText
     * @param string $enHeaderText
     * @param string $nlQuickenquiryButton
     * @param string $enQuickenquiryButton
     * @param string $nlQuickenquiryText
     * @param string $enQuickenquiryText
     * @param string $nlQuickenquiryFirstname
     * @param string $enQuickenquiryFirstname
     * @param string $nlQuickenquiryLastname
     * @param string $enQuickenquiryLastname
     * @param string $nlQuickenquiryCompany
     * @param string $enQuickenquiryCompany
     * @param string $nlQuickenquiryEmail
     * @param string $enQuickenquiryEmail
     * @param string $nlQuickenquiryPhone
     * @param string $enQuickenquiryPhone
     * @param string $nlQuickenquiryMessage
     * @param string $enQuickenquiryMessage
     * @param string $nlQuickenquirySend
     * @param string $enQuickenquirySend
     * @param string $nlQuickenquiryDisclaimer
     * @param string $enQuickenquiryDisclaimer
     * @param string $nlMenuHome
     * @param string $enMenuHome
     * @param string $nlMenuWebshop
     * @param string $enMenuWebshop
     * @param string $nlMenuLogin
     * @param string $enMenuLogin
     * @param string $nlMenuContact
     * @param string $enMenuContact
     * @param string $nlMenuSearch
     * @param string $enMenuSearch
     * @param string $nlFooterAdress
     * @param string $enFooterAdress
     * @param string $nlFooterContact
     * @param string $enFooterContact
     * @param string $nlFooterTax
     * @param string $enFooterTax
     * @return int
     */
    public function editLanguages($nlHeaderText, $enHeaderText, $nlQuickenquiryButton, $enQuickenquiryButton, $nlQuickenquiryText, $enQuickenquiryText, $nlQuickenquiryFirstname, $enQuickenquiryFirstname, $nlQuickenquiryLastname, $enQuickenquiryLastname, $nlQuickenquiryCompany, $enQuickenquiryCompany, $nlQuickenquiryEmail, $enQuickenquiryEmail, $nlQuickenquiryPhone, $enQuickenquiryPhone, $nlQuickenquiryMessage, $enQuickenquiryMessage, $nlQuickenquirySend, $enQuickenquirySend, $nlQuickenquiryDisclaimer, $enQuickenquiryDisclaimer, $nlMenuHome, $enMenuHome, $nlMenuWebshop, $enMenuWebshop, $nlMenuLogin, $enMenuLogin, $nlMenuContact, $enMenuContact, $nlMenuSearch, $enMenuSearch, $nlFooterAdress, $enFooterAdress, $nlFooterContact, $enFooterContact, $nlFooterTax, $enFooterTax) : int
    {
        return $this->none('UPDATE `languages` SET `nl_header_text` = ?, `en_header_text` = ?, `nl_quickenquiry_button` = ?, `en_quickenquiry_button` = ?, `nl_quickenquiry_text` = ?, `en_quickenquiry_text` = ?, `nl_quickenquiry_firstname` = ?, `en_quickenquiry_firstname` = ?, `nl_quickenquiry_lastname` = ?, `en_quickenquiry_lastname` = ?, `nl_quickenquiry_company` = ?, `en_quickenquiry_company` = ?, `nl_quickenquiry_email` = ?, `en_quickenquiry_email` = ?, `nl_quickenquiry_phone` = ?, `en_quickenquiry_phone` = ?, `nl_quickenquiry_message` = ?, `en_quickenquiry_message` = ?, `nl_quickenquiry_send` = ?, `en_quickenquiry_send` = ?, `en_quickenquiry_disclaimer` = ?, `nl_quickenquiry_disclaimer` = ?, `nl_menu_home` = ?, `en_menu_home` = ?, `nl_menu_webshop` = ?, `en_menu_webshop` = ?, `nl_menu_login` = ?, `en_menu_login` = ?, `nl_menu_contact` = ?, `en_menu_contact` = ?, `nl_menu_search` = ?, `en_menu_search` = ?, `nl_footer_adress` = ?, `en_footer_adress` = ?, `nl_footer_contact` = ?, `en_footer_contact` = ?, `nl_footer_tax` = ?, `en_footer_tax` = ?', array($nlHeaderText, $enHeaderText, $nlQuickenquiryButton, $enQuickenquiryButton, $nlQuickenquiryText, $enQuickenquiryText, $nlQuickenquiryFirstname, $enQuickenquiryFirstname, $nlQuickenquiryLastname, $enQuickenquiryLastname, $nlQuickenquiryCompany, $enQuickenquiryCompany, $nlQuickenquiryEmail, $enQuickenquiryEmail, $nlQuickenquiryPhone, $enQuickenquiryPhone, $nlQuickenquiryMessage, $enQuickenquiryMessage, $nlQuickenquirySend, $enQuickenquirySend, $nlQuickenquiryDisclaimer, $enQuickenquiryDisclaimer, $nlMenuHome, $enMenuHome, $nlMenuWebshop, $enMenuWebshop, $nlMenuLogin, $enMenuLogin, $nlMenuContact, $enMenuContact, $nlMenuSearch, $enMenuSearch, $nlFooterAdress, $enFooterAdress, $nlFooterContact, $enFooterContact, $nlFooterTax, $enFooterTax));
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
     * @return int
     */
    public function editSettings($webshopPriceGuest, $webshopPriceAccount, $webshopCheckout, $qeActive) : int
    {
        return $this->none('UPDATE `settings` SET `webshop_show_prices_on_guest` = ?, `webshop_show_prices_on_account` = ?, `webshop_checkout_button` = ?, `quick_enquiry_active` = ?', array($webshopPriceGuest, $webshopPriceAccount, $webshopCheckout, $qeActive));
    }
}