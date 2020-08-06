<?php

/**
 * This page contains the content inclusion of the users part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Check if a user was deleted
    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        // Get user information
        $user = $q->getUserById($_GET['delete']);
        
        // Delete user
        $q->deleteUser($user['id']);
        
        // Insert Log
        $q->insertLog('Users', 'Delete', 'Deleted user '.$user['username'].' with ID '.$user['id'].'. By '.user());
    }

    // Check if a setting is selected to edit
    if (isset($_GET['sub']) && $_GET['sub'] != null) {

        // Include requested page
        switch($_GET['sub']) {
            
            case '1':
                // Add
                require_once('includes/pages/settings/users/add.php');
                break;
            
            case '2':
                // Edit
                require_once('includes/pages/settings/users/edit.php');
                break;
            
            case '3':
                // Delete
                require_once('includes/pages/settings/users/delete.php');
                break;
            
            default:
                // Users home
                require_once('includes/pages/settings/users/home.php');
        }

    } else {
        // Users home
        require_once('includes/pages/settings/users/home.php');
    }
}