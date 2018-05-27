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
