<template>
  <div>

    <h1>Ricerca</h1>
    <input type="text" v-model="search" placeholder="Es. Villa vista mare" @keyup.enter="getFilteredSearch"/>
        
        <label for="stanze">Numero di stanze</label>
        <input type="number" id="stanze" v-model="rooms" placeholder="Es. 3">

        <label bel for="letti">Numero di letti</label>  
        <input type="number" id="letti" v-model="beds" placeholder="Es. 2">

        <label for="raggio">Raggio in Km.</label>
        <input type="number" id="raggio" v-model="distance" placeholder="Es. 20">

        <div v-for="facility in facilities" :key="facility.id">
          <input type="checkbox" :name="facility.name" :id="facility.id" :value="facility.id" v-model="selectedFacilities"> 
          <label :for="facility.name">{{facility.name}}</label>
        </div>

    <div v-for="(item, index) in filtered" :key="index">
      {{item.title}}
    </div>


  </div>
</template>

<script>
export default {
    name: 'AdvancedSearch',
    data() {
      return {
        search: '',
        filtered: [],
        rooms: '',
        beds: '',
        distance: '',
        facilities: [],
        selectedFacilities: []

      }
    },
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
                console.log(response.data)
                this.poiList = response.data.poiList
                this.geometryList = response.data.geometryList
                this.filtered = response.data.filtered
            });
        },
        getFacilities() {
          axios.get('/api/facilities')
              .then((response) => {
                console.log(response.data)
                this.facilities = response.data.facilities;
            });
        }
    },
    mounted() {
      this.getFacilities()
    }
}
</script>

<style>

</style>