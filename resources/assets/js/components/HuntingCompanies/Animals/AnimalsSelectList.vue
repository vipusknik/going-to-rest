<template>
    <div>
        <div>
            <h3 class="text-green text-base font-semibold mb-2 underline cursor-pointer"
                @click="$modal.show('animals-modal')">
                Кого ловить
            </h3>

            <editable-list-modal :options-initial="items"
                                 modal-heading="Животные и рыбы"
                                 endpoint="/admin/animals"
                                 modal-name="animals-modal"
                                 @destroyed="destroy">
            </editable-list-modal>

            <div class="flex p-2 border border-grey-light">
                <div class="w-1/3 class border-r border-grey-light">
                    <div>
                        <div v-for="item in items"
                             v-text="item.name"
                             :key="item.id"
                             @click="onSelect(item)"
                             class="m-1 p-1 hover:bg-grey cursor-pointer">
                        </div>

                        <new-animal-form :endpoint="endpoint"></new-animal-form>
                    </div>
                </div>

                <div class="w-2/3">
                    <div class="p-2">
                        <animal-selected v-for="item in selectedItems"
                                         :key="item.id"
                                         :item="item"
                                         :items-selected="selectedItems"
                                         @unselect="onUnselect">
                        </animal-selected>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SelectableList from '../../../families/SelectableList/SelectableList.js';
    import AnimalSelected from './AnimalSelected.vue';
    import NewAnimalForm from './NewAnimalForm.vue';

    export default SelectableList.extend({

        components: { AnimalSelected, NewAnimalForm },

        methods: {
            destroy(animal) {
                let index = this.items.indexOf(animal);
                this.items.splice(index, 1);

                index = this.selectedItems.indexOf(animal);
                this.selectedItems.splice(index, 1);
            }
        }
    });
</script>
