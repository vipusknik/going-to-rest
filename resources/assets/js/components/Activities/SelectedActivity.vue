<template>
    <div class="flex m-1 p-1 hover:bg-grey cursor-pointer">
        <div v-text="activity.name" :key="activity.id" class="w-1/3"></div>

        <div class="w-1/2 pr-6">
            <input type="text"
                   v-model="cost"
                   :name="`activities[${activity.id}]`"
                   placeholder="Цена (обязательно)"
                   required="true"
                   class="w-full p-1">
        </div>

        <div class="w-1/6" @click="remove">
            <i class="fas fa-times text-grey-lighter hover:text-black" title="Удалить"></i>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            activity: {
                type: Object,
                required: true
            },

            activitiesAttached: {
                type: Array,
                required: false,
                default: []
            }
        },

        data() {
            return {
                cost: ''
            };
        },

        created() {
            this.activitiesAttached.forEach(item => {
                if (item.id === this.activity.id) {
                    this.cost = item.pivot.cost;
                }
            });
        },

        methods: {
            remove() {
                this.$emit('remove', this.activity);
            }
        }
    }
</script>
