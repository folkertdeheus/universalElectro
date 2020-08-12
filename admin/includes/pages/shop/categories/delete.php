<?php

/**
 * This page contains the delete category form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get category
    $category = $q->getCategoryById($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete "<?= $category['name']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=2&action=4&delete=<?= $category['id']; ?>">Yes</a>
            <a href="index.php?page=2&action=4">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}