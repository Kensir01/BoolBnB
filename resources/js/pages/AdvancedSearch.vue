<template>
  <div>

    <h1>Ricerca</h1>

    <form>
            <input type="text" v-model="search" placeholder="Search title.."  @keyup="autocomplete" required/>
            <ul>
              <li v-for="(hint,index) in autocompleteList" :key="index" @click="completer(index)">{{hint}}</li>
            </ul>

            <input type="number" id="stanze" v-model="rooms" required min="1" max="255">
            <label for="stanze">Numero di stanze</label>

            <input type="number" id="letti" v-model="beds" required min="1" max="255">
            <label for="letti">Numero di letti</label>

            <input type="number" id="raggio" v-model="distance"  required min="20">
            <label for="raggio">Raggio</label>

            <div v-for="facility in facilities" :key="facility.id">
              <input type="checkbox" :name="facility.name" :id="facility.id" :value="facility.id" v-model="selectedFacilities"> 
              <label :for="facility.name" >{{facility.name}}</label>
              <!-- <img :src="'http://127.0.0.1:8000/storage/' + facility.icon_normal" alt=""> -->
            </div>
    </form>
            <button class="btn btn-primary" @click="getFilteredSearch">Cerca</button>

        <div v-for="apartment in filtered" :key="apartment.id">
          <router-link :to="'/apartments/' + apartment.slug"><h1>{{apartment.title}}</h1></router-link>
        </div>

        <p v-if="goneWrong"> {{goneWrong}} </p>

  </div>
</template>

<script>
export default {
    name: 'AdvancedSearch',
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
                console.log(response.data.response)
                console.log(response.data.response.result)

                if(response.data.response.result) {
                  this.goneWrong = null
                  this.filtered = response.data.response.data
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
        }
    },
    mounted() {
      this.getFacilities()
    },
    created() {
      this.search = this.query
    }
}
</script>

<style>

</style>