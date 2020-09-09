<?php

/**
 * This page checks for an active webshop cart for current cookie
 * If no cookie active, create cookie
 * If no cart active, creat cookie
 */

// Create unqiue id
$webshop_id = str_replace(" ", "", substr(microtime(), 2)).'#'.rand(1000,9999);

// Set openCart default false
$openCart = false;

// Check if cookie exists
if (isset($_COOKIE['unele_shop']) && $_COOKIE['unele_shop'] != null) {

    // Cookie exists, count open quotations from cookie
    if ($q->countOpenQuotationsFromSession($_COOKIE['unele_shop']) == 1) {

        // There are open quotations for the cookie
        $openCart = true;
    
    } else {

        // There are no open quotations for the cookie, set new cookie id
        setcookie('unele_shop', $webshop_id, time()+86400);
    }

} else {

    // Cookie does not exist, create new cookie
    setcookie('unele_shop', $webshop_id, time()+86400);
}