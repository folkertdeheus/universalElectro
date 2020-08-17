<?php

/**
 * This file contains the add category form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>

    <div class="content">
        <form method="post" action="index.php?page=2&action=4">
            <input type="text" id="nl_name" name="nl_name" placeholder="Dutch name" required onchange="addcategory('nl_name')" />
            <textarea id="nl_description" name="nl_description" placeholder="Dutch description"></textarea>
            <input type="text" id="en_name" name="en_name" placeholder="English name" required onchange="addcategory('en_name')" />
            <textarea id="en_description" name="en_description" placeholder="English description"></textarea>
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="addCategory" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->
    </div> <!-- content -->

<?php

}