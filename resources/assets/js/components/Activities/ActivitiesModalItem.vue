<template>
    <div>
        <div v-if="! editing" class="flex">
            <div class="flex flex-1 mr-2">
                <!-- Name -->
                <div class="w-1/3 mr-2" v-text="activity.name"></div>

                <!-- Seasons -->
                <div class="w-2/3">
                    <span v-if="activity.spring" class="mr-1">весна</span>
                    <span v-if="activity.summer" class="mr-1">лето</span>
                    <span v-if="activity.autumn" class="mr-1">осень</span>
                    <span v-if="activity.winter">зима</span>
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
                    <input type="text" class="w-full border" v-model="activity.name">
                </div>

                <!-- Seasons -->
                <div class="w-2/3">
                    <span class="mr-1">
                        <input type="checkbox" id="spring" v-model="activity.spring">
                        <label for="spring">весна</label>
                    </span>

                    <span class="mr-1">
                        <input type="checkbox" id="summer" v-model="activity.summer">
                        <label for="summer">лето</label>
                    </span>

                    <span class="mr-1">
                        <input type="checkbox" id="autumn" v-model="activity.autumn">
                        <label for="autumn">осень</label>
                    </span>

                    <span class="mr-1">
                        <input type="checkbox" id="winter" v-model="activity.winter">
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
        props: [ 'activity-initial' ],

        data() {
            return {
                activity: this.activityInitial,
                editing: false,
                seasons: []
            };
        },

        methods: {
            destroy() {
                axios.delete(`/admin/activities/${this.activity.id}`)
                    .then(() => this.$emit('destroyed', this.activity))
                    .catch((error) => {
                        if (error.response.status === 422) {
                            return flash('Этот вид отдыха связан с компаниями', 'danger')
                        }

                        flash('Ошибка при удалении.', 'danger')
                    });
            },

            save() {
                if (this.activity.name.trim().length === 0) return flash('Укажите название', 'warning');

                let seasons = [];

                if (this.activity.spring) seasons.push('spring');
                if (this.activity.summer) seasons.push('summer');
                if (this.activity.autumn) seasons.push('autumn');
                if (this.activity.winter) seasons.push('winter');

                if (seasons.length === 0) {
                    return flash('Должен быть выбран хотя бы 1 сезон', 'warning');
                }

                axios.patch(`/admin/activities/${this.activity.id}`, {
                        name: this.activity.name,
                        seasons: seasons,
                    })
                    .then(response => {
                        this.activity = response.data.activity;

                        flash('Изменения сохранены');

                        this.editing = false;
                    })
                    .catch(error => flash('Ошибка при сохранении изменений.', 'danger'));
            }
        }
    }
</script>
