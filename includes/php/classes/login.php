<?php

/**
 * This file contains the login function of the homepage
 */

namespace Blackbeard;

class BlackbeardLogin
{
    function __construct()
    {
        if (isset($_POST['form']) && $_POST['form'] == 'login') {
            if (isset($_POST['email']) && $_POST['email'] != null && isset($_POST['password']) && $_POST['password'] != null) {

                // Normal user login
                if ($this->userLogin($_POST['email'], $_POST['password'])) {

                    // Set session
                    $_SESSION['webuser'] = $this->userLogin($_POST['email'], $_POST['password']);
                }
            }
        }
    }

    /**
     * Login normal user
     * 
     * @param string $email
     * @param string @password
     * @return int/boolean
     */
    private function userLogin($email, $password)
    {
        $salt = $GLOBALS['customerSalt'];
        $password = hash('whirlpool', $salt.$password);

        // If user credentials are correct, return user id
        if ($GLOBALS['db']->one('SELECT COUNT(*) FROM `customers` WHERE `email` = ? AND `password` = ?', array($email, $password)) == 1) {

            $user = $GLOBALS['db']->row('SELECT * FROM `customers` WHERE `email` = ? AND `password` = ?', array($email, $password));
            
            return $user['id'];
        }

        return false;
    }
}