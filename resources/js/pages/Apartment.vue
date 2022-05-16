<template>
    <div >
        <ApartmentCard :title='apartment.title' :image='apartment.image' :address="apartment.address" :facilities="apartment.facilities" :description="apartment.description"/>
    </div>
</template>

<script>

import ApartmentCard from '../components/ApartmentCard';

export default {
    name: 'Apartment',
    components: {
        ApartmentCard
    },
    data() {
        return {
            apartment : [],
            slug : this.$route.params.slug
        }
    },
    methods: {
        getSingleApartment() {
            axios.get(`/api/apartments/${this.slug}`)
                .then((response) => { 
                    if(!response.data.success) {
                        this.$router.push({name: 'notFound'});
                    } else {
                        console.log(response.data.data);
                        this.apartment = response.data.data;
                    }
                });
        }
    },
    created() {
        this.getSingleApartment();
    }
}
</script>

<style>
</style>