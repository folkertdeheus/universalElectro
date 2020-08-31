<?php

/**
 * This page contains the content inclusion of the ticket statusses settings part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a ticket category was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get ticket category information
        $ticketStatus = $q->getTicketStatus($_GET['delete']);
        
        // Delete ticket category
        $q->deleteTicketStatus($ticketStatus['id']);
        
        // Insert Log
        $q->insertLog('Ticket status', 'Delete', 'Deleted ticket status '.$ticketStatus['name'].' with ID '.$ticketStatus['id'].'. By '.user());
    }

    // Check if a setting is selected
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {
            
            case '1':
                // Add
                require_once('includes/pages/settings/tickets/statusses/add.php');
                break;
            
            case '2':
                // Edit
                require_once('includes/pages/settings/tickets/statusses/edit.php');
                break;
            
            case '3':
                // Delete
                require_once('includes/pages/settings/tickets/statusses/delete.php');
                break;

            default:
                // Customers home
                require_once('includes/pages/settings/tickets/statusses/home.php');
        }

    } else {
        // Customers home
        require_once('includes/pages/settings/tickets/statusses/home.php');
    }
}