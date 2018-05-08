<template>
    <div>
        <div class="mt-2 p-1" v-if="! showNewItemForm">
            <a href="#" @click.prevent="showNewItemForm = true">
                Нет того что нужно?
            </a>
        </div>

        <div v-else class="m-1 p-4 bg-grey-lighter">
            <div class="mb-3">
                <input type="text"
                       v-model="newItem.name"
                       placeholder="Название"
                       class="
                        text-black
                        text-sm
                        w-full
                        h-8
                        rounded-sm
                        p-2
                        hover:border
                        hover:border-grey-light">
           </div>

           <div class="mb-3 flex justify-around">
                <div>
                    <input type="checkbox" value="spring" v-model="newItem.seasons" id="spring">
                    <label for="spring">весна</label>
                </div>

                <div>
                    <input type="checkbox" value="summer" v-model="newItem.seasons" id="summer">
                    <label for="summer">лето</label>
                </div>

                <div>
                    <input type="checkbox" value="autumn" v-model="newItem.seasons" id="autumn">
                    <label for="autumn">осень</label>
                </div>

                <div>
                    <input type="checkbox" value="winter" v-model="newItem.seasons" id="winter">
                    <label for="winter">зима</label>
                </div>
           </div>

            <button @click.prevent="store"
                    class="block
                           w-full
                           text-white
                           text-center
                           px-6
                           py-1
                           bg-teal
                           rounded-sm
                           hover:opacity-9
                        ">
                Добавить
            </button>
        </div>
    </div>
</template>

<script>
    import NewItemForm from '../Extendable/SelectableList/NewItemForm.js';

    export default NewItemForm.extend({
        data() {
            return {
                newItem: {
                    name: '',
                    seasons: []
                }
            };
        },

        methods: {
            validate () {
                if (! this.newItem.seasons.length) {
                    flash('Укажите сезоны', 'warning');
                    return false;
                }

                return true;
            }
        }
    });
</script>
