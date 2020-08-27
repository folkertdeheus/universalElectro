function languageSettings(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');
    var placeholder = document.getElementById(field).placeholder;
            
    // Check required field is set
    if (value == null || value == '' || value == undefined || value == false) {
        messageTarget.innerHTML = placeholder + ' is a required field';
    } else {
        messageTarget.innerHTML = '';
    }
}