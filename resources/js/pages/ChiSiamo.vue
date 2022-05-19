<template>
    <div class="container">
        <h1>Chi siamo!</h1>

        <div class="noi">
            <div class="row">
                <div class="col-3 image">
                    <img src="http://127.0.0.1:8000/storage/elements/alice.svg" alt="">
                </div>
                <div class="col-3 info">
                    <h2>Alice</h2>
                    <ul class="links">
                        <li><a href="https://www.linkedin.com/in/alice-colombari-00084b19a/"><span class="hand">&#9758;</span>LinkedIn</a></li>
                        <li><a href="https://github.com/AliceColombari"><span class="hand">&#9758;</span>GitHub</a></li>
                    </ul>
                </div>

                <div class="col-3 info alt">
                    <h2>Angela</h2>
                    <ul class="links">
                        <li><a href="https://www.linkedin.com/in/angela-de-pasquale-948730117/">LinkedIn<span class="hand">&#9756;</span></a></li>
                        <li><a href="https://github.com/AngelaDeP">GitHub<span class="hand">&#9756;</span></a></li>
                    </ul></div>
                <div class="col-3 image alt">
                    <img src="http://127.0.0.1:8000/storage/elements/angela.svg" alt="">
                </div>
            </div>
            
            <div class="row">
                <div class="col-3 image">
                    <img src="http://127.0.0.1:8000/storage/elements/paolo.svg" alt="">
                </div>
                <div class="col-3 info">
                    <h2>Paolo</h2>
                    <ul class="links">
                        <li><a href="https://www.linkedin.com/in/paolo-elia-9aba511b3/"><span class="hand">&#9758;</span>LinkedIn</a></li>
                        <li><a href="https://github.com/ImPaoloEliaX0"><span class="hand">&#9758;</span>GitHub</a></li>
                    </ul>
                </div>

                <div class="col-3 info alt">
                    <h2>Marco</h2>
                    <ul class="links">
                        <li><a href="https://www.linkedin.com/in/marco-sandri/">LinkedIn<span class="hand">&#9756;</span></a></li>
                        <li><a href="https://github.com/MarcoSandri">GitHub<span class="hand">&#9756;</span></a></li>
                    </ul></div>
                <div class="col-3 image alt">
                    <img src="http://127.0.0.1:8000/storage/elements/marco.svg" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-3 image">
                    <img src="http://127.0.0.1:8000/storage/elements/demetrio.svg" alt="" class="svg_dem">
                </div>
                <div class="col-3 info">
                    <h2>Demetrio</h2>
                    <ul class="links">
                        <li><a href="https://www.linkedin.com/in/turchettademetrio/"><span class="hand">&#9758;</span>LinkedIn</a></li>
                        <li><a href="https://github.com/Kensir01"><span class="hand">&#9758;</span>GitHub</a></li>
                    </ul>
                </div>

                <div class="col-6">
                    <img src="http://127.0.0.1:8000/storage/logo/Risorsa34.svg" alt="">
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'chisiamo',
    mounted() {
      window.scrollTo(0, 0)
    }
}
</script>

<style lang="scss" scoped>
    @import "../../sass/partials/_colors.scss";
    @import "../../sass/partials/_font.scss";
    @import "../../sass/partials/_common.scss";

    .svg_dem{
        width: 90%;

        &:hover {
            animation: rainbow 2.5s linear;
            animation-iteration-count: infinite;
        }
    }

    @keyframes rainbow{
		100%,0%{
			background-color: rgb(255,0,0);
		}
		8%{
			background-color: rgb(255,127,0);
		}
		16%{
			background-color: rgb(255,255,0);
		}
		25%{
			background-color: rgb(127,255,0);
		}
		33%{
			background-color: rgb(0,255,0);
		}
		41%{
			background-color: rgb(0,255,127);
		}
		50%{
			background-color: rgb(0,255,255);
		}
		58%{
			background-color: rgb(0,127,255);
		}
		66%{
			background-color: rgb(0,0,255);
		}
		75%{
			background-color: rgb(127,0,255);
		}
		83%{
			background-color: rgb(255,0,255);
		}
		91%{
			background-color: rgb(255,0,127);
		}
    }

    .container {

        h1 {
            text-align: center;
        }
    }
    .noi {
        margin-top: 5rem;
        .row {
            margin-bottom: 3rem;
            
            .col-6 {
                display: flex;
                align-items: center;
                justify-content: flex-end;
                img{
                    width: 90%;
                }
            }

            .image {
                img {
                    height: 225px;
                    background-color: $details;
                    border: 4px solid $lines;
                }
            }
    
            .info {
                
                .links {
                    height: 70%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    padding-left:0;
                    
                    li {
                        font-family: 'ruddybold';
                        font-size: 1rem;
                        list-style: none;

                        @keyframes indicaDestra {
                            0% {right: 0;}
                            50%  {right: 10px;}
                            100% {right: 0px;}
                        }



                        .hand {
                            font-size: 4rem;
                            margin-right:1rem;
                            transition: transform 0.2s;
                            position: relative;
                            line-height: 2.5rem;

                            
                        }

                        a {
                            font-family: inherit;
                            color: black;
                            display: flex;
                            align-items: center ;

                            &:hover .hand {
                                animation: indicaDestra 2s infinite;
                                color: $details;
                            }
                            &:hover {
                                color: $details;
                                text-decoration: none;
                            }
                        }
                    }
                }

                h2 {
                    font-family: 'ruddybold';
                }
    
            }
        }

        .alt.info,
        .alt.image {
            text-align: right;
        }

        .alt.image {
            img {
                transform: scaleX(-1);
            }
        }

        .alt.info {

            @keyframes indicaSinistra {
                0% {left: 0;}
                50%  {left: 10px;}
                100% {left: 0px;}
            }

            .links {
                align-items: flex-end;

                li {
                    text-align: right;

                    a {
                        .hand {
                            margin-right: 0;
                            margin-left:1rem;
                        }
                        &:hover .hand {
                            animation: indicaSinistra 2s infinite;
                        }
                    }
                }
            }


        }
    }

</style>