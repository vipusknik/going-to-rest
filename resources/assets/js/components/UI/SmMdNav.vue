<template>
    <div class="lg:hidden">
        <div class="flex space-between items-center py-3 px-4">
            <div @click="$parent.showMainMenu = true">
                <img src="/images/icons/menu.svg" alt="menu" class="block w-8 h-8">
            </div>

            <div class="flex-1 text-center text-2xl font-hortensia -mb-2">{{ title }}</div>

            <a :href="backUrl" class="block p-2 border-2 border-white rounded bg-yellow-dark">
                <img src="/images/icons/back.png" alt="menu" class="block w-6 h-6">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                required: true
            },

            backUrl: {
                type: String,
                required: true
            }
        }
    }
</script>
