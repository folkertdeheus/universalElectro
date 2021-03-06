/**
 * Function to define te right language on page load, and change of language
 * @param {string} lang Either "English" or "Nederlands" 
 */
function languageChange(lang = null) {

    // Get language button
    var button = document.getElementById('language');

    // Get language-changeable items
    var mainEnglish = document.getElementById('mainEnglish');
    var mainDutch = document.getElementById('mainDutch');

    // Check field value when the language is not send on page load
    if (lang == null) {
        
        // Get active language from button
        var language = button.innerHTML.replace(/\s+/g, '');
        var result = language;

        // Set language to local storage
        localStorage.setItem('language', result);

    } else {
        // Result is stored in local storage when page was loaded
        var result = lang;
    }

    // Set new language in button
    if (result == 'English') {
        button.innerHTML = 'Nederlands';
    } else {
        button.innerHTML = 'English';
    }

    // Set the right main field active, hide the other
    // For loop used for looping through menu items, instead of defining them all seperatly
    if (result == 'Nederlands') {
        // Header
        document.getElementById('en_header').style.display = 'none';
        document.getElementById('nl_header').style.display = 'block';

        if (document.getElementById('cookienotice').style.display != 'none') {
            document.getElementById('en_notice').style.display = 'none';
            document.getElementById('nl_notice').style.display = 'block';
        }

        // Main content
        mainEnglish.style.display = 'none';
        mainDutch.style.display = 'block';

        // Quick enquiry
        document.getElementById('en_qe_title').style.display = 'none';
        document.getElementById('en_qe_question').style.display = 'none';
        document.getElementById('en_qe_message').style.display = 'none';
        document.getElementById('en_qe_form').style.display = 'none';
        document.getElementById('nl_qe_title').style.display = 'block';
        document.getElementById('nl_qe_question').style.display = 'block';
        document.getElementById('nl_qe_message').style.display = 'block';
        document.getElementById('nl_qe_form').style.display = 'grid';

        // Footer
        document.getElementById('en_footer').style.display = 'none';
        document.getElementById('nl_footer').style.display = 'flex';
        

        // Menu items
        for(i = 1; i <= 6; i++) {
            console.log('i: ' + i);
            document.getElementById('en_menu' + i).style.display = 'none';
            document.getElementById('nl_menu' + i).style.display = 'block';
        }

    } else {
        // Header
        document.getElementById('en_header').style.display = 'block';
        document.getElementById('nl_header').style.display = 'none';

        if (document.getElementById('cookienotice').style.display != 'none') {
            document.getElementById('en_notice').style.display = 'block';
            document.getElementById('nl_notice').style.display = 'none';
        }

        // Main content
        mainEnglish.style.display = 'block';
        mainDutch.style.display = 'none';

        // Quick enquiry
        document.getElementById('en_qe_title').style.display = 'block';
        document.getElementById('en_qe_question').style.display = 'block';
        document.getElementById('en_qe_message').style.display = 'block';
        document.getElementById('en_qe_form').style.display = 'grid';
        document.getElementById('nl_qe_title').style.display = 'none';
        document.getElementById('nl_qe_question').style.display = 'none';
        document.getElementById('nl_qe_message').style.display = 'none';
        document.getElementById('nl_qe_form').style.display = 'none';

        // Footer
        document.getElementById('en_footer').style.display = 'flex';
        document.getElementById('nl_footer').style.display = 'none';

        // Menu items
        for(i = 1; i <= 6; i++) {
            document.getElementById('en_menu' + i).style.display = 'block';
            document.getElementById('nl_menu' + i).style.display = 'none';
        }
    }
}