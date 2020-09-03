<?php
    
/**
 * This file contains the add ticket web form
 */

// Get ticket categories
$categories = $q->getTicketCategories();
?>

<main id="mainEnglish">

    <form method="post" action="index.php?page=3&action=1" enctype="multipart/form-data">

        <div class="tickets">
            <div class="title">
                <?= $language['en_tickets_newticket']; ?>
            </div>

        

            <div class="toolbar">
                <?= $language['en_tickets_category']; ?>:
                <select name="category" id="category" required >
<?php
                    foreach($categories as $catKey => $catValue) {
?>
                        <option value="<?= $catValue['id']; ?>"><?= $catValue['name']; ?></option>
<?php
                    }
?>
                </select>

                <?= $language['en_tickets_priority']; ?>:
                <select name="priority" id="priority" required >
                    <option value="1"><?= $language['en_tickets_priolow']; ?></option>
                    <option value="2"><?= $language['en_tickets_priomed']; ?></option>
                    <option value="3"><?= $language['en_tickets_priohigh']; ?></option>
                </select>

                <?= $language['en_tickets_attachment']; ?>:
                <input type="file" name="file" id="file" onchange="addTicket('file')" />
                <label for="file" id="filelabel"><?= $language['en_tickets_upload']; ?></label>

                <?= $language['en_tickets_notifications']; ?>:
                <input type="checkbox" name="notification" id="notification" value="1" checked onchange="addTicket('notification')" />
                <label for="notification" id="notiflabel">Yes</label>
            </div> <!-- toolbar -->

            <div class="ticket_content">

                <input type="text" name="subject" id="subject" placeholder="<?= $language['en_tickets_subject']; ?>" required />
                <textarea name="message" id="message" placeholder="<?= $language['en_tickets_message']; ?>" required ></textarea>
                <input type="hidden" name="form" value="addTicket" />
                <input type="Submit" value="<?= $language['en_tickets_submit']; ?>" />
            
            </div> <!-- ticket content -->

        </div> <!-- tickets -->
    </form>
</main>

<main id="mainDutch">
    <form method="post" action="index.php?page=3&action=1" enctype="multipart/form-data">

    <div class="tickets">
        <div class="title">
            <?= $language['nl_tickets_newticket']; ?>
        </div>



        <div class="toolbar">
            <?= $language['nl_tickets_category']; ?>:
            <select name="category" id="category" required >
<?php
                foreach($categories as $catKey => $catValue) {
?>
                    <option value="<?= $catValue['id']; ?>"><?= $catValue['name']; ?></option>
<?php
                }
?>
            </select>

            <?= $language['nl_tickets_priority']; ?>:
            <select name="priority" id="priority" required >
                <option value="1"><?= $language['nl_tickets_priolow']; ?></option>
                <option value="2"><?= $language['nl_tickets_priomed']; ?></option>
                <option value="3"><?= $language['nl_tickets_priohigh']; ?></option>
            </select>

            <?= $language['nl_tickets_attachment']; ?>:
            <input type="file" name="file" id="file" onchange="addTicket('file')" />
            <label for="file" id="filelabel"><?= $language['nl_tickets_upload']; ?></label>

            <?= $language['nl_tickets_notifications']; ?>:
            <input type="checkbox" name="notification" id="notification" value="1" checked onchange="addTicket('notification')" />
            <label for="notification" id="notiflabel">Yes</label>
        </div> <!-- toolbar -->

        <div class="ticket_content">

            <input type="text" name="subject" id="subject" placeholder="<?= $language['nl_tickets_subject']; ?>" required />
            <textarea name="message" id="message" placeholder="<?= $language['nl_tickets_message']; ?>" required ></textarea>
            <input type="hidden" name="form" value="addTicket" />
            <input type="Submit" value="<?= $language['nl_tickets_submit']; ?>" />
        
        </div> <!-- ticket content -->

    </div> <!-- tickets -->
    </form>
</main>