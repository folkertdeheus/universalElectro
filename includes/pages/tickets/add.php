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
                New ticket
            </div>

        

            <div class="toolbar">
                Category:
                <select name="category" id="category" required >
<?php
                    foreach($categories as $catKey => $catValue) {
?>
                        <option value="<?= $catValue['id']; ?>"><?= $catValue['name']; ?></option>
<?php
                    }
?>
                </select>

                Priority:
                <select name="priority" id="priority" required >
                    <option value="1">Low</option>
                    <option value="2">Normal</option>
                    <option value="3">High</option>
                </select>

                Attachment:
                <input type="file" name="file" id="file" onchange="addTicket('file')" />
                <label for="file" id="filelabel">Upload file</label>

                Email notifications:
                <input type="checkbox" name="notification" id="notification" value="1" checked onchange="addTicket('notification')" />
                <label for="notification" id="notiflabel">Yes</label>
            </div> <!-- toolbar -->

            <div class="ticket_content">

                <input type="text" name="subject" id="subject" placeholder="Subject" required />
                <textarea name="message" id="message" placeholder="Message" required ></textarea>
                <input type="hidden" name="form" value="addTicket" />
                <input type="Submit" value="Submit" />
            
            </div> <!-- ticket content -->

        </div> <!-- tickets -->
    </form>
</main>

<main id="mainDutch">
</main>