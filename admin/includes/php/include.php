<?php

/**
 * This page includes all php files
 */

define('PATH', 'includes/php/');
define('CLAS', 'includes/php/classes/');

require_once(PATH.'openssl.php');
require_once(PATH.'language.php');
require_once(PATH.'acceptedFiles.php');
require_once(PATH.'conn.php');
require_once(PATH.'salt.php');
require_once(PATH.'defaults.php');
require_once(PATH.'creator.php');
require_once(PATH.'login.php');
require_once(PATH.'classes/db.php');
require_once(PATH.'user.php');
require_once(PATH.'checkbox.php');

require_once(CLAS.'queries.php');
require_once(CLAS.'forms.php');
require_once(CLAS.'login.php');

require_once(PATH.'classes.php');
require_once(PATH.'decrypt.php');
require_once(PATH.'ipInfo.php');
require_once(PATH.'priorities.php');