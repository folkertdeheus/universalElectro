<?php

/**
 * This file contains the quick enquiry form
 */

if ($settings['quick_enquiry_active']) {

?>

    <div class="quickenquiry" onmouseout="qe_mouseout()">
        
        <div class="quickenquirybutton">
            <img src="includes/images/email_white.png" alt="email"/>
            <div id="en_qe_title"><?= $language['en_quickenquiry_button']; ?></div>
            <div id="nl_qe_title"><?= $language['nl_quickenquiry_button']; ?></div>
        </div> <!-- quickenquirybutton -->
        
        <div class="quickenquirycontent">
            
            <div id="en_qe_question"><?= $language['en_quickenquiry_text']; ?></div>
            <div id="nl_qe_question"><?= $language['nl_quickenquiry_text'] ?></div>

            <form method="post" id="en_qe_form">
                <input type="text" name="firstname" placeholder="<?= $language['en_quickenquiry_firstname']; ?>" class="qe_firstname" required />
                <input type="text" name="lastname" placeholder="<?= $language['en_quickenquiry_lastname']; ?>" class="qe_lastname" required />
                <input type="text" name="company" placeholder="<?= $language['en_quickenquiry_company']; ?>" class="qe_company" />
                <input type="text" name="email" placeholder="<?= $language['en_quickenquiry_email']; ?>" class="qe_email" required />
                <input type="text" name="phone" placeholder="<?= $language['en_quickenquiry_phone'] ?>" class="qe_phone" />
                <textarea name="message" placeholder="<?= $language['en_quickenquiry_message']; ?>" class="qe_message" required></textarea>
                <input type="submit" value="<?= $language['en_quickenquiry_send']; ?>" class="qe_submit" />
                <input type="hidden" name="form" value="quickenquiry" />
            </form>

            <form method="post" id="nl_qe_form">
                <input type="text" name="firstname" placeholder="<?= $language['nl_quickenquiry_firstname']; ?>" class="qe_firstname" required />
                <input type="text" name="lastname" placeholder="<?= $language['nl_quickenquiry_lastname']; ?>" class="qe_lastname" required />
                <input type="text" name="company" placeholder="<?= $language['nl_quickenquiry_company']; ?>" class="qe_company" />
                <input type="text" name="email" placeholder="<?= $language['nl_quickenquiry_email']; ?>" class="qe_email" required />
                <input type="text" name="phone" placeholder="<?= $language['nl_quickenquiry_phone']; ?>" class="qe_phone" />
                <textarea name="message" placeholder="<?= $language['nl_quickenquiry_message']; ?>" class="qe_message" required></textarea>
                <input type="submit" value="<?= $language['nl_quickenquiry_send']; ?>" class="qe_submit" />
                <input type="hidden" name="form" value="quickenquiry" />
            </form>

            <div class="quickenquirymessage" id="en_qe_message">
                <?= $language['en_quickenquiry_disclaimer']; ?>
            </div> <!-- quickenquirymessage -->

            <div class="quickenquirymessage" id="nl_qe_message">
                <?= $language['nl_quickenquiry_disclaimer']; ?>
            </div> <!-- quickenquirymessage -->
        </div> <!-- quickenquirycontent -->

    </div> <!-- quickenquiry -->

<?php

}