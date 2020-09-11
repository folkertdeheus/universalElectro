<?php

/**
 * This page contains the user account info
 */

// Check if user is logged in
if (login()) {

    // Get user information
    $customer = $q->getCustomer($_SESSION['webuser']);

?>

<main id="mainEnglish">
    <div class="mainContent">
        <div class="mainLeft">
            <div class="accountdetails">
                <div class="title">
                    <?= $language['en_account_basic']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td class="tdname"><?= $language['en_account_name']; ?></td>
                        <td><?= $customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_email']; ?></td>
                        <td><?= $customer['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_phone']; ?></td>
                        <td><?= $customer['phone']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_company']; ?></td>
                        <td><?= $customer['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_tax']; ?></td>
                        <td><?= $customer['taxnumber']; ?></td>
                    </tr>
                </table>
            </div> <!-- accountdetails -->

            <div class="accountdetails">
                <div class="title">
                    <?= $language['en_account_shipping']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td class="tdname"><?= $language['en_account_adress']; ?></td>
                        <td><?= $customer['shipping_street'].' '.$customer['shipping_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                        <td><?= $customer['shipping_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_city']; ?></td>
                        <td><?= $customer['shipping_city']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_provence']; ?></td>
                        <td><?= $customer['shipping_provence']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_country']; ?></td>
                        <td><?= $customer['shipping_country']; ?></td>
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
                        <td><?= $customer['billing_street'].' '.$customer['billing_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                        <td><?= $customer['billing_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_city']; ?></td>
                        <td><?= $customer['billing_city']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_provence']; ?></td>
                        <td><?= $customer['billing_provence']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_country']; ?></td>
                        <td><?= $customer['billing_country']; ?></td>
                    </tr>
                </table>

                <a href="index.php?page=2&action=2"><?= $language['en_account_edit']; ?></a>
                <a href="index.php?page=2&action=3"><?= $language['en_account_changepw']; ?></a>
                <a href="index.php?logout=true"><?= $language['en_account_logout']; ?></a>
            </div> <!-- accountdetails -->
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails">
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
                            <tr class="quotesummary" onclick="window.location='index.php?page=2&action=4&id=<?= $quoteValue['id']; ?>'">
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

            <div class="accountdetails">
                <div class="title">
                    Tickets
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
                            <tr class="quotesummary" onclick="window.location='index.php?page=3&action=1&sub=2&id=<?= $ticketValue['id']; ?>'">
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
                    <a href="index.php?page=3&action=1"><?= $language['en_account_newticket']; ?></a>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<main id="mainDutch">
<div class="mainContent">
        <div class="mainLeft">
            <div class="accountdetails">
                <div class="title">
                    <?= $language['nl_account_basic']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_name']; ?></td>
                        <td><?= $customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_email']; ?></td>
                        <td><?= $customer['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_phone']; ?></td>
                        <td><?= $customer['phone']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_company']; ?></td>
                        <td><?= $customer['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_tax']; ?></td>
                        <td><?= $customer['taxnumber']; ?></td>
                    </tr>
                </table>
            </div> <!-- accountdetails -->

            <div class="accountdetails">
                <div class="title">
                    <?= $language['nl_account_shipping']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_adress']; ?></td>
                        <td><?= $customer['shipping_street'].' '.$customer['shipping_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                        <td><?= $customer['shipping_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_city']; ?></td>
                        <td><?= $customer['shipping_city']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                        <td><?= $customer['shipping_provence']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_country']; ?></td>
                        <td><?= $customer['shipping_country']; ?></td>
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
                        <td><?= $customer['billing_street'].' '.$customer['billing_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                        <td><?= $customer['billing_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_city']; ?></td>
                        <td><?= $customer['billing_city']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                        <td><?= $customer['billing_provence']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_country']; ?></td>
                        <td><?= $customer['billing_country']; ?></td>
                    </tr>
                </table>

                <a href="index.php?page=2&action=2"><?= $language['nl_account_edit']; ?></a>
                <a href="index.php?page=2&action=3"><?= $language['nl_account_changepw']; ?></a>
                <a href="index.php?logout=true"><?= $language['nl_account_logout']; ?></a>
            </div> <!-- accountdetails -->
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails">
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
                            <tr class="quotesummary" onclick="window.location='index.php?page=2&action=4&id=<?= $quoteValue['id']; ?>'">
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

            <div class="accountdetails">
                <div class="title">
                    Tickets
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
                            <tr class="quotesummary" onclick="window.location='index.php?page=3&action=1&sub=2&id=<?= $ticketValue['id']; ?>'">
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
                    <a href="index.php?page=3&action=1"><?= $language['nl_account_newticket']; ?></a>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<?php

    }