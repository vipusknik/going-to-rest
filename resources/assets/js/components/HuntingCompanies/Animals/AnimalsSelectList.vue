<script>
    import SelectableList from '../../Extendable/SelectableList/SelectableList.js';
    import NewItemForm from './NewAnimalForm.vue';
    import EditableListModal from './AnimalsModal.vue';

    export default SelectableList.extend({
        components: { NewItemForm, EditableListModal }
    });
</script>
