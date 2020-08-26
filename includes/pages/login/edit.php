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
                        <?= $language['en_account_basic']; ?>
                    </div> <!-- title -->

                    <table>
                        <tr>
                            <td class="tdname"><?= $language['en_account_firstname']; ?></td>
                            <td><input type="text" name="firstname" id="firstname" placeholder="<?= $language['en_account_firstname']; ?>" value="<?= $customer['firstname']; ?>" onchange="editAccount('firstname')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_insertion']; ?></td>
                            <td><input type="text" name="insertion" id="insertion" placeholder="<?= $language['en_account_insertion']; ?>" value="<?= $customer['insertion']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_lastname']; ?></td>
                            <td><input type="text" name="lastname" id="lastname" placeholder="<?= $language['en_account_lastname']; ?>" value="<?= $customer['lastname']; ?>" onchange="editAccount('lastname')" required /></td>
                        <tr>
                            <td class="tdname"><?= $language['en_account_email']; ?></td>
                            <td><input type="text" name="email" id="email" placeholder="<?= $language['en_account_email']; ?>" value="<?= $customer['email']; ?>" onchange="editAccount('email')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_phone']; ?></td>
                            <td><input type="text" name="phone" id="phone" placeholder="<?= $language['en_account_phone']; ?>" value="<?= $customer['phone']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_company']; ?></td>
                            <td><input type="text" name="company" id="company" placeholder="<?= $language['en_account_company']; ?>" value="<?= $customer['company_name']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_tax']; ?></td>
                            <td><input type="text" name="taxnumber" id="taxnumber" placeholder="<?= $language['en_account_tax']; ?>" value="<?= $customer['taxnumber']; ?>" /></td>
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
                            <td><input type="text" name="shipping_street" id="shipping_street" placeholder="<?= $language['en_account_street']; ?>" value="<?= $customer['shipping_street']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_housenumber']; ?></td>
                            <td><input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="<?= $language['en_account_housenumber']; ?>" value="<?= $customer['shipping_housenumber']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                            <td><input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="<?= $language['en_account_postalcode']; ?>" value="<?= $customer['shipping_postalcode']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_city']; ?></td>
                            <td><input type="text" name="shipping_city" id="shipping_city" placeholder="<?= $language['en_account_city']; ?>" value="<?= $customer['shipping_city']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_provence']; ?></td>
                            <td><input type="text" name="shipping_provence" id="shipping_provence" placeholder="<?= $language['en_account_provence']; ?>" value="<?= $customer['shipping_provence']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_country']; ?></td>
                            <td><input type="text" name="shipping_country" id="shipping_country" placeholder="<?= $language['en_account_country']; ?>" value="<?= $customer['shipping_country']; ?>" /></td>
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
                            <td><input type="text" name="billing_street" id="billing_street" placeholder="<?= $language['en_account_street']; ?>" value="<?= $customer['billing_street']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_housenumber']; ?></td>
                            <td><input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="<?= $language['en_account_housenumber']; ?>" value="<?= $customer['billing_housenumber']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_postalcode']; ?></td>
                            <td><input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="<?= $language['en_account_postalcode']; ?>" value="<?= $customer['billing_postalcode']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_city']; ?></td>
                            <td><input type="text" name="billing_city" id="billing_city" placeholder="<?= $language['en_account_city']; ?>" value="<?= $customer['billing_city']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_provence']; ?></td>
                            <td><input type="text" name="billing_provence" id="billing_provence" placeholder="<?= $language['en_account_provence']; ?>" value="<?= $customer['billing_provence']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['en_account_country']; ?></td>
                            <td><input type="text" name="billing_country" id="billing_country" placeholder="<?= $language['en_account_country']; ?>" value="<?= $customer['billing_country']; ?>" /></td>
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
                    if ($q->countOrdersByCustomer($_SESSION['webuser']) > 0) {
                        
                    } else {
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
                            <td><input type="text" name="firstname" id="firstname" placeholder="<?= $language['nl_account_firstname']; ?>" value="<?= $customer['firstname']; ?>" onchange="editAccount('firstname')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_insertion']; ?></td>
                            <td><input type="text" name="insertion" id="insertion" placeholder="<?= $language['nl_account_insertion']; ?>" value="<?= $customer['insertion']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_lastname']; ?></td>
                            <td><input type="text" name="lastname" id="lastname" placeholder="<?= $language['nl_account_lastname']; ?>" value="<?= $customer['lastname']; ?>" onchange="editAccount('lastname')" required /></td>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_email']; ?></td>
                            <td><input type="text" name="email" id="email" placeholder="<?= $language['nl_account_email']; ?>" value="<?= $customer['email']; ?>" onchange="editAccount('email')" required /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_phone']; ?></td>
                            <td><input type="text" name="phone" id="phone" placeholder="<?= $language['nl_account_phone']; ?>" value="<?= $customer['phone']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_company']; ?></td>
                            <td><input type="text" name="company" id="company" placeholder="<?= $language['nl_account_company']; ?>" value="<?= $customer['company_name']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_tax']; ?></td>
                            <td><input type="text" name="taxnumber" id="taxnumber" placeholder="<?= $language['nl_account_tax']; ?>" value="<?= $customer['taxnumber']; ?>" /></td>
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
                            <td><input type="text" name="shipping_street" id="shipping_street" placeholder="<?= $language['nl_account_street']; ?>" value="<?= $customer['shipping_street']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_housenumber']; ?></td>
                            <td><input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="<?= $language['nl_account_housenumber']; ?>" value="<?= $customer['shipping_housenumber']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                            <td><input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="<?= $language['nl_account_postalcode']; ?>" value="<?= $customer['shipping_postalcode']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_city']; ?></td>
                            <td><input type="text" name="shipping_city" id="shipping_city" placeholder="<?= $language['nl_account_city']; ?>" value="<?= $customer['shipping_city']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                            <td><input type="text" name="shipping_provence" id="shipping_provence" placeholder="<?= $language['nl_account_provence']; ?>" value="<?= $customer['shipping_provence']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_country']; ?></td>
                            <td><input type="text" name="shipping_country" id="shipping_country" placeholder="<?= $language['nl_account_country']; ?>" value="<?= $customer['shipping_country']; ?>" /></td>
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
                            <td><input type="text" name="billing_street" id="billing_street" placeholder="<?= $language['nl_account_street']; ?>" value="<?= $customer['billing_street']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_housenumber']; ?></td>
                            <td><input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="<?= $language['nl_account_housenumber']; ?>" value="<?= $customer['billing_housenumber']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_postalcode']; ?></td>
                            <td><input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="<?= $language['nl_account_postalcode']; ?>" value="<?= $customer['billing_postalcode']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_city']; ?></td>
                            <td><input type="text" name="billing_city" id="billing_city" placeholder="<?= $language['nl_account_city']; ?>" value="<?= $customer['billing_city']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_provence']; ?></td>
                            <td><input type="text" name="billing_provence" id="billing_provence" placeholder="<?= $language['nl_account_provence']; ?>" value="<?= $customer['billing_provence']; ?>" /></td>
                        </tr>
                        <tr>
                            <td class="tdname"><?= $language['nl_account_country']; ?></td>
                            <td><input type="text" name="billing_country" id="billing_country" placeholder="<?= $language['nl_account_country']; ?>" value="<?= $customer['billing_country']; ?>" /></td>
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
                    if ($q->countOrdersByCustomer($_SESSION['webuser']) > 0) {
                        
                    } else {
                        echo $language['nl_account_noorders'];
                    }
?>
            </div> <!-- accountdetails -->

            <div class="accountdetails_grey">
                <div class="title">
                    <?= $language['nl_account_tickets']; ?>
                </div> <!-- title -->
<?php
                    if ($q->countTicketsByCustomer($_SESSION['webuser']) > 0) {
                    
                    } else {
                        echo $language['nl_account_notickets'];
                    }
?>
            </div> <!-- accountdetails -->
            
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<?php

    }