<?php

/**
 * This file contains logging of the pageview
 */

// Insert pageview
$q->addPageview($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['HTTP_REFERER'], $_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']);