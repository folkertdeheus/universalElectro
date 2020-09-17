<?php

/**
 * This file contains the main menu of the CMS
 */

// Check if user is logged in when accessing this file
if (login()) {

?>
    <div class="menutop">
        <div class="menublock">
            <a href="index.php?page=1">Customer Relations Management</a>
            <div class="menuright">
                <a href="index.php?page=1&action=1">Customers</a>
                <a href="index.php?page=1&action=2">Tickets</a>
                <a href="index.php?page=1&action=3">Messages</a>
            </div> <!-- menuright -->
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=2">Shop</a>
            <div class="menuright">
                <a href="index.php?page=2&action=1">Products</a>
                <a href="index.php?page=2&action=4">Categories</a>
                <a href="index.php?page=2&action=3">Brands</a>
                <a href="index.php?page=2&action=2">Quotations</a>
            </div> <!-- menuright -->
        </div> <!-- menublock -->
    </div> <!-- menutop -->

    <div class="menubottom">
        <div class="menublock">
            <a href="index.php?page=3">Pages</a>
        </div> <!-- menublock -->


        <div class="menublock">
            <a href="index.php?page=4">Settings</a>
        </div> <!-- menublock -->

        <div class="menublock">
            <a href="index.php?page=5">Logout</a>
        </div> <!-- menublock -->
    </div> <!-- menubottom -->

    <div class="stats">

<?php

        /**
         * IP STATISTICS
         */

        // Get pageviews
        $pageviews = $q->pageviews();

        // Count total pageviews
        $total_pageviews = count($pageviews);

        // Set pageview countries
        $pageview_countries = array();

        // Loop through all pageviews
        foreach($pageviews as $pageviewKey => $pageviewValue) {

            array_push($pageview_countries, ipInfo($pageviewValue['ip']));

        }

        echo 'Total pageviews: '.$total_pageviews;
        echo 'Countries: '; print_r($pageview_countries);
?>

    </div> <!-- stats -->

<?php
}