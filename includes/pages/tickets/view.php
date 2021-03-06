<?php

/**
 * This page contains the view ticket page for the customer
 */

// Check if customer is logged in
if (login()) {

    // Get ticket information
    $ticket = $q->getTicket($_GET['id'], $_SESSION['webuser']);

    // Get messages of ticket
    $messages = $q->getTicketMessagesByTicket($ticket['id']);

    $status = $q->getTicketStatus($ticket['status']);
    $category = $q->getTicketCategory($ticket['category']);

?>

    <main id="mainEnglish">

<?php
        switch($ticket['priority']) {
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
        <form class="tickets" method="post" action="index.php?page=3&action=1">
            <div class="title">
                <?= $language['en_tickets_tickets']; ?>
            </div>

            <div class="toolbar">
                <a href="index.php?page=3&action=1"><?= $language['en_tickets_goback']; ?></a>
                <a href="index.php?page=3&action=1&sub=1"><?= $language['en_tickets_newticket']; ?></a>
<?php
                // Only display buttons when ticket is not closed or solved
                if ($ticket['status'] != 2 && $ticket['status'] != 5) {
?>
                    <a href="index.php?page=3&action=1&closed=<?= $_GET['id']; ?>"><?= $language['en_tickets_close']; ?></a>

                    <?= $language['en_tickets_attachment']; ?>:
                    <input type="file" name="file" id="file" onchange="ticketReply('file')" />
                    <label for="file" id="filelabel"><?= $language['en_tickets_upload']; ?></label>
<?php
                }
?>
            </div> <!-- toolbar -->

            <div class="ticket_content">
                <div class="ticketsummary">
                    <div class="ticketsummary_subject">
                        <?= $ticket['subject']; ?>
                    </div> <!-- ticketsummary_subject -->

                    <div class="ticketsummary_details">
                        <div class="ticketstatus" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(255, 255, 255, 0) 80%">
                            <?= $status['en_web_name']; ?>
                        </div> <!-- ticketstatus -->

                        <div class="ticketdetail">
                            <span><?= $language['en_tickets_started']; ?></span>
                            <?= $ticket['started']; ?>
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
                </div> <!-- ticketsummary -->

                <div class="ticketmessages">
<?php
                    // Only display message field when ticket is not closed or solved
                    if ($ticket['status'] != 2 && $ticket['status'] != 5) {
?>
                        <textarea name="message" placeholder="<?= $language['en_tickets_message']; ?>"></textarea>
                        <input type="hidden" name="form" value="ticketReply" />
                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
                        <input type="submit" value="<?= $language['en_tickets_submit']; ?>" />
<?php
                    }

                    foreach($messages as $messageKey => $messageValue) {
?>
                        <div class="ticketmessage">
<?php
                        // Check who posted message
                        if (isset($messageValue['customer']) && $messageValue['customer'] != null) {

                            // Display customer
                            $customer = $q->getCustomer($messageValue['customer']);
                            $iv = $customer['iv'];
                            echo '<span class="ticket_message_customer">'.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv).' '.decrypt($customer['lastname'], $iv).' said: </span>';
                        
                        } else {

                            // Display user
                            $user = $q->getUserById($messageValue['user']);
                            echo '<span class="ticket_message_user">'.$user['username'].' said: </span>';

                        }
?>
                            <div class="ticketmessage_text">
                                <?= nl2br($messageValue['message']); ?>
                            </div> <!-- ticketmessage_text -->

                            <div class="ticketmessage_details">
                                <span><?= $language['en_tickets_attachment']; ?>: <?php if (isset($messageValue['file'])) { echo '<a href="'.$messageValue['file'].'">'.$language['en_tickets_file'].'</a>'; } else { echo 'none'; } ?></span>
                                <span><?= $language['en_tickets_posted'].': '.$messageValue['posted']; ?></span>
                            </div> <!-- ticketmessage_details -->
                        </div> <!-- ticketmessage -->
<?php
                    }
?>
                </div> <!-- ticketmessages -->
            </div> <!-- ticket_content -->
        </form>

    </main>

    <main id="mainDutch">

<?php
        switch($ticket['priority']) {
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
        <form class="tickets" method="post" action="index.php?page=3&action=1">
            <div class="title">
                <?= $language['nl_tickets_tickets']; ?>
            </div>

            <div class="toolbar">
                <a href="index.php?page=3&action=1"><?= $language['nl_tickets_goback']; ?></a>
                <a href="index.php?page=3&action=1&sub=1"><?= $language['nl_tickets_newticket']; ?></a>
<?php
                // Only display buttons when ticket is not closed or solved
                if ($ticket['status'] != 2 && $ticket['status'] != 5) {
?>
                    <a href="index.php?page=3&action=1&closed=<?= $_GET['id']; ?>"><?= $language['nl_tickets_close']; ?></a>

                    <?= $language['nl_tickets_attachment']; ?>:
                    <input type="file" name="file" id="file" onchange="ticketReply('file')" />
                    <label for="file" id="filelabel"><?= $language['nl_tickets_upload']; ?></label>
<?php
                }
?>
            </div> <!-- toolbar -->

            <div class="ticket_content">
                <div class="ticketsummary">
                    <div class="ticketsummary_subject">
                        <?= $ticket['subject']; ?>
                    </div> <!-- ticketsummary_subject -->

                    <div class="ticketsummary_details">
                        <div class="ticketstatus" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(255, 255, 255, 0) 80%">
                            <?= $status['nl_web_name']; ?>
                        </div> <!-- ticketstatus -->

                        <div class="ticketdetail">
                            <span><?= $language['nl_tickets_started']; ?></span>
                            <?= $ticket['started']; ?>
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
                </div> <!-- ticketsummary -->

                <div class="ticketmessages">
<?php
                    // Only display message field when ticket is not closed or solved
                    if ($ticket['status'] != 2 && $ticket['status'] != 5) {
?>
                        <textarea name="message" placeholder="<?= $language['nl_tickets_message']; ?>"></textarea>
                        <input type="hidden" name="form" value="ticketReply" />
                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
                        <input type="submit" value="<?= $language['nl_tickets_submit']; ?>" />
<?php
                    }

                    foreach($messages as $messageKey => $messageValue) {
?>
                        <div class="ticketmessage">
                            <div class="ticketmessage_text">
                                <?= nl2br($messageValue['message']); ?>
                            </div> <!-- ticketmessage_text -->

                            <div class="ticketmessage_details">
                                <span><?= $language['nl_tickets_attachment']; ?>: <?php if (isset($messageValue['file'])) { echo '<a href="'.$messageValue['file'].'">'.$language['nl_tickets_file'].'</a>'; } else { echo 'none'; } ?></span>
                                <span><?= $language['nl_tickets_posted'].': '.$messageValue['posted']; ?></span>
                            </div> <!-- ticketmessage_details -->
                        </div> <!-- ticketmessage -->
<?php
                    }
?>
                </div> <!-- ticketmessages -->
            </div> <!-- ticket_content -->
        </form>
    </main>
<?php
}