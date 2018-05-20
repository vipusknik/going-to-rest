<template>
    <div>
        <div class="action-buttons mb-8">
            <div class="flex">
                <div class="control is-grouped">
                    <a :href="`${endpoint}/${model.slug}/edit`"
                       class="button is-small bg-grey-lighter"
                       title="Перейти в редактирование">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a @click.prevent="destroy" class="button is-small bg-grey-lighter" title="Удалить детский лагерь">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>

                <div class="control ml-auto mr-2">
                    <paid-companies-button :model="model"></paid-companies-button>
                </div>
            </div>
        </div>

        <!-- Medical center info -->
        <div class="p-4 border border-grey-light rounded">
            <div class="mb-4 pb-4 border-b border-grey-light">
                <div class="mb-1">
                    <h3 class="text-base text-black font-semibold" v-text="model.name"></h3>
                </div>

                <div class="text-base text-grey-dark" v-text="model.location"></div>

                <div v-if="model.city_id" class="text-base text-grey-dark">Город: {{ model.city.name }}</div>

                <div class="text-sm text-grey-dark">
                    <span class="text-grey">Распространение путевок:</span> {{ model.distribution_address }}
                </div>
            </div>

            <div class="mb-4">
                <model-contacts :model="model"></model-contacts>
            </div>

            <!-- features -->
            <features-attached v-if="model.features.length" :features="model.features" class="mb-6"></features-attached>

            <!-- images -->
            <image-upload-widget :model="model" :images-attached="model.media" class="mb-4">
            </image-upload-widget>

            <div>
                <div class="mb-3 pb-3 border-b border-blue-lighter">
                    <h3 class="text-grey-darker font-bold">Проживание:</h3>
                    <div v-html="model.accomodation" class="text-sm mb-2"></div>

                    <div>
                        <span class="text-grey-darker font-bold">Стоимость: </span>
                        <span v-text="model.cost" class="text-sm"></span>
                    </div>
                </div>

                <div v-html="model.description" class="text-sm"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModelProfile from '../Extendable/ModelPage/ModelProfile.js';

    export default ModelProfile.extend({});
</script>
