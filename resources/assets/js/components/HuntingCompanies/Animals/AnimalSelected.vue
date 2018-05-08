<template>
    <div class="flex m-1 p-1 hover:bg-grey cursor-pointer">
        <div v-text="item.name" :key="item.id" class="w-1/3"></div>

        <div class="w-1/2 pr-6">
            <input type="text"
                   v-model="description"
                   :name="`animals[${item.id}]`"
                   placeholder="Описание"
                   class="w-full p-1">
        </div>

        <div class="w-1/6" @click="unselect(item)">
            <i class="fas fa-times text-grey-lighter hover:text-black" title="Удалить"></i>
        </div>
    </div>
</template>

<script>
    import SelectedItem from '../../Extendable/SelectableList/SelectedItem.js';

    export default SelectedItem.extend({
        props: {
            itemsSelected: {
                type: Array,
                required: true
            }
        },

        data () {
            return {
                description: ''
            };
        },

        created () {
            this.itemsSelected.forEach(selected => {
                if (selected.id === this.item.id && this.item.pivot) {
                    this.description = this.item.pivot.description;
                }
            });
        }
    });
</script>
