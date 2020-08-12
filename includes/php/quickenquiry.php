<?php

/**
 * This file sends the "Quick Enquiry" email form
 */

// Check if form is sent
if (isset($_POST['form']) && $_POST['form'] == 'quickenquiry') {

    // Check if all required fields are sent
    if (isset($_POST['firstname']) && $_POST['firstname'] != null && isset($_POST['lastname']) && $_POST['lastname'] != null && isset($_POST['email']) && $_POST['email'] != null && isset($_POST['message']) && $_POST['message'] != null) {
        
        // Check if the email adress is valid
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            
            // Set variables
            $mailFrom = 'quickenquiry@universalelectro.nl';
            $mailReplyTo = htmlentities($_POST['email']);
            $mailTo = 'sales@universalelectro.nl';
            $mailSubject = 'Quick enquiry from '.htmlentities($_POST['firstname']).' '.htmlentities($_POST['lastname']);
            $mailMessage = htmlentities($_POST['message'])."\r\n"."\r\n".'Contact information: '."\r\n".'Reply to '.$mailReplyTo."\r\n".'Phone: '.htmlentities($_POST['phone'])."\r\n".'Company: '.htmlentities($_POST['company']);

            $mailHeaders = ['From' => $mailFrom,
                            'Reply-To' => $mailReplyTo];

            // Sent mail    
            if (mail($mailTo, $mailSubject, $mailMessage, $mailHeaders)) {
                // Message sent succesfully
                header('Location: index.php?action=1');
            } else {

                // Failed to sent message
                header('Location: index.php?action=2');
            }
        } else {
            // Failed to sent message
            header('Location: index.php?action=2');
        }
    }
}