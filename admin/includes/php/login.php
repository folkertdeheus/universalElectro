<?php

/**
 * This file checks if a user has logged in
 * @return boolean
 */

function login()
{
    if ($GLOBALS['creator'] == true || (isset($_SESSION['user']) && $_SESSION['user'] != null)) {
        
        return true;
    
    }
    
    return false;
}