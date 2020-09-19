/**
 * This file contains the quick enquiry onclick toggle
 */

function quickenquiry(action)
{
    var content = document.getElementById('quickenquirycontent');
    var button = document.getElementById('quickenquirybutton');
    var close = document.getElementById('quickenquiryclose');

    // Open quick enquiry form
    if (action == 'open') {
        content.style.display = 'block';
        button.style.display = 'none';
        close.style.display = 'block';
    } else {
        content.style.display = 'none';
        button.style.display = 'block';
        close.style.display = 'none';
    }
}