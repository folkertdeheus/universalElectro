<?php

/**
 * This file contains the tickets statusses management
 */

// Check if user is logged in when accessing this file
if (login()) {

?>
    <div class="content">

        <div class="toolbar">
            <a href="index.php?page=4&action=4&cat=2&sub=1">Add status</a>
            <a href="index.php?page=4&action=4&cat=1">Category</a>
            <a href="index.php?page=1&action=2">Tickets</a>
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count ticket categories in table
            if ($q->countTicketStatusses() > 0) {

                // Get customers
                $status = $q->getTicketStatusses();
?>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Color</th>
                        <th class="icon"></th>
                        <th class="icon"></th>
                    </tr>
<?php
                    foreach($status as $statusKey => $statusValue) {
?>
                        <tr>
                            <td><?= $statusValue['name']; ?></td>
                            <td><span style="color: <?= $statusValue['color']; ?>;"><?= $statusValue['color']; ?></span></td>
                            <td class="icon"><a href="index.php?page=4&action=4&cat=2&sub=2&id=<?= $statusValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                            <td class="icon"><a href="index.php?page=4&action=4&cat=2&sub=3&id=<?= $statusValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                        </tr>
<?php
                    }
?>
                </table>
<?php
            } else {
                echo 'No ticket statusses';
            }
?>
        </div> <!-- table -->

    </div> <!-- content -->
<?php

}