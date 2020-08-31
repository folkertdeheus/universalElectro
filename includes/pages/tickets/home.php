<?php

/**
 * This file contains the user ticket overview
 */

// Check if the user is logged in
if (login()) {

    // Count tickets from user
    $countTickets = $q->countTicketsByCustomer($_SESSION['webuser']);

    // Get tickets if there are any
    if ($countTickets > 0) {
        $tickets = getTicketsByCustomer($customer);
    }

?>
    <main id="mainEnglish">

        <div class="tickets">
            <div class="title">
                Tickets
            </div>

            <div class="toolbar">
                <a href="index.php?page=3&action=1&sub=1">Open new ticket</a>
            </div> <!-- toolbar -->

            <div class="ticket_content">
<?php
            if ($countTickets > 0) {
                print_r($tickets);
            } else {
                echo 'You have no submitted tickets';
            }
?>
            </div> <!-- ticket content -->
        </div> <!-- tickets -->
    </main>

    <main id="mainDutch">
    </main>

<?php

} else {
    // Display login message if user is not logged in
    require_once('includes/pages/contact/login.php');
}