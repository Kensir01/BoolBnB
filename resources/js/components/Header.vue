<template>
<div class="container">
    <header>
        <nav class="navbar navbar-expand navbar-light justify-content-between">
        <router-link class="navbar-brand" :to="{name: 'home'}"><img class="img-logo" src="../../../storage/app/public/logo/Risorsa34.svg" alt="BoolBnB logo"></router-link>
        <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-for="menuItem in menuItems" :key="menuItem.routeName">
                <router-link class="nav-link" :to="{name: menuItem.routeName}">{{menuItem.label}}</router-link>
            </li>
        </ul> -->
        
            <ul class="navbar navbar-nav ms-auto">
                <li class="nav-item" v-if="$userEmail == ''">
                    <a class="nav-link" href="/login">Accedi</a>
                </li>
                <li class="nav-item" v-if="$userEmail == ''">
                    <a class="nav-link" href="/register">Registrati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/apartments" v-if="$userEmail != ''">
                        <img class="img-user" src="http://127.0.0.1:8000/storage/icons/normal/user.svg" alt="User logo">
                    </a>
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
    margin-top: 20px;
    margin-bottom: 50px;
    background-color: $background !important;
    }

    a.nav-link {
        color: $lines !important;
        font-family: 'ruddybold'!important;
        &:hover {
             color: $details !important;
        }
    }

    .img-logo {
        width: 150px;
        &:hover {
            filter: invert(73%) sepia(58%) saturate(545%) hue-rotate(12deg) brightness(110%) contrast(103%);
        }
    }

    .img-user {
        width: 15px;
        &:hover {
            filter: invert(73%) sepia(58%) saturate(545%) hue-rotate(12deg) brightness(110%) contrast(103%);
        }
    }

    ul {
        padding: 0 !important;
    }

   

    
</style>