<?php

/**
 * This file checks if a user has logged in
 * @return boolean
 */

function login()
{

    if (isset($_SESSION['webuser']) && $_SESSION['webuser'] != null) {
        
        return true;
    
    }
    
    return false;
}