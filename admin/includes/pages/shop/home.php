<?php

/**
 * This page contains the shop menu of the CMS
 */

// Check if user is logged in when accessing this file
if (login()) {

?>
    <div class="menusettings">
        <div class="menublock">
            <a href="index.php?page=2&action=1">Products</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=2&action=2">Orders</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=2&action=3">Brands</a>
        </div> <!-- menublock -->
    </div> <!-- menubottom -->

<?php

}