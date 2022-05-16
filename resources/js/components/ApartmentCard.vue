<template>
    <div class="apartment">
        <div class="left">
            <div class="top">
                <a @click="$router.go(-1)"><div class="circle">X</div></a>
                close 
            </div>
            <div class="bottom">

                <div class="title">
                    <h1>{{ title }}</h1>
                    <p>{{address}}</p>
                </div>

                <div class="otherInfo">
                    <div class="facilities">
                        <div class="singleFacility" v-for="facility in facilities" :key="facility.id">
                            <img :src="'http://127.0.0.1:8000/storage/' + facility.icon_normal" :alt="facility.name">
                            <h3>{{facility.name}}</h3>
                        </div>
                    </div>

                    <p class="description">{{description}}</p>
                </div>
            </div>
        </div>
        <div class="right">

            <img :src="image" :alt="title">
        </div>

    </div>
</template>

<script>
export default {
    name: 'ApartmentCard',
    props: {

        'title': String,
        'image' : String,
        'address' : String,
        'facilities' : Array,
        'description' : String,
    },
}
</script>

<style scoped lang="scss">

    
    @import "../../sass/partials/_colors.scss";
    @import "../../sass/partials/_font.scss";
    @import "../../sass/partials/_common.scss";

    .apartment {
        border-top: 10px solid $lines;
        border-bottom: 10px solid $lines;
        display: flex;

        .right {
            width: 40%;
            overflow: hidden;

            img {
                object-fit: cover;
                height: 100%;
                width: 100%;
                object-position: 50% 50%;
            }
        }

        .left {
            width: 60%;
            border-right: 10px solid $lines;
            flex: 1;

            .top {
                padding: 1rem 2rem;
                border-bottom: 10px solid $lines;
                display: flex;
                align-items: center;
                font-family: 'ruddybold';
                font-size: 2rem;
    
                .circle {
                    border: 4px solid $lines;
                    border-radius: 50%;
                    font-family: 'ruddybold';
                    font-size: 2rem;
                    cursor: pointer;
                    width: 50px;
                    height: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-right: 2rem;
    
                    &:hover {
                        color: $details;
                        border: 4px solid $details;
                    }
                }
            }
    
            .bottom {
                padding: 4rem 2rem 2rem 2rem;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                height: calc(100% - 6rem);

                .title {
                    h1 {
                        max-width: 60%;
                    }
                    p {
                        font-size: 1.5rem;
                        font-family: 'rubik';
                    }

                }

                .otherInfo {

                    .facilities {
                        display: flex;

                        .singleFacility {
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            width: 55px;
                            font-family: 'ruddybold';
                            margin-right: 1rem;

                            img {
                                object-fit: contain;
                                width: 100%;
                                margin-bottom: 0.5rem;
                            };
                        }
                    }

                    .description {
                        font-size: 1.75rem;
                        font-family: 'rubik';
                    }
                }
            }
        }
    }

</style>
