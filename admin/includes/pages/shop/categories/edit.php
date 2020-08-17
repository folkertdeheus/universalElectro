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
            <input type="text" id="nl_name" name="nl_name" placeholder="Dutch name" required onchange="editcategory('nl_name')" value="<?= $category['nl_name']; ?>" />
            <textarea id="nl_description" name="nl_description" placeholder="Dutch description"><?= $category['nl_description']; ?></textarea>
            <input type="text" id="en_name" name="en_name" placeholder="English name" required onchange="editcategory('en_name')" value="<?= $category['en_name']; ?>" />
            <textarea id="en_description" name="en_description" placeholder="English description"><?= $category['en_description']; ?></textarea>
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="editCategory" />
            <input type="hidden" name="id" value="<?= $category['id']; ?>" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->
    </div> <!-- content -->

<?php

}