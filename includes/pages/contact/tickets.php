<?php
    /**
     * This page contains the tickets redirecting page
     * If a user is not logged in, it will be redirected to the login/create account page
     * If the user is logged in, the ticket system will be loaded
     */

    if (login()) {

        // Include ticket page if user is logged in
        require_once('includes/pages/tickets/default.php');
    
    } else {
        // Display login message if user is not logged in
?>
<main id="mainEnglish">

    <?= $language['en_tickets_login']; ?>

    <div class="button">
        <a href="index.php?page=2"><?= $language['en_tickets_gotologin']; ?>'</a>
    </div> <!-- button -->

</main>

<main id="mainDutch">

    <?= $language['nl_tickets_login']; ?>

    <div class="button">
        <a href="index.php?page=2"><?= $language['nl_tickets_gotologin']; ?></a>
    </div> <!-- button -->

</main>

<?php

    }