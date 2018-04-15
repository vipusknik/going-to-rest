<template>
    <div>
        <div class="flex h-full bg-white border border-grey-light">
            <div class="w-1/6 p-4 border-r border-grey-light bg-grey-lighter">
                <aside>
                    <div class="mb-6 pb-6 border-b border-grey">
                        <a href="/admin/medical-centers/create"
                           class="
                                block
                                text-white
                                text-center
                                font-semibold
                                px-6
                                py-1
                                bg-indigo
                                rounded-sm
                                hover:opacity-9
                           ">
                            Новый центр
                        </a>
                    </div>
                    <search-panel :features="features"></search-panel>
                </aside>
            </div>

            <div class="flex w-5/6">
                <div class="w-2/5 p-6 border-r border-grey-light">
                    <!-- List -->
                    <div class="border border-grey-light shadow">
                        <list-item v-for="medicalCenter in medicalCenters"
                                   :medical-center="medicalCenter"
                                   :key="medicalCenter.id"
                                   @selected="show(medicalCenter)"
                                   :active="selectedMedicalCenter && medicalCenter.id === selectedMedicalCenter.id"
                                   class="cursor-pointer hover:bg-grey-lightest">
                        </list-item>
                    </div>
                </div>

                <div class="w-3/5 p-4">
                    <medical-center-profile v-if="selectedMedicalCenter"
                                            :medical-center="selectedMedicalCenter"
                                            @destroyed="remove">
                    </medical-center-profile>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchPanel from './SearchPanel.vue';
    import ListItem from './ListItem.vue';
    import MedicalCenterProfile from './MedicalCenterProfile.vue';

    export default {
        components: { SearchPanel, ListItem, MedicalCenterProfile },

        props: [ 'medicalCentersInitial', 'features' ],

        data() {
            return {
                medicalCenters: this.medicalCentersInitial,
                selectedMedicalCenter: null,
            };
        },

        methods: {
            show(medicalCenter) {
                axios.get(`/admin/medical-centers/${medicalCenter.slug}`)
                    .then(response => {
                        this.selectedMedicalCenter = response.data.medicalCenter;
                    });
            },

            remove(medicalCenter) {
                let index = this.medicalCenters.findIndex(item => item.id === medicalCenter.id);

                this.medicalCenters.splice(index, 1);
                this.selectedMedicalCenter = null;
            }
        }
    }
</script>
