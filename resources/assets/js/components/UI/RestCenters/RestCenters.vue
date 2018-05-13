<template>
    <div class="px-2 lg:px-0">
        <rest-center v-for="center in restCenters" :key="center.id" :center='center'></rest-center>
    </div>
</template>

<script>
    export default {
        props: {
            restCenters: {
                type: Array,
                required: true
            }
        }
    }
</script>
