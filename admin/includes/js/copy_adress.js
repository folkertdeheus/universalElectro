function copy_adress()
{
    var sAdress = document.getElementById('shipping_street').value;
    var sNumber = document.getElementById('shipping_housenumber').value;
    var sPostal = document.getElementById('shipping_postalcode').value;
    var sCity = document.getElementById('shipping_city').value;
    var sProvence = document.getElementById('shipping_provence').value;
    var sCountry = document.getElementById('shipping_country').value;

    document.getElementById('billing_street').value = sAdress;
    document.getElementById('billing_housenumber').value = sNumber;
    document.getElementById('billing_postalcode').value = sPostal;
    document.getElementById('billing_city').value = sCity;
    document.getElementById('billing_provence').value = sProvence;
    document.getElementById('billing_country').value = sCountry;
}