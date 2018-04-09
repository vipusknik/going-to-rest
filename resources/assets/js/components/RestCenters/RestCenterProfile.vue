<template>
    <div>
        <div class="action-buttons mb-8">
            <div class="control is-grouped">
                <a class="button is-small bg-grey-lighter" title="Перейти в редактирование">
                    <i class="fas fa-edit"></i>
                </a>

                <a @click.prevent="onDestroy" class="button is-small bg-grey-lighter" title="Удалить базу отдыха">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>

        <!-- Rest center info -->
        <div class="p-4 border border-grey-light rounded">
            <div class="mb-4 pb-4 border-b border-grey-light">
                <div class="mb-1">
                    <h3 class="text-base text-black font-semibold">
                        {{ restCenter.name }}
                    </h3>
                </div>

                <div class="text-base text-grey-dark">
                    {{ restCenter.reservoir.name }}, {{ restCenter.location }}
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap">
                    <div v-for="feature in restCenter.features"
                         class="text-xs px-1 my-1 mr-2 bg-green-lighter border border-green rounded-sm">
                        {{ feature.name }} {{ feature.pivot.description }}
                    </div>
                </div>
            </div>

            <div>
                <div v-html="restCenter.description" class="text-sm"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'restCenter' ],

        methods: {
            onDestroy() {
                if (! confirm('Удалить базу отдыха?')) return;

                axios.delete(`/admin/rest-centers/${this.restCenter.id}`)
                    .then(response => {
                        this.$emit('destroyed', this.restCenter)
                    });
            }
        }
    }
</script>
