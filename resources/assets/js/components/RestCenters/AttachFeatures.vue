<template>
    <div>
        <div>
            <h3 class="text-black text-base font-semibold">{{ heading }}</h3>
            <div class="flex p-2 border border-grey-light">
                <div class="w-1/3 class border-r border-grey-light">
                    <div>
                        <div v-for="feature in features"
                             v-text="feature.name"
                             :key="feature.id"
                             @click="select(feature)"
                             class="m-1 p-1 hover:bg-grey cursor-pointer">
                        </div>

                        <new-feature-form :belongs-to="belongsTo"></new-feature-form>
                    </div>
                </div>

                <div class="w-2/3">
                    <div class="p-2">
                        <selected-feature v-for="feature in selectedFeatures"
                                          :key="feature.id"
                                          :feature="feature"
                                          :features-attached="featuresAttached"
                                          @remove="remove">
                        </selected-feature>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SelectedFeature from './SelectedFeature.vue';
    import NewFeatureForm from './NewFeatureForm.vue';

    export default {
        components: { SelectedFeature, NewFeatureForm },

        props: {
            featuresInitial: {
                type: Array,
                required: true
            },

            featuresAttached: {
                type: Array,
                required: false,
                default: () => []
            },

            heading: {
                type: String,
                required: false,
                default: ''
            },

            belongsTo: {
                type: String,
                required: true
            }
        },

        created() {
            this.attachFeatures();
            this.$watch('featuresAttached', () => this.attachFeatures());
        },

        data() {
            return {
                features: this.featuresInitial,
                selectedFeatures: []
            }
        },

        methods: {
            select(feature) {
                let index = this.features.findIndex(item => feature.id === item.id);
                this.features.splice(index, 1);

                this.selectedFeatures.push(feature);
            },

            attachFeatures() {
                this.featuresAttached.forEach(feature => this.select(feature));
            },

            remove(feature) {
                let index = this.selectedFeatures.indexOf(feature);
                this.selectedFeatures.splice(index, 1);

                this.features.push(feature);
            }
        }
    }
</script>
