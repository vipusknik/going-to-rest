<template>
    <div>
        <div>
            <h3 class="text-green text-base font-semibold mb-2 underline cursor-pointer"
                @click="$modal.show('activities-modal')">
                Виды отдыха
            </h3>

            <activities-modal @destroyed="destroy"></activities-modal>

            <div class="flex p-2 border border-grey-light">
                <div class="w-1/3 class border-r border-grey-light">
                    <div>
                        <div v-for="item in items"
                             v-text="item.name"
                             :key="item.id"
                             @click="onSelect(item)"
                             class="m-1 p-1 hover:bg-grey cursor-pointer">
                        </div>

                        <new-activity-form :endpoint="endpoint"></new-activity-form>
                    </div>
                </div>

                <div class="w-2/3">
                    <div class="p-2">
                        <activity-selected v-for="item in selectedItems"
                                           :key="item.id"
                                           :item="item"
                                           :items-selected="selectedItems"
                                           @unselect="onUnselect(item)">
                        </activity-selected>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SelectableList from '../Extendable/SelectableList/SelectableList.js';
    import ActivitySelected from './ActivitySelected.vue';
    import NewActivityForm from './NewactivityForm.vue';
    import ActivitiesModal from './ActivitiesModal';

    export default SelectableList.extend({

        components: { ActivitySelected, NewActivityForm, ActivitiesModal },

        methods: {
            destroy(item) {
                let index = this.items.indexOf(item);
                this.items.splice(index, 1);

                index = this.selectedItems.indexOf(item);
                this.selectedItems.splice(index, 1);
            }
        }
    });
</script>
