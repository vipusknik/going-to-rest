<template>
    <div>
        <!-- List item with image -->
        <div v-if="model.is_paid" class="mb-4 rounded-lg md:rounded-2xl md:mb-6 md:border-2 md:border-white md:border-dashed">
            <div class="rounded-lg flex flex-col bg-white md:rounded-2xl lg:flex-row">
                <model-category v-if="showCategory"
                                title="пляжный отдых"
                                image="/images/icons/site-category-icons/beach-holidays.png">
                </model-category>

                <div>
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
                            <img :src="previewImageUrl" alt="" class="block w-full h-48 md:rounded-tr-2xl md:rounded-bl-2xl" :class="{ 'lg:rounded-bl-none': showCategory }" style="object-fit: cover; object-position: top">
                        </div>

                        <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/location.png" alt="address" class="block">
                                </div>

                                <div class="flex-1 break-words min-w-0">
                                    <strong>{{ model.reservoir.name }}. </strong>{{ model.location }}
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
                                    от {{ chepestAccomodationPrice }} тг <span v-if="hasFood" class="text-red-light">возможно питание</span>
                                </div>
                            </div>

                            <div class="flex items-center border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-dotted md:border-teal-dark md:pl-3 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="flex items-center flex-1 break-words min-w-0 md:relative">
                                    <div class="flex-1" v-html="model.accomodation"></div>

                                    <div class="md:hidden">
                                        <a :href="`/pljazhnyj-otdyh/${model.slug}`" class="block text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</a>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden md:block md:absolute md:pin-b md:pin-r">
                                <a :href="`/pljazhnyj-otdyh/${model.slug}`" class="block text-base text-white font-bold bg-teal-dark rounded-tl-lg rounded-br-2xl px-4 py-1">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- List item without image -->
        <div v-else class=" mb-4 rounded-2xl md:border-2 md:border-white md:border-dashed">
            <div class="flex flex-col rounded-2xl bg-white lg:flex-row">
                <model-category v-if="showCategory"
                                title="пляжный отдых"
                                image="/images/icons/site-category-icons/beach-holidays.png">
                </model-category>

                <div>
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
                                <strong>{{ model.reservoir.name }}. </strong>{{ model.location }}
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
                                от {{ chepestAccomodationPrice }} тг <span v-if="hasFood" class="text-red-light">возможно питание</span>
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

            chepestAccomodationPrice() {
                 if (this.model.accomodations.length === 0) return ' - ';

                let chepestAccomodation = this.model.accomodations.sort((a, b) => a.price_per_day > b.price_per_day)[0];

                return chepestAccomodation.price_per_day;
            },

            hasFood () {
                if (this.model.accomodations.length === 0) return false;

                let hasFood = this.model.accomodations.some(accomodation => {
                    return accomodation.features.some(feature => feature.id == 28);
                });

                return hasFood;
            }
        }
    }
</script>
