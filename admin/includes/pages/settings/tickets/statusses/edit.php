<?php

/**
 * This file contains the edit ticket status form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get status information
    $status = $q->getTicketStatus($_GET['id']);
    
?>

    <div class="content settings">
        <form method="post" action="index.php?page=4&action=4&cat=2">
            <input type="text" name="name" id="name" placeholder="Name" value="<?= $status['name']; ?>" />
            <input type="color" name="color" id="color" value="<?= $status['color']; ?>" />
            <input type="hidden" name="form" value="editTicketStatus" />
            <input type="hidden" name="id" value="<?= $status['id']; ?>" />
            <input type="submit" value="Submit" />
        </form>

    </div> <!-- content -->

<?php

}