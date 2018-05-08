export default Vue.extend({
    props: {
        item: {
            type: Object,
            required: true
        },

        itemsSelected: {
            type: Array,
            required: false,
            default: []
        }
    },

    methods: {
        unselect () {
            this.$emit('unselect', this.item);
        }
    }
});
