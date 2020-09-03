<?php

/**
 * This file contains the user ticket overview
 */

// Check if the user is logged in
if (login()) {

    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {

            case '1':

                // Add ticket
                require_once('includes/pages/tickets/add.php');
                
                break;

            case '2':

                // View ticket
                require_once('includes/pages/tickets/view.php');

                break;
            
            default:

                // Tickets overview
                require_once('includes/pages/tickets/home.php');
        }
    } else {

        // Tickets overview
        require_once('includes/pages/tickets/home.php');
    }
} else {

    // Login page
    require_once('includes/pages/contact/login.php');
}