<?php

/**
 * This page contains the edit account form
 * It's the same as the account page, but the account info is a form and the order+tickets is greyed out
 */

// Check if user is logged in
if (login()) {

// Set iv for decryption
$iv = $customer['iv'];

?>

<main id="mainEnglish">
    <div class="mainContent">
        <div class="mainLeft">
            <form method="post" action="index.php?page=2">
        
                <div class="accountdetails">        
                    <div class="title">
                        <?= $language['en_account_basic']; ?>
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname"><?= $language['en_account_firstname']; ?></td>
                            <td><input type="text" name="firstname" id="firstname" placeholder="<?= $language['en_account_firstname']; ?>" value="<?= decrypt($customer['firstname'], $iv); ?>" onchange="editAccount('firstname')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_insertion']; ?></td>
                            <td><input type="text" name="insertion" id="insertion" placeholder="<?= $language['en_account_insertion']; ?>" value="<?= decrypt($customer['insertion'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_lastname']; ?></td>
                            <td><input type="text" name="lastname" id="lastname" placeholder="<?= $language['en_account_lastname']; ?>" value="<?= decrypt($customer['lastname'], $iv); ?>" onchange="editAccount('lastname')" required /></td>
                        <tr>
                            <td class="tdname"><?= $language['en_account_email']; ?></td>
                            <td><input type="text" name="email" id="email" placeholder="<?= $language['en_account_email']; ?>" value="<?= decrypt($customer['email'], $iv); ?>" onchange="editAccount('email')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_phone']; ?></td>
                            <td><input type="text" name="phone" id="phone" placeholder="<?= $language['en_account_phone']; ?>" value="<?= decrypt($customer['phone'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_company']; ?></td>
                            <td><input type="text" name="company" id="company" placeholder="<?= $language['en_account_company']; ?>" value="<?= decrypt($customer['company_name'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_tax']; ?></td>
                            <td><input type="text" name="taxnumber" id="taxnumber" placeholder="<?= $language['en_account_tax']; ?>" value="<?= decrypt($customer['taxnumber'], $iv); ?>" /></td>
                        </tr>
                    </table>
                </div> <!-- accountdetails -->

                <div class="accountdetails">
                    <div class="title">
                        <?= $language['en_account_shipping']; ?>
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname"><?= $language['en_account_street']; ?></td>
                            <td><input type="text" name="shipping_street" id="shipping_street" placeholder="<?= $language['en_account_street']; ?>" value="<?= decrypt($customer['shipping_street'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_housenumber']; ?></td>
                            <td><input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="<?= $language['en_account_housenumber']; ?>" value="<?= decrypt($customer['shipping_housenumber'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                            <td><input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="<?= $language['en_account_postalcode']; ?>" value="<?= decrypt($customer['shipping_postalcode'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_city']; ?></td>
                            <td><input type="text" name="shipping_city" id="shipping_city" placeholder="<?= $language['en_account_city']; ?>" value="<?= decrypt($customer['shipping_city'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_provence']; ?></td>
                            <td><input type="text" name="shipping_provence" id="shipping_provence" placeholder="<?= $language['en_account_provence']; ?>" value="<?= decrypt($customer['shipping_provence'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_country']; ?></td>
                            <td><input type="text" name="shipping_country" id="shipping_country" placeholder="<?= $language['en_account_country']; ?>" value="<?= decrypt($customer['shipping_country'], $iv); ?>" /></td>
                        </tr>
                    </table>
                </div> <!-- acountdetails -->

                <div class="accountdetails">
                    <div class="title">
                        <?= $language['en_account_billing']; ?>
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname"><?= $language['en_account_street']; ?></td>
                            <td><input type="text" name="billing_street" id="billing_street" placeholder="<?= $language['en_account_street']; ?>" value="<?= decrypt($customer['billing_street'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_housenumber']; ?></td>
                            <td><input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="<?= $language['en_account_housenumber']; ?>" value="<?= decrypt($customer['billing_housenumber'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                            <td><input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="<?= $language['en_account_postalcode']; ?>" value="<?= decrypt($customer['billing_postalcode'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_city']; ?></td>
                            <td><input type="text" name="billing_city" id="billing_city" placeholder="<?= $language['en_account_city']; ?>" value="<?= decrypt($customer['billing_city'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_provence']; ?></td>
                            <td><input type="text" name="billing_provence" id="billing_provence" placeholder="<?= $language['en_account_provence']; ?>" value="<?= decrypt($customer['billing_provence'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_country']; ?></td>
                            <td><input type="text" name="billing_country" id="billing_country" placeholder="<?= $language['en_account_country']; ?>" value="<?= decrypt($customer['billing_country'], $iv); ?>" /></td>
                        </tr>
                    </table>

                    <input type="submit" value="<?= $language['en_account_save']; ?>" />
                    <input type="hidden" name="form" value="editCustomer" />
                </div> <!-- accountdetails -->

            </form>
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails_grey">
                <div class="title">
                    <?= $language['en_account_orderhistory']; ?>
                </div> <!-- title -->

<?php
                // Check if there are any quotation requests
                if ($q->countQuotationsFromCustomer($_SESSION['webuser']) > 0) {
                    
                    // Get all quotation requests
                    $quotes = $q->getQuotationsFromCustomer($_SESSION['webuser']);
?>
                    <table>
                        <tr>
                            <td class="quotesummaryid">#</td>
                            <td class="quotesummarytime"><?= $language['en_quote_time']; ?></td>
                        </tr>
<?php
                        // Loop through all quotation requests
                        foreach($quotes as $quoteKey => $quoteValue) {
?>
                            <tr class="quotesummary">
                                <td class="quotesummaryid"><?= $quoteValue['id']; ?></td>
                                <td class="quotesummarytime"><?= $quoteValue['timestamp']; ?></td>
                            </tr>
<?php
                        }
?>
                    </table>
<?php
                } else {

                    // No quotations found
                    echo $language['en_account_noorders'];
                }
?>
            </div> <!-- accountdetails -->

            <div class="accountdetails_grey">
                <div class="title">
                    <?= $language['en_account_tickets']; ?>
                </div> <!-- title -->
<?php
                if ($q->countTicketsByCustomer($_SESSION['webuser']) > 0) {
                    $tickets = $q->getTicketsByCustomer($_SESSION['webuser']);
?>
                    <table>
                        <tr>
                            <td class="accountticket"><?= $language['en_tickets_subject']; ?></td>
                            <td class="accountticket"><?= $language['en_tickets_status']; ?></td>
                            <td class="accountticket"><?= $language['en_tickets_category']; ?></td>
                            <td class="accountticket"><?= $language['en_tickets_priority']; ?></td>
                        </tr>
<?php
                    foreach($tickets as $ticketKey => $ticketValue) {

                        // Set status, category and priority
                        $status = $q->getTicketStatus($ticketValue['status']);
                        $category = $q->getTicketCategory($ticketValue['category']);

                        switch($ticketValue['priority']) {
                            case '1':
                                $priority = $language['en_tickets_priolow'];
                                break;
                            case '2':
                                $priority = $language['en_tickets_priomed'];
                                break;
                            case '3':
                                $priority = $language['en_tickets_priohigh'];
                                break;
                            case '4':
                                $priority = $language['en_tickets_priocrit'];
                                break;
                            default:
                                $priority = $language['en_tickets_priomed'];
                        }
?>
                        <tr class="quotesummary">
                            <td class="accountticket"><?= $ticketValue['subject']; ?></td>
                            <td class="accountticket"><?= $status['en_web_name']; ?></td>
                            <td class="accountticket"><?= $category['name']; ?></td>
                            <td class="accountticket"><?= $priority; ?></td>
                        </tr>
<?php
                    }
?>
                    </table>
<?php
                } else {
                    echo $language['en_account_notickets'];
                }
?>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<main id="mainDutch">
<div class="mainContent">
        <div class="mainLeft">
            <form method="post" action="index.php?page=2">
        
                <div class="accountdetails">        
                    <div class="title">
                        <?= $language['nl_account_basic']; ?>
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_firstname']; ?></td>
                            <td><input type="text" name="firstname" id="firstname" placeholder="<?= $language['nl_account_firstname']; ?>" value="<?= decrypt($customer['firstname'], $iv); ?>" onchange="editAccount('firstname')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_insertion']; ?></td>
                            <td><input type="text" name="insertion" id="insertion" placeholder="<?= $language['nl_account_insertion']; ?>" value="<?= decrypt($customer['insertion'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_lastname']; ?></td>
                            <td><input type="text" name="lastname" id="lastname" placeholder="<?= $language['nl_account_lastname']; ?>" value="<?= decrypt($customer['lastname'], $iv); ?>" onchange="editAccount('lastname')" required /></td>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_email']; ?></td>
                            <td><input type="text" name="email" id="email" placeholder="<?= $language['nl_account_email']; ?>" value="<?= decrypt($customer['email'], $iv); ?>" onchange="editAccount('email')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_phone']; ?></td>
                            <td><input type="text" name="phone" id="phone" placeholder="<?= $language['nl_account_phone']; ?>" value="<?= decrypt($customer['phone'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_company']; ?></td>
                            <td><input type="text" name="company" id="company" placeholder="<?= $language['nl_account_company']; ?>" value="<?= decrypt($customer['company_name'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_tax']; ?></td>
                            <td><input type="text" name="taxnumber" id="taxnumber" placeholder="<?= $language['nl_account_tax']; ?>" value="<?= decrypt($customer['taxnumber'], $iv); ?>" /></td>
                        </tr>
                    </table>
                </div> <!-- accountdetails -->

                <div class="accountdetails">
                    <div class="title">
                        <?= $language['nl_account_shipping']; ?>
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_street']; ?></td>
                            <td><input type="text" name="shipping_street" id="shipping_street" placeholder="<?= $language['nl_account_street']; ?>" value="<?= decrypt($customer['shipping_street'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_housenumber']; ?></td>
                            <td><input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="<?= $language['nl_account_housenumber']; ?>" value="<?= decrypt($customer['shipping_housenumber'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                            <td><input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="<?= $language['nl_account_postalcode']; ?>" value="<?= decrypt($customer['shipping_postalcode'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_city']; ?></td>
                            <td><input type="text" name="shipping_city" id="shipping_city" placeholder="<?= $language['nl_account_city']; ?>" value="<?= decrypt($customer['shipping_city'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                            <td><input type="text" name="shipping_provence" id="shipping_provence" placeholder="<?= $language['nl_account_provence']; ?>" value="<?= decrypt($customer['shipping_provence'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_country']; ?></td>
                            <td><input type="text" name="shipping_country" id="shipping_country" placeholder="<?= $language['nl_account_country']; ?>" value="<?= decrypt($customer['shipping_country'], $iv); ?>" /></td>
                        </tr>
                    </table>
                </div> <!-- acountdetails -->

                <div class="accountdetails">
                    <div class="title">
                        <?= $language['nl_account_billing']; ?>
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_street']; ?></td>
                            <td><input type="text" name="billing_street" id="billing_street" placeholder="<?= $language['nl_account_street']; ?>" value="<?= decrypt($customer['billing_street'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_housenumber']; ?></td>
                            <td><input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="<?= $language['nl_account_housenumber']; ?>" value="<?= decrypt($customer['billing_housenumber'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                            <td><input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="<?= $language['nl_account_postalcode']; ?>" value="<?= decrypt($customer['billing_postalcode'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_city']; ?></td>
                            <td><input type="text" name="billing_city" id="billing_city" placeholder="<?= $language['nl_account_city']; ?>" value="<?= decrypt($customer['billing_city'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                            <td><input type="text" name="billing_provence" id="billing_provence" placeholder="<?= $language['nl_account_provence']; ?>" value="<?= decrypt($customer['billing_provence'], $iv); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_country']; ?></td>
                            <td><input type="text" name="billing_country" id="billing_country" placeholder="<?= $language['nl_account_country']; ?>" value="<?= decrypt($customer['billing_country'], $iv); ?>" /></td>
                        </tr>
                    </table>

                    <input type="submit" value="<?= $language['nl_account_save']; ?>" />
                    <input type="hidden" name="form" value="editCustomer" />
                </div> <!-- accountdetails -->

            </form>
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails_grey">
                <div class="title">
                    <?= $language['nl_account_orderhistory']; ?>
                </div> <!-- title -->

<?php
                // Check if there are any quotation requests
                if ($q->countQuotationsFromCustomer($_SESSION['webuser']) > 0) {
                    
                    // Get all quotation requests
                    $quotes = $q->getQuotationsFromCustomer($_SESSION['webuser']);
?>
                    <table>
                        <tr>
                            <td class="quotesummaryid">#</td>
                            <td class="quotesummarytime"><?= $language['nl_quote_time']; ?></td>
                        </tr>
<?php
                        // Loop through all quotation requests
                        foreach($quotes as $quoteKey => $quoteValue) {
?>
                            <tr class="quotesummary">
                                <td class="quotesummaryid"><?= $quoteValue['id']; ?></td>
                                <td class="quotesummarytime"><?= $quoteValue['timestamp']; ?></td>
                            </tr>
<?php
                        }
?>
                    </table>
<?php
                } else {

                    // No quotations found
                    echo $language['en_account_noorders'];
                }
?>
            </div> <!-- accountdetails -->

            <div class="accountdetails_grey">
                <div class="title">
                    <?= $language['nl_account_tickets']; ?>
                </div> <!-- title -->
<?php
                if ($q->countTicketsByCustomer($_SESSION['webuser']) > 0) {
                    $tickets = $q->getTicketsByCustomer($_SESSION['webuser']);
?>
                    <table>
                        <tr>
                            <td class="accountticket"><?= $language['nl_tickets_subject']; ?></td>
                            <td class="accountticket"><?= $language['nl_tickets_status']; ?></td>
                            <td class="accountticket"><?= $language['nl_tickets_category']; ?></td>
                            <td class="accountticket"><?= $language['nl_tickets_priority']; ?></td>
                        </tr>
<?php
                    foreach($tickets as $ticketKey => $ticketValue) {

                        // Set status, category and priority
                        $status = $q->getTicketStatus($ticketValue['status']);
                        $category = $q->getTicketCategory($ticketValue['category']);

                        switch($ticketValue['priority']) {
                            case '1':
                                $priority = $language['nl_tickets_priolow'];
                                break;
                            case '2':
                                $priority = $language['nl_tickets_priomed'];
                                break;
                            case '3':
                                $priority = $language['nl_tickets_priohigh'];
                                break;
                            case '4':
                                $priority = $language['nl_tickets_priocrit'];
                                break;
                            default:
                                $priority = $language['nl_tickets_priomed'];
                        }
?>
                        <tr class="quotesummary">
                            <td class="accountticket"><?= $ticketValue['subject']; ?></td>
                            <td class="accountticket"><?= $status['nl_web_name']; ?></td>
                            <td class="accountticket"><?= $category['name']; ?></td>
                            <td class="accountticket"><?= $priority; ?></td>
                        </tr>
<?php
                    }
?>
                    </table>
<?php
                } else {
                    echo $language['en_account_notickets'];
                }
?>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<?php

    }