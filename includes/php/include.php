<?php

/**
 * This file includes all the needed php files in one document
 */

// Define default paths for php files
define('PATH', 'includes/php/');
define('ADM', 'admin/includes/php/');

// Get open SSL key
require_once(ADM.'openssl.php');

// Logout
require_once(PATH.'logout.php');

// Include languages files
require_once(PATH.'quickenquiry.php');

// Miscelaneous files
require_once(ADM.'acceptedFiles.php');
require_once(PATH.'setCategoryImage.php');
require_once(ADM.'salt.php');
require_once(PATH.'login.php');

// Database settings
require_once(ADM.'conn.php');

// Database connection
require_once(ADM.'classes/db.php');
$db = new \Blackbeard\Db($db_name, $db_host, $db_username, $db_password);

// Queries
require_once(ADM.'classes/queries.php');
$q = new \Blackbeard\Queries($db_name, $db_host, $db_username, $db_password);

// Webforms
require_once(PATH.'classes/webforms.php');
$forms = new \Blackbeard\Webforms();

// Login class
require_once(PATH.'classes/login.php');
$login = new \Blackbeard\WebLogin();

// Webshop session creation and cookie setting/getting
require_once(PATH.'webshopsession.php');

// Decryption
require_once(ADM.'decrypt.php');

// Get IP Info
require_once(ADM.'ipInfo.php');

// Pageview
require_once(PATH.'pageviews.php');

// Quotation request sending
require_once(PATH.'sendQuotation.php');