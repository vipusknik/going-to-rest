<template>
    <modal name="activities-modal" @opened="fetch" height="auto" :width="700" :scrollable="true">
        <!-- Heading -->
        <div class="py-3">
            <h4 class="text-xl text-indigo-light text-center font-bold m-0 p-0">Виды отдыха</h4>
        </div>

        <div class="py-3 px-6">
            <div>
                <activities-modal-item v-for="activity in activities"
                                       :activity-initial="activity"
                                       :key="activity.id"
                                       @destroyed="destroy(activity)"
                                       class="mb-3">
                </activities-modal-item>
            </div>
        </div>
    </modal>
</template>

<script>
    import ActivitiesModalItem from './ActivitiesModalItem';

    export default {
        components: { ActivitiesModalItem },

        data() {
            return {
                activities: []
            };
        },

        methods: {
            fetch() {
                axios.get('/admin/activities')
                .then(response => {
                    this.activities = response.data.activities;
                })
                .catch(error => flash('Ошибка при загруззке списка.', 'danger'));
            },

            destroy(activity) {
                let index = window.index(activity, this.activities);
                this.activities.splice(index, 1);

                this.$emit('destroyed', activity);

                flash('Удалено!');
            }
        }
    }
</script>
