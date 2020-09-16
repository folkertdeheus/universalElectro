<?php

/**
 * This page contains the content inclusion of the shop part
 * The content is controlled by $_GET['page'] and it's child $_GET['action']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if page variable is set
    if (isset($_GET['action']) && $_GET['action'] != null) {

        switch($_GET['action']) {

            case '1':
                // Products
                require_once('includes/pages/shop/products/default.php');
                
                break;
            
            case '2':
                // Quotations
                require_once('includes/pages/shop/quotations/default.php');

                break;

            case '3':
                // Brands
                require_once('includes/pages/shop/brands/default.php');

                break;

            case '4':
                // Categories
                require_once('includes/pages/shop/categories/default.php');

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