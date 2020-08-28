<?php

/**
 * This page contains the content inclusion of the messages part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a brand was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get brand information
        $contact = $q->getContact($_GET['delete']);
        
        // Delete brand
        $q->deleteContact($contact['id']);
        
        // Insert Log
        $q->insertLog('Contact', 'Delete', 'Deleted contact message "'.$contact['subject'].'" from '.$contact['name'].'. By '.user());
    }

    // Check if a setting is selected
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {
            
            case '1':
                // Details
                require_once('includes/pages/crm/messages/details.php');
                
                break;

            case '2':
                // Delete
                require_once('includes/pages/crm/messages/delete.php');

                break;

            default:
                // Messages home
                require_once('includes/pages/crm/messages/home.php');
        }

    } else {
        // Messages home
        require_once('includes/pages/crm/messages/home.php');
    }
}