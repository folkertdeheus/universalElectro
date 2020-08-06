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
}