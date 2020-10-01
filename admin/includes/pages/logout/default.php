<?php

/**
 * This pages logs out a user and redirects to the home page
 */

// Clear session
$_SESSION['user'] = null;
session_destroy();

// Return to homepage
header('Location: index.php');