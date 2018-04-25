<template>
    <div>
        <div>
            <h3 class="text-green text-base font-semibold mb-2">Виды отдыха</h3>
            <div class="flex p-2 border border-grey-light">
                <div class="w-1/3 class border-r border-grey-light">
                    <div>
                        <div v-for="activity in activities"
                             v-text="activity.name"
                             :key="activity.id"
                             @click="select(activity)"
                             class="m-1 p-1 hover:bg-grey cursor-pointer">
                        </div>

                        <new-activity-form></new-activity-form>
                    </div>
                </div>

                <div class="w-2/3">
                    <div class="p-2">
                        <selected-activity v-for="activity in selectedActivities"
                                          :key="activity.id"
                                          :activity="activity"
                                          :activities-attached="activitiesAttached"
                                          @remove="remove">
                        </selected-activity>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SelectedActivity from './SelectedActivity.vue';
    import NewActivityForm from './NewactivityForm.vue';

    export default {
        components: { SelectedActivity, NewActivityForm },

        props: {
            activitiesInitial: {
                type: Array,
                required: true
            },

            activitiesAttached: {
                type: Array,
                required: false,
                default: () => []
            }
        },

        data() {
            return {
                activities: this.activitiesInitial,
                selectedActivities: []
            }
        },

        created() {
            this.attachActivities();
            this.$watch('activitiesAttached', () => this.attachActivities());
        },

        methods: {
            select(activity) {
                let index = this.activities.findIndex(item => activity.id === item.id);
                this.activities.splice(index, 1);

                this.selectedActivities.push(activity);
            },

            attachActivities() {
                this.activitiesAttached.forEach(activity => {
                    if (this.activitiesInitial.findIndex(item => item.id === activity.id) !== -1) {
                        this.select(activity);
                    }
                });
            },

            remove(activity) {
                let index = this.selectedActivities.indexOf(activity);
                this.selectedActivities.splice(index, 1);

                this.activities.push(activity);
            }
        }
    }
</script>
