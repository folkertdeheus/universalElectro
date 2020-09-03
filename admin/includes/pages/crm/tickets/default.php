<?php

/**
 * This page contains the content inclusion of the tickets part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if page variable is set
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {

            case '1':
                // Ticket
                require_once('includes/pages/crm/tickets/default.php');
                break;
            
            default:
                // Tickets home
                require_once('includes/pages/crm/tickets/home.php');
        }
    } else {
        // Tickets home
        require_once('includes/pages/crm/tickets/home.php');
    }
}