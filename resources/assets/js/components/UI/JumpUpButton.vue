<template>
    <div @click="onClick" class="hidden lg:flex lg:flex-col lg:items-center lg:z-40 lg:fixed lg:pin-b lg:pin-l lg:mb-12 lg:ml-12 lg:cursor-pointer">
        <div class="bg-yellow-dark mb-1 border border-white">
            <img src="/images/icons/up.png" class="block w-8 h-8">
        </div>
        <div class="text-xs text-white">Наверх</div>
    </div>
</template>

<script>
    import jump from 'jump.js'

    export default {
        props: {
            target: {
                type: String,
                required: false,
                default: '#top'
            }
        },

        methods: {
            onClick() {
                jump(this.target, { duration: 1000 })
            }
        }
    }
</script>
