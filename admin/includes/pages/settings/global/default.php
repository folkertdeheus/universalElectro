<?php

/**
 * This page contains the content inclusion of the global settings part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a setting is selected to edit
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        // Include requested page
        switch($_GET['sub']) {
            
            case '1':
                // Global settings
                require_once('includes/pages/settings/global/settings.php');
                break;
            
            case '2':
                // Language settings
                require_once('includes/pages/settings/global/languages.php');
                break;
            
            default:
                // Users home
                require_once('includes/pages/settings/global/home.php');
        }

    } else {
        // Users home
        require_once('includes/pages/settings/global/home.php');
    }
}