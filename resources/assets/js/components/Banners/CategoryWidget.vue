<template>
    <div>
        <h2 class="text-2xl text-black mb-3">{{ title }}</h2>
        <banner-upload :order="1" :category="category" :banner-initial="getBanner(1) || {}"></banner-upload>
        <banner-upload :order="2" :category="category" :banner-initial="getBanner(2) || {}"></banner-upload>
        <banner-upload :order="3" :category="category" :banner-initial="getBanner(3) || {}"></banner-upload>
        <banner-upload :order="4" :category="category" :banner-initial="getBanner(4) || {}"></banner-upload>
    </div>
</template>

<script>
    import BannerUpload from './BannerUpload';

    export default {
        components: { BannerUpload },

        props: {
            category: {
                type: String,
                required: true
            },

            title: {
                type: String,
                required: true
            },

            bannersInitial: {
                type: Array,
                required: true
            }
        },

        methods: {
            getBanner(order) {
                return this.bannersInitial.find(banner => banner.order === order);
            }
        }
    }
</script>
