<template>
    <div>
        <div v-if="! editing" class="flex">
            <div class="flex flex-1 mr-2">
                <!-- Name -->
                <div class="w-1/3 mr-2" v-text="item.name"></div>
            </div>

            <!-- Action buttons -->
            <div>
                <!-- Edit buttton -->
                <span @click="editing = true" class="mr-3 text-grey-darker text-sm hover:text-blue-light cursor-pointer" title="Редактировать">
                    <i class="fas fa-pencil-alt"></i>
                </span>

                <!-- Delete buttton -->
                <span @click="destroy" class="text-grey-darker text-sm hover:text-red-light cursor-pointer" title="Удалить">
                    <i class="fas fa-trash"></i>
                </span>
            </div>
        </div>

        <div v-else class="flex">
            <div class="flex flex-1 mr-2">
                <!-- Name -->
                <div class="w-1/3 mr-2">
                    <input type="text" class="w-full border" v-model="item.name">
                </div>
            </div>

            <!-- Action buttons -->
            <div>
                <!-- Save buttton -->
                <div @click="save" class="text-grey-darker text-base hover:text-blue-light cursor-pointer" title="Сохранить изменения">
                    <i class="fas fa-save"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'item-initial' ],

        data() {
            return {
                item: this.itemInitial,
                editing: false
            };
        },

        methods: {
            destroy() {
                axios.delete(`/admin/features/${this.item.id}`)
                    .then(() => this.$emit('destroyed', this.item))
                    .catch((error) => {
                        if (error.response.status === 422) {
                            return flash('Этот объект привязан к другому', 'danger');
                        }

                        flash('Ошибка при удалении.', 'danger')
                    });
            },

            save() {
                if (this.item.name.trim().length === 0) return flash('Укажите название', 'warning');

                axios.patch(`/admin/features/${this.item.id}`, this.item)
                    .then(response => {
                        this.item = response.data.model;

                        flash('Изменения сохранены');

                        this.editing = false;
                    })
                    .catch(() => flash('Ошибка при сохранении изменений.', 'danger'));
            }
        }
    }
</script>
