<?php

/**
 * This file contains the login content switch
 */

if (login()) {

    // Get user information
    $customer = $q->getCustomer($_SESSION['webuser']);

    if (isset($_GET['action']) && $_GET['action'] != null) {

        switch($_GET['action']) {

            case '2':

                // Edit
                require_once('includes/pages/login/edit.php');

                break;
            
            case '3':

                // Change password
                require_once('includes/pages/login/changepw.php');

                break;
            
            default:

                // Account
                require_once('includes/pages/login/account.php');
        }
    } else {

        // Account
        require_once('includes/pages/login/account.php');
    }

} else {

    if (isset($_GET['action']) && $_GET['action'] != null) {

        switch($_GET['action']) {

            case '1':

                // Create
                require_once('includes/pages/login/create.php');

            break;
            
            default:

                // Login
                require_once('includes/pages/login/login.php');
        }
    } else {

        // Login
        require_once('includes/pages/login/login.php');
    }
}