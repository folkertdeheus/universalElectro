<?php

/**
 * This file contains the main menu of the CMS
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get pageviews
    $pageviews = $q->pageviews();

    // Count total pageviews
    $total_pageviews = count($pageviews);

    // Set pageview countries
    $pageview_countries = array();

    // Loop through all pageviews
    foreach($pageviews as $pageviewKey => $pageviewValue) {

        array_push($pageview_countries, ipInfo($pageviewValue['ip'], 'Country'));

    }
    // Remove null entries
    $pageview_countries = array_filter($pageview_countries);

    // Set distinct entries
    $distinct_countries = array_unique($pageview_countries);
    $count_countries = array_count_values($pageview_countries);

    // Set total country entries
    $total_count = array_sum($count_countries);

    // Count unaccounted views
    $unaccounted_views = $total_pageviews - $total_count;

    // Sort descending
    arsort($count_countries);

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
        <span>Website statistics</span>

        <table>
            <tr>
                <td>Total pageviews</td>
                <td><?= $total_pageviews; ?></td>
            </tr>
            <tr>
                <td>Visited by</td>
                <td>
<?php
                    // Loop through countries
                    foreach($count_countries as $countryKey => $countryValue) {

                        // Calculate percentage
                        $percentage = $countryValue / $total_count * 100;

                        echo $countryKey.' ('.$percentage.'%)<br>';
                    }
?>
                </td>
            </tr>
            <tr>
                <td>Unaccounted views</td>
                <td><?= $unaccounted_views; ?></td>
            </tr>
        </table>

    </div> <!-- stats -->

<?php
}