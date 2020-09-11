<?php

/**
 * This page contains the quotation review page
 */

// Get quotation from cookie
$cart = $q->getQuotationByIdAndCustomer($_GET['id'], $_SESSION['webuser']);

// Get products in cart
$products = $q->getQuotationProducts($cart['id']);

// Get account
$account = $q->getCustomer($_SESSION['webuser']);

// Only continue when a user is logged in
if (login()) {

?>

<main id="mainEnglish">

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
</main>

<main id="mainDutch">

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
</main>

<?php
    }