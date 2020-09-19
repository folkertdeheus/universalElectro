<?php

//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    
    //Prevent the rest of the script from executing.
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Include php files
include('includes/php/include.php');

// Get Settings
$settings = $q->allSettings();

// Get languages
$language = $q->allLanguages();
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Universal Electro">
    <meta name="author" content="Universal Electro">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <title>Universal Electro</title>
    
    <link rel="stylesheet" href="includes/css/defaults.css">
    <link rel="stylesheet" media="screen and (min-width: 1200px)" href="includes/css/styleLarge.css">
    <link rel="stylesheet" media="screen and (min-width: 800px) and (max-width: 1199px)" href="includes/css/styleMedium.css">
    <link rel="stylesheet" media="screen and (min-width: 600px) and (max-width: 799px)" href="includes/css/styleSmall.css">
    <link rel="stylesheet" media="screen and (max-width: 599px)" href="includes/css/styleMobile.css">

    <link rel="icon" type="image/png" href="includes/images/logo.png">

    <script src="includes/js/language.js"></script>
    <script src="includes/js/qe_mouseout.js"></script>
    <script src="includes/js/createCustomer.js"></script>
    <script src="includes/js/addTicket.js"></script>
    <script src="includes/js/cookienotice.js"></script>
    <script src="includes/js/changeImage.js"></script>
    <script src="includes/js/onload.js"></script>
</head>

<body>

    <div class="cookienotice" id="cookienotice" onclick="cookienotice()">
        <span id="en_notice"><?= $language['en_home_cookie']; ?></span>
        <span id="nl_notice"><?= $language['nl_home_cookie']; ?></span>
    </div>

<?php

    // Quick Enquiry
    require_once('includes/pages/quickenquiry.php');

    // Header
    require_once('includes/pages/header.php');

    // Content
    require_once('includes/pages/content.php');
?>

</body>
</html>