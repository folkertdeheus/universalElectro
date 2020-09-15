<?php

/**
 * This function decrypts data
 * 
 * @param string $input
 * @return string
 */
function decrypt($input, $iv) : string
{
    $method = "AES-256-CBC";
    return openssl_decrypt($input, $method, $GLOBALS['openSslKey'], 0, $iv);
}