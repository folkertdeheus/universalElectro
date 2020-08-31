<?php

/**
 * This page contains the delete ticket status form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get ticket status
    $status = $q->getTicketStatus($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete "<?= $status['name']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=4&action=4&cat=2&delete=<?= $status['id']; ?>">Yes</a>
            <a href="index.php?page=4&action=4&cat=2">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}