function adduser()
{
    var password = document.getElementById('password').value;
    var rpassword = document.getElementById('rpassword').value;
    var message = document.getElementById('message');

    if (password != rpassword) {
        message.innerHTML = "The passwords don't match";
    }
}