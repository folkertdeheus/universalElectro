<?php

/**
 * This file contains the user management
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>
    <div class="content">

        <div class="toolbar">
            <a href="index.php?page=4&action=1&sub=1">Add user</a>
        </div> <!-- toolbar -->

        <div class="table">
<?php
            // Count total rows of users in database
            // If 0 users found, display message
            // If 1 or more users found, display table
            $countUsers = $q->countUsers();

            if ($countUsers > 0) {

                $users = $q->allUsers();
?>
                <table>
                    <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td></td>
                        <td></td>
                    </tr>
<?php
                foreach($users as $userKey => $userValue) {
?>
                    <tr>
                        <td><?= $userValue['id']; ?></td>
                        <td><?= $userValue['username']; ?></td>
                        <td class="icon"><a href="index.php?page=4&action=1&sub=2&id=<?= $userValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                        <td class="icon"><a href="index.php?page=4&action=1&sub=3&id=<?= $userValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                    </tr>
<?php
                }
?>
                </table>
<?php
            } else {

                echo 'No users';

            }
        }
?>
        </div> <!-- table -->
    </div> <!-- content -->