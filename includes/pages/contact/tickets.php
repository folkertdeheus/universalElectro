<?php

/**
 * This page contains the tickets redirecting page
 * If a user is not logged in, it will be redirected to the login/create account page
 * If the user is logged in, the ticket system will be loaded
 */

if (login()) {

    // Include ticket page if user is logged in
    require_once('includes/pages/tickets/default.php');

} else {
    // Display login message if user is not logged in
    require_once('includes/pages/contact/login.php');
}