<?php

/**
 * This page contains the content inclusion of the products part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a product was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get product information
        $product = $q->getProductById($_GET['delete']);
        
        // Delete brand
        $q->deleteProduct($product['id']);
        
        // Insert Log
        $q->insertLog('Product', 'Delete', 'Deleted product '.$product['name'].' with ID '.$product['id'].'. By '.user());
    }

    // Check if a setting is selected
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {
            
            case '1':
                // Add
                require_once('includes/pages/shop/products/add.php');
                break;
            
            case '2':
                // Edit
                require_once('includes/pages/shop/products/edit.php');
                break;
            
            case '3':
                // Delete
                require_once('includes/pages/shop/products/delete.php');
                break;

            default:
                // Products home
                require_once('includes/pages/shop/products/home.php');
        }

    } else {
        // Products home
        require_once('includes/pages/shop/products/home.php');
    }

}