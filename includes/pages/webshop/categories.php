<?php

/**
 * This file contains the categories overview 
 */

// Get all categories
$productCategories = $q->allCategories();

?>

<main id="mainEnglish">

<?php
    // Include navbar
    require_once('includes/pages/webshop/en_navbar.php');
?>

    <div class="webshop">
<?php
        foreach($productCategories as $categoryKey => $categoryValue) {
?>
            <a href="index.php?page=1&cat=<?= $categoryValue['id']; ?>">
                <div class="webshop_category">
                    <div class="webshop_image">
<?php
                        // Get first product in category with image
                        $products = $q->getProductByCategoryWithImage($categoryValue['id']);

                        // Set category image
                        echo setCategoryImage($products['images'], $categoryValue['en_name']);
?>
                    </div> <!-- webshop_image -->

                    <div class="webshop_title">
                        <?= $categoryValue['en_name']; ?>
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
        foreach($productCategories as $categoryKey => $categoryValue) {
?>
            <a href="index.php?page=1&cat=<?= $categoryValue['id']; ?>">
                <div class="webshop_category">
                <div class="webshop_image">
<?php
                        // Get first product in category with image
                        $products = $q->getProductByCategoryWithImage($categoryValue['id']);

                        // Set category image
                        echo setCategoryImage($products['images'], $categoryValue['nl_name']);
?>
                    </div> <!-- webshop_image -->

                    <div class="webshop_title">
                        <?= $categoryValue['nl_name']; ?>
                    </div> <!-- webshop_title -->
                </div> <!-- webshop_category -->
            </a>
<?php  
        }
?>

    </div> <!-- webshop -->
</main>