<template>
    <div>
        <div class="action-buttons mb-8">
            <div class="control is-grouped">
                <a :href="`/admin/rest-centers/${restCenter.slug}/edit`"
                   class="button is-small bg-grey-lighter"
                   title="Перейти в редактирование">
                    <i class="fas fa-edit"></i>
                </a>

                <a @click.prevent="remove" class="button is-small bg-grey-lighter" title="Удалить базу отдыха">
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
                    <span class="font-semibold">{{ restCenter.reservoir.name }}</span>, {{ restCenter.location }}
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap content-between">
                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-phone"></i></span>
                        <span>{{ restCenter.contacts.join(', ') }}</span>
                    </div>

                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-envelope"></i></span>
                        <span>{{ restCenter.email }}</span>
                    </div>

                    <div class="text-sm mr-3">
                        <span class="text-grey-dark mr-1"><i class="fas fa-link"></i></span>
                        <span>
                            <a :href="restCenter.site_link"
                               target="_blank"
                               class="text-blue-light no-underline hover:underline">
                                {{ restCenter.site_link }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- features -->
            <div v-if="restCenter.features.length" class="mb-4">
                <div class="flex flex-wrap">
                    <div v-for="feature in restCenter.features"
                         class="text-xs px-1 my-1 mr-2 bg-green-lighter border border-green rounded-sm">
                        {{ feature.name }}
                        <span v-if="feature.pivot.description"
                              v-text="`(${feature.pivot.description})`">
                        </span>
                    </div>
                </div>
            </div>

            <!-- images -->
            <file-upload-widget :endpoint="`/admin/rest-centers/${restCenter.slug}/media`"
                                accept="image/*"
                                :images-attached="restCenter.media"
                                class="mb-4">
            </file-upload-widget>

            <!-- Accomodations -->
            <div class="mb-4">
                <div v-if="restCenter.accomodations.length">
                    <h3 class="text-blue-dark font-bold underline mb-1">
                        <a :href="`/admin/rest-centers/${restCenter.slug}/accomodations`">Размещения</a>
                    </h3>
                    <table class="w-full">
                        <thead class="bg-blue-dark">
                            <tr>
                                <th class="w-1/4 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">Тип</th>
                                <th class="w-1/8 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">Вмещает</th>
                                <th class="w-1/8 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">Цена</th>
                                <th class="w-1/4 text-white whitespace-no-wrap p-2">Описание</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="accomodation in restCenter.accomodations" class="border-b border-blue-lighter">
                                <td class="p-2 border-r border-blue-lighter">
                                    <div v-text="accomodation.type_in_russian" class="text-blue-dark font-bold mb-1 underline"></div>

                                    <div>
                                        <ul>
                                            <li v-for="feature in accomodation.features"
                                                class="inline-block text-sm text-green mr-2">
                                                * {{ feature.name }}
                                                <span v-if="feature.pivot.description"
                                                      v-text="`(${feature.pivot.description})`">
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td v-text="accomodation.guest_count" class="p-2 border-r border-blue-lighter"></td>
                                <td v-text="accomodation.price_per_day" class="p-2 border-r border-blue-lighter"></td>
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
                            <a :href="`/admin/rest-centers/${restCenter.slug}/accomodations`"
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
                <div v-if="restCenter.accomodation"
                     v-html="restCenter.accomodation"
                     class="my-2 pb-2 border-b border-blue-lighter">
                </div>
            </div>

            <div>
                <div v-html="restCenter.description" class="text-sm"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import FileUploadWidget from '../FileUpload/Widget.vue';

    export default {
        components: { FileUploadWidget },

        props: [ 'restCenter' ],

        methods: {
            remove() {
                if (! confirm('Удалить базу отдыха?')) return;

                axios.delete(`/admin/rest-centers/${this.restCenter.slug}`)
                    .then(response => {
                        this.$emit('destroyed', this.restCenter);
                        flash('База отдыха удалена');
                    });
            }
        }
    }
</script>
