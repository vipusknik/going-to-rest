<script>
    import SelectableList from '../Extendable/SelectableList/SelectableList.js';
    import NewItemForm from './NewActivityForm.vue';
    import EditableListModal from './ActivitiesModal.vue';

    export default SelectableList.extend({
        components: { NewItemForm, EditableListModal }
    });
</script>
