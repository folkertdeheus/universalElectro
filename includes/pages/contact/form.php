<?php

/**
 * This file contains the contact form
 */

// Set fields default for a not logged in user
$phone = null;
$id = null;

if (login()) {

    // Get customer data
    $customer = $q->getCustomer($_SESSION['webuser']);

    // Set fields
    $nameField = '<input type="text" name="name" id="name"  value="'.$customer['firstname'].' '.$customer['insertion'].' '.$customer['lastname'].'" readonly required />';
    $emailField = '<input type="text" name="email" id="email" value="'.$customer['email'].'" readonly required />';
    
    if (isset($customer['phone']) && $customer['phone'] != null) {
        $phone = $customer['phone'];
    }

    $id = $customer['id'];
}
?>

<main id="mainEnglish">
    <div class="contactform">
        <form method="post">
<?php
            if (login()) {
                echo $nameField;
                echo $emailField;
            } else {
?>
                <input type="text" name="name" id="name" placeholder="<?= $language['en_contact_name']; ?>" required />
                <input type="text" name="email" id="email" placeholder="<?= $language['en_contact_email']; ?>" required />
<?php
            }
?>
            <input type="text" name="phone" id="phone" placeholder="<?= $language['en_contact_phone']; ?>" value="<?= $phone; ?>" />
            <input type="text" name="subject" id="subject" placeholder="<?= $language['en_contact_subject']; ?>" required />
            <textarea name="message" id="message" placeholder="<?= $language['en_contact_message']; ?>" required ></textarea>
            <input type="hidden" name="form" value="contact" />
            <input type="hidden" name="customer" value="<?= $id; ?>" />
            <input type="submit" value="<?= $language['en_contact_send']; ?>" />
        </form>
    </div> <!-- contactform -->
</main>

<main id="mainDutch">
    <div class="contactform">
        <form method="post">
<?php
            if (login()) {
                echo $nameField;
                echo $emailField;
            } else {
?>
                <input type="text" name="name" id="name" placeholder="<?= $language['nl_contact_name']; ?>" required />
                <input type="text" name="email" id="email" placeholder="<?= $language['nl_contact_email']; ?>" required />
<?php
            }
?>
            <input type="text" name="phone" id="phone" placeholder="<?= $language['nl_contact_phone']; ?>" value="<?= $phone; ?>" />
            <input type="text" name="subject" id="subject" placeholder="<?= $language['nl_contact_subject']; ?>" required />
            <textarea name="message" id="message" placeholder="<?= $language['nl_contact_message']; ?>" required ></textarea>
            <input type="hidden" name="form" value="contact" />
            <input type="hidden" name="customer" value="<?= $id; ?>" />
            <input type="submit" value="<?= $language['nl_contact_send']; ?>" />
        </form>
    </div> <!-- contactform -->
</main>