<?php

/**
 * This file contains the main content switch
 */

?>

<div class="container">

<?php

    if (isset($_GET['page']) && $_GET['page'] != null) {

        switch($_GET['page']) {
            
            case '1':

                // Webshop
                require_once('includes/pages/webshop/default.php');

                break;
            
            case '2':

                // Login
                require_once('includes/pages/login/default.php');

                break;

            case '3':

                // Contact
                require_once('includes/pages/contact/default.php');

                break;

            case '4':

                // Search
                require_once('includes/pages/search/default.php');

                break;
            
            case '5':

                // Email sent succesfully
                require_once('includes/pages/emailsucces.php');

                break;

            case '6':

                // Falied to sent mail
                require_once('includes/pages/emailfailed.php');

                break;
            
            default:

                // Home
                require_one('includes/pages/home.php');
        }

    } else {

        // Home
        require_once('includes/pages/home.php');
    }

    // Footer
    require_once('includes/pages/footer.php');
?>

</div> <!-- container -->