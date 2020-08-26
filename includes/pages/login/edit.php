<?php
    /**
     * This page contains the edit account form
     * It's the same as the account page, but the account info is a form and the order+tickets is greyed out
     */

    // Check if user is logged in
    if (login()) {

?>

<main id="mainEnglish">
    <div class="mainContent">
        <div class="mainLeft">
            <form method="post" action="index.php?page=2">
        
                <div class="accountdetails">        
                    <div class="title">
                        Basic information
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname">Firstname</td>
                            <td><input type="text" name="firstname" id="firstname" placeholder="Firstname" value="<?= $customer['firstname']; ?>" onchange="editAccount('firstname')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Insertion</td>
                            <td><input type="text" name="insertion" id="insertion" placeholder="Insertion" value="<?= $customer['insertion']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Lastname</td>
                            <td><input type="text" name="lastname" id="lastname" placeholder="Lastname" value="<?= $customer['lastname']; ?>" onchange="editAccount('lastname')" required /></td>
                        <tr>
                            <td class="tdname">Email</td>
                            <td><input type="text" name="email" id="email" placeholder="Email" value="<?= $customer['email']; ?>" onchange="editAccount('email')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Phone</td>
                            <td><input type="text" name="phone" id="phone" placeholder="Phone" value="<?= $customer['phone']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Company</td>
                            <td><input type="text" name="company" id="company" placeholder="Company name" value="<?= $customer['company_name']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Tax number</td>
                            <td><input type="text" name="taxnumber" id="taxnumber" placeholder="Tax number" value="<?= $customer['taxnumber']; ?>" /></td>
                        </tr>
                    </table>
                </div> <!-- accountdetails -->

                <div class="accountdetails">
                    <div class="title">
                        Shipping adress
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname">Street</td>
                            <td><input type="text" name="shipping_street" id="shipping_street" placeholder="Street" value="<?= $customer['shipping_street']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Housenumber</td>
                            <td><input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="Housenumber" value="<?= $customer['shipping_housenumber']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Postal code</td>
                            <td><input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="Postal code" value="<?= $customer['shipping_postalcode']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">City</td>
                            <td><input type="text" name="shipping_city" id="shipping_city" placeholder="City" value="<?= $customer['shipping_city']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Provence</td>
                            <td><input type="text" name="shipping_provence" id="shipping_provence" placeholder="Provence" value="<?= $customer['shipping_provence']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Country</td>
                            <td><input type="text" name="shipping_country" id="shipping_country" placeholder="Country" value="<?= $customer['shipping_country']; ?>" /></td>
                        </tr>
                    </table>
                </div> <!-- acountdetails -->

                <div class="accountdetails">
                    <div class="title">
                        Billing adress
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname">Street</td>
                            <td><input type="text" name="billing_street" id="billing_street" placeholder="Street" value="<?= $customer['billing_street']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Housenumber</td>
                            <td><input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="Housenumber" value="<?= $customer['billing_housenumber']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Postal code</td>
                            <td><input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="Postal code" value="<?= $customer['billing_postalcode']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">City</td>
                            <td><input type="text" name="billing_city" id="billing_city" placeholder="City" value="<?= $customer['billing_city']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Provence</td>
                            <td><input type="text" name="billing_provence" id="billing_provence" placeholder="Provence" value="<?= $customer['billing_provence']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname">Country</td>
                            <td><input type="text" name="billing_country" id="billing_country" placeholder="Country" value="<?= $customer['billing_country']; ?>" /></td>
                        </tr>
                    </table>

                    <input type="submit" value="Save" />
                    <input type="hidden" name="form" value="editCustomer" />
                </div> <!-- accountdetails -->

            </form>
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails_grey">
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

            <div class="accountdetails_grey">
                <div class="title">
                    Tickets
                </div> <!-- title -->
<?php
                    if ($q->countTicketsByCustomer($_SESSION['webuser']) > 0) {
                    } else {
                        echo 'No tickets';
                    }
?>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<main id="mainDutch">
</main>

<?php

    }