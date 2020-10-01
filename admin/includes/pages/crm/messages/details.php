<?php

/**
 * This page contains the content inclusion of the messages part
 * The content is controlled by $_GET['sub']
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get message information
    $contact = $q->getContact($_GET['id']);

?>
    <div class="contact">
        <div class="contactinfo">
            <table>
                <tr>
                    <td>Name</td>
                    <td><?= $contact['name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $contact['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?= $contact['phone']; ?></td>
                </tr>
            </table>
        </div> <!-- contactinfo -->
        
        <div class="contactsubject">
            <?= $contact['subject']; ?>
        </div> <!-- contactsubject -->

        <div class="contactmessage">
            <?= $contact['message']; ?>
        </div> <!-- contactmessage -->

        <div class="contactlink">
<?php
            if(isset($contact['customer']) && $contact['customer'] != null && $contact['customer'] != 0) {

                // Display direcet link to customer
                echo '<a href="index.php?page=1&action=1&sub=2&id='.$contact['customer'].'">Go to customer</a>';
            
            } else {

                // Message sent with customer id unknown
                echo 'No customer found';
            }
?>
        </div> <!-- contactlink -->

    </div> <!-- content -->
<?php
}