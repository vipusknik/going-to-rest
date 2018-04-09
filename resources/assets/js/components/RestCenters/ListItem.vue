<template>
    <div @click="$emit('selected')" class="p-4 border-b border-grey-light" :class="{ 'bg-grey-lighter': active }">
        <div class="mb-3">
            <h3 class="text-base text-black font-semibold">{{ restCenter.name }}</h3>
        </div>

        <div class="text-base text-grey-dark">
            {{ restCenter.reservoir.name }}
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'restCenter', 'active' ]
    }
</script>
