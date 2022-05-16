<template>
<div class="fullpage">
    <div class="container">
      <div class="yellow-jumbo">
        <form>
          <div class="search-bar">
            <div class="prova">

              <input class="search-input" type="text" v-model="search" placeholder="Dove vuoi andare?" @keyup="autocomplete" required/>
              <div class="autocomplete-bar" v-if="autocompleteList">
                <ul>
                  <li v-for="(hint,index) in autocompleteList" :key="index" @click="completer(index)">{{hint}}</li>
                </ul>
              </div>
                  
                  
              <a @click="getFilteredSearch" >
                <img class="img-search" src="http://127.0.0.1:8000/storage/icons/normal/search.svg" alt="Search icon">
              </a>
            </div>
                      
          </div>
              
          <div class="jumbo container">

            <div class="inputs">
              <div class="single-input">
                <input type="number" id="distance" v-model="distance">
                <div class="label">Raggio</div>
              </div>
              <div class="single-input">
                <input type="number" id="rooms"  v-model="rooms">
                <div class="label">Stanze</div>
              </div>

              <div class="single-input">
                <input type="number" id="beds"  v-model="beds">
                <div class="label">Letti</div>
              </div>
            </div>

            <div class="facility-box">
              <div v-for="facility in facilities" :key="facility.id" class="single-facility">

                <input type="checkbox" :name="facility.name" :id="facility.id" :value="facility.id" v-model="selectedFacilities">

                <div class="info">
                  <div class="label">{{facility.name}}</div>
                </div>

              </div>
            </div>

            
          </div>
        </form>
      </div>


      

    </div>
      <ApartmentSearchResult class="fullpage" v-for="(apartment,index) in filtered" :key="apartment.id" :index="index+1" :image='apartment.image' :title='apartment.title' :description='apartment.description' :slug='apartment.slug' :address='apartment.address' :lat="apartment.latitude" :lon="apartment.longitude" :id="apartment.id"/>

    <p v-if="goneWrong" class="noResults"> {{goneWrong}} </p>
</div>
</template>

<script>
import ApartmentSearchResult from '../components/ApartmentSearchResult';
export default {
    name: 'AdvancedSearch',
    components: {
      'ApartmentSearchResult' : ApartmentSearchResult
    },
    data() {
      return {
        search: '',
        filtered: [],
        rooms: 1,
        beds: 1,
        distance: 20,
        facilities: [],
        selectedFacilities: [],
        autocompleteList: [],
        goneWrong: null

      }
    },
    props: [
      'query',
    ],
    methods: {
      getFilteredSearch() {
            axios.get('/api/apartments/filteredsearch',{
                params: {
                    location: this.search,
                    rooms: this.rooms,
                    beds: this.beds,
                    distance: this.distance * 1000,
                    facilities: this.selectedFacilities,
                }
            }).then((response) => {
                console.log(response.data.response.data)

                if(response.data.response.result) {
                  this.goneWrong = null
                  this.filtered = response.data.response.data

                  if (response.data.response.data.length == 0) {
                    this.goneWrong = 'Nessun Risultato'
                  }
                  } else {
                  this.goneWrong = response.data.response.data
                }
            });
        },
        getFacilities() {
          axios.get('/api/facilities')
              .then((response) => {
                //console.log(response.data)
                this.facilities = response.data.facilities;
            });
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

                    //console.log(response.data.results);
                    
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
          this.autocompleteList = [];
        },
        firstSearch() {
          if(this.query != null) {
            this.selectedFacilities= [];
            this.rooms = 1;
            this.beds = 1;
            this.distance = 20;
            this.search = this.query;
            this.getFilteredSearch()
          }

        }
    },
    mounted() {
      this.getFacilities()

    },
    activated() {
      this.firstSearch()
    }
}
</script>

<style scoped lang="scss">

  @import "../../sass/partials/_colors.scss";
  @import "../../sass/partials/_font.scss";
  @import "../../sass/partials/_common.scss";

  h1 {
        font-family: 'ruddyblack';
    }

  .noResults {
    text-align: center;
    font-family: 'ruddybold';
    font-size: 2rem;
  }

  .container {
    margin-bottom: 4rem;
  }

  .search-bar {
      width: 40%;
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
      width: 100%;
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
    padding: 2rem 1rem;
    border: 4px solid $lines;
    width: 80%;
    min-height: 350px;
    margin: auto;
    background-color: $details;
    position: relative;
  }


  .jumbo {

    .inputs {
      padding-top: 3rem;
      display: flex;
      justify-content: space-between;
      margin-bottom: 3rem;
      
      .single-input {
        width: 30%;
        input {
          border: 4px solid $lines;
        }
        .label {
          font-size: 1.25rem;
          font-family: 'ruddybold';
        }
      }
    }

    .facility-box {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;

      .single-facility {
        margin: 0.5rem 1rem;
        padding: 5px;
        display: flex;
        position: relative;

        input[type="checkbox"] {
          appearance: none;
          -webkit-appearance: none;
          height: 40px;
          width: 40px;
          background-color: $background;
          border: 4px solid $lines;
          cursor: pointer;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        input[type='checkbox']:hover{
          background-color: $lines;
        }
        input[type='checkbox']:checked{
          background-color: $lines;
        }

        .info {
          padding: 0 1rem;
          width: 100%;
          height: 40px;
          margin-left: 5px;
          border: 4px solid $lines;
          background-color: $background;
          font-size: 1.25rem;
          
          .label {
            font-family: 'ruddybold';
          }
        }
          img {
            width: 30px;
            max-height: 40px;
            margin-left: 5px;
          }
      }
    }
  }
</style>