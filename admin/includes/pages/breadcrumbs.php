<?php

/**
 * This file contains the breadcrums, present under the header of the page
 * It makes faster navigation possible
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Start with the homepage
    echo '<a href="index.php">Home</a>';

    // Check if the main navigation is set
    if (isset($_GET['page']) && $_GET['page'] != null) {

        switch($_GET['page']) {
            
            case '1':
                // CRM
                echo '&nbsp;>&nbsp;<a href="index.php?page=1">CRM</a>';

                // // Check if the action navigation is set
                if (isset($_GET['action']) && $_GET['action'] != null) {

                    switch($_GET['action']) {

                        case '1':
                            // Customers
                            echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=1">Customers</a>';

                            // Check if the sub navigation is set
                            if (isset($_GET['sub']) && $_GET['sub'] != null) {

                                switch($_GET['sub']) {

                                    case '1':
                                        // Add
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=1&sub=1">Add customer</a>';

                                        break;

                                    case '2':
                                        // Details
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=1&sub=2&id='.$_GET['id'].'">Customer details</a>';

                                        break;

                                    case '3':
                                        // Edit
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=1&sub=3&id='.$_GET['id'].'">Edit customer</a>';

                                        break;

                                    case '4':
                                        // Delete
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=1&sub=4&id='.$_GET['id'].'">Delete customer</a>';

                                        break;
                                }
                            }

                            break;

                        case '2':
                            // Tickets
                            echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=2">Tickets</a>';

                            break;

                        case '3':
                            // Messages
                            echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=3">Messages</a>';

                            // Check if the sub navigation is set
                            if (isset($_GET['sub']) && $_GET['sub'] != null) {

                                switch($_GET['sub']) {

                                    case '1':
                                        // Details
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=3&sub=1&id='.$_GET['id'].'">Details</a>';

                                        break;

                                    case '2':
                                        // Details
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=1&action=3&sub=2&'.$_GET['id'].'">Delete</a>';

                                        break;
                                    }
                                }

                            break;
                    }
                }

                break;
            
            case '2':
                // Shop
                echo '&nbsp;>&nbsp;<a href="index.php?page=2">Shop</a>';

                // // Check if the action navigation is set
                if (isset($_GET['action']) && $_GET['action'] != null) {

                    switch($_GET['action']) {

                        case '1':
                            // Products
                            echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=1">Products</a>';
                            
                            // Check if the sub navigation is set
                            if (isset($_GET['sub']) && $_GET['sub'] != null) {

                                switch($_GET['sub']) {

                                    case '1':
                                        // Add
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=1&sub=1">Add product</a>';

                                        break;

                                    case '2':
                                        // Edit
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=1&sub=2&id='.$_GET['id'].'">Edit product</a>';

                                        break;

                                    case '3':
                                        // Delete
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=1&sub=3&id='.$_GET['id'].'">Delete product</a>';

                                        break;
                                }
                            }

                            break;
                        
                        case '2':
                            // Orders
                            echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=2">Orders</a>';

                            break;

                        case '3':
                            // Brands
                            echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=3">Brands</a>';
                            
                            // Check if the sub navigation is set
                            if (isset($_GET['sub']) && $_GET['sub'] != null) {

                                switch($_GET['sub']) {

                                    case '1':
                                        // Add
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=3&sub=1">Add brand</a>';

                                        break;

                                    case '2':
                                        // Edit
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=3&sub=2&id='.$_GET['id'].'">Edit brand</a>';

                                        break;

                                    case '3':
                                        // Delete
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=3&sub=3&id='.$_GET['id'].'">Delete brand</a>';

                                        break;
                                }
                            }

                            break;

                        case '4':
                            // Categories
                            echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=4">Categories</a>';

                            // Check if the sub navigation is set
                            if (isset($_GET['sub']) && $_GET['sub'] != null) {

                                switch($_GET['sub']) {

                                    case '1':
                                        // Add
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=4&sub=1">Add category</a>';

                                        break;

                                    case '2':
                                        // Edit
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=4&sub=2&id='.$_GET['id'].'">Edit category</a>';

                                        break;

                                    case '3':
                                        // Delete
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=2&action=4&sub=3&id='.$_GET['id'].'">Delete category</a>';

                                        break;
                                }
                            }
                    }
                }

                break;
            
            case '3':
                // Pages
                echo '&nbsp;>&nbsp;<a href="index.php?page=3">Pages</a>';

                break;
            
            case '4':
                // Settings
                echo '&nbsp;>&nbsp;<a href="index.php?page=4">Settings</a>';

                // Check if the action navigation is set
                if (isset($_GET['action']) && $_GET['action'] != null) {

                    switch($_GET['action']) {
                    
                        case '1':
                            // Users
                            echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=1">Users</a>';

                            // Check if the sub navigation is set
                            if (isset($_GET['sub']) && $_GET['sub'] != null) {

                                switch($_GET['sub']) {
                                    
                                    case '1':
                                        // Add
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=1&sub=1">Add user</a>';

                                        break;
                                    
                                    case '2':
                                        // Edit
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=1&sub=2&id='.$_GET['id'].'">Edit user</a>';

                                        break;
                                    
                                    case '3':
                                        // Delete
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=1&sub=3&id='.$_GET['id'].'">Delete user</a>';

                                        break;
                                }
                            }
                            
                            break;
                        
                        case '2':
                            // Global
                            echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=2">Global</a>';

                            // Check if the sub navigation is set
                            if (isset($_GET['sub']) && $_GET['sub'] != null) {
                                switch($_GET['sub']) {
                                        
                                    case '1':
                                        // Global settings
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=2&sub=1">Settings</a>';

                                        break;
                                    
                                    case '2':
                                        // Languages
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=2&sub=2">Languages</a>';

                                        break;
                                }
                            }

                            break;
                        
                        case '3':
                            // Logs
                            echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=3">Logs</a>';

                            break;

                        case '4':
                            // Tickets
                            echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=4">Tickets</a>';

                            // Check if the cat navigation is set
                            if (isset($_GET['cat']) && $_GET['cat'] != null) {
                                switch($_GET['cat']) {
                                        
                                    case '1':
                                        // Categories
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=4&cat=1">Categories</a>';

                                         // Check if the sub navigation is set
                                        if (isset($_GET['sub']) && $_GET['sub'] != null) {
                                            switch($_GET['sub']) {
                                                    
                                                case '1':
                                                    // Add Categories
                                                    echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=4&cat=1&sub=1">Add category</a>';

                                                    break;

                                                case '2':
                                                    // Edit Categories
                                                    echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=4&cat=1&sub=2&id='.$_GET['id'].'">Edit category</a>';

                                                    break;

                                                case '3':
                                                    // Delete Categories
                                                    echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=4&cat=1&sub=3&id='.$_GET['id'].'">Delete category</a>';

                                                    break;
                                            }
                                        }

                                        break;
                                    
                                    case '2':
                                        // Statusses
                                        echo '&nbsp;>&nbsp;<a href="index.php?page=4&action=4&sub=2">Statusses</a>';

                                        break;
                                }
                            }

                            break;
                    }
                }
                break;

            case '5':
                // Logout
                echo '&nbsp;>&nbsp;<a href="index.php?page=5">Logout</a>';
                
                break;
        }
    }
}