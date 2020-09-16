<?php

/**
 * This file contains the quotations overview
 */

// Check if user is logged in
if (login()) {

    if (isset($_GET['id']) && $_GET['id'] != null) {

        // Details
        require_once('includes/pages/shop/quotations/details.php');

    } else {

        // Home
        require_once('includes/pages/shop/quotations/home.php');
    }
}