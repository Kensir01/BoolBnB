<template>
    <div class="apartment">
        <div class="half">
            <div class="top">
                {{index}}
            </div>
            <div class="bottom">
                <div class="left">
                    <div class="top-part">

                        <h1>{{title}}</h1>
                        <div>{{address}}</div>
                    </div>
                    <div class="bottom-part">
                        <p>{{description}}</p>
                        <router-link :to="'/apartments/' + slug" class="button">Guarda</router-link>

                    </div>
                </div>
                <div class="right">
                    <img :src="'http://127.0.0.1:8000/storage/' + image">
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
        'index' : Number,
        'image' : String,
        'title' : String,
        'description' : String,
        'slug' : String,
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
                        max-height: 350px;
                        margin: auto;
                    }
                }
            }
        }
    }
</style>