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
     */
    public function countUsers()
    {
        return $this->one('SELECT COUNT(*) FROM `users`');
    }

    /**
     * All users
     */
    public function allUsers()
    {
        return $this->all('SELECT * FROM `users` ORDER BY `username` ASC');
    }

    /**
     * Count users by username
     * 
     * @param string $username
     * @return int
     */
    public function countUserByUsername($username)
    {
        return $this->one('SELECT COUNT(*) FROM `users` WHERE `username` = ?', array($username));
    }

    /**
     * Insert users
     * 
     * @param string $username
     * @param string $password
     */
    public function insertUser($username, $password)
    {
        $this->none('INSERT INTO `users` (`username`, `password`) VALUES (?, ?)', array($username, $password));
    }

    /**
     * Get user by username
     * 
     * @param string $username
     * @return array
     */
    public function getUserByUsername($username)
    {
        return $this->row('SELECT * FROM `users` WHERE `username` = ?', array($username));
    }

    /**
     * Get user by id
     * 
     * @param int $id
     * @return array
     */
    public function getUserById($id)
    {
        return $this->row('SELECT * FROM `users` WHERE `id` = ?', array($id));
    }

    /**
     * Edit the user's password
     * 
     * @param string $password
     * @param int $id
     */
    public function updatePassword($password, $id)
    {
        $this->none('UPDATE `users` SET `password` = ? WHERE `id` = ?', array($password, $id));
    }

    /**
     * Edit the user's username
     * 
     * @param string $username
     * @param int $id
     */
    public function updateUsername($username, $id)
    {
        $this->none('UPDATE `users` SET `username` = ? WHERE `id` = ?', array($username, $id));
    }

    /**
     * Delete a user
     */
    public function deleteUser($id)
    {
        $this->none('DELETE FROM `users` WHERE `id` = ?', array($id));
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
     */
    public function insertLog($tableSource, $action, $description)
    {
        $this->none('INSERT INTO `log` (`table_source`, `action`, `description`) VALUES (?, ?, ?)', array($tableSource, $action, $description));
    }

    /**
     * ===================================================
     * BRANDS
     * ===================================================
     */

     /**
      * Count brands
      */
    public function countBrands()
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
     */
    public function addBrands($name, $image, $description, $website)
    {
        $this->none('INSERT INTO `brands` (`name`, `image`, `description`, `website`) VALUES (?, ?, ?, ?)', array($name, $image, $description, $website));
    }

    /**
     * Count brands by name
     * 
     * @param string $name
     * @return int
     */
    public function countBrandByName($name)
    {
        return $this->one('SELECT COUNT(*) FROM `brands` WHERE `name` = ?', array($name));
    }

    /** 
     * Get brand by name
     * 
     * @param string $name
     * @return array
     */
    public function getBrandByName($name)
    {
        return $this->row('SELECT * FROM `brands` WHERE `name` = ?', array($name));
    }

    /**
     * Get all brands
     * 
     * @return array 
     */
    public function allBrands()
    {
        return $this->all('SELECT * FROM `brands` ORDER BY `name` ASC');
    }

    /**
     * Get brand by id
     * 
     * @param int $id
     * @return array
     */
    public function getBrandById($id)
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
     */
    public function editBrands($name, $image, $description, $website, $id)
    {
        $this->none('UPDATE `brands` SET `name` = ?, `image` = ?, `description` = ?, `website` = ? WHERE `id` = ?', array($name, $image, $description, $website, $id));
    }

    /**
     * Delete brand
     * 
     * @param int $id
     */
    public function deleteBrand($id)
    {
        $this->none('DELETE FROM `brands` WHERE `id` = ?', array($id));
    }

    /**
     * Count brands by name where the id is not the given id
     * 
     * @param string $name
     * @param int $id
     * @return int
     */
    public function countBrandByNameNotId($name, $id)
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
    public function countProducts()
    {
        return $this->one('SELECT COUNT(*) FROM `products`');
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
    public function countCategories()
    {
        return $this->one('SELECT COUNT(*) FROM `product_categories`');
    }

    /**
     * All categories
     * 
     * @return array
     */
    public function allCategories()
    {
        return $this->all('SELECT * FROM `product_categories`');
    }

    /**
     * Count categories by name
     * 
     * @param string $name
     * @return int
     */
    public function countCategoriesByName($name)
    {
        return $this->one('SELECT COUNT(*) FROM `product_categories` WHERE `name` = ?', array($name));
    }

    /**
     * Insert category
     */
    public function addCategories($name, $description)
    {
        $this->none('INSERT INTO `product_categories` (`name`, `description`) VALUES (?, ?)', array($name, $description));
    }

    /**
     * Get category by name
     * 
     * @param string $name
     * @return array
     */
    public function getCategoryByName($name)
    {
        return $this->row('SELECT * FROM `product_categories` WHERE `name` = ?', array($name));
    }
}