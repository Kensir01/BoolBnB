<template>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ title }}</h2>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ApartmentCard',
    props: {

        'title': String,
    },
}
</script>

<style>

</style>