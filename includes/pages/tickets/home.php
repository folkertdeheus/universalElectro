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
        $tickets = $q->getTicketsByCustomer($_SESSION['webuser']);
    }

?>
    <main id="mainEnglish">

        <div class="tickets">
            <div class="title">
                <?= $language['en_tickets_tickets']; ?>
            </div>

            <div class="toolbar">
                <a href="index.php?page=3&action=1&sub=1"><?= $language['en_tickets_newticket']; ?></a>
            </div> <!-- toolbar -->

            <div class="ticket_content">
<?php
            if ($countTickets > 0) {

                // Loop through tickets
                foreach ($tickets as $ticketKey => $ticketValue) {

                    $status = $q->getTicketStatus($ticketValue['status']);
                    $category = $q->getTicketCategory($ticketValue['category']);

                    switch($ticketValue['priority']) {
                        case '1':
                            $priority = $language['en_tickets_priolow'];
                            break;
                        case '2':
                            $priority = $language['en_tickets_priomed'];
                            break;
                        case '3':
                            $priority = $language['en_tickets_priohigh'];
                            break;
                        case '4':
                            $priority = $language['en_tickets_priocrit'];
                            break;
                        default:
                            $priority = $language['en_tickets_priomed'];
                    }
?>
                    <div class="ticketsummary">
                        <a href="index.php?page=3&action=1&sub=2&id=<?= $ticketValue['id']; ?>">
                            <div class="ticketsummary_subject">
                                <?= $ticketValue['subject']; ?>
                            </div> <!-- ticketsummary_subject -->

                            <div class="ticketsummary_details">
                                <div class="ticketstatus" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(255, 255, 255, 0) 80%">
                                    <?= $status['en_web_name']; ?>
                                </div> <!-- ticketstatus -->

                                <div class="ticketdetail">
                                    <span><?= $language['en_tickets_started']; ?></span>
                                    <?= $ticketValue['started']; ?>
                                </div> <!-- ticketdetail -->

                                <div class="ticketdetail">
                                    <span><?= $language['en_tickets_category']; ?></span>
                                    <?= $category['name']; ?>
                                </div> <!-- ticketdetail -->

                                <div class="ticketdetail">
                                    <span><?= $language['en_tickets_priority']; ?></span>
                                    <?= $priority; ?>
                                </div> <!-- ticketdetail -->
                            </div> <!-- ticketsummary_details -->
                        </a>
                    </div> <!-- ticketsummary -->
<?php
                }

            } else {

                echo $language['en_tickets_notickets'];

            }
?>
            </div> <!-- ticket content -->
        </div> <!-- tickets -->
    </main>

    <main id="mainDutch">

        <div class="tickets">
            <div class="title">
                <?= $language['nl_tickets_tickets']; ?>
            </div>

            <div class="toolbar">
                <a href="index.php?page=3&action=1&sub=1"><?= $language['nl_tickets_newticket']; ?></a>
            </div> <!-- toolbar -->

            <div class="ticket_content">
<?php
            if ($countTickets > 0) {

                // Loop through tickets
                foreach ($tickets as $ticketKey => $ticketValue) {

                    $status = $q->getTicketStatus($ticketValue['status']);
                    $category = $q->getTicketCategory($ticketValue['category']);

                    switch($ticketValue['priority']) {
                        case '1':
                            $priority = $language['nl_tickets_priolow'];
                            break;
                        case '2':
                            $priority = $language['nl_tickets_priomed'];
                            break;
                        case '3':
                            $priority = $language['nl_tickets_priohigh'];
                            break;
                        case '4':
                            $priority = $language['nl_tickets_priocrit'];
                            break;
                        default:
                            $priority = $language['nl_tickets_priomed'];
                    }
?>
                    <div class="ticketsummary">
                        <a href="index.php?page=3&action=1&sub=2&id=<?= $ticketValue['id']; ?>">
                            <div class="ticketsummary_subject">
                                <?= $ticketValue['subject']; ?>
                            </div> <!-- ticketsummary_subject -->

                            <div class="ticketsummary_details">
                                <div class="ticketstatus" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(255, 255, 255, 0) 80%">
                                    <?= $status['nl_web_name']; ?>
                                </div> <!-- ticketstatus -->

                                <div class="ticketdetail">
                                    <span><?= $language['nl_tickets_started']; ?></span>
                                    <?= $ticketValue['started']; ?>
                                </div> <!-- ticketdetail -->

                                <div class="ticketdetail">
                                    <span><?= $language['nl_tickets_category']; ?></span>
                                    <?= $category['name']; ?>
                                </div> <!-- ticketdetail -->

                                <div class="ticketdetail">
                                    <span><?= $language['nl_tickets_priority']; ?></span>
                                    <?= $priority; ?>
                                </div> <!-- ticketdetail -->
                            </div> <!-- ticketsummary_details -->
                        </a>
                    </div> <!-- ticketsummary -->
<?php
                }

            } else {

                echo $language['nl_tickets_notickets'];

            }
?>
            </div> <!-- ticket content -->
        </div> <!-- tickets -->
    </main>

<?php

} else {
    // Display login message if user is not logged in
    require_once('includes/pages/contact/login.php');
}