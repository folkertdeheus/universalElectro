<?php

/**
 * This page contains the content inclusion of the main part
 * The content is controlled by $_GET['page'] and it's child $_GET['action']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if page variable is set
    if (isset($_GET['page']) && $_GET['page'] != null) {

        // Include requested page
        switch ($_GET['page']) {
            case '1':
                // CRM
            break;
            case '2':
                // Shop
                require_once('includes/pages/shop/default.php');
            break;
            case '3':
                // Pages
            break;
            case '4':
                // Settings
                require_once('includes/pages/settings/default.php');
            break;
            case '5':
                // Logout
                require_once('includes/pages/logout/default.php');
            break;
            default:
                // Home
                require_once('includes/pages/home.php');
        }
    } else {
        // Home
        require_once('includes/pages/home.php');
    }
}