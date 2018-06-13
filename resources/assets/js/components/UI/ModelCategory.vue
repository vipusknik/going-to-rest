<template>
    <div class="flex items-center px-6 py-2 bg-yellow rounded-t-lg md:rounded-t-2xl lg:flex-col-reverse lg:rounded-t-none lg:bg-yellow lg:rounded-l-2xl lg:py-4 lg:px-2 lg:leading-none">
        <div class="w-8 h-8 flex-no-shrink mr-3 lg:mr-0 lg:mt-3">
            <img :src="image" alt="address" class="block w-8 h-8 rounded-full lg:-rotate-90">
        </div>

        <div class="flex-1 break-words min-w-0 lg:write-bottom-to-top">
            {{ title }}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            image: {
                type: String,
                required: true
            },

            title: {
                type: String,
                required: true
            }
        }
    }
</script>
