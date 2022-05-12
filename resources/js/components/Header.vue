<template>
<div class="container">
    <header>
        <nav class="navbar navbar-expand navbar-light bg-light  justify-content-between">
        <router-link class="navbar-brand" :to="{name: 'home'}"><img src="../../../storage/app/public/logo/Risorsa34.svg" alt="BoolBnB logo"></router-link>
        <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-for="menuItem in menuItems" :key="menuItem.routeName">
                <router-link class="nav-link" :to="{name: menuItem.routeName}">{{menuItem.label}}</router-link>
            </li>
        </ul> -->
        
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
    </header>
</div>
 
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

<style scoped lang="scss">
    @import "../../sass/partials/_font.scss";
    @import "../../sass/partials/_common.scss";
     @import "../../sass/partials/_colors.scss";

    header {
    height: 90px;
    align-items: center;
    }

    a.nav-link {
        color: $lines !important;
        &:hover {
             color: $details !important;
        }
    }

    img {
        width: 150px;
        &:hover {
            filter: invert(73%) sepia(58%) saturate(545%) hue-rotate(12deg) brightness(110%) contrast(103%);
        }
    }

   

    
</style>