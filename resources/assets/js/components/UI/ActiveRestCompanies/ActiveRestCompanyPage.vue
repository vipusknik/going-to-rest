<script>
    export default {
        props: {
            model: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                selectedSeason: null
            };
        },

        created() {
            if (this.hasActivitiesAt('summer')) return this.selectedSeason = 'summer';
            if (this.hasActivitiesAt('spring')) return this.selectedSeason = 'spring';
            if (this.hasActivitiesAt('autumn')) return this.selectedSeason = 'autumn';
            if (this.hasActivitiesAt('winter')) return this.selectedSeason = 'winter';
        },

        computed: {
            activities() {
                return this.model.activities.filter(item => item[this.selectedSeason] == 1)
            }
        },

        methods: {
            hasActivitiesAt(season) {
                return this.model.activities.some(item => item[season] == 1);
            }
        }
    }
</script>
