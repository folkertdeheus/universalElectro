<?php

session_start();

// Set errors on
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include php files
include('includes/php/include.php');
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Blackbeard">
    <meta name="author" content="Folkert de Heus">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <title>Blackbeard: Universal Electro</title>
    
    <link rel="stylesheet" href="includes/css/defaults.css">
    <link rel="stylesheet" media="screen and (min-width: 1200px)" href="includes/css/styleLarge.css">
    <link rel="stylesheet" media="screen and (min-width: 800px) and (max-width: 1199px)" href="includes/css/styleMedium.css">
    <link rel="stylesheet" media="screen and (min-width: 600px) and (max-width: 799px)" href="includes/css/styleSmall.css">
    <link rel="stylesheet" media="screen and (max-width: 599px)" href="includes/css/styleMobile.css">

    <link rel="icon" type="image/png" href="../includes/images/logo.png">

    <script src="includes/js/adduser.js"></script>
    <script src="includes/js/edituser.js"></script>
    <script src="includes/js/addbrand.js"></script>
    <script src="includes/js/editbrand.js"></script>
</head>

<body>

    <header>
        <a href="index.php">Universal<br><span>Electro</span></a>
    </header>

    <div class="breadcrumbs">
<?php
        // Include breadcrumbs
        require_once('includes/pages/breadcrumbs.php');
?>
    </div> <!-- breadcrumbs -->

    <main>
<?php
        if (login()) {

            // Content page switch
            require_once('includes/pages/default.php');

        } else {

            // Login page
            require_once('includes/pages/login.php');

        }
?>
    </main>
</body>

</html>