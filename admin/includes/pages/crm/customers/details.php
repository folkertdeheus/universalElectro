<?php

/**
 * This file contains the customer details table
 */

// Check if user is logged in when accessing this file
if (login()) {
    
    $customer = $q->getCustomer($_GET['id']);
    $orders = $q->getOrdersByCustomer($_GET['id']);
    $tickets = $q->getTicketsByCustomer($_GET['id']);
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
                        <td><?= $customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $customer['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?= $customer['phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Company</td>
                        <td><?= $customer['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><?= nl2br($customer['remarks']); ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Shipping adress</th>
                    </tr>
                    <tr>
                        <td>Street</td>
                        <td><?= $customer['shipping_street']; ?></td>
                    </tr>
                    <tr>
                        <td>Housenumber</td>
                        <td><?= $customer['shipping_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= $customer['shipping_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= $customer['shipping_city']; ?></td>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= $customer['shipping_provence']; ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= $customer['shipping_country']; ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Billing adress</th>
                    </tr>
                    <tr>
                        <td>Street</td>
                        <td><?= $customer['billing_street']; ?></td>
                    </tr>
                    <tr>
                        <td>Housenumber</td>
                        <td><?= $customer['billing_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= $customer['billing_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= $customer['billing_city']; ?></td>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= $customer['billing_provence']; ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= $customer['billing_country']; ?></td>
                    </tr>
                </table>
            </div> <!-- content_left -->

            <div class="content_right">
                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Order history</th>
                    </tr>
<?php
                    if ($q->countOrdersByCustomer($_GET['id']) > 0) {
?>
                        <tr>
                            <td><?= $orders['id']; ?></td>
                            <td><?= $orders['timestamp']; ?></td>
                        </tr>
<?php
                    } else {
?>
                        <tr>
                            <td colspan=2>No orders</td>
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
                    if ($q->countTicketsByCustomer($_GET['id']) > 0) {
?>
                        <tr>
                            <td><?= $tickets['subject']; ?></td>
                            <td><?= $tickets['status']; ?></td>
                            <td><?= $tickets['started']; ?></td>
                            <td><?= $tickets['closed']; ?></td>
                        </tr>
<?php
                    } else {
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