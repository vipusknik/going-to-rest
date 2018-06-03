<template>
    <div class="flex w-full">
        <promo-carousel class="w-1/2 mr-3">
            <img v-if="getBanner(1)" :src="getBanner(1).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
            <img v-if="getBanner(3)" :src="getBanner(3).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
            <img v-if="getBanner(3) && getBanner(1)" :src="getBanner(3).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
            <img v-if="getBanner(1) && getBanner(3)" :src="getBanner(1).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
        </promo-carousel>

        <promo-carousel class="w-1/2">
            <img v-if="getBanner(2)" :src="getBanner(2).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
            <img v-if="getBanner(2) && getBanner(4)" :src="getBanner(2).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
            <img v-if="getBanner(4)" :src="getBanner(4).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
            <img v-if="getBanner(4) && getBanner(2)" :src="getBanner(4).image_link" class="carousel-cell w-full lg:rounded-xl lg:h-32 lg:border-2 lg:border-white">
        </promo-carousel>
    </div>
</template>

<script>
    import PromoCarousel from './PromoCarousel.vue';

    export default {
        components: { PromoCarousel },

        props: {
            banners: {
                type: Array,
                required: true
            }
        },

        //12 32 34 14
        methods: {
            getBanner(order) {
                return this.banners.find(banner => banner.order === order);
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

    /* Fade CSS */
    .flickity-slider {
      transform: none !important;
    }

    .promo-carousel .carousel-cell {
      left: 0 !important;
      opacity: 0;
      transition: opacity 0.6s ease-in-out;
      z-index: -1;
    }

    .promo-carousel .carousel-cell.is-selected {
      opacity: 1;
      z-index: 0
    }
</style>
