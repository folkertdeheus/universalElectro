function ticketreply(field) {
    var value = document.getElementById(field).value;

    switch(field) {
        case 'file':

            if (value != null && value != '' && value != undefined && value != false) {

                // Style button to green
                document.getElementById('filelabel').style.color = 'rgba(35, 31, 32, 1)';
                document.getElementById('filelabel').style.backgroundColor = 'rgba(0, 255, 0, 1)';

                // Change text
                document.getElementById('filelabel').innerHTML = 'Document added';

            } else {

                // Style button to red
                document.getElementById('filelabel').style.color = 'rgba(35, 31, 32, 1)';
                document.getElementById('filelabel').style.backgroundColor = 'rgba(255, 0, 0, 1)';

                // Change text
                document.getElementById('filelabel').innerHTML = 'Add attachment';
            }

            break;
    }
}