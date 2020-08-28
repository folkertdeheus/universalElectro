<?php

/**
 * This file contains the edit ticket category form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get ticket category information
    $ticketCat = $q->getTicketCategory($_GET['id']);

    $notiCheck = null;
    if ($ticketCat['notification'] == 1) {
        $notiCheck = ' checked ';
    }
?>

    <div class="content settings">
        <form method="post" action="index.php?page=4&action=4&cat=1">
            <input type="text" name="name" id="name" placeholder="Name" value="<?= $ticketCat['name']; ?>" />
            <div class="check_set">
                <span class="check_text">Notifications on new ticket</span>
                <input type="checkbox" name="notification" id="notification" value="1" <?= $notiCheck; ?> />
                <label for="notification"></label>
            </div>
            <input type="text" name="email" id="email" placeholder="Email" value="<?= $ticketCat['email']; ?>" />
            <input type="hidden" name="form" value="editTicketCategory" />
            <input type="hidden" name="id" value="<?= $ticketCat['id']; ?>" />
            <input type="submit" value="Submit" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}