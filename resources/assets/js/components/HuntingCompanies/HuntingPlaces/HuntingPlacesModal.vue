<template>
    <modal name="huntingPlacesModal" height="auto" :width="500" :scrollable="true">
        <!-- Heading -->
        <div class="py-3">
            <h4 class="text-xl text-teal text-center font-bold m-0 p-0">Места</h4>
        </div>

        <div class="py-3 px-6">
            <div>
                <!-- New place form -->
                <div class="flex w-full mb-6">
                    <div class="w-3/4 mr-2">
                        <input type="text" v-model="newPlaceName" placeholder="Места" class="text-black text-sm w-full border border-grey-light rounded-sm py-1 px-2 hover:border hover:border-grey-light">
                    </div>

                    <div class="w-1/4">
                        <button type="button" @click="store" class="block w-full text-white text-center px-6 py-1 bg-teal rounded-sm hover:opacity-9">Добавить</button>
                    </div>
                </div>

                <hunting-places-modal-item v-for="place in places"
                                           :place-initial="place"
                                           :key="place.id"
                                           @destroyed="destroy(place)"
                                           @updated="update"
                                           class="mb-3">
                </hunting-places-modal-item>
            </div>
        </div>
    </modal>
</template>

<script>
    import HuntingPlacesModalItem from './HuntingPlacesModalItem.vue';

    export default {
        components: { HuntingPlacesModalItem },

        props: [ 'placesInitial' ],

        data() {
            return {
                places: this.placesInitial,
                newPlaceName: ''
            };
        },

        methods: {
            store() {
                if (this.newPlaceName.trim().length === 0) return flash('Укажите название!', 'warning');

                if (this.places.some(place => place.name.toLowerCase().trim() == this.newPlaceName.toLowerCase().trim())) {
                    return flash('Это место уже добавлено!', 'warning');
                }

                axios.post('/admin/hunting-places', { name: this.newPlaceName })
                    .then(response => {
                        this.newPlaceName = '';

                        this.places.push(response.data.place);

                        this.$emit('updated', this.places);

                        flash('Добавлено!');
                    })
                    .catch(error => flash('Ошибка при выполнении.', 'danger'));
            },

            destroy(place) {
                let index = window.index(place, this.places);

                this.places.splice(index, 1);

                this.$emit('updated', this.places);

                flash('Удалено!');
            },

            update(place) {
                let index = window.index(place, this.places);

                this.places[index] = place;

                flash('Изменения сохранены');

                this.$emit('updated', this.places);
            }
        }
    }
</script>
