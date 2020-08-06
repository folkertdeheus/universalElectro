<?php

/**
 * This page contains the delete brand form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get brand
    $brand = $q->getBrandById($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete "<?= $brand['name']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=2&action=3&delete=<?= $brand['id']; ?>">Yes</a>
            <a href="index.php?page=2&action=3">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}