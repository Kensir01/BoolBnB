import axios from 'axios';

//const mix = require('laravel-mix');
var api_key = process.env.MIX_TOM_TOM_KEY;
// console.log(api_key)


let cityList = document.getElementById('cityList');
let cityInput = document.getElementById('city');

let addressList = document.getElementById('addressList')
let addressInput = document.getElementById('address');

let zipInput = document.getElementById('zip_code');

let city = '';

//Rilascio il tasto fa la chiamata api: dal 4 carattere e ogni 2 dopo
cityInput.addEventListener('keyup', function() {

    if (this.value.length >= 4) {
        if (this.value.length % 2 == 0) {
            //console.log('Funziona');
            city = this.value;

            axios.get(`https://api.tomtom.com/search/2/search/${city}.json`, {
                params: {
                 key: api_key,
                 typeahead: true,
                 limit: 3
                }
            })
            .then(function (response) {

                // console.log(response);
                let list = response.data.results;
                // Array con solo i nomi e le province
                let cityNames = getCityName(list);


                writingCityList(cityList, cityNames);

                // console.log('Risultati trovati: ' + city);
                // console.log('Risultati per: ' + cityNames)
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                // always executed
            });  
        }    
    }
    
});


addressInput.addEventListener('keyup', function() {

    if (this.value.length >= 4) {
        if (this.value.length % 2 == 0) {
            //console.log('Funziona');

            let address = this.value;

            axios.get(`https://api.tomtom.com/search/2/search/${city}_${address}.json`, {
                params: {
                 key: api_key,
                 typeahead: true,
                 limit: 3
                }
            })
            .then(function (response) {

                // console.log(response);
                let list = response.data.results;
                // Array con solo i nomi e le province
                let addressNames = getAddressName(list);


                writingAddressList(addressList, addressNames);

                // console.log('Risultati trovati: ' + city);
                // console.log('Risultati per: ' + cityNames)
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                // always executed
            });  
        }    
    }
    
});

//Ottieni un array con solo la lista dei nomi città + provincia
function getCityName(array) {
    let length = array.length;
    let names = [];

    for (let i = 0; i < length; i++) {
        names.push(array[i].address.municipality + ', ' + array[i].address.countrySecondarySubdivision);
    }

    return names;
};

function getAddressName(array) {
    let length = array.length;
    let names = [];

    for (let i = 0; i < length; i++) {
        names.push(
            {
                'street' : array[i].address.streetName,
                'zip_code' : array[i].address.postalCode
            }
        );
    }

    return names;
};


function writingCityList(list, array) {
    list.innerHTML = '';
    
    array.forEach(element => {

        let newItem = document.createElement('li');
        newItem.innerHTML = element;
        list.appendChild(newItem);
        newItem.addEventListener('click', function(){
            cityInput.value = this.textContent;
            city = this.textContent;
            list.innerHTML = '';
        })

    });
}

function writingAddressList(list, array) {
    list.innerHTML = '';
    
    array.forEach(element => {

        let newItem = document.createElement('li');
        newItem.innerHTML = element.street;
        list.appendChild(newItem);
        newItem.addEventListener('click', function(){
            addressInput.value = this.textContent;
            zipInput.value = element.zip_code;
            list.innerHTML = '';
        })

    });
}


