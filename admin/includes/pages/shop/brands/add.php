<?php

/**
 * This file contains the add brands form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>

    <div class="content">
        <form method="post" class="multi" enctype="multipart/form-data" action="index.php?page=2&action=3">

            <div class="content_left">
                <input type="text" id="name" name="name" placeholder="Name" required />
                <input type="text" id="website" name="website" placeholder="Website" />
                <textarea id="website" name="description" placeholder="Description"></textarea>
            </div> <!-- content_left -->

            <div class="content_right">
                <label for="image">Image (max 2Mb):</label>
                <input type="file" id="image" name="image" placeholder="Image" />
                <input type="submit" value="Submit" />
                <input type="hidden" name="form" value="addBrand" />
            <div> <!-- content_right -->
        </form>

    </div> <!-- content -->

<?php

}