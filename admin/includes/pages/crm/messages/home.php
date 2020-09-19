<?php

/**
 * This file contains the messages management
 */

// Check if user is logged in when accessing this file
if (login()) {

?>
    <div class="content">

        <div class="toolbar">
            <a href="index.php?page=1&action=1">Customers</a>
            <a href="index.php?page=1&action=2">Tickets</a>
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count customers in table
            if ($q->countContact() > 0) {

                // Get customers
                $contact = $q->allContact();
?>
                <table id="paginate">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th class="icon"></th>
                    </tr>
<?php
                    foreach($contact as $contactKey => $contactValue) {
?>
                        <tr id="row<?= $contactKey+1; ?>">
                            <td><?= $contactValue['name'] ?></td>
                            <td><?= $contactValue['email']; ?></td>
                            <td><?= $contactValue['phone']; ?></td>
                            <td><?= $contactValue['subject']; ?></td>
                            <td class="icon"><a href="index.php?page=1&action=3&sub=1&id=<?= $contactValue['id']; ?>"><img src="includes/images/details.png" alt="details" /></a></td>
                            <td class="icon"><a href="index.php?page=1&action=3&sub=2&id=<?= $contactValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                        </tr>
<?php
                    }
?>
                </table>

                <div class="pagebuttons" id="pagebuttons">
                </div> <!-- pagebuttons -->
<?php
            } else {
                echo 'No contact messages';
            }
?>
        </div> <!-- table -->

    </div> <!-- content -->
<?php

}