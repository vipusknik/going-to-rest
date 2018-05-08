<template>
    <div @click="$emit('selected')" class="p-4 border-b border-grey-light" :class="{ 'bg-grey-lighter': active }">
        <div class="mb-3">
            <h3 class="text-base text-black font-semibold">{{ model.name }}</h3>
        </div>

        <div class="text-base text-grey-dark">
            {{ model.reservoir.name }}
        </div>
    </div>
</template>

<script>
    import ModelListItem from '../Extendable/ModelPage/ModelListItem.js';

    export default ModelListItem.extend({});
</script>
