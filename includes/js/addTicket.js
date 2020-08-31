function addTicket(field)
{
    var value = document.getElementById(field).value;
    var messageTarget = document.getElementById('message');

    switch(field) {

        case 'file':

            // Check if file is not null
            if (value != null && value != '' && value != undefined && value != false) {
                // Style button to green
                document.getElementById('filelabel').style.color = 'rgba(0, 255, 0, 1)';
                document.getElementById('filelabel').style.border = '1px solid rgba(0, 255, 0, 1)';
                
                // Change text
                document.getElementById('filelabel').innerHTML = 'File selected';

            }
            
            break;

        case 'notification':

        if (document.getElementById('notification').checked) {

                // Style button to green
                document.getElementById('notiflabel').style.color = 'rgba(0, 255, 0, 1)';
                document.getElementById('notiflabel').style.border = '1px solid rgba(0, 255, 0, 1)';

                // Change text
                document.getElementById('notiflabel').innerHTML = 'Yes';

            } else {

                console.log(32);
                // Style button to red
                document.getElementById('notiflabel').style.color = 'rgba(255, 0, 0, 1)';
                document.getElementById('notiflabel').style.border = '1px solid rgba(255, 0, 0, 1)';

                // Change text
                document.getElementById('notiflabel').innerHTML = 'No';
            }

            break;
    }
}