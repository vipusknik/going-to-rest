<template>
    <div>
        <label for="hunting_region_id" class="inline-block label underline cursor-pointer" @click="$modal.show('huntingRegionsModal')">
            Регион
        </label>

        <div class="control">
            <select name="hunting_region_id" id="hunting_region_id">
                <option v-for="region in regions" v-text="region.name" :value="region.id"></option>
            </select>
        </div>

        <hunting-regions-modal :regions-initial="regions" @updated="onUpdate"></hunting-regions-modal>
    </div>
</template>

<script>
    import HuntingRegionsModal from './HuntingRegionsModal.vue';

    export default {
        components: { HuntingRegionsModal },

        props: [ 'regionsInitial' ],

        data() {
            return {
                regions: this.regionsInitial
            };
        },

        methods: {
            onUpdate(regions) {
                this.regions = regions;
            }
        }
    }
</script>
