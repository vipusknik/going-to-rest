<template>
    <div>
        <label :for="uniqid" class="inline-block label underline cursor-pointer" @click="$modal.show(uniqid + 'modal')">
            {{ selectLabel }}
        </label>

        <div class="control">
            <div class="select w-full">
                <select :name="selectName" :id="uniqid" class="w-full">
                    <option v-for="option in selectOptions"
                            v-text="option.name"
                            :value="option.id"
                            :selected="selectedOptionId == option.id">
                    </option>
                </select>
            </div>
        </div>

        <editable-list-modal :options-initial="selectOptions"
                             :endpoint="endpoint"
                             :attach-request-data="attachRequestData"
                             :modal-heading="modalHeading"
                             :modal-name="uniqid + 'modal'"
                             @updated="onUpdate">
        </editable-list-modal>
    </div>
</template>

<script>
    import EditableListModal from './EditableListModal.vue';

    export default {
        components: { EditableListModal },

        props: {
            selectLabel: {
                type: String,
                required: true
            },

            selectName: {
                type: String,
                required: true
            },

            selectOptionsInitial: {
                type: Array,
                required: true
            },

            selectedOptionId: {
                type: String,
                required: false
            },

            modalHeading: {
                type: String,
                required: false,
                default: null
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

        data() {
            return {
                selectOptions: this.selectOptionsInitial,
                uniqid: Math.random().toString(36).substr(2, 9)
            };
        },

        methods: {
            onUpdate(options) {
                this.options = options;
            }
        }
    }
</script>
