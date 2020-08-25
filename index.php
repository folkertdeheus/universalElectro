<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
</head>

<body>

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