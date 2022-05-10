<template>
    <div>
        <h1>Benvenuto in BoolBnB!</h1>
        <input type="text" v-model="search" placeholder="Search title.." @keyup.enter="geoCoding"/>
        <div>{{lat}}</div>
        <div>{{lon}}</div>
    </div>
</template>

<script>
export default {
    name: 'Home',
    data() {
        return {
            search: '',
            apiKey: process.env.MIX_TOM_TOM_KEY,
            lat: null,
            lon: null,
            apartments : null,
            poiList: null
        }
    },
    methods: {
        geoCoding() {
            axios.get(`https://api.tomtom.com/search/2/geocode/${this.search}.json`, {
                params: {
                key: this.apiKey,
                limit: 1,
                }
            })
            .then((response) => {
                // console.log(response);
                this.lat = response.data.results[0].position.lat;
                this.lon = response.data.results[0].position.lon;
            });
        },
        getAllApartments() {
            axios.get("/api/apartments", {
        })
            .then((response) => {
                console.log(response.data)
                this.apartments = response.data;
                this.apartmentsToPoiList();
            });
        },
        apartmentsToPoiList() {
            this.poiList = null;
            this.apartments.forEach(apartment => {
                this.poiList.push(
                    [
                        {
                            "poi": {
                                "name": apartment.name
                                },
                                "address": {
                                    "freeformAddress": apartment.address + ', ' + apartment.city + ', ' + apartment.zip_code
                                },
                                "position": {
                                    "lat": apartment.latitude,
                                    "lon": apartment.longitude
                            }
                        }
                    ]
                )
            });
        }
    },
    mounted() {
        this.getAllApartments();
    }
}
</script>

<style scoped lang='scss'>
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