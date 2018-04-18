<template>
    <div>
        <div>
            <h3 v-text="categoryInRussian" class="text-green text-base font-semibold mb-2"></h3>
            <div class="flex p-2 border border-grey-light">
                <div class="w-1/3 class border-r border-grey-light">
                    <div>
                        <div v-for="feature in features"
                             v-text="feature.name"
                             :key="feature.id"
                             @click="select(feature)"
                             class="m-1 p-1 hover:bg-grey cursor-pointer">
                        </div>

                        <new-feature-form :belongs-to="belongsTo" :category="category"></new-feature-form>
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
            category: {
                type: String,
                required: true
            },

            featuresInitial: {
                type: Array,
                required: true
            },

            featuresAttached: {
                type: Array,
                required: false,
                default: () => []
        },

        data() {
            return {
                features: this.featuresInitial,
                selectedFeatures: [],
                belongsTo: this.featuresInitial[0].belongs_to,
                categoryInRussian: this.featuresInitial[0].category_in_russian
            }
        },

        created() {
            this.attachFeatures();
            this.$watch('featuresAttached', () => this.attachFeatures());
        },

        methods: {
            select(feature) {
                let index = this.features.findIndex(item => feature.id === item.id);
                this.features.splice(index, 1);

                this.selectedFeatures.push(feature);
            },

            attachFeatures() {
                this.featuresAttached.forEach(feature => {
                    if (this.featuresInitial.findIndex(item => item.id === feature.id) !== -1) {
                        this.select(feature);
                    }
                });
            },

            remove(feature) {
                let index = this.selectedFeatures.indexOf(feature);
                this.selectedFeatures.splice(index, 1);

                this.features.push(feature);
            }
        }
    }
</script>
