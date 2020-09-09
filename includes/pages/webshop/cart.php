<?php

/**
 * This page contains the shopping cart for the webshop
 */

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
        Shopping cart
    </div>

    <div class="order">
        <div class="order_products">
            <form method="post" action="index.php?page=1&action=1">
                <table>
                    <tr>
                        <th class="cart_amount">Amount</th>
                        <th class="cart_product">Product</th>
                        <th class="cart_product">Brand</th>
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
                            <a href="index.php?page=1">Continue shopping</a>
                            <a href="index.php?page=1&action=2">Request quotation</a>
                        </td>
                    </tr>
                </table>

                
            </form>
        </div> <!-- order_products --> 
    </div> <!-- order -->
</main>

<main id="mainDutch">
    <div class="title">
        Shopping cart
    </div>

    <div class="order">
        <div class="order_products">
            <form method="post" action="index.php?page=1&action=1">
                <table>
                    <tr>
                        <th class="cart_amount">Amount</th>
                        <th class="cart_product">Product</th>
                        <th class="cart_product">Brand</th>
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
                            <a href="index.php?page=1">Continue shopping</a>
                            <a href="index.php?page=1&action=2">Request quotation</a>
                        </td>
                    </tr>
                </table>

                
            </form>
        </div> <!-- order_products --> 
    </div> <!-- order -->
</main>