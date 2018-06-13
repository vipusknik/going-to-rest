<template>
    <div :class="{ 'lg:flex-col-reverse lg:rounded-t-none lg:bg-yellow lg:rounded-l-2xl lg:py-4 lg:px-2 lg:leading-none': !lgFlexDirectionRow }"
          class="flex items-center px-6 py-2 bg-yellow rounded-t-lg md:rounded-t-2xl">
        <div :class="{ 'lg:mr-0 lg:mt-3': !lgFlexDirectionRow }" class="w-8 h-8 flex-no-shrink mr-3">
            <img :src="image" alt="address" :class="{ 'lg:-rotate-90': !lgFlexDirectionRow }" class="block w-8 h-8 rounded-full">
        </div>

        <div :class="{ 'lg:write-bottom-to-top': !lgFlexDirectionRow }" class="flex-1 break-words min-w-0">
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
            },

            lgFlexDirectionRow: {
                type: Boolean,
                required: false,
                default: false
            }
        }
    }
</script>
