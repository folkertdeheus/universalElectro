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

// Set IV
$iv = $account['iv'];

// SENDING QUOTATION TO COMPANY

// Check if the email adress is valid
if (filter_var(decrypt($account['email'], $iv), FILTER_VALIDATE_EMAIL)) {
    
    // Set variables
    $mailFrom = 'webshop@universalelectro.nl';
    $mailReplyTo = decrypt($account['email'], $iv);
    $mailTo = 'sales@universalelectro.nl';
    $mailSubject = 'Offerteaanvraag van '.decrypt($account['lastname'], $iv).', '.decrypt($account['firstname'], $iv).' '.decrypt($account['insertion'], $iv);
    
    $mailMessageTop = 'Nieuwe offerteaanvraag van '.decrypt($account['lastname'], $iv).', '.decrypt($account['firstname'], $iv).' '.decrypt($account['insertion'], $iv)."\r\n"."\r\n";

    $mailMessageTop .= '<table>';
    $mailMessageTop .= '<tr>';
    $mailMessageTop .= '<td><img src="https://universalelectro.nl/includes/images/logo.png" style="max-width: 200px" /></td>';
    $mailMessageTop .= '<td>';
    $mailMessageTop .= 'Ordernummer: '.$cart['id'].'<br>';
    $mailMessageTop .= 'Datum: '.date('d-m-Y').'<br>';
    $mailMessageTop .= 'Tijd: '.date('H:i:s').'<br>';
    $mailMessageTop .= '</td>';
    $mailMessageTop .= '</tr>';
    $mailMessageTop .= '</table>';
    $mailMessageTop .= "\r\n";

    $mailMessageMid = '<table>';
    $mailMessageMid .= '<tr>';
    $mailMessageMid .= '<th colspan=2>Accountgegevens</th>';
    $mailMessageMid .= '<th colspan=2>Factuurgegevens</th>';
    $mailMessageMid .= '<th colspan=2>Verzendgegevens</th>';
    $mailMessageMid .= '</tr>';
    $mailMessageMid .= '<tr>';
    $mailMessageMid .= '<td style="width: 100px;">Naam:</td><td style="width: 200px;">'.decrypt($account['firstname'], $iv).' '.decrypt($account['insertion'], $iv).' '.decrypt($account['lastname'], $iv).'</td>';
    $mailMessageMid .= '<td style="width: 100px;">Adres:</td><td style="width: 200px;">'.decrypt($account['billing_street'], $iv).' '.decrypt($account['billing_housenumber'], $iv).'</td>';
    $mailMessageMid .= '<td style="width: 100px;">Adres:</td><td style="width: 200px;">'.decrypt($account['shipping_street'], $iv).' '.decrypt($account['shipping_housenumber'], $iv).'</td>';
    $mailMessageMid .= '</tr>';
    $mailMessageMid .= '<tr>';
    $mailMessageMid .= '<td>Email:</td><td>'.decrypt($account['email'], $iv).'</td>';
    $mailMessageMid .= '<td>Postcode:</td><td>'.decrypt($account['billing_postalcode'], $iv).'</td>';
    $mailMessageMid .= '<td>Postcode:</td><td>'.decrypt($account['shipping_postalcode'], $iv).'</td>';
    $mailMessageMid .= '</tr>';
    $mailMessageMid .= '<tr>';
    $mailMessageMid .= '<td>Telefoon:</td><td>'.decrypt($account['phone'], $iv).'</td>';
    $mailMessageMid .= '<td>Plaats:</td><td>'.decrypt($account['billing_city'], $iv).'</td>';
    $mailMessageMid .= '<td>Plaats:</td><td>'.decrypt($account['shipping_city'], $iv).'</td>';
    $mailMessageMid .= '</tr>';
    $mailMessageMid .= '<tr>';
    $mailMessageMid .= '<td>Bedrijfsnaam:</td><td>'.decrypt($account['company_name'], $iv).'</td>';
    $mailMessageMid .= '<td>Provincie:</td><td>'.decrypt($account['billing_provence'], $iv).'</td>';
    $mailMessageMid .= '<td>Provincie:</td><td>'.decrypt($account['shipping_provence'], $iv).'</td>';
    $mailMessageMid .= '</tr>';
    $mailMessageMid .= '<tr>';
    $mailMessageMid .= '<td>BTW Nummer:</td><td>'.decrypt($account['taxnumber'], $iv).'</td>';
    $mailMessageMid .= '<td>Land:</td><td>'.decrypt($account['billing_country'], $iv).'</td>';
    $mailMessageMid .= '<td>Land:</td><td>'.decrypt($account['shipping_country'], $iv).'</td>';
    $mailMessageMid .= '</tr>';
    $mailMessageMid .= '</table>';
    $mailMessageMid .= "\r\n\r\n\r\n";

    $mailMessageBot = '<table>';
    $mailMessageBot .= '<tr>';
    $mailMessageBot .= '<th style="text-align: left;">Aantal</th>';
    $mailMessageBot .= '<th style="text-align: left;">Product</th>';
    $mailMessageBot .= '<th style="text-align: left;">Merk</th>';
    $mailMessageBot .= '</tr>';

    // Loop through quotation products
    foreach($products as $productKey => $productValue) {

        // Get product info
        $product = $q->getProductById($productValue['product']);

        // Get brand info
        $brand = $q->getBrandById($product['brand']);

        $mailMessageBot .= '<tr>';
        $mailMessageBot .= '<td style="width: 40px;">'.$productValue['amount'].'x</td>';
        $mailMessageBot .= '<td style="width: 300px;">'.$product['name'].'</td>';
        $mailMessageBot .= '<td style="width: 150px;">'.$brand['name'].'</td>';
        $mailMessageBot .= '</tr>';
        $mailMessageBot .= "\r\n";
    }

    $mailMessageBot .= '</table>';

    if (isset($account['remarks']) && decrypt($account['remarks'], $iv) != null) {
        $mailMessageBot .= 'Opmerking: '."\r\n"; 
        $mailMessageBot .= decrypt($account['remarks'], $iv);
    }

    $mailHeaders = ['From' => $mailFrom,
                    'Reply-To' => $mailReplyTo,
                    'MIME-Version' => '1.0',
                    'Content-Type' => 'text/html; charset=ISO-8895-1'];

    // SENDING MAIL TO CUSTOMER

    // Set variables
    $mailFrom2 = 'webshop@universalelectro.nl';
    $mailReplyTo2 = 'sales@universalelectro.nl';
    $mailTo2 = decrypt($account['email'], $iv);
    $mailSubject2 = 'Quotation request';
    
    $mailMessageTop2 = 'Your quotation request from '.$cart['timestamp']."\r\n"."\r\n";

    $mailMessageTop2 .= '<table>';
    $mailMessageTop2 .= '<tr>';
    $mailMessageTop2 .= '<td><img src="https://universalelectro.nl/includes/images/logo.png" style="max-width: 200px" /></td>';
    $mailMessageTop2 .= '<td>';
    $mailMessageTop2 .= 'Ordernumber: '.$cart['id'].'<br>';
    $mailMessageTop2 .= 'Date: '.date('Y-m-d').'<br>';
    $mailMessageTop2 .= 'Time: '.date('H:i:s').'<br>';
    $mailMessageTop2 .= '</td>';
    $mailMessageTop2 .= '</tr>';
    $mailMessageTop2 .= '</table>';
    $mailMessageTop2 .= "\r\n";

    $mailMessageMid2 = '<table>';
    $mailMessageMid2 .= '<tr>';
    $mailMessageMid2 .= '<th colspan=2>Account information</th>';
    $mailMessageMid2 .= '<th colspan=2>Billing information</th>';
    $mailMessageMid2 .= '<th colspan=2>Shipping information</th>';
    $mailMessageMid2 .= '</tr>';
    $mailMessageMid2 .= '<tr>';
    $mailMessageMid2 .= '<td>Name:</td><td>'.decrypt($account['firstname'], $iv).' '.decrypt($account['insertion'], $iv).' '.decrypt($account['lastname'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Adress:</td><td>'.decrypt($account['billing_street'], $iv).' '.decrypt($account['billing_housenumber'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Adress:</td><td>'.decrypt($account['shipping_street'], $iv).' '.decrypt($account['shipping_housenumber'], $iv).'</td>';
    $mailMessageMid2 .= '</tr>';
    $mailMessageMid2 .= '<tr>';
    $mailMessageMid2 .= '<td>Email:</td><td>'.decrypt($account['email'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Postal code:</td><td>'.decrypt($account['billing_postalcode'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Postal code:</td><td>'.decrypt($account['shipping_postalcode'], $iv).'</td>';
    $mailMessageMid2 .= '</tr>';
    $mailMessageMid2 .= '<tr>';
    $mailMessageMid2 .= '<td>Phone:</td><td>'.decrypt($account['phone'], $iv).'</td>';
    $mailMessageMid2 .= '<td>City:</td><td>'.decrypt($account['billing_city'], $iv).'</td>';
    $mailMessageMid2 .= '<td>City:</td><td>'.decrypt($account['shipping_city'], $iv).'</td>';
    $mailMessageMid2 .= '</tr>';
    $mailMessageMid2 .= '<tr>';
    $mailMessageMid2 .= '<td>Company name:</td><td>'.decrypt($account['company_name'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Provence:</td><td>'.decrypt($account['billing_provence'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Provence:</td><td>'.decrypt($account['shipping_provence'], $iv).'</td>';
    $mailMessageMid2 .= '</tr>';
    $mailMessageMid2 .= '<tr>';
    $mailMessageMid2 .= '<td>Tax number:</td><td>'.decrypt($account['taxnumber'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Country:</td><td>'.decrypt($account['billing_country'], $iv).'</td>';
    $mailMessageMid2 .= '<td>Country:</td><td>'.decrypt($account['shipping_country'], $iv).'</td>';
    $mailMessageMid2 .= '</tr>';
    $mailMessageMid2 .= '</table>';

    $mailMessageBot2 = '<table>';
    $mailMessageBot2 .= '<tr>';
    $mailMessageBot2 .= '<th style="text-align: left;">Aantal</th>';
    $mailMessageBot2 .= '<th style="text-align: left;">Product</th>';
    $mailMessageBot2 .= '<th style="text-align: left;">Merk</th>';
    $mailMessageBot2 .= '</tr>';

    // Loop through quotation products
    foreach($products as $productKey => $productValue) {

        // Get product info
        $product = $q->getProductById($productValue['product']);

        // Get brand info
        $brand = $q->getBrandById($product['brand']);

        $mailMessageBot2 .= '<tr>';
        $mailMessageBot2 .= '<td style="width: 40px;">'.$productValue['amount'].'x</td>';
        $mailMessageBot2 .= '<td style="width: 300px;">'.$product['name'].'</td>';
        $mailMessageBot2 .= '<td style="width: 150px;">'.$brand['name'].'</td>';
        $mailMessageBot2 .= '</tr>';
        $mailMessageBot2 .= "\r\n";
    }

    $mailMessageBot2 .= '</table>';

    $mailHeaders2 = ['From' => $mailFrom2,
                    'Reply-To' => $mailReplyTo2,
                    'MIME-Version' => '1.0',
                    'Content-Type' => 'text/html; charset=ISO-8895-1'];

    // Send mail    
    if (mail($mailTo, $mailSubject, $mailMessageTop.$mailMessageMid.$mailMessageBot, $mailHeaders) && mail($mailTo2, $mailSubject2, $mailMessageTop2.$mailMessageMid2.$mailMessageBot2, $mailHeaders2)) {
        
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