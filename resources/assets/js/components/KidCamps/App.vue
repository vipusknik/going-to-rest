<template>
    <div>
        <div class="flex h-full bg-white border border-grey-light">
            <div class="w-1/6 p-4 border-r border-grey-light bg-grey-lighter">
                <aside>
                    <div class="mb-6 pb-6 border-b border-grey">
                        <a href="/admin/kid-camps/create"
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
                            Новый лагерь
                        </a>
                    </div>
                    <search-panel></search-panel>
                </aside>
            </div>

            <div class="flex w-5/6">
                <div class="w-2/5 p-6 border-r border-grey-light">
                    <!-- List -->
                    <div class="border border-grey-light shadow">
                        <list-item v-for="kidCamp in kidCamps"
                                   :key="kidCamp.id"
                                   :kid-camp="kidCamp"
                                   @selected="show(kidCamp)"
                                   :active="selectedKidCamp && kidCamp.id === selectedKidCamp.id"
                                   class="cursor-pointer hover:bg-grey-lightest">
                        </list-item>
                    </div>
                </div>

                <div class="w-3/5 p-4">
                    <kid-camp-profile v-if="selectedKidCamp"
                                      :kid-camp="selectedKidCamp"
                                      @destroyed="remove">
                    </kid-camp-profile>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchPanel from './SearchPanel.vue';
    import ListItem from './ListItem.vue';
    import KidCampProfile from './KidCampProfile.vue';

    export default {
        components: { SearchPanel, ListItem, KidCampProfile },

        props: [ 'kidCampsInitial' ],

        data() {
            return {
                kidCamps: this.kidCampsInitial,
                selectedKidCamp: null,
            };
        },

        methods: {
            show(kidCamp) {
                this.selectedKidCamp = null;

                axios.get(`/admin/kid-camps/${kidCamp.slug}`)
                    .then(response => {
                        this.selectedKidCamp = response.data.kidCamp;
                    })
                    .catch(() => flash('Ошибка при загрузке!', 'danger'));
            },

            remove(kidCamp) {
                let index = this.kidCamps.findIndex(item => item.id === kidCamp.id);

                this.kidCamps.splice(index, 1);
                this.selectedKidCamp = null;
            }
        }
    }
</script>
