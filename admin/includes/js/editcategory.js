function editcategory(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');

    // Check if username is not null
    if (value == null || value == '' || value == undefined || value == false) {
        messageTarget.innerHTML = 'Name is a required field';
    } else {
        messageTarget.innerHTML = '';
    }
}