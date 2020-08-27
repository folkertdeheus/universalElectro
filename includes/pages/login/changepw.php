<?php

/**
 * This file contains the change password form
 */

if (login()) {

?>
<main id="mainEnglish">
    <div class="title">
        <?= $language['en_changepw_changepw']; ?>
    </div> <!-- title -->
    
    <div class="login">
        <form method="post" action="index.php?page=2">
            <input type="password" name="oldpassword" id="oldpassword" placeholder="<?= $language['en_changepw_oldpw']; ?>" required onchange="changepassword('oldpassword')" />
            <input type="password" name="newpassword" id="newpassword" placeholder="<?= $language['en_changepw_newpw']; ?>" required onchange="changepassword('newpassword')" />
            <input type="password" name="repeatpassword" id="repeatpassword" placeholder="<?= $language['en_changepw_repeatpw']; ?>" required onchange="changepassword('repeatpassword')" />
            <input type="hidden" name="form" value="changepassword" />
            <input type="submit" value="<?= $language['en_changepw_save']; ?>" />
        </form>
    </div> <!-- login -->

</main>

<main id="mainDutch">
    <div class="title">
        <?= $language['nl_changepw_changepw']; ?>
    </div> <!-- title -->
    
    <div class="login">
        <form method="post" action="index.php?page=2">
            <input type="password" name="oldpassword" id="oldpassword" placeholder="<?= $language['nl_changepw_oldpw']; ?>" required onchange="changepassword('oldpassword')" />
            <input type="password" name="newpassword" id="newpassword" placeholder="<?= $language['nl_changepw_newpw']; ?>" required onchange="changepassword('newpassword')" />
            <input type="password" name="repeatpassword" id="repeatpassword" placeholder="<?= $language['nl_changepw_repeatpw']; ?>" required onchange="changepassword('repeatpassword')" />
            <input type="hidden" name="form" value="changepassword" />
            <input type="submit" value="<?= $language['nl_changepw_save']; ?>" />
        </form>
    </div> <!-- login -->
</main>

<?php

}