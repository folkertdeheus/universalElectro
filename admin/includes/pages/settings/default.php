<?php

/**
 * This page contains the content inclusion of the settings part
 * The content is controlled by $_GET['action']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a setting is selected to edit
    if (isset($_GET['action']) && $_GET['action'] != null) {

        // Include requested page
        switch($_GET['action']) {
            
            case '1':
                // Users
                require_once('includes/pages/settings/users/default.php');
                break;
            
            case '2':
                // Global
                break;
            
            case '3':
                // Logs
                break;
            
            default:
                // Settings home
                require_once('includes/pages/settings/home.php');
        }

    } else {
        // Settings home
        require_once('includes/pages/settings/home.php');
    }
}