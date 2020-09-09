<?php

/**
 * This page contains the navigations of the webshop
 */

// Check if action is set
if (isset($_GET['action']) && $_GET['action'] != null) {

    switch($_GET['action']) {
        case '1':
            // Shopping cart
            require_once('includes/pages/webshop/cart.php');

            break;

        case '2':
            // Request quotation
            require_once('includes/pages/webshop/request.php');

            break;
        
        default:
            // No known action set, display category overview
            require_once('includes/pages/webshop/categories.php');
    }

} else {

    // Check if the category is set
    if (isset($_GET['cat']) && $_GET['cat'] != null) {

        // Check if the product is set
        if (isset($_GET['product']) && $_GET['product'] != null) {

            // Check if the requested products exists in the category
            if ($q->countProductsByCategoryAndId($_GET['cat'], $_GET['product']) == 1) {

                // Display product
                require_once('includes/pages/webshop/product.php');

            } else {

                // Product not found, display all products in category
                require_once('includes/pages/webshop/products.php');
            
            }

        } else {

            // No product set, display products overview
            require_once('includes/pages/webshop/products.php');
        }

    } else {

        // No category set, display category overview
        require_once('includes/pages/webshop/categories.php');
    }
}