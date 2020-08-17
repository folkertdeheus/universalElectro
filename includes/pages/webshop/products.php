<?php

/**
 * This page contains the products overview 
 */

// Get all products in category
$products = $q->getProductsByCategory($_GET['cat']);

?>

<main id="mainEnglish">
    <div class="webshop">
<?php
        foreach($products as $productKey => $productValue) {
?>
            <a href="index.php?page=1&cat=<?= $_GET['cat']; ?>&product=<?= $productValue['id']; ?>">
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
    <div class="webshop">
<?php
        foreach($products as $productKey => $productValue) {
?>
            <a href="index.php?page=1&cat=<?= $_GET['cat']; ?>&product=<?= $productValue['id']; ?>">
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