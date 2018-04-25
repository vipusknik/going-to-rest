<template>
    <div>
        <div class="flex flex-wrap">
            <div v-for="activity in activities" class="text-sm text-green-light font-semibold my-1 mr-3 mb-2">
                * {{ activity.name }} -
                <span>{{ activity.pivot.cost }} тг</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            activities: {
                type: Array,
                requried: true
            }
        }
    }
</script>
