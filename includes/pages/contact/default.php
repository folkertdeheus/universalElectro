<?php

/**
 * This file contains the contact content switch
 */

if (isset($_GET['action']) && $_GET['action'] != null) {

    switch($_GET['action']) {

        case '1':

            // Tickets
            require_once('includes/pages/contact/tickets.php');

        break;

        case '2':
    
            // Contact form
            require_once('includes/pages/contact/form.php');
        
        default:

            // Home
            require_once('includes/pages/contact/home.php');
    }
} else {

    // Home
    require_once('includes/pages/contact/home.php');
}