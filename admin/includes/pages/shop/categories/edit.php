<?php

/**
 * This file contains the edit category form
 */

// Check if user is logged in when accessing this file
if (login()) {

    $category = $q->getCategoryById($_GET['id']);
    
?>

    <div class="content">
        <form method="post" action="index.php?page=2&action=4">
            <input type="text" id="name" name="name" placeholder="Name" required onchange="editcategory('name')" value="<?= $category['name']; ?>" />
            <textarea id="description" name="description" placeholder="Description"><?= $category['description']; ?></textarea>
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="editCategory" />
            <input type="hidden" name="id" value="<?= $category['id']; ?>" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->
    </div> <!-- content -->

<?php

}