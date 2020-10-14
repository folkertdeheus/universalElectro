<?php

/**
 * This file contains the products overview 
 */

// Secure cat
$cat = htmlentities($_GET['cat']);

// Get all products in category
$products = $q->getProductsByCategory($cat);

?>

<main id="mainEnglish">

<?php
    // Include navbar
    require_once('includes/pages/webshop/en_navbar.php');
?>

    <div class="webshop">
<?php
        foreach($products as $productKey => $productValue) {
?>
            <a href="index.php?page=1&cat=<?= $cat; ?>&product=<?= $productValue['id']; ?>">
                <div class="webshop_category">
                    <div class="webshop_image">
<?php
                        // Set image if found, otherwise set default image
                        echo setCategoryImage($productValue['images'], $productValue['name']);
?>
                    </div> <!-- webshop_image -->

                    <div class="webshop_title">
                        <?= $productValue['name']; ?>
                    </div> <!-- webshop_title -->
                </div> <!-- webshop_category -->
            </a>
<?php  
        }
?>

    </div> <!-- webshop -->
</main>

<main id="mainDutch">

<?php
    // Include navbar
    require_once('includes/pages/webshop/nl_navbar.php');
?>

    <div class="webshop">
<?php
        foreach($products as $productKey => $productValue) {
?>
            <a href="index.php?page=1&cat=<?= $cat; ?>&product=<?= $productValue['id']; ?>">
                <div class="webshop_category">
                    <div class="webshop_image">
<?php
                        // Set image if found, otherwise set default image
                        echo setCategoryImage($productValue['images'], $productValue['name']);
?>
                    </div> <!-- webshop_image -->

                    <div class="webshop_title">
                        <?= $productValue['name']; ?>
                    </div> <!-- webshop_title -->
                </div> <!-- webshop_category -->
            </a>
<?php  
        }
?>

    </div> <!-- webshop -->
</main>