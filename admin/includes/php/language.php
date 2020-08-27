<?php

/**
 * This file contains the array for the language variables
 */

// Set fields with headers for form display
$languageFields = [
    'Header' => [
        'header_text' => '"Header text"',
    ],
    'Quick Enquiry' => [
        'quickenquiry_button' => 'Button text',
        'quickenquiry_text' => 'Top text',
        'quickenquiry_firstname' => '"First name"',
        'quickenquiry_lastname' => '"Last name"',
        'quickenquiry_company' => '"Company"',
        'quickenquiry_email' => '"Email"',
        'quickenquiry_phone' => '"Phone"',
        'quickenquiry_message' => '"Message"',
        'quickenquiry_send' => '"Send"',
        'quickenquiry_disclaimer' => 'Disclaimer',
        'quickenquiry_success' => 'Success message',
        'quickenquiry_failed' => 'Failed message'
    ],
    'Main Menu' => [
        'menu_home' => '"Home"',
        'menu_webshop' => '"Webshop"',
        'menu_login' => '"Login"',
        'menu_contact' => '"Contact"',
    ],
    'Company Data' => [
        'footer_adress' => 'Adress information',
        'footer_contact' => 'Contact information',
        'footer_tax' => 'Tax information'
    ],
    'Login' => [
        'login_login' => '"Login"',
        'login_createaccount' => '"Create account"',
        'login_email' => '"Email"',
        'login_password' => '"Password"',
    ],
    'Create account' => [
        'create_firstname' => '"First name"',
        'create_insertion' => '"Middle name"',
        'create_lastname' => '"Last name',
        'create_email' => '"Email"',
        'create_phone' => '"Phone"',
        'create_password' => '"Password"',
        'create_rpassword' => '"Repeat password"',
        'create_create' => '"Create account"',
        'create_notvalid' => '"No valid email"',
        'create_notunique' => '"No unique email"',
        'create_success' => '"Account added"',
    ],
    'Account' => [
        'account_basic' => '"Basic information"',
        'account_name' => '"Name"',
        'account_firstname' => '"First name"',
        'account_insertion' => '"Middle name"',
        'account_lastname' => '"Last name"',
        'account_email' => '"Email"',
        'account_phone' => '"Phone"',
        'account_company' => '"Company"',
        'account_tax' => '"Tax number"',
        'account_shipping' => '"Shipping information"',
        'account_adress' => '"Adress"',
        'account_street' => '"Street"',
        'account_housenumber' => '"Housenumber"',
        'account_postalcode' => '"Postal code"',
        'account_city' => '"City"',
        'account_provence' => '"Provence"',
        'account_country' => '"Country"',
        'account_billing' => '"Billing information"',
        'account_edit' => '"Edit"',
        'account_changepw' => '"Change password"',
        'account_orderhistory' => '"Order history"',
        'account_noorders' => '"No orders"',
        'account_tickets' => '"Tickets"',
        'account_notickets' => '"No tickets"',
        'account_newticket' => '"New ticket"',
        'account_save' => '"Save"'
    ],
    'Change password' => [
        'changepw_changepw' => '"Change password"',
        'changepw_oldpw' => '"Old password"',
        'changepw_newpw' => '"New password"',
        'changepw_repeatpw' => '"Repeat password"',
        'changepw_save' => '"Save"'
    ],
    'Contact' => [
        'contact_contact' => '"Contact"',
        'contact_choosecontact' => 'Choose contact when...',
        'contact_gotoform' => 'Go to form',
        'contact_tickets' => '"Tickets"',
        'contact_choosetickets' => 'Choose tickets when...',
        'contact_gototickets' => 'Go to tickets',
        'contact_name' => '"Name"',
        'contact_email' => '"Email"',
        'contact_phone' => '"Phone"',
        'contact_subject' => '"Subject"',
        'contact_message' => '"Message"',
        'contact_send' => '"Send"'
    ]
];

$fieldsTextarea = [
    'quickenquiry_disclaimer',
    'footer_adress',
    'footer_contact',
    'footer_tax',
    'contact_choosecontact',
    'contact_choosetickets'
];

// Set array with the names without headings for form handling
$fieldsArray = array();

foreach($languageFields as $lKey => $lArray) {

    foreach($lArray as $fieldKey => $fieldValue) {
        array_push($fieldsArray, 'nl_'.$fieldKey);
        array_push($fieldsArray, 'en_'.$fieldKey);
    }
}