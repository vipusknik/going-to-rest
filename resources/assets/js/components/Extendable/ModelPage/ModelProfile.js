import ModelContacts from './ModelContacts.js';

export default Vue.extend({
    components: { ModelContacts },

    props: {
        model: {
            type: Object,
            required: true
        },

        endpoint: {
            type: String,
            required: true
        }
    },

    methods: {
        destroy () {
            if (! confirm('Удалить из базы данных?')) return;

            axios.delete(`${this.endpoint}/${this.model.slug}`)
                .then(() => {
                    this.$emit('destroyed', this.model);
                    flash('Удалено');
                })
                .catch(() => flash('Ошибка при удалении!', 'danger'));
        }
    }
});
