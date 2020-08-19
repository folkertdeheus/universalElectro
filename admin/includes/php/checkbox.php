<?php

/**
 * This file contains a function that checks a checkbox value
 * If the value is 1 or true it echo's " checked "
 * If the value is not 1, it does nothing
 * 
 * @param mixed $value
 */

function cb($value)
{
    if ($value == 1 || $value === true) {
        echo ' checked ';
    }
}