<?php

/**
 * This file contains the customers management
 */

// Check if user is logged in when accessing this file
if (login()) {

?>
    <div class="content">

        <div class="toolbar">
            <a href="index.php?page=1&action=1&sub=1">Add customer</a>
            <a href="index.php?page=1&action=2">Tickets</a>
            <a href="index.php?page=1&action=3">Messages</a>
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count customers in table
            if ($q->countCustomers() > 0) {

                // Get customers
                $customers = $q->allCustomers();
?>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th class="icon"></th>
                        <th class="icon"></th>
                        <th class="icon"></th>
                    </tr>
<?php
                    foreach($customers as $customerKey => $customerValue) {

                        // Set iv for decryption
                        $iv = $customerValue['iv'];
?>
                        <tr>
                            <td><?= decrypt($customerValue['lastname'], $iv).', '.decrypt($customerValue['firstname'], $iv).' '.decrypt($customerValue['insertion'], $iv); ?></td>
                            <td><?= decrypt($customerValue['email'], $iv); ?></td>
                            <td><?= decrypt($customerValue['company_name'], $iv); ?></td>
                            <td class="icon"><a href="index.php?page=1&action=1&sub=2&id=<?= $customerValue['id']; ?>"><img src="includes/images/details.png" alt="details" /></a></td>
                            <td class="icon"><a href="index.php?page=1&action=1&sub=3&id=<?= $customerValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                            <td class="icon"><a href="index.php?page=1&action=1&sub=4&id=<?= $customerValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                        </tr>
<?php
                    }
?>
                </table>
<?php
            } else {
                echo 'No customers';
            }
?>
        </div> <!-- table -->

    </div> <!-- content -->
<?php

}