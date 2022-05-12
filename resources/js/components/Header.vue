<template>
  <nav class="navbar navbar-expand navbar-light bg-light">
    <router-link class="navbar-brand" :to="{name: 'home'}">BoolBnB</router-link>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-for="menuItem in menuItems" :key="menuItem.routeName">
                <router-link class="nav-link" :to="{name: menuItem.routeName}">{{menuItem.label}}</router-link>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="/user">Utente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Accedi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Registrati</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: 'Header',
    data() {
        return {
            // rendiamo dinamico l'header e i suoi link
            menuItems: [
                {
                    routeName: 'advancedsearch',
                    label: 'Ricerca Avanzata'
                }
            ]
        }
    }
}
</script>

<style>
    
</style>