export default Vue.extend({
    template: `
        <div>
            <div class="mb-6">
                <input type="text" v-model="query" placeholder="Поиск ..." class="w-full p-2 border border-grey rounded-sm">
            </div>
        </div>
    `,

    props: {
        endpoint: {
            type: String,
            required: true
        }
    },

    data () {
        return {
             query: ''
        };
    },

    watch: {
        query () {
            axios.get(`${this.endpoint}/?query=${this.query}`)
                .then(response => {
                    this.$parent.models = response.data.models;
                })
                .catch(() => flash('Ошибка :('));
        }
    }
});
