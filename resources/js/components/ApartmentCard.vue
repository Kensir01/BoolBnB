<template>
    <div class="apartment">
        <div class="left">
            <div class="top">
                <a @click="$router.go(-1)"><div class="circle">×</div></a>
                chiudi 
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

        <div class="chat" @click="toggleForm">
            <img src="http://127.0.0.1:8000/storage/icons/normal/mex_white.svg" alt="Invia messaggio">
        </div>
        
        <div class="overlay" v-if="form">

            <div class="messageForm">
                <div class="exit" @click="toggleForm">×</div>
                <div class="holes"></div>
                <div class="dashed"></div>

                
                <div class="inputs">
                    <form @submit.prevent="sendMessage">
                        <div class="email">
                            <span class="label">Da: </span>
                            <input type="email" placeholder="Inserisci email" v-model="email" required>
                        </div>

                        <div class="message">
                            <div class="label">Scrivi qualcosa all'host</div>
                            <textarea name="" id="" rows="9" placeholder="Il tuo messaggio" v-model="content" required> </textarea>
                        </div>

                        <button type="submit" class="button">
                                INVIA <img src="http://127.0.0.1:8000/storage/icons/normal/send.svg" alt="Invia">
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'ApartmentCard',
    data() {
        return {
            form : false,
            email: '',
            content: '',
            sent : false,
        }
    },
    props: {

        'title': String,
        'image' : String,
        'address' : String,
        'facilities' : Array,
        'description' : String,
        'id' : Number
    },
    methods: {
        toggleForm() {
            this.form = !this.form;
            if(this.form) {
                this.email = this.$userEmail;
            }
        },
        sendMessage() {
            axios.post('/api/messages',{
                    'email': this.email,
                    'content': this.content,
                    'apartment_id': this.id,
                })
                .then((response) => {
                    console.log(response.data)
                    if(!response.data.success) {
                        this.errors = response.data.errors;
                    } else {
                        this.email = '';
                        this.content = '';
                        this.toggleForm();
                    }
                });
        }
    },
    mounted() {
        this.email = this.$userEmail;
    }
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

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;

            .messageForm {
                box-shadow: 10px 10px $lines;
                width: 25vw;
                height: 60vh;
                min-width: 300px;
                min-height: 500px;
                background-color: $background;
                border: 5px solid $lines;
                position: relative;

                .button {
                    position: absolute;
                    bottom: -20px;
                    right: -30px;
                    height: 60px;
                    font-family: 'ruddybold';
                    font-size: 1rem;
                    padding-left: 1rem;

                    img{
                        object-fit: cover;
                        height: 100%;
                    }

                }

                .inputs {
                    padding: 1rem;

                    .email {
                        font-family: 'Rubik';
                        margin-bottom: 1rem;
                        .label {
                            font-size: 1rem;
                            font-weight: 700;
                        }

                        input {
                            border:none;
                            width: 90%;
                            min-width: 200px;
                            border-bottom: 2px solid $lines;

                            &:focus {
                                outline: none;
                            }
                        }
                    }

                    .message {
                        min-height: 200px;
                        min-width: 200px;

                        .label {
                            font-size: 1rem;
                            font-weight: 700;
                        }
                        textarea {
                            min-width: 250px;
                            width: 100%;
                            resize: none;
                            line-height: 4ch;
                            background-image: linear-gradient(transparent, transparent calc(4ch - 2px), $lines 0px);
                            background-size: 100% 4ch;
                            border: none;

                            &:focus {
                                outline: none;
                            }

                        }
                    }
                }

                .holes {
                    width: 100%;
                    height: 10%;
                    border-bottom: 30px dotted $lines;

                }

                .dashed {
                    width: 100%;
                    height: 14px;
                    border-bottom: 4px dashed $lines

                }

                .exit {
                    position: absolute;
                    top: -70px;
                    right: -10px;
                    background-color: $background;
                    width: 50px;
                    height: 50px;
                    border: 4px solid $lines;
                    border-radius: 50%;
                    font-family: 'ruddybold';
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    cursor: pointer;
                    font-size: 2rem;

                    &:hover {
                        background-color: $details;
                    }
                }
            }
        }

        .chat {
            position: absolute;
            bottom: 1rem;
            right: 2rem;
            width: 100px;
            height: 100px;
            border: 5px solid $lines;
            background-color: $background;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 200ms;

            &:hover {
                cursor: pointer;
                background-color: $details;
                transform: scale(1.1);
            }

            img {
                width: 60px;
            }
        }

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
