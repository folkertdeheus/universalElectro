<?php

/**
 * This file contains the view and reply page of tickets
 */

// Check if the user is logged in
if (login()) {

    // Get ticket information
    $ticket = $q->getCMSTicket($_GET['id']);
    $messages = $q->getTicketMessagesByTicket($ticket['id']);
    $category = $q->getTicketCategory($ticket['category']);
    $status = $q->getTicketStatus($ticket['status']);

    // Get categories information for form
    $categories = $q->getTicketCategories();

    // Get statuses
    $statuses = $q->getTicketStatusses();

    switch($ticket['priority']) {
        case '1':
            $priority = 'Low';
            break;

        case '2':
            $priority = 'Normal';
            break;

        case '3':
            $priority = 'High';
            break;
        
        case '4':
            $priority = 'Critical';
            break;
    
        default:
            $priority = 'Normal';
    }
?>

    <div class="content">
        <form method="post" action="index.php?page=1&action=2">
            <div class="ticket_toolbar">
                <div class="ticket_subject">
                    <?= $ticket['subject']; ?>
                </div> <!-- subject -->

                <div class="ticket_details">

                    <div class="ticket_status" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(35, 31, 32, 1) 80%">
<?php
                    if ($ticket['status'] == 2 || $ticket['status'] == 5) {

                        // If ticket is closed or solved, only display status
                        echo $status['name'];

                    } else {
?>
                        <span>Status</span>
                        <select name="status" required>
<?php
                            // Loop through statuses to display status options
                            foreach($statuses as $statusKey => $statusValue) {
?>
                                <option value="<?= $statusValue['id']; ?>" <?php if ($statusValue['id'] == $ticket['status']) { echo ' selected '; } ?> ><?= $statusValue['name']; ?></option>
<?php
                            }
?>
                        </select>
<?php
                    }
?>
                    </div> <!-- ticket_status -->

                    <div class="ticket_detail">
                        <span>Category</span>
<?php
                        if ($ticket['status'] == 2 || $ticket['status'] == 5) {

                            // If ticket is closed or solved, only display category
                            echo $category['name'];

                        } else {
?>
                            <select name="category" required>
<?php
                                // Loop through categories to display category options
                                foreach($categories as $catKey => $catValue) {
?>
                                    <option value="<?= $catValue['id']; ?>" <?php if ($catValue['id'] == $ticket['category']) { echo ' selected '; } ?> ><?= $catValue['name']; ?></option>
<?php
                                }
?>
                            </select>
<?php
                        }
?>
                    </div> <!-- ticket_detail -->

                    <div class="ticket_detail">
                        <span>Priority</span>
<?php
                        if ($ticket['status'] == 2 || $ticket['status'] == 5) {
                            // If ticket is closed or solved, only display status
                            echo $priority;
                        } else {
?>
                            <select name="priority" required>
                                <option value="1" <?php if ($ticket['priority'] == 1) { echo ' selected '; } ?>>Low</option>
                                <option value="2" <?php if ($ticket['priority'] == 2) { echo ' selected '; } ?>>Normal</option>
                                <option value="3" <?php if ($ticket['priority'] == 3) { echo ' selected '; } ?>>High</option>
                                <option value="4" <?php if ($ticket['priority'] == 4) { echo ' selected '; } ?>>Critical</option>
                            </select>
<?php
                        }
?>
                    </div> <!-- ticket_detail -->

                    <div class="ticket_detail">
                        <span>Started</span>
                        <?= $ticket['started']; ?>
                    </div> <!-- ticket_detail -->
                </div> <!-- ticket_details -->
            </div> <!-- ticket_toolbar -->

            <div class="ticket_reply">
<?php
                // Hide input if the ticket is closed
                if ($ticket['status'] != 2 && $ticket['status'] != 5) {
?>
                    <textarea name="message" placeholder="Message reply" required></textarea>
                    <input type="file" name="file" id="file" onchange="ticketreply('file')" />
                    <label for="file" id="filelabel">Add attachment</label>
                    <input type="submit" value="Send reply" />
<?php
                }
?>
                </div> <!-- ticket_reply -->

            <div class="ticket_messages">

<?php
                // Loop through all messages
                foreach($messages as $messageKey => $messageValue) {
    ?>
                    <div class="ticket_message">
                        <?= nl2br($messageValue['message']); ?>

                        <div class="ticket_footer">
                            <span>Attachment: <?php if (isset($messageValue['file'])) { echo '<a href="../'.$messageValue['file'].'">Go to file</a>'; } else { echo 'none'; } ?></span>
                            <span>Posted: <?= $messageValue['posted']; ?></span>
                        </div> <!-- ticket_footer -->
                    </div> <!-- ticket_message -->
<?php
                }
?>
            </div> <!-- ticket_messages -->
            <input type="hidden" name="form" value="ticketReply">
            <input type="hidden" name="ticket" value="<?= $ticket['id']; ?>" />
        </form>
    </div> <!-- content -->
<?php
}