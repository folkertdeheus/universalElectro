<?php

/**
 * This page contains the crm menu of the CMS
 */

// Check if user is logged in when accessing this file
if (login()) {

?>
    <div class="menusettings">
        <div class="menublock">
            <a href="index.php?page=1&action=1">Customers</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=1&action=2">Tickets</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=1&action=3">Messages</a>
        </div> <!-- menublock -->
    </div> <!-- menubottom -->

<?php

}