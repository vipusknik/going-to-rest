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
                <div class="relative md:self-end md:w-2/5">
                    <img :src="previewImageUrl" alt="" class="block w-full h-48 md:rounded-bl-2xl md:rounded-tr-2xl" style="object-fit: cover; object-position: top">

                    <!-- <div class="absolute pin-r pin-t mt-12 flex flex-col">
                        <div class="uppercase cursor-pointer text-yellow text-sm font-bold bg-white rounded-l-lg bg-white p-2 w-16 mb-3"
                             v-if="hasActivitiesAt('summer')"
                             @click="selectedSeason = 'summer'">
                            <img src="" alt="" class="w-8 h-8">
                            <span v-if="selectedSeason == 'summer'">лето</span>
                        </div>

                        <div class="uppercase cursor-pointer text-olive text-sm font-bold bg-white rounded-l-lg bg-white p-2 w-16 mb-3"
                             v-if="hasActivitiesAt('spring')"
                             @click="selectedSeason = 'spring'">
                            <img src="" alt="" class="w-8 h-8">
                            <span v-if="selectedSeason == 'spring'">весна</span>
                        </div>

                        <div class="uppercase cursor-pointer text-red-autumn text-sm font-bold bg-white rounded-l-lg bg-white p-2 w-16 mb-3"
                             v-if="hasActivitiesAt('autumn')"
                             @click="selectedSeason = 'autumn'">
                             <img src="" alt="" class="w-8 h-8">
                            <span v-if="selectedSeason == 'autumn'">осень</span>
                        </div>

                        <div class="uppercase cursor-pointer text-teal-winter text-sm font-bold bg-white rounded-l-lg bg-white p-2 w-16"
                             v-if="hasActivitiesAt('winter')"
                             @click="selectedSeason = 'winter'">
                             <img src="" alt="" class="w-8 h-8">
                            <span v-if="selectedSeason == 'winter'">зима</span>
                        </div>
                    </div> -->

                    <div class="absolute pin-r pin-t mt-12 flex flex-col">
                        <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('summer')" @click="selectedSeason = 'summer'">
                            <div class="inline-block uppercase cursor-pointer text-yellow text-sm font-semibold rounded-l-lg bg-white p-2">
                                <img src="" alt="" class="w-4 h-4">
                                <span v-if="selectedSeason == 'summer'">лето</span>
                            </div>
                        </div>

                        <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('spring')" @click="selectedSeason = 'spring'">
                            <div class="inline-block uppercase cursor-pointer text-olive text-sm font-semibold rounded-l-lg bg-white p-2">
                                <img src="" alt="" class="w-4 h-4">
                                <span v-if="selectedSeason == 'spring'">весна</span>
                            </div>
                        </div>

                        <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('autumn')" @click="selectedSeason = 'autumn'">
                            <div class="inline-block uppercase cursor-pointer text-red-autumn text-sm font-semibold rounded-l-lg bg-white p-2">
                                <img src="" alt="" class="w-4 h-4">
                                <span v-if="selectedSeason == 'autumn'">осень</span>
                            </div>
                        </div>

                        <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('winter')" @click="selectedSeason = 'winter'">
                            <div class="inline-block uppercase cursor-pointer text-teal-winter text-sm font-semibold rounded-l-lg bg-white p-2">
                                <img src="" alt="" class="w-4 h-4">
                                <span v-if="selectedSeason == 'winter'">зима</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            {{ model.location }}
                        </div>
                    </div>

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            {{ model.contacts }}
                        </div>
                    </div>

                    <div class="flex items-center border-teal-dark py-2 md:w-5/6 md:border-b-0 md:border-dotted md:border-teal-dark md:pl-3 md:items-start">
                        <div class="mr-3 md:w-1/8 md:mr-1">
                            <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="flex items-center md:w-3/4 md:relative">
                            <div class="flex-1 mr-2 self-end">
                                <span v-for="(activity, index) in activities">
                                    {{ activity.name }}
                                    <template v-if="index !== activities.length - 1">, </template>
                                </span>
                            </div>

                            <div class="self-end md:hidden">
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
        <div v-else class="relative mb-4">
            <div class="bg-white rounded-lg md:mr-20 lg:border-2 lg:border-dashed">
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
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            {{ model.location }}
                        </div>
                    </div>

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                        <div class="mr-3 md:w-1/4 md:mr-1">
                            <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            {{ model.contacts }}
                        </div>
                    </div>

                    <div class="flex items-center border-dotted border-teal-dark py-2 md:w-1/2 md:pl-2 md:items-start">
                        <div class="mr-3 md:w-1/8 md:mr-1">
                            <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-4/5 md:w-3/4">
                            <span v-for="(activity, index) in activities">
                                {{ activity.name }}
                                <template v-if="index !== activities.length - 1">, </template>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute pin-r pin-t mt-12 flex flex-col">
                <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('summer')" @click="selectedSeason = 'summer'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-yellow rounded-l-lg bg-white p-2">
                        <img src="" alt="" class="w-4 h-4">
                        <span v-if="selectedSeason == 'summer'">лето</span>
                    </div>
                </div>

                <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('spring')" @click="selectedSeason = 'spring'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-olive rounded-l-lg bg-white p-2">
                        <img src="" alt="" class="w-4 h-4">
                        <span v-if="selectedSeason == 'spring'">весна</span>
                    </div>
                </div>

                <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('autumn')" @click="selectedSeason = 'autumn'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-red-autumn rounded-l-lg bg-white p-2">
                        <img src="" alt="" class="w-4 h-4">
                        <span v-if="selectedSeason == 'autumn'">осень</span>
                    </div>
                </div>

                <div class="mb-3 flex justify-end" v-if="hasActivitiesAt('winter')" @click="selectedSeason = 'winter'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-teal-winter rounded-l-lg bg-white p-2">
                        <img src="" alt="" class="w-4 h-4">
                        <span v-if="selectedSeason == 'winter'">зима</span>
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

        data() {
            return {
                selectedSeason: 'summer'
            };
        },

        computed: {
            previewImageUrl () {
                if (this.model.media.length === 0) return 'http://via.placeholder.com/350x150';

                let mainImage = this.model.media.find(item => item.collection === 'main-image');

                if (! mainImage) {
                    mainImage = this.model.media[0];
                }

                return 'http://otdyh-vko.kz' + mainImage.thumbnail_path.replace('http://localhost', '');
            },

            activities() {
                return this.model.activities.filter(item => item[this.selectedSeason] == 1)
            }
        },

        methods: {
            hasActivitiesAt(season) {
                return this.model.activities.some(item => item[season] == 1);
            }
        }
    }
</script>
