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
                selectedSeason: 'summer'
            };
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
