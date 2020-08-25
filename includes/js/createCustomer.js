function createCustomer(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');

    switch(field) {

        case 'firstname':

            // Check if firstname is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Firstname is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'lastname':

            // Check if lastname is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Lastname is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'email':

            // Check if email is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Email is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'password':

            // Check if password is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Password is a required field';
            } else {
                // Check if password and repeat password match
                var password = document.getElementById('password').value;
                var rpassword = document.getElementById('rpassword').value;

                if (password != rpassword) {
                    message.innerHTML = "The passwords don't match";
                } else {
                    messageTarget.innerHTML = '';
                }
            }

            break;

        case 'rpassword':

            // Check if password is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Repeat password is a required field';
            } else {
                // Check if password and repeat password match
                var password = document.getElementById('password').value;
                var rpassword = document.getElementById('rpassword').value;

                if (password != rpassword) {
                    message.innerHTML = "The passwords don't match";
                }
            }

            break;
    }
}