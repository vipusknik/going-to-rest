<template>
    <div>
        <div class="mt-2 p-1" v-if="! showNewActivityInput">
            <a href="#" @click.prevent="showNewActivityInput = true">
                Нет того что нужно?
            </a>
        </div>

        <div v-else class="m-1 p-4 bg-grey-lighter">
            <div class="mb-3">
                <input type="text"
                       v-model="newActivity.name"
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
                    <input type="checkbox" value="spring" v-model="newActivity.seasons" id="spring">
                    <label for="spring">весна</label>
                </div>

                <div>
                    <input type="checkbox" value="summer" v-model="newActivity.seasons" id="summer">
                    <label for="summer">лето</label>
                </div>

                <div>
                    <input type="checkbox" value="autumn" v-model="newActivity.seasons" id="autumn">
                    <label for="autumn">осень</label>
                </div>

                <div>
                    <input type="checkbox" value="winter" v-model="newActivity.seasons" id="winter">
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
    export default {
        data() {
            return {
                showNewActivityInput: false,
                newActivity: {
                    name: '',
                    seasons: []
                }
            };
        },

        methods: {
            store() {
                if (this.newActivity.name === '' || ! this.newActivity.seasons.length) {
                    return flash('Укажите название и сезоны', 'warning');
                }

                let allActivities = this.$parent.activities.concat(this.$parent.selectedActivities);

                if (allActivities.find(activity => this.newActivity.name == activity.name)) {
                    return flash('Добавлено ранее', 'warning');
                }

                axios.post('/admin/activities', this.newActivity)
                    .then(response => {
                        this.newActivity.name = '';
                        this.$parent.activities.push(response.data.activity);
                        flash('Добавлено');
                    })
                    .catch(error => flash('Ошибка при добавлении', 'danger'));
            }
        }
    }
</script>
