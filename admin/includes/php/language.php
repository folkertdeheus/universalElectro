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
        'menu_cart' => '"Shopping cart"'
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
        'account_save' => '"Save"',
        'account_logout' => '"Logout"'
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
    ],
    'Tickets' => [
        'tickets_login' => 'First login message',
        'tickets_gotologin' => 'Go to login page',
        'tickets_newticket' => '"New ticket"',
        'tickets_category' => '"Category"',
        'tickets_priority' => '"Priority"',
        'tickets_attachment' => '"Attachment"',
        'tickets_upload' => '"Upload file"',
        'tickets_subject' => '"Subject"',
        'tickets_message' => '"Message"',
        'tickets_submit' => '"Submit"',
        'tickets_notifications' => '"Email notifications"',
        'tickets_priolow' => 'Low priority',
        'tickets_priomed' => 'Normal priority',
        'tickets_priohigh' => 'High priority',
        'tickets_priocrit' => 'Critical priority',
        'tickets_tickets' => '"Tickets"',
        'tickets_started' => '"Started"',
        'tickets_notickets' => 'No tickets message',
        'tickets_goback' => '"Back to tickets"',
        'tickets_close' => '"Close ticket"',
        'tickets_posted' => '"Message posted"',
        'tickets_file' => '"File"'
    ],
    'Search' => [
        'search_search' => '"Search"',
        'search_searchfield' => 'Searchfield',
        'search_go' => 'Go search',
        'search_products' => '"Products"',
        'search_brands' => '"Brands"',
        'search_categories' => '"Categories"',
        'search_name' => '"Product name"',
        'search_brand' => '"Product brand"',
        'search_category' => '"Product category"',
        'search_articlenumber' => '"Product articlenumber"',
    ],
    'Quotation' => [
        'quote_deleted' => 'Quotation deleted',
        'quote_cart' => '"Quotation shopping cart"',
        'quote_amount' => '"Amount"',
        'quote_product' => '"Product"',
        'quote_brand' => '"Brand"',
        'quote_continue' => '"Continue shopping"',
        'quote_request' => '"Request quotation"',
        'quote_check' => '"Check quotation request"',
        'quote_account' => '"Account"',
        'quote_edit' => '"Edit quotation"',
        'quote_cancel' => '"Cancel quotation"',
        'quote_send' => '"Send quotation request"',
        'quote_login' => '"Login message"',
        'quote_sent' => '"Quotation request sent"'
    ],
    'Products' => [
        'product_articlenumber' => '"Articlenumber"',
        'product_brand' => '"Brand"',
        'product_category' => '"Category"',
        'product_condition' => '"Condition"',
        'product_price' => '"Price"',
        'product_amount' => '"Amount"',
        'product_addtocart' => '"Add to cart"'
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