<script>
    import ModelPage from '../Extendable/ModelPage/ModelPage.js';
    import SearchPanel from '../Extendable/ModelPage/ModelSearchForm.js';
    import ListItem from '../Extendable/ModelPage/ModelListItem.js';
    import ModelProfile from './MedicalCenterProfile.vue';

    export default ModelPage.extend({
        components: {
            SearchPanel,
            ListItem,
            ModelProfile
        }
    });
</script>
