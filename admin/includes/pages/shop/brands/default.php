<?php

/**
 * This page contains the content inclusion of the users part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

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