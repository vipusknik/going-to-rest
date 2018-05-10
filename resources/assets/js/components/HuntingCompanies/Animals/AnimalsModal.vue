<template>
    <modal :name="modalName" @opened="fetch" height="auto" :width="700" :scrollable="true">
        <!-- Heading -->
        <div class="py-3">
            <h4 class="text-xl text-teal text-center font-bold m-0 p-0">Кого ловить</h4>
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
    import ModalItem from './AnimalsModalItem.vue';

    export default {
        components: { ModalItem },

        props: {
            modalName: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                items: []
            };
        },

        methods: {
            fetch() {
                axios.get('/admin/animals')
                .then(response => {
                    this.items = response.data.models;
                })
                .catch(() => flash('Ошибка при загрузке списка.', 'danger'));
            },

            destroy (item) {
                let index = window.index(item, this.items);
                this.items.splice(index, 1);

                this.$emit('destroyed', item);

                flash('Удалено!');
            }
        }
    }
</script>
