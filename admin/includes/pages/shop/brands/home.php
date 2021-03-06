<?php

/**
 * This file contains the brands management
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>
    <div class="content">

        <div class="toolbar">
            <a href="index.php?page=2&action=3&sub=1">Add brand</a>
            <a href="index.php?page=2&action=1">Products</a>
            <a href="index.php?page=2&action=4">Categories</a>
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count brands in table
            if($q->countBrands() > 0) {

                // Get all brands
                $brands = $q->allBrands();
?>
                <table id="paginate">
                    <tr>
                        <td>Name</td>
                        <td>Image</td>
                        <td>Description</td>
                        <td>Website</td>
                        <td class="icon">&nbsp;</td>
                        <td class="icon">&nbsp;</td>
                    </tr>
<?php
                    // Loop through brands
                    foreach($brands as $brandKey => $brandValue) {
?>
                        <tr id="row<?= $brandKey+1; ?>">
                            <td><?= $brandValue['name']; ?></td>
                            <td>
<?php
                                if (isset($brandValue['image']) && $brandValue != null) {
                                    echo '<img src="'.$brandValue['image'].'" alt="logo preview" />';
                                }
?>
                            </td>
                            <td><?= $brandValue['description']; ?></td>
                            <td><?= $brandValue['website']; ?></td>
                            <td class="icon"><a href="index.php?page=2&action=3&sub=2&id=<?= $brandValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                            <td class="icon"><a href="index.php?page=2&action=3&sub=3&id=<?= $brandValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                        </tr>
<?php
                    }
?>
                </table>

                <div class="pagebuttons" id="pagebuttons">
                </div> <!-- pagebuttons -->
<?php
            } else {

                // No brands found
                echo 'No brands';
            }
?>
        </div> <!-- table -->
    </div> <!-- content -->

<?php

}