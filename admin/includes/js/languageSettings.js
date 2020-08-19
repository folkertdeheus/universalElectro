function languageSettings(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');

    switch(field) {

        case 'nl_header_text':
            
            // Check if nl_header_test is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch header text is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_header_text':
                        
            // Check if en_header_text is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English header text is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_button':
                        
            // Check if nl_quickenquiry_button is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch button text is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_button':
                        
            // Check if en_quickenquiry_button is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English button text is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_text':
                        
            // Check if nl_quickenquiry_text is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch top text is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_text':
                        
            // Check if en_quickenquiry_text is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English top text is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_firstname':
                        
            // Check if nl_quickenquiry_firstname is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch firstname is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_firstname':
                        
            // Check if en_quickenquiry_firstname is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English firstname is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_lastname':
                        
            // Check if nl_quickenquiry_lastname is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch lastname is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_lastname':
                        
            // Check if en_quickenquiry_lastname is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English lastname is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_company':
                        
            // Check if nl_quickenquiry_company is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch company is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_company':
                        
            // Check if en_quickenquiry_company is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English company is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_email':
                        
            // Check if nl_quickenquiry_email is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch email is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_email':
                        
            // Check if en_quickenquiry_email is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English email is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_phone':
                        
            // Check if nl_quickenquiry_phone is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch phone is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_phone':
                        
            // Check if en_quickenquiry_phone is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English phone is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_message':
                        
            // Check if nl_quickenquiry_message is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch message is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_message':
                        
            // Check if en_quickenquiry_message is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English message is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_send':
                        
            // Check if nl_quickenquiry_send is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch send is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_send':
                        
            // Check if en_quickenquiry_send is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English "send" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_disclaimer':
                        
            // Check if nl_quickenquiry_disclaimer is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch disclaimer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_disclaimer':
                        
            // Check if en_quickenquiry_disclaimer is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English disclaimer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_menu_home':
                        
            // Check if nl_menu_home is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch "home" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_menu_home':
                        
            // Check if en_menu_home is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English "home" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_menu_webshop':
                        
            // Check if nl_menu_webshop is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch "webshop" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_menu_webshop':
                        
            // Check if en_menu_webshop is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English "webshop" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_menu_login':
                        
            // Check if nl_menu_login is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch "login" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_menu_login':
                        
            // Check if en_menu_login is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English "login" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_menu_contact':
                        
            // Check if nl_menu_contact is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch "contact" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_menu_contact':
                        
            // Check if en_menu_contact is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English "contact" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_menu_search':
                        
            // Check if nl_menu_search is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch "search" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_menu_search':
                        
            // Check if en_menu_search is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English "search" is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_footer_adress':
                        
            // Check if nl_footer_adress is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch adress footer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_footer_adress':
                                    
            // Check if en_footer_adress is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English adress footer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_footer_contact':
                                    
            // Check if nl_footer_contact is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch contact footer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_footer_contact':
                                    
            // Check if en_footer_contact is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English contact footer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_footer_tax':
                                    
            // Check if nl_footer_tax is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch tax footer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_footer_tax':
                                    
            // Check if en_footer_tax is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English tax footer is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_success':
                                    
            // Check if nl_quickenquiry_success is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch success message is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_success':
                                    
            // Check if nl_quickenquiry_success is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English success message is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'nl_quickenquiry_failed':
                                    
            // Check if nl_quickenquiry_failed is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch failed message is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
        case 'en_quickenquiry_failed':
                                    
            // Check if en_quickenquiry_failed is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English failed message is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
            
    }
}