<template>
    <div>
        <div class="main-carousel mb-3">
            <slot>
                <img src="/images/defaults/beach.jpg" class="carousel-cell md:rounded-tr-2xl md:rounded-bl-2xl">
            </slot>
        </div>

        <div class="carousel-nav">
            <slot name="nav">
                <img src="/images/defaults/beach.jpg" class="mr-2 rounded-sm">
            </slot>
        </div>
    </div>
</template>

<script>
    import Flickity from 'flickity';
    import 'flickity-as-nav-for';
    import 'flickity-fullscreen';
    import 'flickity/dist/flickity.min.css';
    import 'flickity-fullscreen/fullscreen.css';
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
    }
</script>

<style>
    .main-carousel .flickity-prev-next-button {
        color: white !important;
        background: none !important;
        top: 85%;
    }

    .main-carousel .flickity-button-icon {
        fill: currentColor;
    }

    .main-carousel .carousel-cell {
        height: 200px;
        width: 100%;
        margin-right: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (min-width: 768px) {
        .main-carousel .carousel-cell {
            height: 200px;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }
    }

    .is-fullscreen {
        z-index: 60 !important;
    }

    .is-fullscreen .carousel-cell {
        width: 100%;
        height: 100%;
        border-bottom-left-radius: 0 !important;
        border-top-right-radius: 0 !important;
        object-fit: contain;
        object-position: initial;
    }

    .carousel-nav img {
        width: 100px;
        height: 70px;
    }
</style>
