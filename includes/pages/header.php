<header>
    <div class="headertop">
    </div> <!-- headertop -->

    <div class="headerbottom">
    </div> <!-- headerbottom -->

    <div class="headerleft">
        <picture>
            <img src="includes/images/logo.png" alt="Universal Electro Logo">
        </picture>
    </div> <!-- headerleft -->
    
    <div class="headermain">
        Universal <span>Electro</span>
    </div> <!-- headermain -->

    <div class="headersub">
        <span id="en_header"><?= $language['en_header_text']; ?></span>
        <span id="nl_header"><?= $language['nl_header_text']; ?></span>
    </div> <!-- headersub -->

    <nav class="menu">

        <a href="index.php" id="en_menu1"><?= $language['en_menu_home']; ?></a>
        <a href="index.php?page=1" id="en_menu2"><?= $language['en_menu_webshop']; ?></a>
        <a href="index.php?page=2" id="en_menu3"><?= $language['en_menu_login']; ?></a>
        <a href="index.php?page=3" id="en_menu4"><?= $language['en_menu_contact']; ?></a>
        <a href="index.php?page=4" id="en_menu5"><?= $language['en_menu_search']; ?></a>

        <a href="index.php" id="nl_menu1"><?= $language['nl_menu_home']; ?></a>
        <a href="index.php?page=1" id="nl_menu2"><?= $language['nl_menu_webshop']; ?></a>
        <a href="index.php?page=2" id="nl_menu3"><?= $language['nl_menu_login']; ?></a>
        <a href="index.php?page=3" id="nl_menu4"><?= $language['nl_menu_contact']; ?></a>
        <a href="index.php?page=4" id="nl_menu5"><?= $language['nl_menu_search']; ?></a>

        <div class="language" id="language" onclick="languageChange()">
<?php
            if ($settings['home_initial_language'] == 'dutch') {
                echo 'Nederlands';
            } else {
                echo 'English';
            }
?>
        </div> <!-- language -->

    </nav>

    <div class="headerimage">
    </div> <!-- headerimage -->
</header>