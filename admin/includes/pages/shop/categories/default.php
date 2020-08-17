<?php

/**
 * This page contains the content inclusion of the product categories part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a product was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get product information
        $category = $q->getCategoryById($_GET['delete']);
        
        // Delete brand
        $q->deleteCategory($category['id']);
        
        // Insert Log
        $q->insertLog('Category', 'Delete', 'Deleted category '.$category['nl_name'].' with ID '.$category['id'].'. By '.user());
    }

    // Check if a setting is selected
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {
            
            case '1':
                // Add
                require_once('includes/pages/shop/categories/add.php');
                break;
            
            case '2':
                // Edit
                require_once('includes/pages/shop/categories/edit.php');
                break;
            
            case '3':
                // Delete
                require_once('includes/pages/shop/categories/delete.php');
                break;

            default:
                // Products home
                require_once('includes/pages/shop/categories/home.php');
        }

    } else {
        // Products home
        require_once('includes/pages/shop/categories/home.php');
    }

}