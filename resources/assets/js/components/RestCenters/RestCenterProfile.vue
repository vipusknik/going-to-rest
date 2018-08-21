<template>
    <div>
        <div class="action-buttons mb-8">
            <div class="flex">
                <div class="control is-grouped">
                    <a :href="`/admin/rest-centers/${model.slug}/edit`"
                       class="button is-small bg-grey-lighter"
                       title="Перейти в редактирование">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a @click.prevent="destroy" class="button is-small bg-grey-lighter" title="Удалить базу отдыха">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>

                <div class="control ml-auto mr-2">
                    <paid-companies-button :model="model"></paid-companies-button>
                </div>
            </div>
        </div>

        <!-- Rest center info -->
        <div class="p-4 border border-grey-light rounded">
            <div class="mb-4 pb-4 border-b border-grey-light">
                <div class="mb-1">
                    <h3 class="text-base text-black font-semibold">
                        {{ model.name }}
                    </h3>
                </div>

                <div class="text-base text-grey-dark">
                    <span class="font-semibold">{{ model.reservoir.name }}</span>, {{ model.location }}
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

            <!-- Accomodations -->
            <div class="mb-4">
                <div v-if="model.accomodations.length">
                    <h3 class="text-blue-dark font-bold underline mb-1">
                        <a :href="`/admin/rest-centers/${model.slug}/accomodations`">Размещения</a>
                    </h3>
                    <table class="w-full">
                        <thead class="bg-blue-dark">
                            <tr>
                                <th class="w-1/4 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">Тип</th>
                                <th class="w-1/8 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">Вмещает</th>
                                <th class="w-1/8 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">
                                    Цена
                                </th>
                                <th class="w-1/4 text-white whitespace-no-wrap p-2">Описание</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="accomodation in model.accomodations" class="border-b border-blue-lighter">
                                <td class="p-2 border-r border-blue-lighter">
                                    <div v-text="accomodation.type_in_russian" class="text-blue-dark font-bold mb-1 underline"></div>

                                    <div>
                                        <ul>
                                            <features-attached v-if="accomodation.features.length" :features="accomodation.features">
                                                <template slot-scope="props">
                                                    <li class="inline-block text-sm text-green mr-2">
                                                        * {{ props.feature.name }}
                                                        <span v-if="props.feature.pivot.description"
                                                              v-text="`(${props.feature.pivot.description})`">
                                                        </span>
                                                    </li>
                                                </template>
                                            </features-attached>
                                        </ul>
                                    </div>
                                </td>
                                <td v-text="accomodation.guest_count" class="p-2 border-r border-blue-lighter"></td>
                                <td class="p-2 border-r border-blue-lighter">
                                    <template v-if="accomodation.price_per_day != '0'">
                                        <span class="text-grey-dark">от</span> {{ accomodation.price_per_day }}
                                    </template>
                                    <template v-else>
                                        <span class="text-grey-dark">{{ accomodation.price_per_day }}</span> (договорная цена)
                                    </template>
                                </td>
                                <td v-text="accomodation.description" class="p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div v-else class="flex">
                    <div class="w-full p-1">
                        <div class="flex p-2 border border-red-lighter rounded-sm bg-yellow">
                            <span class="mr-2"><i class="fas fa-exclamation text-yellow-darker"></i></span>
                            <span class="text-black font-bold">Размещений нет!</span>
                            <a :href="`/admin/rest-centers/${model.slug}/accomodations`"
                               class="
                                text-white
                                px-2
                                rounded
                                bg-blue-light
                                ml-auto
                                shadow
                                hover:bg-blue-dark
                            ">
                                Добавить
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Accomodation description -->
                <div v-if="model.accomodation"
                     v-html="model.accomodation"
                     class="my-2 pb-2 border-b border-blue-lighter">
                </div>
            </div>

            <div>
                <div v-html="model.description" class="text-sm"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModelProfile from '../Extendable/ModelPage/ModelProfile.js';

    export default ModelProfile.extend({});
</script>
