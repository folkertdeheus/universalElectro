<?php

/**
 * This file contains the ticket settings form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get settings
    $settings = $q->getTicketSettings();

    // Get ticket statusses
    $status = $q->getTicketStatusses();

?>

    <div class="content settings">
        <form method="post" action="index.php?page=4&action=4&cat=3">
            <table>
                <tr>
                    <td>Initial Status</td>
                    <td>
                        <select name="initialStatus">
<?php
                           foreach($status as $statusKey => $statusValue) {
                               $checked = null;
                               if ($statusValue['id'] == $settings['initial_status']) {
                                   $checked = ' selected ';
                               }
?>
                                <option value="<?= $statusValue['id']; ?>" <?= $checked; ?>><?= $statusValue['name']; ?></option>
<?php
                            }
?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan=2>
                        <input type="hidden" name="form" value="editTicketSettings" />
                        <input type="submit" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}