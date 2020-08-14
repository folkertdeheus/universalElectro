function addproduct(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');

    switch(field) {

        case 'name':

            // Check if name is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Name is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'brands':

            // Check if brands is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Brands is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'categories':

            // Check if brands is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Categories is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'articlenumber':

            // Check if brands is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Articlenumber is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'nl_description':

            // Check if brands is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'Dutch description is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;

        case 'en_description':

            // Check if brands is not null
            if (value == null || value == '' || value == undefined || value == false) {
                messageTarget.innerHTML = 'English description is a required field';
            } else {
                messageTarget.innerHTML = '';
            }

            break;
    }
}