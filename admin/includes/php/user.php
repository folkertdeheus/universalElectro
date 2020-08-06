<?php

/**
 * This function sets the username of the active session
 */

function user()
{
    // Check if a session is set
    if (isset($_SESSION['user']) && $_SESSION['user'] != null) {

        // Check if the creator logged in
        if ($_SESSION['user'] == $GLOBALS['creatorSession']) {
    
            return 'Creator';
        
        } else {

            // Return username from id
            $user = $GLOBALS['db']->row('SELECT * FROM `users` WHERE `id` = ?', array($_SESSION['user']));
            return $user['username'];

        }
    }
}