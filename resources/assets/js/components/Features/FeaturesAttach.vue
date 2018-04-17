<template>
    <div>
        <div v-for="(categoryFeatures, category) in features">
            <features-attach-by-category :category="category"
                                         :features-initial="categoryFeatures"
                                         :features-attached="featuresAttached"
                                         class="mb-6">
            </features-attach-by-category>
        </div>
    </div>
</template>

<script>
    import FeaturesAttachByCategory from './FeaturesAttachByCategory';

    export default {
        components: { FeaturesAttachByCategory },

        props: {
            features: {
                required: true
            },

            featuresAttached: {
                type: Array,
                required: false,
                default: () => []
            }
        }
    }
</script>
