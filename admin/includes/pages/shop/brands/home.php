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
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count brands in table
            if($q->countBrands() > 0) {

                // Get all brands
                $brands = $q->allBrands();
?>
                <table>
                    <tr>
                        <td>Name</td>
                        <td>Image</td>
                        <td>Description</td>
                        <td>Website</td>
                        <td></td>
                        <td></td>
                    </tr>
<?php
                    foreach($brands as $brandKey => $brandValue) {
?>
                        <tr>
                            <td><?= $brandValue['name']; ?></td>
                            <td><?= $brandValue['image']; ?></td>
                            <td><?= $brandValue['description']; ?></td>
                            <td><?= $brandValue['website']; ?></td>
                            <td class="icon"><a href="index.php?page=2&action=3&sub=2&id=<?= $brandValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                            <td class="icon"><a href="index.php?page=2&action=3&sub=3&id=<?= $brandValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                        </tr>
<?php
                    }
?>
                </table>
<?php
            } else {
                echo 'No brands';
            }
?>
        </div> <!-- table -->
    </div> <!-- content -->

<?php

}