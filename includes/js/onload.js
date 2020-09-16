/**
 * This file contains the functions to be handled after the page has loaded
 * 1. Check if the cookie notice was clicked
 * 2. Check the language
 */

window.onload = function() {
    
    // Get the cookienotice value
    var notice = localStorage.getItem('cookienotice');

    // Check if the banner was clicked
    if (notice == 'true') {
        document.getElementById('cookienotice').style.display = 'none';
    }


    // Check if language is already stored in the browser's local storage
    var storedLanguage = localStorage.getItem('language');

    // Send stored language with the function if set
    if (storedLanguage == 'English' || storedLanguage == 'Nederlands') {
        languageChange(storedLanguage);
    } else {
        languageChange();
    }
}