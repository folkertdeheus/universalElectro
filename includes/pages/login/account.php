<?php

/**
 * This file contains the user account info
 */

// Check if user is logged in
if (login()) {

    // Get user information
    $customer = $q->getCustomer($_SESSION['webuser']);

    // Set iv for decryption
    $iv = $customer['iv'];

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
                        <td><?= decrypt($customer['lastname'], $iv).', '.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_email']; ?></td>
                        <td><?= decrypt($customer['email'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_phone']; ?></td>
                        <td><?= decrypt($customer['phone'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_company']; ?></td>
                        <td><?= decrypt($customer['company_name'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_tax']; ?></td>
                        <td><?= decrypt($customer['taxnumber'], $iv); ?></td>
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
                        <td><?= decrypt($customer['shipping_street'], $iv).' '.decrypt($customer['shipping_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                        <td><?= decrypt($customer['shipping_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_city']; ?></td>
                        <td><?= decrypt($customer['shipping_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_provence']; ?></td>
                        <td><?= decrypt($customer['shipping_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_country']; ?></td>
                        <td><?= decrypt($customer['shipping_country'], $iv); ?></td>
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
                        <td><?= decrypt($customer['billing_street'], $iv).' '.decrypt($customer['billing_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                        <td><?= decrypt($customer['billing_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_city']; ?></td>
                        <td><?= decrypt($customer['billing_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_provence']; ?></td>
                        <td><?= decrypt($customer['billing_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['en_account_country']; ?></td>
                        <td><?= decrypt($customer['billing_country'], $iv); ?></td>
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
                        <td><?= decrypt($customer['lastname'], $iv).', '.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_email']; ?></td>
                        <td><?= decrypt($customer['email'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_phone']; ?></td>
                        <td><?= decrypt($customer['phone'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_company']; ?></td>
                        <td><?= decrypt($customer['company_name'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_tax']; ?></td>
                        <td><?= decrypt($customer['taxnumber'], $iv); ?></td>
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
                        <td><?= decrypt($customer['shipping_street'], $iv).' '.decrypt($customer['shipping_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                        <td><?= decrypt($customer['shipping_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_city']; ?></td>
                        <td><?= decrypt($customer['shipping_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                        <td><?= decrypt($customer['shipping_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_country']; ?></td>
                        <td><?= decrypt($customer['shipping_country'], $iv); ?></td>
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
                        <td><?= decrypt($customer['billing_street'], $iv).' '.decrypt($customer['billing_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                        <td><?= decrypt($customer['billing_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_city']; ?></td>
                        <td><?= decrypt($customer['billing_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                        <td><?= decrypt($customer['billing_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td class="tdname"><?= $language['nl_account_country']; ?></td>
                        <td><?= decrypt($customer['billing_country'], $iv); ?></td>
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
                            <tr class="quotesummary" onclick="window.location='index.php?page=3&action=1&sub=2&id=<?= $ticketValue['id']; ?>'">
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
                        echo $language['nl_account_notickets'];
                    }
?>
                    <a href="index.php?page=3&action=1"><?= $language['nl_account_newticket']; ?></a>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<?php

    }