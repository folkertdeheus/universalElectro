<?php

/**
 * This file contains the tickets settings home page
 */

// Check if user is logged in when accessing this file
if (login()) {
?>

    <div class="menusettings">
        <div class="menublock">
            <a href="index.php?page=4&action=4&cat=1">Categories</a>
        </div> <!-- menublock -->

       <!-- <div class="menublock">
            <a href="index.php?page=4&action=4&cat=2">Statusses</a>
        </div> <!-- menublock -->

        <!--<div class="menublock">
            <a href="index.php?page=4&action=4&cat=3">Settings</a>
        </div> <!-- menublock -->
    </div> <!-- menubottom -->

<?php
}