<?php

/**
 * This page contains the overview of the tickets
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get all tickets
    $tickets = $q->getTickets();
?>

    <div class="content">

<?php

        // Check if there are tickets to display
        if ($q->countTickets() > 0) {
        
            // Loop through tickets
            foreach($tickets as $ticketKey => $ticketValue) {

                // Get named values for status, category and priority
                $status = $q->getTicketStatus($ticketValue['status']);
                $category = $q->getTicketCategory($ticketValue['category']);
                $customer = $q->getCustomer($ticketValue['customer']);

                // Get last message from ticket
                $lastMessage = $q->getLastMessageFromTicket($ticketValue['id']);

                switch($ticketValue['priority']) {
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
                <div class="ticket<?php if ($ticketValue['priority'] == 4) { echo ' critical'; } ?>">
                    <a href="index.php?page=1&action=2&sub=1&id=<?= $ticketValue['id']; ?>">
                        <div class="subject">
                            <div class="customer">
                                <?= $customer['lastname'].', '.$customer['firstname'].' '.$customer['insertion']; ?>
                            </div> <!-- customer -->
                            <?= $ticketValue['subject']; ?>
                        </div> <!-- subject -->

                        <div class="details">
                            <div class="status" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(35, 31, 32, 1) 80%">
                                <?= $status['name']; ?>
                            </div> <!-- status -->

                            <div class="detail">
                                <span>Category</span>
                                <?= $category['name']; ?>
                            </div> <!-- detail -->

                            <div class="detail">
                                <span>Priority</span>
                                <?= $priority; ?>
                            </div> <!-- detail -->

                            <div class="detail">
                                <span>Posted</span>
                                <?= $lastMessage['posted']; ?>
                            </div> <!-- detail -->

                            <div class="detail">
                                <span>Started</span>
                                <?= $ticketValue['started']; ?>
                            </div> <!-- detail -->
                        </div> <!-- detail -->
                    </a>
                </div> <!-- ticket -->
<?php        
            }
    
        } else {

            echo 'No tickets';

        }
?>
    </div> <!-- content -->
<?php
}