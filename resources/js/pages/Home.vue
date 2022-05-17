<template>
    <div class="container">
        
        <div class="yellow-jumbo">
            <div class="search-bar">
                <div class="prova">
                    <input class="search-input" type="text" v-model="search" placeholder="Dove vuoi andare?" @keyup="autocomplete" @keyup.enter="getSearch"/>
                    <div class="autocomplete-bar" v-if="autocompleteList">
                        <ul>
                            <li v-for="(hint,index) in autocompleteList" :key="index" @click="completer(index)">{{hint}}</li>
                        </ul>
                    </div>
                
                
                    <a @click="getSearch" >
                        <img class="img-search" src="http://127.0.0.1:8000/storage/icons/normal/search.svg" alt="Search icon">
                    </a>
                </div>
                    
            </div>
            
            <div class="jumbo container">
                <div class="row">
                    <div class="col-12 col-md-6 jb-text-container">
                        <h1 class="jumbo-text">Un'avventura ti aspetta con BoolBnB!</h1>
                    </div>
                    <div class="col-12 col-md-6 jb-img-container">
                        <img class="img-jumbo" src="../../../storage/app/public/elements/baffi.svg" alt="Image Jumbo">
                    </div>
                </div> 
            </div>
        </div>

        <div class="carousel">
            <div class="car-text">
                <h3>Appartamenti in primo piano</h3>

                
            </div>

            <div class="car-content">
                <carousel paginationColor="#FCEF03">
                    <slide>
                        <img class="mySlides" src="../../../storage/app/public/stock_bnb_images/Risorsa1.svg">
                    </slide>
                    <slide>
                        <img class="mySlides" src="../../../storage/app/public/stock_bnb_images/Risorsa2.svg">
                    </slide>
                    <slide>
                        <img class="mySlides" src="../../../storage/app/public/stock_bnb_images/Risorsa3.svg">
                    </slide>
                    <slide>
                        <img class="mySlides" src="../../../storage/app/public/stock_bnb_images/Risorsa4.svg">
                    </slide>
                    <slide>
                        <img class="mySlides" src="../../../storage/app/public/stock_bnb_images/Risorsa5.svg">
                    </slide>
                </carousel>
            </div>
            
        </div>



         <div class="esperienze">
            <div class="text">
                <h3>Scopri le esperienze con BoolBnB</h3>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="experience" src="../../../storage/app/public/elements/esperienza_1.svg">
                    </div>

                    <div class="col-md-6 col-12">
                        <img class="experience due" src="../../../storage/app/public/elements/esperienze_2.svg">
                    </div>
                </div>
            </div>
        </div>

        <div class="storia_logo">
            <img src="../../../storage/app/public/elements/home.svg" alt="">
        </div>




       
        
        
         <!--<div><h2>Trovati</h2>{{filtered}}</div> -->
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    name: 'Home',
    components: {
        Carousel,
        Slide
    },
    data() {
        return {
            search: '',
            filtered: [],
            autocompleteList: []
            
            //apiKey: process.env.MIX_TOM_TOM_KEY,
            //apartments : null,
            //poiList: [],
            //geometryList: [],
        }
    },
    methods: {
        getSearch() {
            this.$router.push({
                name: "advancedsearch",
                params: {
                    query: this.search
                }
            });
            // axios.get('/api/apartments/search',{
            //     params: {
            //         location: this.search
            //     }
            // }).then((response) => {
            //     console.log(response.data)
            //     this.poiList = response.data.poiList
            //     this.geometryList = response.data.geometryList
            //     this.filtered = response.data.filtered
            // });
        },
        //Completamento automatico
        autocomplete() {
          if(this.search.length>=4) {
            if(this.search.length % 2 == 0) {

              axios.get(`https://api.tomtom.com/search/2/search/${this.search}.json`, {
                params: {
                 key: process.env.MIX_TOM_TOM_KEY,
                 typeahead: true,
                 limit: 3
                }
              })
                .then((response) => {

                    console.log(response.data.results);
                    
                    // Array con solo i nomi e le province
                    this.getCityNames(response.data.results);

                    // console.log('Risultati trovati: ' + city);
                    // console.log('Risultati per: ' + cityNames)
                })
                .catch(function (error) {
                    console.log(error);
                });  
            }
          }
        },
        getCityNames(array) {
          let length = array.length;
          this.autocompleteList = []

          for (let i = 0; i < length; i++) {
              this.autocompleteList.push(array[i].address.municipality + ', ' + array[i].address.countrySecondarySubdivision);
          }
        },
        completer(index) {
          this.search = this.autocompleteList[index]
          this.getSearch();
        }

        // geoCoding() {
        //     axios.get(`https://api.tomtom.com/search/2/geocode/${this.search}.json`, {
        //         params: {
        //         key: this.apiKey,
        //         limit: 1,
        //         }
        //     })
        //     .then((response) => {
        //         // console.log(response);
        //         this.getGeometryList(response.data.results[0].position.lat, response.data.results[0].position.lon);
        //         this.searchNearby();
        //     });
        // },
        // getAllApartments() {
        //     axios.get("/api/apartments", {
        // })
        //     .then((response) => {
        //         // console.log(response.data)
        //         this.apartments = response.data.data;
        //         this.apartmentsToPoiList();
        //     });
        // },
        // apartmentsToPoiList() {
        //     this.apartments.forEach(apartment => {
        //         this.poiList.push(
        //                 {
        //                     "poi": {
        //                         "name": apartment.title
        //                         },

        //                         "address": {
        //                             "freeformAddress": apartment.address + ', ' + apartment.city + ', ' + apartment.zip_code
        //                         },

        //                         "position": {
        //                             "lat": apartment.latitude,
        //                             "lon": apartment.longitude
        //                     }
        //                 }
        //         )
        //     });
        //     // console.log(this.poiList);
        // },
        // getGeometryList(x, y) {
        //     this.geometryList = [
        //         {
        //             "type": "CIRCLE",
        //             "position": x + ', ' + y,
        //             "radius": 20000
        //         }
        //     ];
        // },
        // searchNearby() {
            
        //     axios.get('https://api.tomtom.com/search/2/geometryFilter.json', {
        //         params: {
        //             key: this.apiKey,
        //             poiList: JSON.stringify(this.poiList),
        //             geometryList: JSON.stringify(this.geometryList)
        //         }
        //     })
        //         .then(function (response) {
        //             console.log(response);
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // }
    },
    mounted() {
        // this.getAllApartments();
        console.log('user email is: ' + this.$userEmail);
    }
}
</script>

<style scoped lang='scss'>

    @import "../../sass/partials/_colors.scss";
    @import "../../sass/partials/_font.scss";
    @import "../../sass/partials/_common.scss";

    h1, h3 {
        font-family: 'ruddyblack';
    }

    .search-bar {
        min-width: 50%;
        border: 4px solid $lines;
        margin: 0 auto;
        position: absolute;
        z-index: 1000;
        top: -30px;
        transform: translateX(-50%);
        left: 50%;
        background: $background;
    }
    
    input {
        min-width: 100%;
        padding: 10px 20px 10px 12px;
        border: none;
        color: rgba(0,0,0,.70);
        transition: .15s all ease-in-out;
        background: $background;
        &:focus {
            outline: none;
            & + label  {
            font-size: 10px;
            transform: translateY(-24px) translateX(-12px);
            }
        }
        &::-webkit-input-placeholder {
            font-family: 'ruddyblack';
            font-size: 15px;
            color: $lines;
            font-weight: 100;
        }
    }

    .search-bar a {
        cursor: pointer;
    }

    .img-search{
        width: 30px;
        right: 20px;
        top: 5px;
        position: absolute;
    }

    .prova {
        position: relative;
        
    }

    .autocomplete-bar ul {
        list-style-type: none;
        padding: 0 20px 0 12px;
    }

    .autocomplete-bar ul li:hover {
        background-color: $details;
        cursor: pointer;
    }

    .autocomplete-bar ul:first-child {
        margin-top: 20px;
    }
    
    .autocomplete-bar {
        font-family: 'rubik';
        background-color: $background;
        border: 4px solid $lines;
        position: absolute;
        top: 20px;
        right: -4px;
        left: -4px;
        z-index: -2;
    }

    .yellow-jumbo {
        border: 4px solid $lines;
        width: 80%;
        height: 350px;
        margin: auto;
        background-color: $details;
        position: relative;
    }

    .jumbo-text {
        font-size: 50px;
        margin-top: 30%;
    }

    .img-jumbo {
        max-width: 400px;
        position: relative;
        top: 5vw;
        right: -5vw;
    }

    //Carosello Appartamenti
    
    .mySlides {
        width: 100%;
        padding-right: 20px;
    }

    .carousel {
        margin: 200px auto;
    }

    .car-text {
        margin-bottom: 20px;
    }

    .paginationColor {
        color: $details !important;
    }


    @media screen and (max-width: 1440px) {
        .img-jumbo {
        top: 9vw;
        right: -10vw;
    }   
    }

    @media screen and (max-width: 1024px) {
        .img-jumbo {
        top: 17vw;
        right: -10vw;
    } 
    .jumbo-text {
            font-size: 40px;
        }

    }


    @media screen and (max-width: 768px) {
        .jumbo-text {
            font-size: 40px;
        }
        
        .img-jumbo {
            top: -8vw;
            right: -24vw;
            width: 310px;
        }


        

    }

     @media screen and (max-width: 425px) {
        .jumbo-text {
            font-size: 30px;
            text-align: center;
        }
        
        .img-jumbo {
        top: 2vw;
        right: 0;
        width:  300px;
        } 

        .img-search {
            width: 20px;
            top: 10px;
            right: 11px;
        }

    }

    
    img.experience.due {
    margin-top: 22px;
    }

    .esperienze, .storia_logo {
        margin: 200px auto;
    }

    .storia_logo:hover {
        filter: invert(73%) sepia(58%) saturate(545%) hue-rotate(12deg) brightness(110%) contrast(103%);
        transition: 0.7s;
    } 

</style>