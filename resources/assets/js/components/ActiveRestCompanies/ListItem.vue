<template>
    <div @click="$emit('selected')" class="p-4 border-b border-grey-light" :class="{ 'bg-grey-lighter': active }">
        <div>
            <h3 class="text-base text-black font-semibold">{{ company.name }}</h3>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'company', 'active' ]
    }
</script>
