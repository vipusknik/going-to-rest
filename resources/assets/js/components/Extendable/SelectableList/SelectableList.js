import ItemSelected from './ItemSelected.js';

export default Vue.extend({
    template: `
        <div>
            <div>
                <h3 class="text-green text-base font-semibold mb-2 underline cursor-pointer"
                    @click="$modal.show(editableListModelName)">
                    {{ heading }}
                </h3>

                <editable-list-modal :options-initial="allItems"
                                     :modal-heading="modalHeading"
                                     :endpoint="endpoint"
                                     :modal-name="editableListModelName"
                                     @destroyed="destroy">
                </editable-list-modal>

                <div class="flex p-2 border border-grey-light">
                    <div class="w-1/3 class border-r border-grey-light">
                        <div>
                            <div v-for="item in items"
                                 v-text="item.name"
                                 :key="item.id"
                                 @click="onSelect(item)"
                                 class="m-1 p-1 hover:bg-grey cursor-pointer">
                            </div>

                            <new-item-form :endpoint="endpoint"></new-item-form>
                        </div>
                    </div>

                    <div class="w-2/3">
                        <div class="p-2">
                            <item-selected v-for="item in selectedItems"
                                           :key="item.id"
                                           :item="item"
                                           :items-selected="selectedItems"
                                           :description-input-placeholder="descriptionInputPlaceholder"
                                           :description-input-name="descriptionInputName"
                                           :description-field="descriptionField"
                                           @unselect="onUnselect">
                            </item-selected>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `,

    components: { ItemSelected },

    props: {
        heading: {
            type: String,
            required: true
        },

        itemsInitial: {
            type: Array,
            required: true
        },

        itemsSelectedInitial: {
            type: Array,
            required: false,
            default: () => []
        },

        endpoint: {
            type: String,
            required: true
        },

        modalHeading: {
            type: String,
            required: true
        },

        descriptionInputName: {
            type: String,
            required: true
        },

        descriptionInputPlaceholder: {
            type: String,
            required: false,
            default: 'Описание'
        },

        descriptionField: {
            type: String,
            required: false,
            default: 'description'
        }
    },

    data () {
        return {
            items: this.itemsInitial,
            selectedItems: [],
            editableListModelName: Math.random().toString(36).substr(2, 5)
        }
    },

    computed: {
        allItems () {
            return this.items.concat(this.selectedItems);
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
        },

        destroy (item) {
            let index = this.items.indexOf(item);
            this.items.splice(index, 1);

            index = this.selectedItems.indexOf(item);
            this.selectedItems.splice(index, 1);
        }
    }
});
