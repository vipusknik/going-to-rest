<template>
    <div>
        <!-- List item with image -->
        <div v-if="center.is_paid" class="bg-white rounded-lg mb-4 md:rounded-2xl md:mb-6 lg:border-2 lg:border-dashed">

            <!-- List item name -->
            <div class="flex justify-center p-3 mb-2">
                <div class="w-full h-3 text-center border-b-3 border-teal-dark">
                    <h3 class="inline text-xl text-teal-dark px-2 bg-white font-bold">
                        {{ center.name }}
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
                            <img src="/images/icons/location.png" alt="address" class="block">
                        </div>

                        <div class="flex-1 break-words min-w-0">
                            <strong>{{ center.reservoir.name }}. </strong>{{ center.location }}
                        </div>
                    </div>

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                        <div class="w-8 h-8 flex-no-shrink mr-3">
                            <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="flex-1 break-words min-w-0">
                            {{ center.contacts }}
                            <div>{{ center.email }}</div>
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
                            <div class="flex-1" v-html="center.accomodation"></div>

                            <div class="md:hidden">
                                <a :href="`/pljazhnyj-otdyh/${center.slug}`" class="block text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</a>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block md:absolute md:pin-b md:pin-r">
                        <a :href="`/pljazhnyj-otdyh/${center.slug}`" class="block text-base text-white font-bold bg-teal-dark rounded-tl-lg rounded-br-xl px-4 py-1">Подробнее</a>
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
                        {{ center.name }}
                    </h3>
                </div>
            </div>

            <div class="pt-3 px-4 pb-1 md:flex">
                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:items-start">
                    <div class="w-8 h-8 flex-no-shrink mr-3">
                        <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="flex-1 break-words min-w-0">
                        <strong>{{ center.reservoir.name }}. </strong>{{ center.location }}
                    </div>
                </div>

                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="w-8 h-8 flex-no-shrink mr-3">
                        <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="flex-1 break-words min-w-0">
                        {{ center.contacts }}
                        <div>{{ center.email }}</div>
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
                        <div class="flex-1" v-html="center.accomodation"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            center: {
                type: Object,
                required: true
            }
        },

        computed: {
            previewImageUrl () {
                if (this.center.media.length === 0) return '/images/defaults/beach.jpg';

                let mainImage = this.center.media.find(item => item.collection === 'main-image');

                if (! mainImage) {
                    mainImage = this.center.media[0];
                }

                return mainImage.thumbnail_path;
            },

            chepestAccomodationPrice() {
                 if (this.center.accomodations.length === 0) return ' - ';

                let chepestAccomodation = this.center.accomodations.sort((a, b) => a.price_per_day > b.price_per_day)[0];

                return chepestAccomodation.price_per_day;
            },

            hasFood () {
                if (this.center.accomodations.length === 0) return false;

                let hasFood = this.center.accomodations.some(accomodation => {
                    return accomodation.features.some(feature => feature.id == 28);
                });

                return hasFood;
            }
        }
    }
</script>
