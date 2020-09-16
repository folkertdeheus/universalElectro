<?php

/**
 * This file contains the login function of the homepage
 */

namespace Blackbeard;

class WebLogin extends Webforms
{
    private $key = null; // Openssl key
    private $encMethod = "AES-256-CBC"; // Encryption method

    function __construct()
    {
        $this->key = $GLOBALS['openSslKey'];

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
        // Hash password
        $salt = $GLOBALS['customerSalt'];
        $password = hash('whirlpool', $salt.$password);

        // Get customer id from all emails
        $customers = $this->allCustomers();
        
        $id = null;

        foreach($customers as $customerKey => $customerValue) {

            // Set iv for decryption
            $iv = $customerValue['iv'];
        
            // Decrypt email
            $dbEmail = openssl_decrypt($customerValue['email'], $this->encMethod, $this->key, 0, $iv);

            // Compare DB email with submitted email
            if ($dbEmail == $email) { 
                $id = $customerValue['id'];
            }
        }

        // If user credentials are correct, return user id
        if ($GLOBALS['db']->one('SELECT COUNT(*) FROM `customers` WHERE `id` = ? AND `password` = ?', array($id, $password)) == 1) {

            $user = $GLOBALS['db']->row('SELECT * FROM `customers` WHERE `id` = ? AND `password` = ?', array($id, $password));
            
            return $user['id'];
        }

        return false;
    }
}