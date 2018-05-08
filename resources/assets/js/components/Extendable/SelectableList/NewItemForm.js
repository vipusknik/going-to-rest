export default Vue.extend({
    props: {
        endpoint: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            showNewItemForm: false,

            newItem: {
                name: ''
            }
        };
    },

    methods: {
        store() {
            if (! this.newItem.name.trim().length) {
                return flash('Укажите название', 'warning');
            }

            if (! this.validate()) return;

            let allItems = this.$parent.items.concat(this.$parent.selectedItems);

            if (allItems.find(item => this.newItem.name === item.name)) {
                return flash('Добавлено ранее', 'warning');
            }

            axios.post(this.endpoint, this.newItem)
                .then(response => {
                    this.newItem.name = '';
                    this.$parent.items.push(response.data.model);
                    flash('Добавлено');
                })
                .catch(() => flash('Ошибка при добавлении', 'danger'));
        },

        validate () {}
    }
});
