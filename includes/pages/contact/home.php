<?php

/**
 * This file contains the contact home page which directs users to contact form or tickets page
 */

?>

<main id="mainEnglish">
    <div class="mainContent">
        <div class="mainLeft">
            <div class="accountdetails">
                <div class="title">
                    <?= $language['en_contact_contact']; ?>
                </div> <!-- title -->

                <?= $language['en_contact_choosecontact']; ?>

                <a href="index.php?page=3&action=2"><?= $language['en_contact_gotoform']; ?></a>
            </div> <!-- accountdetails -->
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails">
                <div class="title">
                    <?= $language['en_contact_tickets']; ?>
                </div> <!-- title -->

                <?= $language['en_contact_choosetickets']; ?>

                <a href="index.php?page=3&action=1"><?= $language['en_contact_gototickets']; ?></a>
            </div> <!-- accountdetails -->
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>

<main id="mainDutch">
    <div class="mainContent">
        <div class="mainLeft">
            <div class="accountdetails">
                <div class="title">
                    <?= $language['nl_contact_contact']; ?>
                </div> <!-- title -->

                <?= $language['nl_contact_choosecontact']; ?>

                <a href="index.php?page=3&action=2"><?= $language['nl_contact_gotoform']; ?></a>
            </div> <!-- accountdetails -->
        </div> <!-- mainLeft -->

        <div class="mainRight">
            <div class="accountdetails">
                <div class="title">
                    <?= $language['nl_contact_tickets']; ?>
                </div> <!-- title -->

                <?= $language['nl_contact_choosetickets']; ?>

                <a href="index.php?page=3&action=1"><?= $language['nl_contact_gototickets']; ?></a>
            </div> <!-- accountdetails -->
        </div> <!-- mainRight -->
    </div> <!-- mainContent -->
</main>