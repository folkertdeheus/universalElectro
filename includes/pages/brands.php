<?php

/**
 * This page contains the brand ribbon on the home page
 */

// Get all brands
$brands = $q->allBrandsWithLogo();

?>

<div class="brandribbon">

<?php

foreach($brands as $brandKey => $brandValue) {
    echo '<a href="http://'.$brandValue['website'].'" target="_blank"><img src="admin/'.$brandValue['image'].'" alt="'.$brandValue['name'].'" /></a>';
}

?>

</div> <!-- brandribbon -->