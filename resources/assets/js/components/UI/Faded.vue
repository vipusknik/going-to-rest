<template>
    <div class="fixed pin-l overflow-hidden z-50 w-full h-full">
        <!-- Faded background -->
        <div @click.self="$emit('blur')" class="absolute pin" :class="bgClasses" style="background: rgba(255, 255, 255, .4);"></div>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: ['bgClasses']
    }
</script>
