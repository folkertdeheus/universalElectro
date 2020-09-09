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
            Check quotation request
        </div>

        <div class="order">
            <div class="order_products">

                <table>
                    <tr>
                        <th class="cart_amount">Amount</th>
                        <th class="cart_product">Product</th>
                        <th class="cart_product">Brand</th>
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
                    Basic information
                </div> <!-- title -->

                <table>
                    <tr>
                        <td>Name</td>
                        <td><?= $account['lastname'].', '.$account['firstname'].'  '.$account['insertion']; ?>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $account['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?= $account['phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Company name</td>
                        <td><?= $account['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Tax number</td>
                        <td><?= $account['taxnumber']; ?></td>
                    </tr>
                </table>

                <div class="contact_message">
                    <a href="index.php?page=2">Account</a>
                    <a href="index.php?page=1&action=1">Edit quotation</a>
                    <a class="cancelquotation" href="index.php?page=1&action=3">Cancel quotation</a>
                    <a class="sendquotation" href="index.php?page=1&action=4">Send quotation request</a>
                </div> <!-- contact_message -->
            </div> <!-- contact_left -->

            <div class="contact_right">
                <div class="title">
                    Shipping information
                </div> <!-- title -->

                <table>
                    <tr>
                        <td>Adress</td>
                        <td><?= $account['shipping_street'].' '.$account['shipping_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= $account['shipping_postalcode']; ?>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= $account['shipping_city']; ?>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= $account['shipping_provence']; ?>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= $account['shipping_country']; ?></td>
                    </tr>
                </table>

                <div class="title">
                    Billing information
                </div> <!-- title -->

                <table>
                    <tr>
                        <td>Adress</td>
                        <td><?= $account['billing_street'].' '.$account['billing_housenumber']; ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= $account['billing_postalcode']; ?>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= $account['billing_city']; ?>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= $account['billing_provence']; ?>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= $account['billing_country']; ?></td>
                    </tr>
                </table>
            </div> <!-- contact_right -->
        </div> <!-- contact -->
<?php
    } else {
?>

        Please log in or create an account before sending the quotation request
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

    } else {
?>

        Log in of maak een account aan voor je een offerte aanvraag stuurt
        <div class="login">
            <form method="post" action="index.php?page=2">
                <input type="text" name="email" placeholder="<?= $language['nl_login_email']; ?>" />
                <input type="password" name="password" placeholder="<?= $language['nl_login_password']; ?>" />

                <input type="hidden" name="form" value="login" />
                <input type="submit" value="<?= $language['en_login_login']; ?>" />
            </form>

            <a href="index.php?page=2&action=1"><?= $language['nl_login_createaccount']; ?></a>
        </div> <!-- login -->

<?php
    }
?>

</main>