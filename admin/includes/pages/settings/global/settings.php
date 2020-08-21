<?php

/**
 * This file contains the global settings page
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get settings
    $settings = $q->allSettings();
?>
    <div class="content settings">
        <form method="post" action="index.php?page=4&action=2">
            <table>
                <tr>
                    <th colspan=2>Home</th>
                </tr>
                <tr>
                    <td>Initial language</td>
                    <td>
                        <select name="home_initial_language">
                            <option value="english" <?php if ($settings['home_initial_language'] == 'english') { echo ' selected '; } ?>>English</option>
                            <option value="dutch" <?php if ($settings['home_initial_language'] == 'dutch') { echo ' selected '; } ?>>Dutch</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th colspan=2>Webshop</th>
                </tr>
                <tr>
                    <td>Show prices for guest</td>
                    <td>
                        <input type="checkbox" name="webshop_show_prices_on_guest" value="1" id="webshop_show_prices_on_guest" <?= cb($settings['webshop_show_prices_on_guest']); ?> />
                        <label for="webshop_show_prices_on_guest"></label>
                    </td>
                </tr>
                <tr>
                    <td>Show prices for accounts</td>
                    <td>
                        <input type="checkbox" name="webshop_show_prices_on_accounts" value="1" id="webshop_show_prices_on_accounts" <?= cb($settings['webshop_show_prices_on_account']); ?> />
                        <label for="webshop_show_prices_on_accounts"></label>
                    </td>
                </tr>
                <tr>
                    <td>Webshop checkout active</td>
                    <td>
                        <input type="checkbox" name="webshop_checkout_button" value="1" id="webshop_checkout_button" <?= cb($settings['webshop_checkout_button']); ?> />
                        <label for="webshop_checkout_button"></label>
                    </td>
                </tr>

                <tr>
                    <th colspan=2>Quick enquiry</th>
                </tr>
                <tr>
                    <td>Quick enquiry active</td>
                    <td>
                        <input type="checkbox" name="quick_enquiry_active" value="1" id="quick_enquiry_active" <?= cb($settings['quick_enquiry_active']); ?> />
                        <label for="quick_enquiry_active"></label>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="form" value="settings" />
            <input type="submit" value="Save" />
        </form>
    </div> <!-- content -->
<?php

}