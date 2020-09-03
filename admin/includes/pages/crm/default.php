<?php

/**
 * This page contains the content inclusion of the crm part
 * The content is controlled by $_GET['action'] and it's child $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if page variable is set
    if (isset($_GET['action']) && $_GET['action'] != null) {

        switch($_GET['action']) {

            case '1':
                // Customers
                require_once('includes/pages/crm/customers/default.php');
                break;
            
            case '2':
                // Tickets
                require_once('includes/pages/crm/tickets/default.php');
                break;

            case '3':
                // Messages
                require_once('includes/pages/crm/messages/default.php');
                break;
            
            default:
                // Shop home
                require_once('includes/pages/crm/home.php');
        }
    } else {
        // Shop home
        require_once('includes/pages/crm/home.php');
    }
}