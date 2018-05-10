<template>
    <modal :name="modalName" height="auto" :width="700" :scrollable="true">
        <!-- Heading -->
        <div class="py-3">
            <h4 class="text-xl text-teal text-center font-bold m-0 p-0">{{ heading }}</h4>
        </div>

        <div class="py-3 px-6">
            <div>
                <modal-item v-for="item in items"
                            :item-initial="item"
                            :key="item.id"
                            @destroyed="destroy(item)"
                            class="mb-3">
                </modal-item>
            </div>
        </div>
    </modal>
</template>

<script>
    import ModalItem from './FeaturesModalItem';

    export default {
        components: { ModalItem },

        props: {
            modalName: {
                type: String,
                required: true
            },

            heading: {
                type: String,
                required: true
            },

            itemsInitial: {
                type: Array,
                required: true
            }
        },

        data() {
            return {
                items: this.itemsInitial
            };
        },

        created () {
            this.$watch('itemsInitial', () => this.items = this.itemsInitial);
        },

        methods: {
            destroy(item) {
                let index = window.index(item, this.items);
                this.items.splice(index, 1);

                this.$emit('destroyed', item);

                flash('Удалено!');
            }
        }
    }
</script>
