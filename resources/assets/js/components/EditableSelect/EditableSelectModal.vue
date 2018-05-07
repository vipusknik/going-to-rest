<template>
    <modal :name="modalName" height="auto" :width="500" :scrollable="true">
        <!-- Heading -->
        <div class="py-3">
            <h4 class="text-xl text-teal text-center font-bold m-0 p-0">{{ modalHeading }}</h4>
        </div>

        <div class="py-3 px-6">
            <div>
                <!-- New option form -->
                <div class="flex w-full mb-6">
                    <div class="w-3/4 mr-2">
                        <input type="text"
                               v-model="newOptionName"
                               :placeholder="modalHeading"
                               class="
                                    text-black
                                    text-sm
                                    w-full
                                    border
                                    border-grey-light
                                    rounded-sm
                                    py-1
                                    px-2
                                    hover:border
                                    hover:border-grey-light">
                   </div>

                    <div class="w-1/4">
                        <button type="button"
                                @click="store"
                                class="
                                    block
                                    w-full
                                    text-white
                                    text-center
                                    px-6
                                    py-1
                                    bg-teal
                                    rounded-sm
                                    hover:opacity-9">
                            Добавить
                        </button>
                    </div>
                </div>

                <editable-select-modal-item v-for="option in options"
                                           :key="option.id"
                                           :option-initial="option"
                                           :endpoint="endpoint"
                                           @destroyed="destroy(option)"
                                           @updated="update"
                                           class="mb-3">
                </editable-select-modal-item>
            </div>
        </div>
    </modal>
</template>

<script>
    import EditableSelectModalItem from './EditableSelectModalItem.vue';

    export default {
        components: { EditableSelectModalItem },

        props: {
            modalName: {
                type: String,
                required: true
            },

            modalHeading: {
                type: String,
                required: false,
                default: null
            },

            optionsInitial: {
                type: Array,
                required: true
            },

            endpoint: {
                type: String,
                required: true
            },

            attachRequestData: {
                type: Object,
                required: false,
                default: () => new Object()
            }
        },

        data () {
            return {
                options: this.optionsInitial,
                newOptionName: ''
            };
        },

        methods: {
            store () {
                if (this.newOptionName.trim().length === 0) return flash('Укажите название!', 'warning');

                if (this.options.some(place => place.name.toLowerCase().trim() == this.newOptionName.toLowerCase().trim())) {
                    return flash('Уже добавлено ранее!', 'warning');
                }

                let request = this.attachRequestData;
                request['name'] = this.newOptionName;

                axios.post(this.endpoint, request)
                    .then(response => {
                        this.newOptionName = '';

                        this.options.push(response.data.model);

                        this.$emit('updated', this.options);

                        flash('Добавлено!');
                    })
                    .catch(() => flash('Ошибка при выполнении.', 'danger'));
            },

            destroy (option) {
                let index = window.index(option, this.options);

                this.options.splice(index, 1);

                this.$emit('updated', this.options);

                flash('Удалено!');
            },

            update (option) {
                let index = window.index(option, this.options);

                this.options[index] = option;

                flash('Изменения сохранены');

                this.$emit('updated', this.options);
            }
        }
    }
</script>
