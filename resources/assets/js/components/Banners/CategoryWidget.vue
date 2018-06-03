<template>
    <div>
        <h2 class="text-2xl text-black mb-3">{{ title }}</h2>
        <banner-upload v-for="n in 4" :key="n" :order="n" :category="category" :banner-initial="bannersInitial[n-1] || {}"></banner-upload>
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
        }
    }
</script>
