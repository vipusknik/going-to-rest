<template>
    <div>
        <label :for="uniqid" class="inline-block label underline cursor-pointer" @click="$modal.show(uniqid + 'modal')">
            {{ selectLabel }}
        </label>

        <div class="control">
            <select :name="selectName" :id="uniqid">
                <option v-for="option in selectOptions" v-text="option.name" :value="option.id"></option>
            </select>
        </div>

        <editable-select-modal :options-initial="selectOptions"
                               :endpoint="endpoint"
                               :attach-request-data="attachRequestData"
                               :modal-heading="modalHeading"
                               :modal-name="uniqid + 'modal'"
                               @updated="onUpdate">
        </editable-select-modal>
    </div>
</template>

<script>
    import EditableSelectModal from './EditableSelectModal.vue';

    export default {
        components: { EditableSelectModal },

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
