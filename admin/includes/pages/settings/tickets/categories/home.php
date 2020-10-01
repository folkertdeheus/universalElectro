<?php

/**
 * This file contains the tickets categories management
 */

// Check if user is logged in when accessing this file
if (login()) {

?>
    <div class="content">

        <div class="toolbar">
            <a href="index.php?page=4&action=4&cat=1&sub=1">Add category</a>
            <a href="index.php?page=4&action=4&cat=2">Statusses</a>
            <a href="index.php?page=1&action=2">Tickets</a>
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count ticket categories in table
            if ($q->countTicketCategories() > 0) {

                // Get customers
                $categories = $q->getTicketCategories();
?>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Notification</th>
                        <th>Email</th>
                        <th class="icon"></th>
                        <th class="icon"></th>
                    </tr>
<?php
                    // Loop through ticket categories
                    foreach($categories as $catKey => $catValue) {

                        // Set notification value for displaying in table
                        $notification = "No";
                        
                        if ($catValue['notification'] == 1) {
                            $notification = "Yes";
                        }
?>
                        <tr>
                            <td><?= $catValue['name']; ?></td>
                            <td><?= $notification; ?></td>
                            <td><?= $catValue['email']; ?></td>
                            <td class="icon"><a href="index.php?page=4&action=4&cat=1&sub=2&id=<?= $catValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                            <td class="icon"><a href="index.php?page=4&action=4&cat=1&sub=3&id=<?= $catValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                        </tr>
<?php
                    }
?>
                </table>
<?php
            } else {
                echo 'No ticket categories';
            }
?>
        </div> <!-- table -->

    </div> <!-- content -->
<?php

}