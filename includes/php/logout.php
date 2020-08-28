<?php

/**
 * This pages logs out a user and redirects to the home page
 */

// Check if logout button is clicked
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    
    $_SESSION['user'] = null;
    session_destroy();

    header('Location: index.php');
}