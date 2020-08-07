<?php

/**
 * This file contains the add category form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>

    <div class="content">
        <form method="post" action="index.php?page=2&action=4">
            <input type="text" id="name" name="name" placeholder="Name" onchange="addcategory('name')" />
            <textarea id="description" name="description" placeholder="Description"></textarea>
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="addCategory" />
        </form>
    </div> <!-- content -->

<?php

}
