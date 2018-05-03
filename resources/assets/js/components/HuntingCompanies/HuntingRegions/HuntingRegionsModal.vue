<template>
    <modal name="huntingRegionsModal" height="auto" :width="500" :scrollable="true">
        <!-- Heading -->
        <div class="py-3">
            <h4 class="text-xl text-teal text-center font-bold m-0 p-0">Регионы</h4>
        </div>

        <div class="py-3 px-6">
            <div>
                <!-- New region form -->
                <div class="flex w-full mb-6">
                    <div class="w-3/4 mr-2">
                        <input type="text" v-model="newRegionName" placeholder="Регион" class="text-black text-sm w-full border border-grey-light rounded-sm py-1 px-2 hover:border hover:border-grey-light">
                    </div>

                    <div class="w-1/4">
                        <button type="button" @click="store" class="block w-full text-white text-center px-6 py-1 bg-teal rounded-sm hover:opacity-9">Добавить</button>
                    </div>
                </div>

                <hunting-regions-modal-item v-for="region in regions"
                                            :region-initial="region"
                                            :key="region.id"
                                            @destroyed="destroy(region)"
                                            @updated="update"
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
            store() {
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
            },

            destroy(region) {
                let index = window.index(region, this.regions);

                this.regions.splice(index, 1);

                this.$emit('updated', this.regions);

                flash('Удалено!');
            },

            update(region) {
                let index = window.index(region, this.regions);

                this.regions[index] = region;

                flash('Изменения сохранены');

                this.$emit('updated', this.regions);
            }
        }
    }
</script>
