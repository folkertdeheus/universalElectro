function editbrand(field)
{
    value = document.getElementById(field).value;
    messageTarget = document.getElementById('message');

    if (value == null || value == '' || value == undefined || value == false) {
        messageTarget.innerHTML = 'Name is a required field';
    } else {
        messageTarget.innerHTML = '';
    }
}