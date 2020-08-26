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
                    Basic information
                </div> <!-- title -->

                <table>
                    <tr>
                        <td class="tdname">Name</td>
                        <td><?= $customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Email</td>
                        <td><?= $customer['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Phone</td>
                        <td><?= $customer['phone']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Company</td>
                        <td><?= $customer['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Tax number</td>
                        <td><?= $customer['taxnumber']; ?></td>
                    </tr>
                </table>
            </div> <!-- accountdetails -->

            <div class="accountdetails">
                <div class="title">
                    Shipping adress
                </div> <!-- title -->

                <table>
                    <tr>
                        <td class="tdname">Adress</td>
                        <td><?= $customer['shipping_street'].' '.$customer['shipping_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Postal code</td>
                        <td><?= $customer['shipping_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">City</td>
                        <td><?= $customer['shipping_city']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Provence</td>
                        <td><?= $customer['shipping_provence']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Country</td>
                        <td><?= $customer['shipping_country']; ?></td>
                    </tr>
                </table>
            </div> <!-- acountdetails -->

            <div class="accountdetails">
                <div class="title">
                    Billing adress
                </div> <!-- title -->

                <table>
                    <tr>
                        <td class="tdname">Adress</td>
                        <td><?= $customer['billing_street'].' '.$customer['billing_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Postal code</td>
                        <td><?= $customer['billing_postalcode']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">City</td>
                        <td><?= $customer['billing_city']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Provence</td>
                        <td><?= $customer['billing_provence']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdname">Country</td>
                        <td><?= $customer['billing_country']; ?></td>
                    </tr>
                </table>

                <a href="index.php?page=2&action=2">Edit</a>
                <a href="index.php?page=2&action=3">Change password</a>
            </div> <!-- accountdetails -->
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails">
                <div class="title">
                    Order history
                </div> <!-- title -->

<?php
                    if ($q->countOrdersByCustomer($_SESSION['webuser']) > 0) {
                        echo 'No orders';
                    } else {
                        echo 'No orders';
                    }
?>
            </div> <!-- accountdetails -->

            <div class="accountdetails">
                <div class="title">
                    Tickets
                </div> <!-- title -->
<?php
                    if ($q->countTicketsByCustomer($_SESSION['webuser']) > 0) {
                    } else {
                        echo 'No tickets';
                    }
?>
                    <a href="index.php?page=3&action=1">New ticket</a>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<main id="mainDutch">
    blablba
</main>

<?php

    }