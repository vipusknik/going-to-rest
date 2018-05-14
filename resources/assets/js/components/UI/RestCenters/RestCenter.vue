<template>
    <div>
        <!-- List item with image -->
        <div v-if="center.is_paid" class="bg-white rounded-lg mb-4 md:rounded-2xl md:mb-6 lg:border-2 lg:border-dashed">

            <!-- List item name -->
            <div class="relative py-2 text-center">
                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6">
                <h3 class="inline text-teal-dark font-bold px-2 bg-white list-item-name">{{ center.name }}</h3>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- List item image -->
                <div class="md:self-end md:w-2/5">
                    <img :src="previewImageUrl" alt="" class="block w-full h-48 md:rounded-bl-2xl md:rounded-tr-2xl" style="object-fit: cover; object-position: top">
                </div>

                <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            <strong>{{ center.reservoir.name }}. </strong>{{ center.location }}
                        </div>
                    </div>

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            8 777 279 40 33, 8 777 279 40 33
                        </div>
                    </div>

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            стоимость проживания от {{ chepestAccomodationPrice }} тг <span v-if="hasFood" class="text-red-light">возможно питание</span>
                        </div>
                    </div>

                    <div class="flex items-center border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-dotted md:border-teal-dark md:pl-3 md:items-start">
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="flex items-center w-3/4 md:relative">
                            <div class="flex-1">
                                2х и 4х местные домики
                            </div>

                            <div class="md:hidden">
                                <button class="text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</button>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block md:absolute md:pin-b md:pin-r">
                        <button class="text-base text-white font-bold bg-teal-dark rounded-tl-lg rounded-br-xl px-4 py-1">Подробнее</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- List item without image -->
        <div v-else class="bg-white mb-4 rounded-lg lg:border-2 lg:border-dashed">

            <!-- List item name -->
            <div class="relative py-2 text-center">
                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6">
                <h3 class="inline text-teal-dark font-bold px-2 bg-white">{{ center.name }}</h3>
            </div>

            <div class="pt-3 px-4 pb-1 md:flex">
                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="w-4/5 md:w-3/4">
                        <strong>{{ center.reservoir.name }}. </strong>{{ center.location }}
                    </div>
                </div>

                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="w-4/5 md:w-3/4">
                        {{ center.contacts }}
                    </div>
                </div>

                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="w-4/5 md:w-3/4">
                        стоимость проживания от  {{ chepestAccomodationPrice }} тг <span v-if="hasFood" class="text-red-light">возможно питание</span>
                    </div>
                </div>

                <div class="flex items-center border-teal-dark py-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="flex items-center w-full w-3/4">
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
                if (this.center.media.length === 0) return 'http://via.placeholder.com/350x150';

                let mainImage = this.center.media.find(item => item.collection === 'main-image');

                if (! mainImage) {
                    mainImage = this.center.media[0];
                }

                return 'http://otdyh-vko.kz' + mainImage.thumbnail_path.replace('http://localhost', '');
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
