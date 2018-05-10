<template>
    <div>
        <div v-if="! editing" class="flex">
            <div class="flex flex-1 mr-2">
                <!-- Name -->
                <div class="w-1/3 mr-2" v-text="item.name"></div>

                <div class="w-1/3 mr-2">
                    <span v-if="item.type === 'animal'">животное</span>
                    <span v-if="item.type === 'fish'">рыба</span>
                    <span v-if="item.type === 'bird'">птица</span>
                </div>

                <!-- Seasons -->
                <div class="w-2/3">
                    <span v-if="item.spring" class="mr-1">весна</span>
                    <span v-if="item.summer" class="mr-1">лето</span>
                    <span v-if="item.autumn" class="mr-1">осень</span>
                    <span v-if="item.winter">зима</span>
                </div>
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
                    <input type="text" class="w-full h-8 border" v-model="item.name">
                </div>

                <div class="w-1/3 mr-2">
                    <div class="select w-full">
                        <select v-model="item.type" class="w-full h-8">
                            <option value="animal">животное</option>
                            <option value="fish">рыба</option>
                            <option value="bird">птица</option>
                        </select>
                    </div>
                </div>

                <!-- Seasons -->
                <div class="w-1/3">
                    <span class="mr-1">
                        <input type="checkbox" id="spring" v-model="item.spring">
                        <label for="spring">весна</label>
                    </span>

                    <span class="mr-1">
                        <input type="checkbox" id="summer" v-model="item.summer">
                        <label for="summer">лето</label>
                    </span>

                    <span class="mr-1">
                        <input type="checkbox" id="autumn" v-model="item.autumn">
                        <label for="autumn">осень</label>
                    </span>

                    <span class="mr-1">
                        <input type="checkbox" id="winter" v-model="item.winter">
                        <label for="winter">зима</label>
                    </span>
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
                editing: false,
                seasons: []
            };
        },

        methods: {
            destroy() {
                axios.delete(`/admin/animals/${this.item.id}`)
                    .then(() => this.$emit('destroyed', this.item))
                    .catch((error) => {
                        if (error.response.status === 422) {
                            return flash('Этот объект связан с другими', 'danger')
                        }

                        flash('Ошибка при удалении.', 'danger')
                    });
            },

            save() {
                if (this.item.name.trim().length === 0) return flash('Укажите название', 'warning');

                let seasons = [];

                if (this.item.spring) seasons.push('spring');
                if (this.item.summer) seasons.push('summer');
                if (this.item.autumn) seasons.push('autumn');
                if (this.item.winter) seasons.push('winter');

                if (seasons.length === 0) {
                    return flash('Должен быть выбран хотя бы 1 сезон', 'warning');
                }

                axios.patch(`/admin/animals/${this.item.id}`, {
                        name: this.item.name,
                        type: this.item.type,
                        seasons: seasons,
                    })
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
