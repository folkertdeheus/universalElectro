<?php

/**
 * This file contains the delete customer form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get customer
    $customer = $q->getCustomer($_GET['id']);

    // Set iv for decryption
    $iv = $customer['iv'];
?>
    <div class="content">

        Are you sure you want to delete "<?= decrypt($customer['lastname'], $iv).', '.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv); ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=1&action=1&delete=<?= $customer['id']; ?>">Yes</a>
            <a href="index.php?page=1&action=1">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}