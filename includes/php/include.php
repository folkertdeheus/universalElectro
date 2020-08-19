<?php

/**
 * This file includes all the needed php files in one document
 */

// Define default paths for php files
define('PATH', 'includes/php/');
define('ADM', 'admin/includes/php/');

// Include languages files
require_once(PATH.'languages/en.php');
require_once(PATH.'languages/nl.php');
require_once(PATH.'quickenquiry.php');

// Miscelaneous files
require_once(ADM.'acceptedFiles.php');
require_once(PATH.'setCategoryImage.php');

// Database settings
require_once(ADM.'conn.php');

// Database connection
require_once(ADM.'classes/db.php');
$db = new \Blackbeard\Db($db_name, $db_host, $db_username, $db_password);

// Queries
require_once(ADM.'classes/queries.php');
$q = new \Blackbeard\Queries($db_name, $db_host, $db_username, $db_password);