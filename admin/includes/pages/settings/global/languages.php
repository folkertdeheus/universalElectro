<?php

/**
 * This file contains the language settings page
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get language data
    $language = $q->allLanguages();

?>

<div class="content">

    <form method="post" action="index.php?page=4&action=2">
        <table>
            <tr>
                <th colspan=2>Header</th>
            </tr>
            <tr>
                <td><input type="text" name="nl_header_text" id="nl_header_text" placeholder="Header text Dutch" required onchange="languageSettings('nl_header_text')" value="<?= $language['nl_header_text']; ?>" /></td>
                <td><input type="text" name="en_header_text" id="en_header_text" placeholder="Header text English" required onchange="languageSettings('en_header_text')" value="<?= $language['en_header_text']; ?>" /></td>
            </tr>

            <tr>
                <th colspan=2>Quick Enquiry</th>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_button" id="nl_quickenquiry_button" placeholder="Button text Dutch" required onchange="languageSettings('nl_quickenquiry_button')" value="<?= $language['nl_quickenquiry_button']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_button" id="en_quickenquiry_button" placeholder="Button text English" required onchange="languageSettings('en_quickenquiry_button')" value="<?= $language['en_quickenquiry_button']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_text" id="nl_quickenquiry_text" placeholder="Top text Dutch" required onchange="languageSettings('nl_quickenquiry_text')" value="<?= $language['nl_quickenquiry_text']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_text" id="en_quickenquiry_text" placeholder="Top text English" required onchange="languageSettings('en_quickenquiry_text')" value="<?= $language['en_quickenquiry_text']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_firstname" id="nl_quickenquiry_firstname" placeholder="Firstname Dutch" required onchange="languageSettings('nl_quickenquiry_firstname')" value="<?= $language['nl_quickenquiry_firstname']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_firstname" id="en_quickenquiry_firstname" placeholder="Firstname English" required onchange="languageSettings('en_quickenquiry_firstname')" value="<?= $language['en_quickenquiry_firstname']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_lastname" id="nl_quickenquiry_lastname" placeholder="Lastname Dutch" required onchange="languageSettings('nl_quickenquiry_lastname')" value="<?= $language['nl_quickenquiry_lastname']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_lastname" id="en_quickenquiry_lastname" placeholder="Lastname English" required onchange="languageSettings('en_quickenquiry_lastname')" value="<?= $language['en_quickenquiry_lastname']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_company" id="nl_quickenquiry_company" placeholder="Company Dutch" required onchange="languageSettings('nl_quickenquiry_company')" value="<?= $language['nl_quickenquiry_company']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_company" id="en_quickenquiry_company" placeholder="Company English" required onchange="languageSettings('en_quickenquiry_company')" value="<?= $language['en_quickenquiry_company']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_email" id="nl_quickenquiry_email" placeholder="Email Dutch" required onchange="languageSettings('nl_quickenquiry_email')" value="<?= $language['nl_quickenquiry_email']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_email" id="en_quickenquiry_email" placeholder="Email English" required onchange="languageSettings('en_quickenquiry_email')" value="<?= $language['en_quickenquiry_email']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_phone" id="nl_quickenquiry_phone" placeholder="Phone Dutch" required onchange="languageSettings('nl_quickenquiry_phone')" value="<?= $language['nl_quickenquiry_phone']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_phone" id="en_quickenquiry_phone" placeholder="Phone English" required onchange="languageSettings('en_quickenquiry_phone')" value="<?= $language['en_quickenquiry_phone']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_message" id="nl_quickenquiry_message" placeholder="Message Dutch" required onchange="languageSettings('nl_quickenquiry_message')" value="<?= $language['nl_quickenquiry_message']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_message" id="en_quickenquiry_message" placeholder="Message English" required onchange="languageSettings('en_quickenquiry_message')" value="<?= $language['en_quickenquiry_message']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_send" id="nl_quickenquiry_send" placeholder="Send Dutch" required onchange="languageSettings('nl_quickenquiry_send')" value="<?= $language['nl_quickenquiry_send']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_send" id="en_quickenquiry_send" placeholder="Send English" required onchange="languageSettings('en_quickenquiry_send')" value="<?= $language['en_quickenquiry_send']; ?>" /></td>
            </tr>
            <tr>
                <td><textarea name="nl_quickenquiry_disclaimer" id="nl_quickenquiry_disclaimer" placeholder="Disclaimer Dutch" required onchange="languageSettings('nl_quickenquiry_disclaimer')"><?= $language['nl_quickenquiry_disclaimer']; ?></textarea></td>
                <td><textarea name="en_quickenquiry_disclaimer" id="en_quickenquiry_disclaimer" placeholder="Disclaimer English" required onchange="languageSettings('en_quickenquiry_disclaimer')"><?= $language['en_quickenquiry_disclaimer']; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_success" id="nl_quickenquiry_success" placeholder="Success message Dutch" required onchange="languageSettings('nl_quickenquiry_success')" value="<?= $language['nl_quickenquiry_success']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_success" id="en_quickenquiry_success" placeholder="Success message English" required onchange="languageSettings('en_quickenquiry_success')" value="<?= $language['en_quickenquiry_success']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_quickenquiry_failed" id="nl_quickenquiry_failed" placeholder="Failed message Dutch" required onchange="languageSettings('nl_quickenquiry_failed')" value="<?= $language['nl_quickenquiry_failed']; ?>" /></td>
                <td><input type="text" name="en_quickenquiry_failed" id="en_quickenquiry_failed" placeholder="Failed message English" required onchange="languageSettings('en_quickenquiry_failed')" value="<?= $language['en_quickenquiry_failed']; ?>" /></td>
            </tr>

            <tr>
                <th colspan=2>Main Menu</th>
            </tr>
            <tr>
                <td><input type="text" name="nl_menu_home" id="nl_menu_home" placeholder="Home Dutch" required onchange="languageSettings('nl_menu_home')" value="<?= $language['nl_menu_home']; ?>" /></td>
                <td><input type="text" name="en_menu_home" id="en_menu_home" placeholder="Home English" required onchange="languageSettings('en_menu_home')" value="<?= $language['en_menu_home']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_menu_webshop" id="nl_menu_webshop" placeholder="Webshop Dutch" required onchange="languageSettings('nl_menu_webshop')" value="<?= $language['nl_menu_webshop']; ?>" /></td>
                <td><input type="text" name="en_menu_webshop" id="en_menu_webshop" placeholder="Webshop English" required onchange="languageSettings('en_menu_webshop')" value="<?= $language['en_menu_webshop']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_menu_login" id="nl_menu_login" placeholder="Login Dutch" required onchange="languageSettings('nl_menu_login')" value="<?= $language['nl_menu_login']; ?>" /></td>
                <td><input type="text" name="en_menu_login" id="en_menu_login" placeholder="Login English" required onchange="languageSettings('en_menu_login')" value="<?= $language['en_menu_login']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_menu_contact" id="nl_menu_contact" placeholder="Contact Dutch" required onchange="languageSettings('nl_menu_contact')" value="<?= $language['nl_menu_contact']; ?>" /></td>
                <td><input type="text" name="en_menu_contact" id="en_menu_contact" placeholder="Contact English" required onchange="languageSettings('en_menu_contact')" value="<?= $language['en_menu_contact']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="text" name="nl_menu_search" id="nl_menu_search" placeholder="Search Dutch" required onchange="languageSettings('nl_menu_search')" value="<?= $language['nl_menu_search']; ?>" /></td>
                <td><input type="text" name="en_menu_search" id="en_menu_search" placeholder="Search English" required onchange="languageSettings('en_menu_search')" value="<?= $language['en_menu_search']; ?>" /></td>
            </tr>

            <tr>
                <th colspan=2>Company data</th>
            </tr>
            <tr>
                <td><textarea name="nl_footer_adress" id="nl_footer_adress" placeholder="Adress Dutch" required onchange="languageSettings('nl_footer_adress')"><?= $language['nl_footer_adress']; ?></textarea></td>
                <td><textarea name="en_footer_adress" id="en_footer_adress" placeholder="Adress English" required onchange="languageSettings('en_footer_adress')"><?= $language['en_footer_adress']; ?></textarea></td>
            </tr>
            <tr>
                <td><textarea name="nl_footer_contact" id="nl_footer_contact" placeholder="Contact information Dutch" required onchange="languageSettings('nl_footer_contact')"><?= $language['nl_footer_contact']; ?></textarea></td>
                <td><textarea name="en_footer_contact" id="en_footer_contact" placeholder="Contact information English" required onchange="languageSettings('en_footer_contact')"><?= $language['en_footer_contact']; ?></textarea></td>
            </tr>
            <tr>
                <td><textarea name="nl_footer_tax" id="nl_footer_tax" placeholder="Tax information Dutch" required onchange="languageSettings('nl_footer_tax')"><?= $language['nl_footer_tax']; ?></textarea></td>
                <td><textarea name="en_footer_tax" id="en_footer_tax" placeholder="Tax information English" required onchange="languageSettings('en_footer_tax')"><?= $language['en_footer_tax']; ?></textarea></td>
            </tr>
        </table>

        <input type="hidden" name="form" value="languages" />
        <input type="submit" value="Save" />
    </form>

    <div class="message" id="message">
    </div> <!-- message -->

</div> <!-- content -->


<?php

}