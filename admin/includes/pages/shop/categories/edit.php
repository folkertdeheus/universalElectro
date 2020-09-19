<?php

/**
 * This file contains the edit category form
 */

// Check if user is logged in when accessing this file
if (login()) {

    $category = $q->getCategoryById($_GET['id']);
    
?>

    <div class="content">
        <form method="post" class="multi" action="index.php?page=2&action=4">

            <div class="content_left">
                <input type="text" id="nl_name" name="nl_name" placeholder="Dutch name" required value="<?= $category['nl_name']; ?>" />
                <textarea id="nl_description" name="nl_description" placeholder="Dutch description"><?= $category['nl_description']; ?></textarea>
                <input type="submit" value="Submit" />
                <input type="hidden" name="form" value="editCategory" />
                <input type="hidden" name="id" value="<?= $category['id']; ?>" />
            </div> <!-- content_left -->

            <div class="content_right">
                <input type="text" id="en_name" name="en_name" placeholder="English name" required value="<?= $category['en_name']; ?>" />
                <textarea id="en_description" name="en_description" placeholder="English description"><?= $category['en_description']; ?></textarea>
            </div> <!-- content_right -->
        </form>
        
    </div> <!-- content -->

<?php

}