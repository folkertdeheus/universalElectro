<?php

/**
 * This page contains the navigations of the webshop
 */

// Check if the category is set
if (isset($_GET['cat']) && $_GET['cat'] != null) {

    if (isset($_GET['product']) && $_GET['product'] != null) {

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