<?php

/**
 * This pages logs out a user and redirects to the home page
 */

$_SESSION['user'] = null;
session_destroy();

header('Location: index.php');