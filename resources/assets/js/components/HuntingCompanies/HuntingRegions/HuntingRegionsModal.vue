<template>
    <modal name="huntingRegionsModal" height="auto" :width="700" :scrollable="true">
        <!-- Heading -->
        <div class="py-3">
            <h4 class="text-xl text-indigo-light text-center font-bold m-0 p-0">Регионы</h4>
        </div>

        <div class="py-3 px-6">
            <div>
                <!-- New region form -->
                <div class="flex mb-2">
                    <div class="w-2/3 mr-2">
                        <input type="text" v-model="newRegionName" placeholder="Регион">
                    </div>

                    <div>
                        <button type="button" @click="add">Добавить</button>
                    </div>
                </div>

                <hunting-regions-modal-item v-for="region in regions"
                                            :region-initial="region"
                                            :key="region.id"
                                            @destroyed="destroy(region)"
                                            class="mb-3">
                </hunting-regions-modal-item>
            </div>
        </div>
    </modal>
</template>

<script>
    import HuntingRegionsModalItem from './HuntingRegionsModalItem.vue';

    export default {
        components: { HuntingRegionsModalItem },

        props: [ 'regionsInitial' ],

        data() {
            return {
                regions: this.regionsInitial,
                newRegionName: ''
            };
        },

        methods: {
            add() {
                if (this.newRegionName.trim().length === 0) return flash('Укажите название!', 'warning');

                if (this.regions.some(region => region.name.toLowerCase().trim() == this.newRegionName.toLowerCase().trim())) {
                    return flash('Этот регион уже добавлен!', 'warning');
                }

                axios.post('/admin/hunting-regions', { name: this.newRegionName })
                    .then(response => {
                        this.newRegionName = '';

                        this.regions.push(response.data.region);

                        this.$emit('updated', this.regions);

                        flash('Добавлено!');
                    })
                    .catch(error => flash('Ошибка при выполнении.', 'danger'));
            }
        }
    }
</script>
