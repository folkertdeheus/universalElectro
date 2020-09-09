<?php

/**
 * This page contains the send quotation confirmation
 */

// Get quotation from cookie
$cart = $q->getLatestQuotationFromSession($_COOKIE['unele_shop']);

// Get products in cart
$products = $q->getQuotationProducts($cart['id']);

// Get account
$account = $q->getCustomer($_SESSION['webuser']);

?>

<main id="mainEnglish">
    Quotation request sent
</main>

<main id="mainDutch">
    Quotation request sent
</main>