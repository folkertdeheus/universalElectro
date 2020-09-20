<?php

/**
 * This file contains the english navigation bar in the webshop
 */

$productCategories = $q->allCategories();

echo '<div class="webshop_navbar">';

foreach($productCategories as $categoryKey => $categoryValue) {

    // Check if there are products in category
    if ($q->countProductsByCategory($categoryValue['id']) > 0) {

        echo '<a href="index.php?page=1&cat='.$categoryValue['id'].'">'.$categoryValue['en_name'].'</a>';
    
    }

}

echo '</div> <!-- webshop_navbar -->';