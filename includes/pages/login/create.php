<?php

/**
 * This file contains the create account form
 */

?>

<main id="mainEnglish">
    <div class="login">
        <form method="post" action="index.php?page=2&action=2">
            <input type="text" name="firstname" id="firstname" placeholder="<?= $language['en_create_firstname']; ?>" required />
            <input type="text" name="insertion" id="insertion" placeholder="<?= $language['en_create_insertion']; ?>" />
            <input type="text" name="lastname" id="lastname" placeholder="<?= $language['en_create_lastname']; ?>" required />
            <input type="text" name="email" id="email" placeholder="<?= $language['en_create_email']; ?>" required />
            <input type="text" name="phone" id="phone" placeholder="<?= $language['en_create_phone']; ?>" />
            <input type="password" name="password" id="password" placeholder="<?= $language['en_create_password']; ?>" required />
            <input type="password" name="rpassword" id="rpassword" placeholder="<?= $language['en_create_rpassword']; ?>" required />
            <input type="hidden" name="form" value="createCustomer" />
            <input type="submit" value="<?= $language['en_create_create']; ?>" />
        </form>

    </div> <!-- login -->
</main>

<main id="mainDutch">
    <div class="login">
        <form method="post" action="index.php?page=2&action=2">
            <input type="text" name="firstname" id="firstname" placeholder="<?= $language['nl_create_firstname']; ?>" required />
            <input type="text" name="insertion" id="insertion" placeholder="<?= $language['nl_create_insertion']; ?>" />
            <input type="text" name="lastname" id="lastname" placeholder="<?= $language['nl_create_lastname']; ?>" required />
            <input type="text" name="email" id="email" placeholder="<?= $language['nl_create_email']; ?>" required />
            <input type="text" name="phone" id="phone" placeholder="<?= $language['nl_create_phone']; ?>" />
            <input type="password" name="password" id="password" placeholder="<?= $language['nl_create_password']; ?>" required />
            <input type="password" name="rpassword" id="rpassword" placeholder="<?= $language['nl_create_rpassword']; ?>" required />
            <input type="hidden" name="form" value="createCustomer" />
            <input type="submit" value="<?= $language['nl_create_create']; ?>" />
        </form>

    </div> <!-- login -->
</main>