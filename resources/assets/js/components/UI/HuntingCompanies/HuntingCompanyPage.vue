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
            if (this.hasAnimalsAt('summer')) return this.selectedSeason = 'summer';
            if (this.hasAnimalsAt('spring')) return this.selectedSeason = 'spring';
            if (this.hasAnimalsAt('autumn')) return this.selectedSeason = 'autumn';
            if (this.hasAnimalsAt('winter')) return this.selectedSeason = 'winter';
        },

        computed: {
            animals() {
                return this.model.animals
                    .filter(item => item[this.selectedSeason] == 1)
                    .filter(item => item.type !== 'fish')
            },

            fishes() {
                return this.model.animals
                    .filter(item => item[this.selectedSeason] == 1)
                    .filter(item => item.type === 'fish')
            }
        },

        methods: {
            hasAnimalsAt(season) {
                return this.model.animals.some(item => item[season] == 1);
            }
        }
    }
</script>
