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
            //        if ($q->countOrdersByCustomer($_SESSION['webuser']) > 0) {
                        
            //        } else {
                        echo $language['en_account_noorders'];
            //        }
?>
            </div> <!-- accountdetails -->

            <div class="accountdetails">
                <div class="title">
                    Tickets
                </div> <!-- title -->
<?php
                    if ($q->countTicketsByCustomer($_SESSION['webuser']) > 0) {
                    
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
                    //if ($q->countOrdersByCustomer($_SESSION['webuser']) > 0) {
                        
                    //} else {
                        echo $language['nl_account_noorders'];
                    //}
?>
            </div> <!-- accountdetails -->

            <div class="accountdetails">
                <div class="title">
                    Tickets
                </div> <!-- title -->
<?php
                    if ($q->countTicketsByCustomer($_SESSION['webuser']) > 0) {
                    
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