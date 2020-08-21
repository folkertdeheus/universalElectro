<?php

/**
 * This page contains the delete customer form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get brand
    $customer = $q->getCustomer($_GET['id']);
?>
    <div class="content">

        Are you sure you want to delete "<?= $customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion']; ?>"?

        <div class="yesnobuttons">
            <a href="index.php?page=1&action=1&delete=<?= $customer['id']; ?>">Yes</a>
            <a href="index.php?page=1&action=1">No</a>
        </div> <!-- yesnobuttons -->

    </div> <!-- content -->
<?php

}