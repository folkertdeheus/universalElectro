<?php

/**
 * This file contains the settings main page
 */

// Check if user is logged in when accessing this file
if (login()) {
?>

    <div class="menusettings">
        <div class="menublock">
            <a href="index.php?page=4&action=1">Users</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=4&action=4">Tickets</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=4&action=2">Global</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=4&action=3">Logs</a>
        </div> <!-- menublock -->
    </div> <!-- menubottom -->

<?php
}