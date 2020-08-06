<?php

/**
 * This page contains the delete user form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get user
    $user = $q->getUserById($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete "<?= $user['username']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=4&action=1&delete=<?= $user['id']; ?>">Yes</a>
            <a href="index.php?page=4&action=1">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}