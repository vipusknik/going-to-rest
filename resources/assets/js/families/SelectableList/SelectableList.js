export default Vue.extend({
    props: {
        itemsInitial: {
            type: Array,
            required: true
        },

        itemsSelectedInitial: {
            type: Array,
            required: false,
            default: () => []
        }
    },

    data () {
        return {
            items: this.itemsInitial,
            selectedItems: []
        }
    },

    created () {
        this.itemsSelectedInitial.forEach (item => this.onSelect(item));
    },

    methods: {
        onSelect (selected) {
            let index = this.items.findIndex(item => item.id === selected.id);

            this.items.splice(index, 1);

            this.selectedItems.push(selected);
        },

        onUnselect (unselected) {
            let index = this.selectedItems.findIndex(item => unselected.id === item.id);

            this.selectedItems.splice(index, 1);

            this.items.push(unselected);
        }
    }
});
