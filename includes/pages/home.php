<?php

/**
 * This file contains the home page
 */

// Get page content
$pages = $q->getPages();

$en_content = preg_replace("/(:ARTICLE:)/", '<article>', $pages['en_content']);
$en_content = preg_replace("/(:!ARTICLE:)/", '</article>', $en_content);
$en_content = preg_replace("/(:TITLE:)/", '<div class="title">', $en_content);
$en_content = preg_replace("/(:!TITLE:)/", '</div> <!-- title -->', $en_content);

$nl_content = preg_replace("/(:ARTICLE:)/", '<article>', $pages['nl_content']);
$nl_content = preg_replace("/(:!ARTICLE:)/", '</article>', $nl_content);
$nl_content = preg_replace("/(:TITLE:)/", '<div class="title">', $nl_content);
$nl_content = preg_replace("/(:!TITLE:)/", '</div> <!-- title -->', $nl_content);
?>

<main id="mainEnglish">
    <?= $en_content; ?>

    <article>
        <div class="title">
            Our brands
        </div>
<?php
        // Brand ribbon
        include('includes/pages/brands.php');
?>
    </article>
</main>

<main id="mainDutch">
    <?= $nl_content; ?>

    <article>
        <div class="title">
            Onze merken
        </div>
<?php
        // Brand ribbon
        include('includes/pages/brands.php');
?>
    </article>
</main>