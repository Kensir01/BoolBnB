<!--<template>
  <div class="container mt-5">
      

      <div class="row">
        <div class="col-6">

            <Apartment
                :title='apartment.title'
            />

        </div>
      </div>

    </div>
</template>

<script>

import Apartment from '../components/Apartment';

export default {
    name: 'Apartment',
    components: {
        Apartment
    },
    data() {
        return {
            apartment : null,
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