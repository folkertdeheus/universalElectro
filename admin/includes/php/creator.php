<?php

/**
 * This file checks if the current active user session is from the creator
 * It sets the $creator boolean to true, to activate all of the CMS functions
 */

$creator = false;

if (isset($_SESSION['user']) && $_SESSION['user'] == $creatorSession) {
    
    $creator = true;

}