<?php

/**
 * This page contains the delete ticket category form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get ticket category
    $ticketCat = $q->getTicketCategory($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete "<?= $ticketCat['name']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=4&action=4&cat=1&delete=<?= $ticketCat['id']; ?>">Yes</a>
            <a href="index.php?page=4&action=4&cat=1">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}