<?php

/**
 * This file contains the product detailed view
 */

// Get product information
$product = $q->getProductById($_GET['product']);

// Set accepted images types
$acceptedFileTypes = $acceptedImageTypes;

// Make array from json object in database
$images = json_decode($product['images']);

// Check if there is a proper image set, otherwise use default image
if (isset($product['images']) && $product['images'] != null && is_array($images) && count($images) > 0) {
    if (in_array(pathinfo($images[0], PATHINFO_EXTENSION), $acceptedFileTypes)) {

        // Remove navigation
        $image = str_replace('../', '', $images[0]);

    } else {

        // Default image
        $image = 'includes/images/default.png';
    }

} else {

    // Default image
    $image = 'includes/images/default.png';
}

?>

<main id="mainEnglish">

<?php
    // Include navbar
    require_once('includes/pages/webshop/en_navbar.php');
?>

    <div class="product">
        <div class="product_image">
            <img src="<?= $image; ?>" alt="<?= $product['name']; ?>" />
        </div> <!-- product_image -->

        <div class="product_details">
            <div class="title">
                <?= $product['name']; ?>
            </div> <!-- title -->

            <table>
                <tr>
                    <td><?= $language['en_product_description']; ?></td>
                    <td><?= $product['description_english']; ?></td>
                </tr>
            <?php
                // Hide articlenumber if not set
                if (isset($product['articlenumber']) && $product['articlenumber'] != null) {
?>
                    <tr>
                        <td>
                            <?= $language['en_product_articlenumber']; ?>:
                        </td>
                        <td><?= $product['articlenumber']; ?></td>
                    </tr>
<?php
                }
?>
                <tr>
                    <td><?= $language['en_product_brand']; ?>:</td>
                    <td><?= $q->getBrandById($product['brand'])['name']; ?></td>
                </tr>
                <tr>
                    <td><?= $language['en_product_category']; ?>:</td>
                    <td><?= $q->getCategoryById($product['category'])['en_name']; ?></td>
                </tr>
                <tr>
                    <td><?= $language['en_product_condition']; ?>:</td>
                    <td><?= $q->getConditionById($product['conditions'])['en_name']; ?></td>
                </tr>
            </table>

<?php
            // Check if price needs to be shown
            // Show prices if on guest is on, or on account is on while user is logged in
            if (
                $settings['webshop_show_prices_on_guest'] ||
                ($settings['webshop_show_prices_on_account'] && login())
            ) {
?>
                <span class="price"><?= $language['en_product_price']; ?>: &euro; <?= $product['price']; ?></span>
<?php
            }

            if ($settings['webshop_checkout_button']) {
?>
                <div class="checkout_button">
                    <form method="post" action="index.php?page=1&action=1">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>" />
                        <span>
                            <label for="amount"><?= $language['en_product_amount']; ?></label>
                            <input type="number" name="amount" id="amount" step="1" min="1" value="1" />
                        </span>
                        <input type="submit" value="<?= $language['en_product_addtocart']; ?>" />
                        <input type="hidden" name="form" value="addtocart" />
                    </form>
                </div> <!-- checkout_button -->
<?php
            }
?>
        </div> <!-- product_details -->
    </div> <!-- product -->

</main>

<main id="mainDutch">

<?php
    // Include navbar
    require_once('includes/pages/webshop/nl_navbar.php');
?>

<div class="product">
        <div class="product_image">
            <img src="<?= $image; ?>" alt="<?= $product['name']; ?>" />
        </div> <!-- product_image -->

        <div class="product_details">
            <div class="title">
                <?= $product['name']; ?>
            </div> <!-- title -->

            <table>
                <tr>
                    <td><?= $language['nl_product_description']; ?></td>
                    <td><?= $product['description_dutch']; ?></td>
                </tr>
<?php
                // Hide articlenumber if not set
                if (isset($product['articlenumber']) && $product['articlenumber'] != null) {
?>
                    <tr>
                        <td>
                            <?= $language['nl_product_articlenumber']; ?>:
                        </td>
                        <td><?= $product['articlenumber']; ?></td>
                    </tr>
<?php
                }
?>
                <tr>
                    <td><?= $language['nl_product_brand']; ?>:</td>
                    <td><?= $q->getBrandById($product['brand'])['name']; ?></td>
                </tr>
                <tr>
                    <td><?= $language['nl_product_category']; ?>:</td>
                    <td><?= $q->getCategoryById($product['category'])['nl_name']; ?></td>
                </tr>
                <tr>
                    <td><?= $language['nl_product_condition']; ?>:</td>
                    <td><?= $q->getConditionById($product['conditions'])['nl_name']; ?></td>
                </tr>
            </table>

<?php
            // Check if price needs to be shown
            // Show prices if on guest is on, or on account is on while user is logged in
            if (
                $settings['webshop_show_prices_on_guest'] ||
                ($settings['webshop_show_prices_on_account'] && login())
            ) {
?>
                <span class="price"><?= $language['nl_product_price']; ?>: &euro; <?= $product['price']; ?></span>
<?php
            }

            if ($settings['webshop_checkout_button']) {
?>
                <div class="checkout_button">
                    <form method="post" action="index.php?page=1&action=1">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>" />
                        <span>
                            <label for="amount"><?= $language['nl_product_amount']; ?></label>
                            <input type="number" name="amount" id="amount" step="1" min="1" value="1" />
                        </span>
                        <input type="submit" value="<?= $language['nl_product_addtocart']; ?>" />
                        <input type="hidden" name="form" value="addtocart" />
                    </form>
                </div> <!-- checkout_button -->
<?php
            }
?>
        </div> <!-- product_details -->
    </div> <!-- product -->
</main>