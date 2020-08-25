<?php

/**
 * This file contains the login content switch
 */

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