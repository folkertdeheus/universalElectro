<?php

/**
 * This page contains the content inclusion of the ticket category settings part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a ticket category was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get ticket category information
        $ticketCat = $q->getTicketCategory($_GET['delete']);
        
        // Delete ticket category
        $q->deleteTicketCategories($ticketCat['id']);
        
        // Insert Log
        $q->insertLog('Ticket category', 'Delete', 'Deleted ticket category '.$ticketCat['name'].' with ID '.$ticketCat['id'].'. By '.user());
    }

    // Check if a setting is selected
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {
            
            case '1':
                // Add
                require_once('includes/pages/settings/tickets/categories/add.php');
                break;
            
            case '2':
                // Edit
                require_once('includes/pages/settings/tickets/categories/edit.php');
                break;
            
            case '3':
                // Delete
                require_once('includes/pages/settings/tickets/categories/delete.php');
                break;

            default:
                // Customers home
                require_once('includes/pages/settings/tickets/categories/home.php');
        }

    } else {
        // Customers home
        require_once('includes/pages/settings/tickets/categories/home.php');
    }
}