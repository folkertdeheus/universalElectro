<?php

/**
 * This page contains the content inclusion of the customers part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a customer was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get customer information
        $customer = $q->getCustomer($_GET['delete']);
        
        // Delete customer
        $q->deleteCustomer($customer['id']);
        
        // Insert Log
        $q->insertLog('Customers', 'Delete', 'Deleted customer '.$customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion'].' with ID '.$customer['id'].'. By '.user());
    }

    // Check if a setting is selected
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        switch($_GET['sub']) {
            
            case '1':
                // Add
                require_once('includes/pages/crm/customers/add.php');
                break;
            
            case '2':
                // Details
                require_once('includes/pages/crm/customers/details.php');
                break;

            case '3':
                // Edit
                require_once('includes/pages/crm/customers/edit.php');
                break;
            
            case '4':
                // Delete
                require_once('includes/pages/crm/customers/delete.php');
                break;

            default:
                // Customers home
                require_once('includes/pages/crm/customers/home.php');
        }

    } else {
        // Customers home
        require_once('includes/pages/crm/customers/home.php');
    }
}