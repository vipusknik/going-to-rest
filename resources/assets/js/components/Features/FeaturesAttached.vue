<template>
    <div>
        <div class="flex flex-wrap">
            <slot v-for="(feature, index) in features" :feature="feature">
                <div v-if="showCategory && (index === 0 || feature.category !== features[index-1].category)" class="w-full">
                    <span v-text="`${feature.category_in_russian}: `" class="text-sm text-grey-darker font-semibold"></span>
                </div>

                <div class="text-sm text-green-light font-semibold my-1 mr-3 mb-2">
                    * {{ feature.name }}
                    <span v-if="feature.pivot.description" v-text="`(${feature.pivot.description})`"></span>
                </div>
            </slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            features: {
                type: Array,
                requried: true
            },

            showCategory: {
                type: Boolean,
                required: false,
                default: true
            }
        },

        created() {
            this.features.sort((a, b) => a.category >= b.category);
        }
    }
</script>
