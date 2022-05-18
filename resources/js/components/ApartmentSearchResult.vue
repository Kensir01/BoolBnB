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
                    <div class="preview">

                        <img :src="'http://127.0.0.1:8000/storage/' + image">

                    </div>
                </div>
            </div>
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
        min-height: 450px;
        min-width: 100%;
        display: flex;
        margin: 2rem 0;

        .half {
            width: 100%;
            border: solid $lines;
            border-width: 4px 4px 4px 4px;
            padding-bottom: 1rem;

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
                    

                    .preview {
                        width: 80%;
                        max-height: 350px;
                        margin: auto;

                        img {
                            object-fit: contain;
                            width: 100%;
                            height: 100%;
                            max-height: 350px;
                        };
                    
                            
                    }
                }
            }
        }
    }
</style>