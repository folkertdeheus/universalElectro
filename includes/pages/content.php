<div class="container">

<?php

    // Check if action is set
    if (isset($_GET['action']) && $_GET['action'] != null) {

        // Action switch
        switch($_GET['action']) {

            case '1':
                // Email sent succesfully
                require_once('includes/pages/emailsucces.php');

                break;

            case '2':
                // Failed to sent email
                require_once('includes/pages/emailfailed.php');

                break;
            
            default:
                // Home
                require_once('includes/pages/home.php');
        }
    } else {

        // Home
        require_once('includes/pages/home.php');
    }

    // Footer
    require_once('includes/pages/footer.php');
?>

</div> <!-- container -->