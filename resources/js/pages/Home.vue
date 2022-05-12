<template>
    <div>
        <h1>Benvenuto in BoolBnB!</h1>
        <input type="text" v-model="search" placeholder="Search title.." @keyup.enter="getSearch"/>
        <div><h2>Trovati</h2>{{filtered}}</div>
    </div>
</template>

<script>
export default {
    name: 'Home',
    data() {
        return {
            search: '',
            filtered: [],
            //apiKey: process.env.MIX_TOM_TOM_KEY,
            //apartments : null,
            //poiList: [],
            //geometryList: [],
        }
    },
    methods: {
        getSearch() {
            axios.get('/api/apartments/search',{
                params: {
                    location: this.search
                }
            }).then((response) => {
                console.log(response.data)
                this.poiList = response.data.poiList
                this.geometryList = response.data.geometryList
                this.filtered = response.data.filtered
            });
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
    }
}
</script>

<style scoped lang='scss'>

     @import "../../sass/partials/_font.scss";

    h1 {
        font-family: 'Ruddy';
    }
    
    input {
        padding: 4px 12px;
        color: rgba(0,0,0,.70);
        border: 1px solid rgba(0,0,0,.12);
        transition: .15s all ease-in-out;
        background: white;
        &:focus {
            outline: none;
            transform: scale(1.05);
            & + label  {
            font-size: 10px;
            transform: translateY(-24px) translateX(-12px);
            }
        }
        &::-webkit-input-placeholder {
            font-size: 12px;
            color: rgba(0,0,0,.50);
            font-weight: 100;
        }
    }
</style>