<template>
    <div class="container">

        <div class="jumbo">
            <h1>Scopri le funzionalità di BoolBnB!</h1>
        </div>

        <div class="card-container">

            <div class="card" style="width: 18rem;">
                <img src="http://127.0.0.1:8000/storage/elements/funzione_1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Cerca tra tutti gli appartamenti presenti in BoolBnB quello più adatto alle tue esigenze! Personalizza le impostazioni di ricerca aggiungendo le opzioni avanzate.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="http://127.0.0.1:8000/storage/elements/funzione_2.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Vedi nel dettaglio l’appartamento più adatto a te!</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="http://127.0.0.1:8000/storage/elements/funzione_3.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Potrai gestire tutti i tuoi appartamenti e i relativi messaggi tramite il login al sito!</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'funzionalita'

}
</script>

<style scoped lang="scss">

    @import "../../sass/partials/_colors.scss";
    @import "../../sass/partials/_font.scss";
    @import "../../sass/partials/_common.scss";

    .jumbo {
        background-color: $details;
        width: 80%;
        height: 350px;
        border: 4px solid $lines;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;

        h1 {
            text-align: center;
        }
    }

    .card-container {
        margin-top: 4rem;
        display: flex;
        justify-content: space-around;

        .card {

            .card-body {
                border: 0 5px 5px 5px;
                border-style: solid;
                border-color: $lines;

                .card-text {
                    font-family: 'ruddybold';
                }
            }
        }
    }

</style>