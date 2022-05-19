<template>
    <div class="container">
        <div class="jumbo">
            <h1>La nostra messaggistica diretta!</h1>
            <img src="http://127.0.0.1:8000/storage/elements/LayingDoodle.svg" alt="" class="img-extra">
            <img src="http://127.0.0.1:8000/storage/elements/SelfieDoodle.svg" alt="" class="img-extra-sx">

        </div>

        <div class="card-container">

            <div class="card" style="width: 18rem;">
                <img src="http://127.0.0.1:8000/storage/elements/messaggio_1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Sii sempre aggiornato nella tua area amministrativa</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="http://127.0.0.1:8000/storage/elements/messaggio_2.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Puoi ricevere e mandare messaggi al tuo host di riferimento</p>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
export default {
    name:'Messaggistica',
    mounted() {
      window.scrollTo(0, 0)
    }
}
</script>

<style lang="scss" scoped>

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
        position: relative;

        h1 {
            text-align: center;
        }

        .img-extra {
            max-width: 400px;
            width: 60%;
            transform: translate(50%, 50%);
            z-index: 1;
            position: absolute;
            bottom: 0;
            right: 0;
        }

         .img-extra-sx {
            max-width: 400px;
            width: 60%;
            transform: translate(-50%, 50%);
            z-index: 1;
            position: absolute;
            bottom: 60px;
            left: 0;
        }
    }

    .card-container {
        margin-top: 4rem;
        display: flex;
        justify-content: space-around;

        .card {

            .card-body {
                border-width: 0 5px 5px 5px;
                border-style: solid;
                border-color: $lines;

                .card-text {
                    font-family: 'ruddybold';
                }
            }
        }
    }
</style>
