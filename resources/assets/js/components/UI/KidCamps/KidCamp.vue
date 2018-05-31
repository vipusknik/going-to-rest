<template>
    <div>
        <!-- List item with image -->
        <div v-if="model.is_paid" class="bg-white rounded-lg mb-4 md:rounded-2xl md:mb-6 lg:border-2 lg:border-dashed">

            <!-- List item name -->
            <div class="flex justify-center p-3 mb-2">
                <div class="w-full h-3 text-center border-b-3 border-teal-dark">
                    <h3 class="inline text-xl text-teal-dark px-2 bg-white font-bold">
                        {{ model.name }}
                    </h3>
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- List item image -->
                <div class="md:self-end md:w-2/5">
                    <img :src="previewImageUrl" alt="" class="block w-full h-48 md:rounded-bl-2xl md:rounded-tr-2xl" style="object-fit: cover; object-position: top">
                </div>

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

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                        <div class="w-8 h-8 flex-no-shrink mr-3">
                            <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="flex-1 break-words min-w-0">
                            от {{ model.cost }}
                        </div>
                    </div>

                    <div class="flex items-center border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-dotted md:border-teal-dark md:pl-3 md:items-start">
                        <div class="w-8 h-8 flex-no-shrink mr-3">
                            <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="flex-1 break-words min-w-0 flex items-center md:relative">
                            <div class="flex-1 mr-3" v-html="model.accomodation"></div>

                            <div class="md:hidden">
                                <a :href="`/detskij-otdyh/${model.slug}`" class="block text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</a>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block md:absolute md:pin-b md:pin-r">
                        <a :href="`/detskij-otdyh/${model.slug}`" class="block text-base text-white font-bold bg-teal-dark rounded-tl-lg rounded-br-xl px-4 py-1">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- List item without image -->
        <div v-else class="bg-white mb-4 rounded-lg lg:border-2 lg:border-dashed">

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

                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="w-8 h-8 flex-no-shrink mr-3">
                        <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="flex-1 break-words min-w-0">
                        от {{ model.cost }}
                    </div>
                </div>

                <div class="flex items-center border-teal-dark py-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="w-8 h-8 flex-no-shrink mr-3">
                        <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="flex-1 break-words min-w-0">
                        <div class="flex-1" v-html="model.accomodation"></div>
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
            }
        },

        computed: {
            previewImageUrl () {
                if (this.model.media.length === 0) return '/images/defaults/beach.jpg';

                let mainImage = this.model.media.find(item => item.collection === 'main-image');

                if (! mainImage) {
                    mainImage = this.model.media[0];
                }

                return 'http://otdyh-vko.kz' + mainImage.thumbnail_path.replace('http://localhost', '');
            }
        }
    }
</script>
