<template>
    <div>
        <label for="hunting_place_id" class="inline-block label underline cursor-pointer" @click="$modal.show('huntingPlacesModal')">
            Место
        </label>

        <div class="control">
            <select name="hunting_place_id" id="hunting_place_id">
                <option v-for="place in places" v-text="place.name" :value="place.id"></option>
            </select>
        </div>

        <hunting-places-modal :places-initial="places" @updated="onUpdate"></hunting-places-modal>
    </div>
</template>

<script>
    import HuntingPlacesModal from './HuntingPlacesModal.vue';

    export default {
        components: { HuntingPlacesModal },

        props: [ 'placesInitial' ],

        data() {
            return {
                places: this.placesInitial
            };
        },

        methods: {
            onUpdate(places) {
                this.places = places;
            }
        }
    }
</script>
