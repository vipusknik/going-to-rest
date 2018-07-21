<template>
    <div>
        <!-- List item with image -->
        <div v-if="model.is_paid" class="rounded-lg mb-4 md:rounded-2xl md:mb-6 md:border-white md:border-2 md:border-dashed">
            <div class="flex flex-col bg-white rounded-lg md:rounded-2xl lg:flex-row">
                <model-category v-if="showCategory"
                                title="медицинский туризм"
                                image="/images/icons/site-category-icons/medical-tourism.png">
                </model-category>

                <div class="flex-1">
                    <!-- List item name -->
                    <div class="flex justify-center p-3 mb-2">
                        <div class="w-full h-3 text-center border-b-3 border-teal-dark">
                            <a :href="'/medicinskij-turizm/' + model.slug" class="inline text-xl text-teal-dark px-2 bg-white font-bold">
                                {{ model.name }}
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row">
                        <!-- List item image -->
                        <a :href="'/medicinskij-turizm/' + model.slug" class="block md:self-end md:w-2/5">
                            <img :src="previewImageUrl" :alt="model.name" class="block w-full h-48 md:rounded-tr-2xl md:rounded-bl-2xl" :class="{ 'lg:rounded-bl-none': showCategory }" style="object-fit: cover; object-position: top">
                        </a>

                        <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="flex-1 break-words min-w-0">
                                    {{ model.location }}
                                </div>
                            </div>

                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="flex-1 break-words min-w-0">
                                    {{ model.contacts }}
                                    <div>{{ model.email }}</div>
                                </div>
                            </div>

                            <div class="flex items-center border-teal-dark py-2 md:w-5/6 md:border-b-0 md:border-dotted md:border-teal-dark md:pl-3 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/list.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="flex-1 break-words min-w-0 flex items-center md:relative">
                                    <div class="flex-1 mr-2 self-end">
                                        <span v-for="(type, index) in types">
                                            {{ type.name }}<template v-if="index !== types.length - 1">, </template>
                                        </span>
                                    </div>

                                    <div class="self-end md:hidden">
                                        <a :href="`/medicinskij-turizm/${model.slug}` + (showCategory ? '?search=1' : '')" class="block text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</a>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden md:block md:absolute md:pin-b md:pin-r">
                                <a :href="`/medicinskij-turizm/${model.slug}` + (showCategory ? '?search=1' : '')" class="block text-base text-white font-bold bg-teal-dark rounded-tl-lg rounded-br-2xl px-4 py-1">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- List item without image -->
        <div v-else class="mb-4 rounded-2xl md:border-white md:border-2 md:border-dashed">
            <div class="flex flex-col bg-white rounded-2xl lg:flex-row">
                <model-category v-if="showCategory"
                                title="медицинский туризм"
                                image="/images/icons/site-category-icons/medical-tourism.png">
                </model-category>

                <div class="flex-1">
                    <!-- List item name -->
                    <div class="flex justify-center p-3 mb-2">
                        <div class="w-full h-3 text-center border-b-3 border-teal-dark">
                            <h3 class="inline text-xl text-teal-dark px-2 bg-white font-bold">
                                {{ model.name }}
                            </h3>
                        </div>
                    </div>

                    <div class="pt-3 px-4 pb-1 md:flex">
                        <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:items-start">
                            <div class="w-8 h-8 flex-no-shrink mr-3">
                                <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                            </div>

                            <div class="flex-1 break-words min-w-0">
                                {{ model.location }}
                            </div>
                        </div>

                        <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                            <div class="w-8 h-8 flex-no-shrink mr-3">
                                <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                            </div>

                            <div class="flex-1 break-words min-w-0">
                                {{ model.contacts }}
                                <div>{{ model.email }}</div>
                            </div>
                        </div>

                        <div class="flex items-center border-dotted border-teal-dark py-2 md:w-1/2 md:pl-2 md:items-start">
                            <div class="w-8 h-8 flex-no-shrink mr-3">
                                <img src="/images/icons/list.png" alt="address" class="block w-8 h-8">
                            </div>

                            <div class="flex-1 break-words min-w-0">
                                <span v-for="(type, index) in types">
                                    {{ type.name }}<template v-if="index !== types.length - 1">, </template>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            model: {
                type: Object,
                required: true
            },

            showCategory: {
                type: Boolean,
                required: false,
                default: false
            }
        },

        computed: {
            previewImageUrl () {
                if (this.model.media.length === 0) return '/images/defaults/beach.jpg';

                let mainImage = this.model.media.find(item => item.collection === 'main-image');

                if (! mainImage) {
                    mainImage = this.model.media[0];
                }

                return mainImage.thumbnail_path;
            },

            types() {
                return this.model.features.filter(item => item.category === 'treatment_types')
            }
        }
    }
</script>
