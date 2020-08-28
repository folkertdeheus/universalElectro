<?php

/**
 * This page contains the delete message form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get contact
    $contact = $q->getContact($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete message "<?= $contact['subject']; ?> from <?= $contact['name']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=1&action=3&delete=<?= $contact['id']; ?>">Yes</a>
            <a href="index.php?page=1&action=3">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}