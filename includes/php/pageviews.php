<?php

/**
 * This file contains logging of the pageview
 */

$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
$agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
$protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : null;
$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;

$ipInfo = ipInfo($_SERVER['REMOTE_ADDR']);

$city = 'Unknown';
if (isset($ipInfo['city']) && $ipInfo['city'] != null) {
    $city = $ipInfo['city'];
}

$state = 'Unknown';
if (isset($ipInfo['state']) && $ipInfo['state'] != null) {
    $state = $ipInfo['state'];
}

$country = 'Unknown';
if (isset($ipInfo['country']) && $ipInfo['country'] != null) {
    $country = $ipInfo['country'];
}

$continent = 'Unknown';
if (isset($ipInfo['continent']) && $ipInfo['continent'] != null) {
    $city = $ipInfo['continent'];
}


// Insert pageview
$q->addPageview($ip, $agent, $referer, $protocol, $method, $city, $state, $country, $continent);