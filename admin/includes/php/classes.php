<?php

/**
 * This file contains all class instantiatons
 */

// Database class
$db = new \Blackbeard\Db($db_name, $db_host, $db_username, $db_password);

// Formhandling class
$forms = new \Blackbeard\Forms();

// Trigger login class
// Creator session = $_SESSION['user'] == '00'
$login = new \Blackbeard\BlackbeardLogin();

// Create queries class
// Makes queries callable from outside the classes
$q = new \Blackbeard\Queries($db_name, $db_host, $db_username, $db_password);