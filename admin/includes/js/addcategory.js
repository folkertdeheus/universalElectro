function addcategory(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');

    switch(field) {

        case 'nl_name':
            // Check if name is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch name is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'en_name':
            // Check if name is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English name is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
    }
}