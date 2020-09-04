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
                <a href=""><?= $language['en_tickets_close']; ?></a>

                <?= $language['en_tickets_attachment']; ?>:
                <input type="file" name="file" id="file" onchange="ticketReply('file')" />
                <label for="file" id="filelabel"><?= $language['en_tickets_upload']; ?></label>
            </div> <!-- toolbar -->

            <div class="ticket_content">
                <div class="ticketsummary">
                    <div class="ticketsummary_subject">
                        <?= $ticket['subject']; ?>
                    </div> <!-- ticketsummary_subject -->

                    <div class="ticketsummary_details">
                        <div class="ticketstatus" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(255, 255, 255, 0) 80%">
                            <?= $status['name']; ?>
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
                
                    <textarea name="message" placeholder="<?= $language['en_tickets_message']; ?>"></textarea>
                    <input type="hidden" name="form" value="ticketReply" />
                    <input type="submit" value="<?= $language['en_tickets_submit']; ?>" />
<?php
                    foreach($messages as $messageKey => $messageValue) {
?>
                        <div class="ticketmessage">
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

        <div class="tickets">
            <div class="title">
                <?= $language['nl_tickets_tickets']; ?>
            </div>

            <div class="toolbar">
                <a href="index.php?page=3&action=1"><?= $language['nl_tickets_goback']; ?></a>
                <a href="index.php?page=3&action=1&sub=1"><?= $language['nl_tickets_newticket']; ?></a>
                <a href=""><?= $language['nl_tickets_close']; ?></a>
            </div> <!-- toolbar -->

            <div class="ticket_content">
                <div class="ticketsummary">
                    <div class="ticketsummary_subject">
                        <?= $ticket['subject']; ?>
                    </div> <!-- ticketsummary_subject -->

                    <div class="ticketsummary_details">
                        <div class="ticketstatus" style="background: linear-gradient(45deg, <?= $status['color']; ?>, rgba(255, 255, 255, 0) 80%">
                            <?= $status['name']; ?>
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
        </div> <!-- tickets -->
    </main>
<?php
}