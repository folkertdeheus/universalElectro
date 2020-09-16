/**
 * This file checks if the cookienotice is clicked, so it can be hidden
 */

// Function to remove the cookie notice
function cookienotice() {

    document.getElementById('cookienotice').style.display = 'none';
    
    localStorage.setItem('cookienotice', 'true');
}