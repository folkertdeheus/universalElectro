<?php

/**
 * This file contains the add ticket category form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>

    <div class="content settings">
        <form method="post" action="index.php?page=4&action=4&cat=1">
            <input type="text" name="name" id="name" placeholder="Name" />
            <div class="check_set">
                <span class="check_text">Notifications on new ticket</span>
                <input type="checkbox" name="notification" id="notification" value="1" />
                <label for="notification"></label>
            </div>
            <input type="text" name="email" id="email" placeholder="Email" />
            <input type="hidden" name="form" value="addTicketCategory" />
            <input type="submit" value="Submit" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}