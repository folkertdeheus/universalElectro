<?php

/**
 * This page contains the content inclusion of the users part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    
    // Check if a brand was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get brand information
        $brand = $q->getBrandById($_GET['delete']);
        
        // Delete brand
        $q->deleteBrand($brand['id']);
        
        // Insert Log
        $q->insertLog('Brands', 'Delete', 'Deleted brand '.$brand['name'].' with ID '.$brand['id'].'. By '.user());
    }

    // Check if a setting is selected
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {
            
            case '1':
                // Add
                require_once('includes/pages/shop/brands/add.php');
                break;
            
            case '2':
                // Edit
                require_once('includes/pages/shop/brands/edit.php');
                break;
            
            case '3':
                // Delete
                require_once('includes/pages/shop/brands/delete.php');
                break;

            default:
                // Brands home
                require_once('includes/pages/shop/brands/home.php');
        }

    } else {
        // Brands home
        require_once('includes/pages/shop/brands/home.php');
    }
}