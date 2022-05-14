<template>
    <div class="apartment">
        <div class="half">
            <div class="top">
                01
            </div>
            <div class="bottom">
                <div class="left">
                    <div class="top-part">

                        <h1>La casina più bella</h1>
                        <div>Roma, Italia</div>
                    </div>
                    <div class="bottom-part">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum ullam quisquam perspiciatis laborum!</p>
                        <a href="" class="button">Guarda</a>

                    </div>
                </div>
                <div class="right">
                    <img src="http://127.0.0.1:8000/storage/stock_bnb_images/Risorsa1.svg" alt="">
                </div>
            </div>
        </div>
        <div class="half right">
            <div class="top"></div>
            <div class="bottom"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ApartmentSearchResult',
    props: {
        'image' : String,
        'title' : String,
        'description' : String,
        'page' : String,
        'address' : String,
        'lat' : Number,
        'lon' : Number
    }

}
</script>

<style scoped lang="scss">

    @import "../../sass/partials/_colors.scss";
    @import "../../sass/partials/_font.scss";
    @import "../../sass/partials/_common.scss";

    .apartment {
        color: $lines;
        height: 450px;
        min-width: 100%;
        display: flex;

        .half {
            width: 50%;
            border: solid $lines;
            border-width: 4px 0 4px 0;

            &.right {
                border-left: 4px solid $lines;
            }
            .top {
                font-family: 'ruddybold';
                font-size: 1.5rem;
                padding: 0 1.5rem;
                height: 40px;
                background-color: $details;
                
                border-bottom: 4px solid $lines;
            }

            .bottom {
                display: flex;
                padding-top: 1.5rem;
                font-family: 'rubik';

                .left {
                    width: 50%;
                    padding-left: 1.5rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;

                    .top-part {
                        h1 {
                            font-family: 'ruddybold';
                            width: 200px;
                        }
                    }

                    .bottom-part {

                        p {
                            margin-top: 2rem;
                        }
                    }
                }

                .right {
                    width: 50%;
                    display: flex;
                    justify-content: center;

                    img {
                        width: 80%;
                        margin: auto;
                    }
                }
            }
        }
    }
</style>