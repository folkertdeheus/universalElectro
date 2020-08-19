<?php

/**
 * This page contains the english navigation bar in the webshop
 */

$productCategories = $q->allCategories();

echo '<div class="webshop_navbar">';

foreach($productCategories as $categoryKey => $categoryValue) {

    echo '<a href="index.php?page=1&cat='.$categoryValue['id'].'">'.$categoryValue['nl_name'].'</a>';

}

echo '</div> <!-- webshop_navbar -->';