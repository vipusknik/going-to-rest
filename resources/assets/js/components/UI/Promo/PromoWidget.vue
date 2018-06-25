<template>
    <div class="flex w-full">
        <!-- Carousel for sm screens -->
        <div class="promo-carousel block md:hidden w-full">
            <a v-if="getBanner(1)" :href="getBanner(1).external_link" target="_blank" class="carousel-cell w-full h-24">
                <img :src="getBanner(1).image_link">
            </a>

            <a v-if="getBanner(2)" :href="getBanner(2).external_link" target="_blank" class="carousel-cell w-full h-24">
                <img :src="getBanner(2).image_link">
            </a>

            <a v-if="getBanner(3)" :href="getBanner(3).external_link" target="_blank" class="carousel-cell w-full h-24">
                <img :src="getBanner(3).image_link">
            </a>

            <a v-if="getBanner(4)" :href="getBanner(4).external_link" target="_blank" class="carousel-cell w-full h-24">
                <img :src="getBanner(4).image_link">
            </a>
        </div>

        <!-- Carousels for md+ screens -->
        <div class="promo-carousel hidden md:block md:w-1/2 md:mr-3">
            <a v-if="getBanner(1)" :href="getBanner(1).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(1).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>

            <a v-if="getBanner(3)" :href="getBanner(3).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(3).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>

            <a v-if="getBanner(3) && getBanner(1)" :href="getBanner(3).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(3).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>

            <a v-if="getBanner(1) && getBanner(3)" :href="getBanner(1).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(1).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>
        </div>

        <div class="promo-carousel hidden md:block md:w-1/2">
            <a v-if="getBanner(2)" :href="getBanner(2).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(2).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>

            <a v-if="getBanner(2) && getBanner(4)" :href="getBanner(2).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(2).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>

            <a v-if="getBanner(4)" :href="getBanner(4).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(4).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>

            <a v-if="getBanner(4) && getBanner(2)" :href="getBanner(4).external_link" target="_blank" class="carousel-cell w-full h-24 lg:h-32 lg:rounded-xl">
                <img :src="getBanner(4).image_link" class="lg:rounded-xl lg:border-2 lg:border-white">
            </a>
        </div>
    </div>
</template>

<script>
    import Flickity from 'flickity';
    import 'flickity/dist/flickity.min.css';

    export default {
        props: {
            banners: {
                type: Array,
                required: true
            }
        },

        data() {
            return {
                bannersLocal: []
            }
        },

        created() {
            this.bannersLocal = this.banners.sort(() => 0.5 - Math.random())
        },

        mounted() {
            let sliders = document.querySelectorAll(".promo-carousel");

            for (let i = 0; i < sliders.length; i++) {
                new Flickity(sliders[i], {
                    autoPlay: true,
                    wrapAround: true,
                    cellAlign: 'left',
                    contain: true,
                    pageDots: false,
                    prevNextButtons: false,

                    on: {
                        ready: function() {
                            this.pausePlayer();

                            setTimeout(() => {
                                this.unpausePlayer();
                            }, 2000)
                        },

                        change: function () {
                            this.pausePlayer();

                            setTimeout(() => {
                                this.unpausePlayer();
                            }, 2000)
                        }
                    }
                })
            }
        },

        //12 32 34 14
        // 1 3 3 1
        // 2 2 4 4
        methods: {
            getBanner(index) {
                return this.bannersLocal[--index] || null
            }
        }
    }
</script>

<style>
    .promo-carousel .carousel-cell {
      margin-right: 1.5rem;
      width: 100%;
      background: #8C8;
      color: #fff;
      height: 300px;
      text-align: center;
      line-height: 300px;
      font-size: 2rem;
      font-family: sans-serif;
    }

    .promo-carousel .carousel-cell img {
        display: block;
        width: 100%;
        height: 100%;
    }

    /* Fade CSS */
    .promo-carousel .flickity-slider {
      transform: none !important;
    }

    .promo-carousel .carousel-cell {
      left: 0 !important;
      opacity: 0;
      /*transition: opacity 0.6s ease-in-out;*/
      z-index: -1;
    }

    .promo-carousel .carousel-cell.is-selected {
      opacity: 1;
      z-index: 0
    }
</style>
