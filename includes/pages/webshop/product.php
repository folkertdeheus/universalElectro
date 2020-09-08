<?php

/**
 * This page contains the product detailed view
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
                    <td>Article number:</td>
                    <td><?= $product['articlenumber']; ?></td>
                </tr>
                <tr>
                    <td>Brand:</td>
                    <td><?= $q->getBrandById($product['brand'])['name']; ?></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><?= $q->getCategoryById($product['category'])['en_name']; ?></td>
                </tr>
                <tr>
                    <td>Condition:</td>
                    <td><?= $q->getConditionById($product['conditions'])['en_name']; ?></td>
                </tr>
            </table>

<?php
            if ($settings['webshop_show_prices_on_guest']) {
?>
                <span class="price">Price: &euro; <?= $product['price']; ?></span>
<?php
            }

            if ($settings['webshop_checkout_button']) {
?>
                <div class="checkout_button">
                    Add to cart
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
                    <td>Article number:</td>
                    <td><?= $product['articlenumber']; ?></td>
                </tr>
                <tr>
                    <td>Brand:</td>
                    <td><?= $q->getBrandById($product['brand'])['name']; ?></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><?= $q->getCategoryById($product['category'])['nl_name']; ?></td>
                </tr>
                <tr>
                    <td>Condition:</td>
                    <td><?= $q->getConditionById($product['conditions'])['nl_name']; ?></td>
                </tr>
            </table>

            <span class="price">Price: &euro; <?= $product['price']; ?></span>
        </div> <!-- product_details -->
    </div> <!-- product -->
</main>