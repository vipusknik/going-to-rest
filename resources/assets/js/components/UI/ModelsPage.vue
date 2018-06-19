<script>
    export default {
        props: {
            modelsInitial: {
                type: Array,
                required: true
            }
        },

        data() {
            return {
                models: this.modelsInitial
            };
        },

        mounted() {
            window.events.$on(
                'models-updated', models => this.models = models
            );
        }
    }
</script>
