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
        <span id="en_header"><?= EN_HEADER; ?></span>
        <span id="nl_header"><?= NL_HEADER; ?></span>
    </div> <!-- headersub -->

    <nav class="menu">

        <a href="index.php" id="en_menu1"><?= EN_HOME; ?></a>
        <a href="index.php?page=1" id="en_menu2"><?= EN_WEBSHOP; ?></a>
        <a href="index.php?page=2" id="en_menu3"><?= EN_LOGIN; ?></a>
        <a href="index.php?page=3" id="en_menu4"><?= EN_CONTACT; ?></a>
        <a href="index.php?page=4" id="en_menu5"><?= EN_SEARCH; ?></a>

        <a href="index.php" id="nl_menu1"><?= NL_HOME; ?></a>
        <a href="index.php?page=1" id="nl_menu2"><?= NL_WEBSHOP; ?></a>
        <a href="index.php?page=2" id="nl_menu3"><?= NL_LOGIN; ?></a>
        <a href="index.php?page=3" id="nl_menu4"><?= NL_CONTACT; ?></a>
        <a href="index.php?page=4" id="nl_menu5"><?= NL_SEARCH; ?></a>

        <div class="language" id="language" onclick="languageChange()">
            Nederlands
        </div> <!-- language -->

    </nav>

    <div class="headerimage">
    </div> <!-- headerimage -->
</header>