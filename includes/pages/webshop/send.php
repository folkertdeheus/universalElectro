<?php

/**
 * This file contains the send quotation confirmation
 */

// Get quotation from cookie
$cart = $q->getLatestQuotationFromSession($_COOKIE['unele_shop']);

// Get products in cart
$products = $q->getQuotationProducts($cart['id']);

// Get account
$account = $q->getCustomer($_SESSION['webuser']);

// SENDING QUOTATION TO COMPANY

// Check if the email adress is valid
if (filter_var($account['email'], FILTER_VALIDATE_EMAIL)) {
    
    // Set variables
    $mailFrom = 'webshop@universalelectro.nl';
    $mailReplyTo = $account['email'];
    $mailTo = 'sales@universalelectro.nl';
    $mailSubject = 'Offerteaanvraag van '.$account['lastname'].', '.$account['firstname'].' '.$account['insertion'];
    $mailMessage = 'Nieuwe offerteaanvraag van '.$account['lastname'].', '.$account['firstname'].' '.$account['instertion']."\r\n"."\r\n";

    // Loop through quotation products
    foreach($products as $productKey => $productValue) {

        // Get product info
        $product = $q->getProductById($productValue['product']);

        // Get brand info
        $brand = $q->getBrandById($product['brand']);

        $mailMessage .= '- '.$brand['name'].': ('.$product['amount'].'x) '.$product['name']."\r\n";
    }

    $mailMessage .= "\r\n"."\r\n";

    $mailMessage .= 'Accountgegevens: '."\r\n";
    $mailMessage .= 'Naam: '.$account['firstname'].' '.$account['insertion'].' '.$account['lastname']."\r\n";
    $mailMessage .= 'Email: '.$account['email']."\r\n";
    $mailMessage .= 'Telefoon: '.$account['phone']."\r\n";
    $mailMessage .= 'Bedrijfsnaam: '.$account['company_name']."\r\n";
    $mailMessage .= 'BTW nummer: '.$account['taxnumber']."\r\n"."\r\n";

    $mailMessage .= 'Factuurgegevens: '."\r\n";
    $mailMessage .= 'Adres: '.$account['billing_street'].' '.$account['billing_housenumber']."\r\n";
    $mailMessage .= 'Postcode: '.$account['billing_postalcode']."\r\n";
    $mailMessage .= 'Plaats: '.$account['billing_city']."\r\n";
    $mailMessage .= 'Provincie: '.$account['billing_provence']."\r\n";
    $mailMessage .= 'Land: '.$account['billing_country']."\r\n"."\r\n";

    $mailMessage .= 'Verzendgegevens: '."\r\n";
    $mailMessage .= 'Adres: '.$account['shipping_street'].' '.$account['shipping_housenumber']."\r\n";
    $mailMessage .= 'Postcode: '.$account['shipping_postalcode']."\r\n";
    $mailMessage .= 'Plaats: '.$account['shipping_city']."\r\n";
    $mailMessage .= 'Provencie: '.$account['shipping_provence']."\r\n";
    $mailMessage .= 'Land: '.$account['shipping_country']."\r\n"."\r\n";

    if (isset($account['remarks']) && $account['remarks'] != null) {
        $mailMessage .= 'Opmerking: '."\r\n"; 
        $mailMessage .= $account['remarks'];
    }

    $mailHeaders = ['From' => $mailFrom,
                    'Reply-To' => $mailReplyTo];


    // SENDING MAIL TO CUSTOMER

    // Set variables
    $mailFrom2 = 'webshop@universalelectro.nl';
    $mailReplyTo2 = 'sales@universalelectro.nl';
    $mailTo2 = $account['email'];
    $mailSubject2 = 'Quotation request';
    $mailMessage2 = 'Your quotation request from '.$cart['timestamp']."\r\n"."\r\n";

    // Loop through quotation products
    foreach($products as $productKey => $productValue) {

        // Get product info
        $product = $q->getProductById($productValue['product']);

        // Get brand info
        $brand = $q->getBrandById($product['brand']);

        $mailMessage2 .= '- '.$brand['name'].': ('.$product['amount'].'x) '.$product['name']."\r\n";
    }

    $mailMessage2 .= "\r\n"."\r\n";

    $mailMessage2 .= 'Accountgegevens: '."\r\n";
    $mailMessage2 .= 'Naam: '.$account['firstname'].' '.$account['insertion'].' '.$account['lastname']."\r\n";
    $mailMessage2 .= 'Email: '.$account['email']."\r\n";
    $mailMessage2 .= 'Telefoon: '.$account['phone']."\r\n";
    $mailMessage2 .= 'Bedrijfsnaam: '.$account['company_name']."\r\n";
    $mailMessage2 .= 'BTW nummer: '.$account['taxnumber']."\r\n"."\r\n";

    $mailMessage2 .= 'Factuurgegevens: '."\r\n";
    $mailMessage2 .= 'Adres: '.$account['billing_street'].' '.$account['billing_housenumber']."\r\n";
    $mailMessage2 .= 'Postcode: '.$account['billing_postalcode']."\r\n";
    $mailMessage2 .= 'Plaats: '.$account['billing_city']."\r\n";
    $mailMessage2 .= 'Provincie: '.$account['billing_provence']."\r\n";
    $mailMessage2 .= 'Land: '.$account['billing_country']."\r\n"."\r\n";

    $mailMessage2 .= 'Verzendgegevens: '."\r\n";
    $mailMessage2 .= 'Adres: '.$account['shipping_street'].' '.$account['shipping_housenumber']."\r\n";
    $mailMessage2 .= 'Postcode: '.$account['shipping_postalcode']."\r\n";
    $mailMessage2 .= 'Plaats: '.$account['shipping_city']."\r\n";
    $mailMessage2 .= 'Provencie: '.$account['shipping_provence']."\r\n";
    $mailMessage2 .= 'Land: '.$account['shipping_country']."\r\n"."\r\n";

    if (isset($account['remarks']) && $account['remarks'] != null) {
        $mailMessage2 .= 'Opmerking: '."\r\n"; 
        $mailMessage2 .= $account['remarks'];
    }

    $mailHeaders2 = ['From' => $mailFrom2,
                    'Reply-To' => $mailReplyTo2];

    // Sent mail    
    if (mail($mailTo, $mailSubject, $mailMessage, $mailHeaders) && mail($mailTo2, $mailSubject2, $mailMessage2, $mailHeaders2)) {
        
        // Message sent succesfully

        // Reset webshop cookie
        $_COOKIE['unele_shop'] = null;
?>
        <main id="mainEnglish">
            <?= $language['en_quote_sent']; ?>
        </main>

        <main id="mainDutch">
            <?= $language['nl_quote_sent']; ?>
        </main>
<?php
    } else {

        // Failed to sent message
?>
        <main id="mainEnglish">
            <?= $language['en_quote_notsent']; ?>
        </main>

        <main id="mainDutch">
            <?= $language['nl_quote_notsent']; ?>
        </main>
<?php
    }

} else {
    // Failed to sent message
?>
    <main id="mainEnglish">
        <?= $language['en_quote_notsent']; ?>
    </main>

    <main id="mainDutch">
        <?= $language['nl_quote_notsent']; ?>
    </main>
<?php
}

?>