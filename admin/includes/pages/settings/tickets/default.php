<?php

/**
 * This page contains the content inclusion of the tickets settings part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a setting is selected to edit
    if (isset($_GET['cat']) && $_GET['cat'] != null) {

        // Include requested page
        switch($_GET['cat']) {
            
            case '1':
                // Categories
                require_once('includes/pages/settings/tickets/categories/default.php');
                break;
            
            case '2':
                // Statusses
                require_once('includes/pages/settings/tickets/statusses/default.php');
                break;

            case '3':
                // Settings
                require_once('includes/pages/settings/tickets/settings/default.php');
                break;
            
            default:
                // Users home
                require_once('includes/pages/settings/tickets/home.php');
        }

    } else {
        // Users home
        require_once('includes/pages/settings/tickets/home.php');
    }
}