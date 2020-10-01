<?php

/**
 * This file contains the language settings page
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get language data
    $logs = $q->allLogs();
?>

    <div class="content">
        <table>
            <tr>
                <th>Timestamp</th>
                <th>Table</th>
                <th>Action</th>
                <th>Description</th>
            </tr>
<?php
            // Loop through log rows
            foreach($logs as $logKey => $logValue) {
?>
                <tr>
                    <td><?= $logValue['timestamp']; ?></td>
                    <td><?= $logValue['table_source']; ?></td>
                    <td><?= $logValue['action']; ?></td>
                    <td><?= $logValue['description']; ?></td>
                </tr>
<?php
            }
?>
        </table>
    </div> <!-- content -->

<?php

}