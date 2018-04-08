<template>
    <div class="flex m-1 p-1 hover:bg-grey cursor-pointer">
        <div v-text="feature.name" :key="feature.id" class="w-1/3"></div>

        <div class="w-1/2 pr-6">
            <input type="text"
                   v-model="description"
                   :name="`features[${feature.id}]`"
                   placeholder="Описание"
                   class="w-full p-1">
        </div>

        <div class="w-1/6" @click="remove">
            <i class="fas fa-times text-grey-lighter hover:text-black" title="Удалить"></i>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'feature' ],

        data() {
            return {
                description: ''
            };
        },

        methods: {
            remove() {
                this.$emit('remove', this.feature);
            }
        }
    }
</script>
