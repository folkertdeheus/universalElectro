<main id="mainEnglish">
    <div class="login">
        <form method="post" action="index.php?page=2">
            <input type="text" name="email" placeholder="<?= $language['en_login_email']; ?>" />
            <input type="password" name="password" placeholder="<?= $language['en_login_password']; ?>" />

            <input type="hidden" name="form" value="login" />
            <input type="submit" value="<?= $language['en_login_login']; ?>" />
        </form>

        <a href="index.php?page=2&action=1"><?= $language['en_login_createaccount']; ?></a>
    </div> <!-- login -->
</main>

<main id="mainDutch">
    <div class="login">
        <form method="post" action="index.php?page=2">
            <input type="text" name="email" placeholder="<?= $language['nl_login_email']; ?>" />
            <input type="password" name="password" placeholder="<?= $language['nl_login_password']; ?>" />

            <input type="hidden" name="form" value="login" />
            <input type="submit" value="<?= $language['en_login_login']; ?>" />
        </form>

        <a href="index.php?page=2&action=1"><?= $language['nl_login_createaccount']; ?></a>
    </div> <!-- login -->
</main>