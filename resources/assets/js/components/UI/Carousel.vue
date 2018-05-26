<template>
    <div>
        <div class="main-carousel mb-3">
            <slot></slot>
        </div>

        <div class="carousel-nav">
            <slot name="nav"></slot>
        </div>
    </div>
</template>

<style>
    .main-carousel .flickity-button {
        color: white !important;
        background: none !important;
        top: 85%;
    }

    .main-carousel .flickity-button-icon {
        fill: currentColor;
    }

    @media (min-width: 768px) {
        .carousel-cell {
            height: 200px;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }
    }

    .carousel-nav img {
        width: 100px;
        height: 70px;
    }
</style>

<script>
import Flickity from 'flickity';
import 'flickity-as-nav-for';
import 'flickity-fullscreen';
import 'flickity/dist/flickity.min.css';
export default {
    props: {
        wrapAround: { default: true },
        autoPlay: { default: false }
    },
    mounted() {
        new Flickity('.main-carousel', {
            autoPlay: this.autoPlay,
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            fullscreen: true
        });

        new Flickity( '.carousel-nav', {
          asNavFor: '.main-carousel',
          pageDots: false,
          cellAlign: 'left',
          contain: true,
        });
    }
};
</script>
