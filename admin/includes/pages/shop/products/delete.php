<?php

/**
 * This page contains the delete brand form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get brand
    $product = $q->getProductById($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete "<?= $product['name']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=2&action=1&delete=<?= $product['id']; ?>">Yes</a>
            <a href="index.php?page=2&action=1">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}