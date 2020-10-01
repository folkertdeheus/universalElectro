<?php

/**
 * This file contains the customer details table
 */

// Check if user is logged in when accessing this file
if (login()) {
    
    // Get all customer information
    $customer = $q->getCustomer($_GET['id']);
    $quotes = $q->getQuotationsFromCustomer($_GET['id']);
    $tickets = $q->getTicketsByCustomer($_GET['id']);

    // Set iv for decryption
    $iv = $customer['iv'];
?>

    <div class="content">
        <div class="multi">
            <div class="content_left">
                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Basic information</th>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?= decrypt($customer['lastname'], $iv).', '.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= decrypt($customer['email'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?= decrypt($customer['phone'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Company</td>
                        <td><?= decrypt($customer['company_name'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Tax number</td>
                        <td><?= decrypt($customer['taxnumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><?= nl2br(decrypt($customer['remarks'], $iv)); ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Shipping adress</th>
                    </tr>
                    <tr>
                        <td>Street</td>
                        <td><?= decrypt($customer['shipping_street'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Housenumber</td>
                        <td><?= decrypt($customer['shipping_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= decrypt($customer['shipping_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= decrypt($customer['shipping_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= decrypt($customer['shipping_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= decrypt($customer['shipping_country'], $iv); ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Billing adress</th>
                    </tr>
                    <tr>
                        <td>Street</td>
                        <td><?= decrypt($customer['billing_street'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Housenumber</td>
                        <td><?= decrypt($customer['billing_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= decrypt($customer['billing_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= decrypt($customer['billing_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= decrypt($customer['billing_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= decrypt($customer['billing_country'], $iv); ?></td>
                    </tr>
                </table>
            </div> <!-- content_left -->

            <div class="content_right">
                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Quotation history</th>
                    </tr>
<?php
                    // Check if there are qoutation requests
                    if ($q->countQuotationsFromCustomer($_GET['id']) > 0) {

                        // Loop through quotation requests
                        foreach($quotes as $quoteKey => $quoteValue) {
?>
                            <tr>
                                <td><?= $quoteValue['id']; ?></td>
                                <td><?= $quoteValue['timestamp']; ?></td>
                            </tr>
<?php
                        }

                    } else {
                        // No quotations found
?>
                        <tr>
                            <td colspan=2>No quotation requests</td>
                        </tr>
<?php
                    }
?>
                </table>

                <table>
                    <tr>
                        <th colspan=4 class="form_cat">Tickets</td>
                    </tr>
<?php
                    // Check if there are tickets
                    if ($q->countTicketsByCustomer($_GET['id']) > 0) {

                        // Loop through tickets
                        foreach($tickets as $ticketKey => $ticketValue) {
?>
                            <tr>
                                <td><?= $ticketValue['subject']; ?></td>
                                <td><?= $ticketValue['status']; ?></td>
                                <td><?= $ticketValue['started']; ?></td>
                                <td><?= $ticketValue['closed']; ?></td>
                            </tr>
<?php
                        }

                    } else {
                        // No tickets found
?>
                        <tr>
                            <td colspan=4>No tickets</td>
                        </tr>
<?php
                    }
?>
                </table>
            </div> <!-- content_right -->
        </div> <!-- multi -->
    </div> <!-- content -->
<?php

}