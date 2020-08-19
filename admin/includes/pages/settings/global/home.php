<?php

/**
 * This file contains the global settings home page
 */

// Check if user is logged in when accessing this file
if (login()) {
?>

    <div class="menusettings">
        <div class="menublock">
            <a href="index.php?page=4&action=2&sub=1">Global settings</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=4&action=2&sub=2">Languages</a>
        </div> <!-- menublock -->
    </div> <!-- menubottom -->

<?php
}