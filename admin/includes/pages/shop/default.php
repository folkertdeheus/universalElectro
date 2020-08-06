<?php

/**
 * This page contains the content inclusion of the main part
 * The content is controlled by $_GET['page'] and it's child $_GET['action']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if page variable is set
    if (isset($_GET['action']) && $_GET['action'] != null) {

        switch($_GET['action']) {

            case '1':
                // Products
                break;
            
            case '2':
                // Orders
                break;

            case '3':
                // Brands
                require_once('includes/pages/shop/brands/default.php');

                break;
            
            default:
                // Shop home
                require_once('includes/pages/shop/home.php');
        }
    } else {
        // Shop home
        require_once('includes/pages/shop/home.php');
    }
}