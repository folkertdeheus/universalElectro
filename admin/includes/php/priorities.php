<?php

/**
 * This function switches the priority number to text
 * 
 * @param int $prio
 * @return string
 */
function priorities($prio)
{
    switch($prio) {
        case '1':
            return 'Low';

        case '2':
            return  'Normal';

        case '3':
            return 'High';

        case '4':
            return 'Critical';

        default:
            return 'Normal';
    }
}