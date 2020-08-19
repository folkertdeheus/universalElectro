<?php

/**
 * This file contains the quick enquiry form
 */

if ($settings['quick_enquiry_active']) {

?>

    <div class="quickenquiry">
        
        <div class="quickenquirybutton">
            <img src="includes/images/email_white.png" alt="email"/>
            <div id="en_qe_title"><?= EN_QUICK; ?></div>
            <div id="nl_qe_title"><?= NL_QUICK; ?></div>
        </div> <!-- quickenquirybutton -->
        
        <div class="quickenquirycontent">
            
            <div id="en_qe_question"><?= EN_QUESTION; ?></div>
            <div id="nl_qe_question"><?= NL_QUESTION; ?></div>

            <form method="post" id="en_qe_form">
                <input type="text" name="firstname" placeholder="<?= EN_FIRSTNAME; ?>" class="qe_firstname" required />
                <input type="text" name="lastname" placeholder="<?= EN_LASTNAME; ?>" class="qe_lastname" required />
                <input type="text" name="company" placeholder="<?= EN_COMPANY; ?>" class="qe_company" />
                <input type="text" name="email" placeholder="<?= EN_EMAIL; ?>" class="qe_email" required />
                <input type="text" name="phone" placeholder="<?= EN_PHONE; ?>" class="qe_phone" />
                <textarea name="message" placeholder="<?= EN_MESSAGE; ?>" class="qe_message" required></textarea>
                <input type="submit" value="<?= EN_SUBMIT; ?>" class="qe_submit" />
                <input type="hidden" name="form" value="quickenquiry" />
            </form>

            <form method="post" id="nl_qe_form">
                <input type="text" name="firstname" placeholder="<?= NL_FIRSTNAME; ?>" class="qe_firstname" required />
                <input type="text" name="lastname" placeholder="<?= NL_LASTNAME; ?>" class="qe_lastname" required />
                <input type="text" name="company" placeholder="<?= NL_COMPANY; ?>" class="qe_company" />
                <input type="text" name="email" placeholder="<?= NL_EMAIL; ?>" class="qe_email" required />
                <input type="text" name="phone" placeholder="<?= NL_PHONE; ?>" class="qe_phone" />
                <textarea name="message" placeholder="<?= NL_MESSAGE; ?>" class="qe_message" required></textarea>
                <input type="submit" value="<?= NL_SUBMIT; ?>" class="qe_submit" />
                <input type="hidden" name="form" value="quickenquiry" />
            </form>

            <div class="quickenquirymessage" id="en_qe_message">
                <?= EN_QE_MESSAGE; ?>
            </div> <!-- quickenquirymessage -->

            <div class="quickenquirymessage" id="nl_qe_message">
                <?= NL_QE_MESSAGE; ?>
            </div> <!-- quickenquirymessage -->
        </div> <!-- quickenquirycontent -->

    </div> <!-- quickenquiry -->

<?php

}