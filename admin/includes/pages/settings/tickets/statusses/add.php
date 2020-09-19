<?php

/**
 * This file contains the add ticket status form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>

    <div class="content settings">
        <form method="post" action="index.php?page=4&action=4&cat=2">
            <input type="text" name="name" id="name" placeholder="Name" />
            <input type="color" name="color" id="color" value="#a3e92f" />
            <input type="hidden" name="form" value="addTicketStatus" />
            <input type="submit" value="Submit" />
        </form>

    </div> <!-- content -->

<?php

}