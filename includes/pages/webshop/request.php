<?php

/**
 * This page contains the quotation review page
 */

// Get quotation from cookie
$cart = $q->getLatestQuotationFromSession($_COOKIE['unele_shop']);

// Get products in cart
$products = $q->getQuotationProducts($cart['id']);

// Get account
$account = $q->getCustomer($_SESSION['webuser']);

?>

<main id="mainEnglish">

<?php
    // Only continue when a user is logged in
    if (login()) {
?>
        <div class="title">
            <?= $language['en_quote_check']; ?>
        </div>

        <div class="order">
            <div class="order_products">

                <table>
                    <tr>
                        <th class="cart_amount"><?= $language['en_quote_amount']; ?></th>
                        <th class="cart_product"><?= $language['en_quote_product']; ?></th>
                        <th class="cart_product"><?= $language['en_quote_brand']; ?></th>
                    </tr>
<?php
                    // Loop through quotation products
                    foreach($products as $productKey => $productValue) {

                        // Get product info
                        $product = $q->getProductById($productValue['product']);

                        // Get brand info
                        $brand = $q->getBrandById($product['brand']);
?>
                        <tr>
                            <td class="cart_amount"><?= $productValue['amount']; ?></td>
                            <td class="cart_product"><?= $product['name']; ?></td>
                            <td class="cart_product"><?= $brand['name']; ?></td>
                        </tr>
<?php
                    }
?>
                </table>
            </div> <!-- order_products -->
        </div> <!-- order -->

        <div class="contact">
            <div class="contact_left">
                <div class="title">
                    <?= $language['en_account_basic']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td><?= $language['en_account_name']; ?></td>
                        <td><?= $account['lastname'].', '.$account['firstname'].'  '.$account['insertion']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_email']; ?></td>
                        <td><?= $account['email']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_phone']; ?></td>
                        <td><?= $account['phone']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_company']; ?></td>
                        <td><?= $account['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_tax']; ?></td>
                        <td><?= $account['taxnumber']; ?></td>
                    </tr>
                </table>

                <div class="contact_message">
                    <a href="index.php?page=2"><?= $language['en_quote_account']; ?></a>
                    <a href="index.php?page=1&action=1"><?= $language['en_quote_edit']; ?></a>
                    <a class="cancelquotation" href="index.php?page=1&action=3"><?= $language['en_quote_cancel']; ?></a>
                    <a class="sendquotation" href="index.php?page=1&action=4"><?= $language['en_quote_send']; ?></a>
                </div> <!-- contact_message -->
            </div> <!-- contact_left -->

            <div class="contact_right">
                <div class="title">
                    <?= $language['en_account_shipping']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td><?= $language['en_account_adress']; ?></td>
                        <td><?= $account['shipping_street'].' '.$account['shipping_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_postalcode']; ?></td>
                        <td><?= $account['shipping_postalcode']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_city']; ?></td>
                        <td><?= $account['shipping_city']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_provence']; ?></td>
                        <td><?= $account['shipping_provence']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_country']; ?></td>
                        <td><?= $account['shipping_country']; ?></td>
                    </tr>
                </table>

                <div class="title">
                    <?= $language['en_account_billing']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td><?= $language['en_account_adress']; ?></td>
                        <td><?= $account['billing_street'].' '.$account['billing_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_postalcode']; ?></td>
                        <td><?= $account['billing_postalcode']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_city']; ?></td>
                        <td><?= $account['billing_city']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_provence']; ?></td>
                        <td><?= $account['billing_provence']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['en_account_country']; ?></td>
                        <td><?= $account['billing_country']; ?></td>
                    </tr>
                </table>
            </div> <!-- contact_right -->
        </div> <!-- contact -->
<?php
    } else {
?>

        <?= $language['en_quote_login']; ?>
        <div class="login">
            <form method="post" action="index.php?page=2">
                <input type="text" name="email" placeholder="<?= $language['en_login_email']; ?>" />
                <input type="password" name="password" placeholder="<?= $language['en_login_password']; ?>" />

                <input type="hidden" name="form" value="login" />
                <input type="submit" value="<?= $language['en_login_login']; ?>" />
            </form>

            <a href="index.php?page=2&action=1"><?= $language['en_login_createaccount']; ?></a>
        </div> <!-- login -->
        
<?php
    }
?>

</main>

<main id="mainDutch">

<?php
    // Only continue when a user is logged in
    if (login()) {
?>
        <div class="title">
            <?= $language['nl_quote_check']; ?>
        </div>

        <div class="order">
            <div class="order_products">

                <table>
                    <tr>
                        <th class="cart_amount"><?= $language['nl_quote_amount']; ?></th>
                        <th class="cart_product"><?= $language['nl_quote_product']; ?></th>
                        <th class="cart_product"><?= $language['nl_quote_brand']; ?></th>
                    </tr>
<?php
                    // Loop through quotation products
                    foreach($products as $productKey => $productValue) {

                        // Get product info
                        $product = $q->getProductById($productValue['product']);

                        // Get brand info
                        $brand = $q->getBrandById($product['brand']);
?>
                        <tr>
                            <td class="cart_amount"><?= $productValue['amount']; ?></td>
                            <td class="cart_product"><?= $product['name']; ?></td>
                            <td class="cart_product"><?= $brand['name']; ?></td>
                        </tr>
<?php
                    }
?>
                </table>
            </div> <!-- order_products -->
        </div> <!-- order -->

        <div class="contact">
            <div class="contact_left">
                <div class="title">
                    <?= $language['nl_account_basic']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td><?= $language['nl_account_name']; ?></td>
                        <td><?= $account['lastname'].', '.$account['firstname'].'  '.$account['insertion']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_email']; ?></td>
                        <td><?= $account['email']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_phone']; ?></td>
                        <td><?= $account['phone']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_company']; ?></td>
                        <td><?= $account['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_tax']; ?></td>
                        <td><?= $account['taxnumber']; ?></td>
                    </tr>
                </table>

                <div class="contact_message">
                    <a href="index.php?page=2"><?= $language['nl_quote_account']; ?></a>
                    <a href="index.php?page=1&action=1"><?= $language['nl_quote_edit']; ?></a>
                    <a class="cancelquotation" href="index.php?page=1&action=3"><?= $language['nl_quote_cancel']; ?></a>
                    <a class="sendquotation" href="index.php?page=1&action=4"><?= $language['nl_quote_send']; ?></a>
                </div> <!-- contact_message -->
            </div> <!-- contact_left -->

            <div class="contact_right">
                <div class="title">
                    <?= $language['nl_account_shipping']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td><?= $language['nl_account_adress']; ?></td>
                        <td><?= $account['shipping_street'].' '.$account['shipping_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_postalcode']; ?></td>
                        <td><?= $account['shipping_postalcode']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_city']; ?></td>
                        <td><?= $account['shipping_city']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_provence']; ?></td>
                        <td><?= $account['shipping_provence']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_country']; ?></td>
                        <td><?= $account['shipping_country']; ?></td>
                    </tr>
                </table>

                <div class="title">
                    <?= $language['nl_account_billing']; ?>
                </div> <!-- title -->

                <table>
                    <tr>
                        <td><?= $language['nl_account_adress']; ?></td>
                        <td><?= $account['billing_street'].' '.$account['billing_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_postalcode']; ?></td>
                        <td><?= $account['billing_postalcode']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_city']; ?></td>
                        <td><?= $account['billing_city']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_provence']; ?></td>
                        <td><?= $account['billing_provence']; ?>
                    </tr>
                    <tr>
                        <td><?= $language['nl_account_country']; ?></td>
                        <td><?= $account['billing_country']; ?></td>
                    </tr>
                </table>
            </div> <!-- contact_right -->
        </div> <!-- contact -->
<?php
    } else {
?>

        <?= $language['nl_quote_login']; ?>
        <div class="login">
            <form method="post" action="index.php?page=2">
                <input type="text" name="email" placeholder="<?= $language['nl_login_email']; ?>" />
                <input type="password" name="password" placeholder="<?= $language['nl_login_password']; ?>" />

                <input type="hidden" name="form" value="login" />
                <input type="submit" value="<?= $language['nl_login_login']; ?>" />
            </form>

            <a href="index.php?page=2&action=1"><?= $language['nl_login_createaccount']; ?></a>
        </div> <!-- login -->
        
<?php
    }
?>

</main>