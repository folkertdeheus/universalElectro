<?php

/**
 * This file contains the add brands form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>

    <div class="content">
        <form method="post" enctype="multipart/form-data" action="index.php?page=2&action=3">
            <input type="text" name="name" placeholder="Name" required />
            <label for="image">Image (max 2Mb):</label>
            <input type="file" id="image" name="image" placeholder="Image" />
            <input type="text" name="website" placeholder="Website" />
            <textarea name="description" placeholder="Description"></textarea>
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="addBrand" />
        </form>
    </div> <!-- content -->

    <div class="message" id="message">
    </div> <!-- message -->

<?php

}