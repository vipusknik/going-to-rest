<template>
    <div>
        <div class="w-full text-sm text-grey-darker font-semibold">
            Кого ловить
        </div>

        <div class="flex flex-wrap">
            <div v-for="item in items" :key="item.id" class="text-sm text-green-light font-semibold my-1 mr-3 mb-2">
                * {{ item.name }}
                <span v-if="item.pivot.description" v-text="`(${item.pivot.description})`"></span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            items: {
                type: Array,
                required: true
            }
        }
    }
</script>
