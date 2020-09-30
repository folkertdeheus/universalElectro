<?php

/**
 * This page contains the shopping cart for the webshop
 */

if (isset($_COOKIE['unele_shop']) && $_COOKIE['unele_shop'] != null) {

    if ($q->countOpenQuotationsFromSession($_COOKIE['unele_shop']) == 1) {
        // Get quotation from cookie
        $cart = $q->getLatestQuotationFromSession($_COOKIE['unele_shop']);

        // Check if item is removed from the quotation
        if (isset($_GET['delete']) && $_GET['delete'] != null) {

            // Set product id
            $productId = htmlentities($_GET['delete']);
            
            // Delete product from quotation
            if ($q->deleteQuotationProduct($productId, $cart['id']) > 0) {
            
                // Succes
                $q->insertLog('Quotation products', 'Delete', 'Deleted product '.$productId.' from quotation '.$cart['id']);
            
            } else {

                // Failed
                $q->insertLog('Quotation products', 'Delete', 'Product '.$productId.' not deleted from quotatiotion '.$cart['id']);
            }
        }

        // Get products in cart
        $products = $q->getQuotationProducts($cart['id']);

?>

        <main id="mainEnglish">
            <div class="title">
                <?= $language['en_quote_cart']; ?>
            </div>

            <div class="order">
                <div class="order_products">
                    <form method="post" action="index.php?page=1&action=1">
                        <table>
                            <tr>
                                <th class="cart_amount"><?= $language['en_quote_amount']; ?></th>
                                <th class="cart_product"><?= $language['en_quote_product']; ?></th>
                                <th class="cart_product"><?= $language['en_quote_brand']; ?></th>
                                <th class="cart_small"></th>
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
                                    <td class="cart_amount"><input type="number" name="<?= $productValue['product']; ?>" step=1 min=0 value="<?= $productValue['amount']; ?>" required /></td>
                                    <td class="cart_product"><?= $product['name']; ?></td>
                                    <td class="cart_product"><?= $brand['name']; ?></td>
                                    <td class="cart_small"><a href="index.php?page=1&action=1&delete=<?= $productValue['product']; ?>"><img src="includes/images/cross_red.png" alt="delete" /></a></td>
                                </tr>
<?php
                            }
?>
                            <tr>
                                <td colspan=4 class="cart_bottom">
                                    <input type="hidden" name="form" value="updatecart" />
                                    <input type="submit" value="Update cart" />
                                    <a href="index.php?page=1"><?= $language['en_quote_continue']; ?></a>
                                    <a href="index.php?page=1&action=2"><?= $language['en_quote_request']; ?></a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div> <!-- order_products --> 
            </div> <!-- order -->
        </main>

        <main id="mainDutch">
            <div class="title">
                <?= $language['nl_quote_cart']; ?>
            </div>

            <div class="order">
                <div class="order_products">
                    <form method="post" action="index.php?page=1&action=1">
                        <table>
                            <tr>
                                <th class="cart_amount"><?= $language['nl_quote_amount']; ?></th>
                                <th class="cart_product"><?= $language['nl_quote_product']; ?></th>
                                <th class="cart_product"><?= $language['nl_quote_brand']; ?></th>
                                <th class="cart_small"></th>
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
                                    <td class="cart_amount"><input type="number" name="<?= $productValue['product']; ?>" step=1 min=0 value="<?= $productValue['amount']; ?>" required /></td>
                                    <td class="cart_product"><?= $product['name']; ?></td>
                                    <td class="cart_product"><?= $brand['name']; ?></td>
                                    <td class="cart_small"><a href="index.php?page=1&action=1&delete=<?= $productValue['product']; ?>"><img src="includes/images/cross_red.png" alt="delete" /></a></td>
                                </tr>
<?php
                            }
?>
                            <tr>
                                <td colspan=4 class="cart_bottom">
                                    <input type="hidden" name="form" value="updatecart" />
                                    <input type="submit" value="Update cart" />
                                    <a href="index.php?page=1"><?= $language['nl_quote_continue']; ?></a>
                                    <a href="index.php?page=1&action=2"><?= $language['nl_quote_request']; ?></a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div> <!-- order_products --> 
            </div> <!-- order -->
        </main>

<?php

    } else {

?>

        <main id="mainEnglish">
            Shopping cart is empty
        </main>

        <main id="mainDutch">
            De winkelwagen is leeg
        </main>

<?php

    }

} else {

?>

    <main id="mainEnglish">
        Shopping cart is empty
    </main>

    <main id="mainDutch">
        De winkelwagen is leeg
    </main>

<?php

}