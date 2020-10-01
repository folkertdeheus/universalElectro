<?php

/**
 * This file contains the brands management
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>
    <div class="content">

        <div class="toolbar">
            <a href="index.php?page=2&action=4&sub=1">Add category</a>
            <a href="index.php?page=2&action=1">Products</a>
            <a href="index.php?page=2&action=3">Brands</a>
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count brands in table
            if($q->countCategories() > 0) {

                // Get all brands
                $categories = $q->allCategories();
?>
                <table id="paginate">
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td class="icon">&nbsp;</td>
                        <td class="icon">&nbsp;</td>
                    </tr>
<?php
                    // Loop through all categories
                    foreach($categories as $categoryKey => $categoryValue) {
?>
                        <tr id="row<?= $categoryKey+1; ?>">
                            <td><?= $categoryValue['nl_name']; ?></td>
                            <td><?= $categoryValue['nl_description']; ?></td>
                            <td class="icon"><a href="index.php?page=2&action=4&sub=2&id=<?= $categoryValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                            <td class="icon"><a href="index.php?page=2&action=4&sub=3&id=<?= $categoryValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                        </tr>
<?php
                    }
?>
                </table>

                <div class="pagebuttons" id="pagebuttons">
                </div> <!-- pagebuttons -->
<?php
            } else {

                // No categories found
                echo 'No categories';
            }
?>
        </div> <!-- table -->
    </div> <!-- content -->

<?php

}