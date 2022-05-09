import axios from 'axios';

// var api_key = "{{ env('MIX_TOM_TOM_KEY') }}";
// console.log(api_key);
//const mix = require('laravel-mix');
var api_key = process.env.MIX_TOM_TOM_KEY;
// console.log(api_key)

let city = null;

let list = document.querySelector('.autocomplete-list');


let input = document.getElementById('city');
input.addEventListener('keyup', function() {
    if (this.value.length >= 4) {
        if (this.value.length % 2 == 0) {
            //console.log('Funziona');
            let city = this.value;

            axios.get(`https://api.tomtom.com/search/2/search/${city}.json`, {
                params: {
                 key: api_key,
                 typeahead: true,
                 limit: 3
                }
            })
            .then(function (response) {
                // console.log(response);
                city = response.data.results;
                let cityNames = cityList(city);
                writingList(list, cityNames);
                // console.log('Risultati trovati: ' + city);
                console.log('Risultati per: ' + cityNames)
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


function cityList(array) {
    let length = array.length;
    let cityList = [];

    for (let i = 0; i < length; i++) {
        cityList.push(array[i].address.municipality + ', ' + array[i].address.countrySecondarySubdivision);
    }

    return cityList;
};


function writingList(element, array) {
    element.innerHTML = '';
    for (let i = 0; i < array.length; i++) {
        element.innerHTML += `<li id="option_number`+ i +`">` + array[i] + `</li>`
    }
}

// non funziona al click
let option_0 = document.getElementById(option_number0);
let option_1 = document.getElementById(option_number1);
let option_2 = document.getElementById(option_number2);

option_0.addEventListener('click', function() {
  input.value = option_0.innerHTML;  
})

option_1.addEventListener('click', function() {
    input.value = option_1.innerHTML;  
})

option_2.addEventListener('click', function() {
    input.value = option_2.innerHTML;  
})