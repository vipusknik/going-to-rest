export default Vue.extend({
    template: `
        <div>
            <div class="flex h-full bg-white border border-grey-light">
                <div class="w-1/6 p-4 border-r border-grey-light bg-grey-lighter">
                    <aside>
                        <div class="mb-6 pb-6 border-b border-grey">
                            <a :href="endpoint + '/create'"
                               class="
                                    block
                                    text-white
                                    text-center
                                    font-semibold
                                    px-6
                                    py-1
                                    bg-indigo
                                    rounded-sm
                                    hover:opacity-9
                               ">
                               {{ createModelLink }}
                            </a>
                        </div>
                        <search-panel :endpoint="endpoint"></search-panel>
                    </aside>
                </div>

                <div class="flex w-5/6">
                    <div class="w-2/5 p-6 border-r border-grey-light">
                        <!-- List -->
                        <div class="border border-grey-light shadow">
                            <list-item v-for="model in models"
                                       :key="model.id"
                                       :model="model"
                                       @selected="show(model)"
                                       :active="selectedModel !== null && model.id === selectedModel.id"
                                       class="cursor-pointer hover:bg-grey-lightest">
                            </list-item>
                        </div>
                    </div>

                    <div class="w-3/5 p-4">
                        <model-profile v-if="selectedModel" :model="selectedModel" :endpoint="endpoint" @destroyed="remove">
                        </model-profile>
                    </div>
                </div>
            </div>
        </div>
    `,

    props: {
        modelsInitial: {
            type: Array,
            required: true
        },

        endpoint: {
            type: String,
            required: true
        }
    },

    data () {
        return {
            models: this.modelsInitial,
            selectedModel: null,
            createModelLink: 'Добавить'
        };
    },

    methods: {
        show (model) {
            this.selectedModel = null;

            axios.get(`${this.endpoint}/${model.slug}`)
                .then(response => {
                    this.selectedModel = response.data.model;
                })
                .catch(() => flash('Ошибка при загрузке!', 'danger'));
        },

        remove (model) {
            let index = this.models.findIndex(item => item.id === model.id);

            this.models.splice(index, 1);

            this.selectedModel = null;
        }
    }
});
