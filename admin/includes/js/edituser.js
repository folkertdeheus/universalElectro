function edituser(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');

    switch(field) {

        case 'username':

            // Check if username is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Username is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'password':

            // Check if password is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Password is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'rpassword':

            // Check if password and repeat password match
            var password = document.getElementById('password').value;
            var rpassword = document.getElementById('rpassword').value;

            if (password != rpassword) {
                message.innerHTML = "The passwords don't match";
            }
    }
}