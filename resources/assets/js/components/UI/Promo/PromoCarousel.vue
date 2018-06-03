<template>
    <div>
        <div class="promo-carousel">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import Flickity from 'flickity';
    import 'flickity/dist/flickity.min.css';

    export default {
        data() {
            return {
                uniqid: Math.random().toString(36).substring(7)
            };
        },

        mounted() {
            let sliders = document.querySelectorAll('.promo-carousel');

            for (let i = 0; i < sliders.length; i++) {
                let slider = sliders[i];

                new Flickity(slider, {
                    autoPlay: true,
                    cellAlign: 'left',
                    contain: true,
                    pageDots: false,
                    prevNextButtons: false
                });
            }
        }
    }
</script>
