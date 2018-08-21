<template>
    <div>
        <!-- List item with image -->
        <div v-if="model.is_paid" class="relative mb-4 md:mb-6">
            <div class="flex flex-col md:mr-20 md:rounded-2xl md:border-2 md:border-white md:border-dashed lg:flex-row">
                <model-category v-if="showCategory"
                                title="активный отдых"
                                image="/images/icons/site-category-icons/active-rest.png">
                </model-category>

                <div class="flex-1 bg-white rounded-lg rounded-2xl" :class="{ 'rounded-t-none lg:rounded-tr-2xl lg:rounded-l-none': showCategory }">
                    <!-- List item name -->
                    <div class="flex justify-center p-3 mb-2">
                        <div class="w-full h-3 text-center border-b-3 border-teal-dark">
                            <a :href="'/ohota-i-rybalka/' + model.slug" target="_blank" class="inline text-xl text-teal-dark px-2 bg-white font-bold">
                                {{ model.name }}
                            </a>
                        </div>
                    </div>

                    <div class="relative flex flex-col md:flex-row">
                        <!-- List item image -->
                        <a :href="'/ohota-i-rybalka/' + model.slug" target="_blank" class="block md:self-end md:w-2/5">
                            <img :src="previewImageUrl" :alt="model.name" class="block w-full h-48 md:rounded-tr-2xl md:rounded-bl-2xl" :class="{ 'lg:rounded-bl-none': showCategory }" style="object-fit: cover; object-position: top">
                        </a>

                        <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                            <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="flex-1 break-words min-w-0">
                                    <template v-if="model.region">
                                        р-н. {{ model.region.name }},
                                    </template>
                                    <template v-if="model.place">
                                        {{ model.place }}
                                    </template>
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

                            <div v-if="animals.length" class="flex items-center border-teal-dark py-2 md:w-5/6 md:border-b-0 md:border-dotted md:border-teal-dark md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/bird.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="flex-1 break-words min-w-0 flex items-center md:relative">
                                    <div class="flex-1 mr-2 self-end">
                                        <span v-for="(animal, index) in animals">
                                            {{ animal.name }}<template v-if="index !== animals.length - 1">, </template>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div v-if="fishes.length" class="flex items-center border-teal-dark py-2 md:w-5/6 md:border-b-0 md:border-dotted md:border-teal-dark md:items-start">
                                <div class="w-8 h-8 flex-no-shrink mr-3">
                                    <img src="/images/icons/fish.png" alt="address" class="block w-8 h-8">
                                </div>

                                <div class="flex-1 break-words min-w-0 flex items-center md:relative">
                                    <div class="flex-1 mr-2 self-end">
                                        <span v-for="(fish, index) in fishes">
                                            {{ fish.name }}<template v-if="index !== fishes.length - 1">, </template>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="absolute pin-b pin-r mb-2 mr-2 md:hidden">
                                <a :href="`/ohota-i-rybalka/${model.slug}` + (showCategory ? '?search=1' : '')" target="_blank" class="block text-sm text-white font-bold bg-teal-dark rounded px-4 py-2">Подробнее</a>
                            </div>

                            <div class="hidden md:block md:absolute md:pin-b md:pin-r">
                                <a :href="`/ohota-i-rybalka/${model.slug}` + (showCategory ? '?search=1' : '')" target="_blank" class="block text-base text-white font-bold bg-teal-dark rounded-tl-lg rounded-br-2xl px-4 py-1">Подробнее</a>
                            </div>
                        </div>

                        <div class="absolute pin-r pin-t mt-8 flex flex-col">
                            <div class="mb-2 flex justify-end md:hidden" v-if="hasAnimalsAt('summer')" @click="selectedSeason = 'summer'" :class="{ 'md:hidden': selectedSeason == 'summer' }">
                                <div class="inline-block uppercase cursor-pointer text-yellow text-sm font-semibold rounded-l-lg bg-white p-2">
                                    <div class="flex items-center">
                                        <img src="/images/icons/summer.png" alt="" class="w-4 h-4">
                                        <span v-if="selectedSeason == 'summer'" class="ml-1">лето</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 flex justify-end md:hidden" v-if="hasAnimalsAt('spring')" @click="selectedSeason = 'spring'" :class="{ 'md:hidden': selectedSeason == 'spring' }">
                                <div class="inline-block uppercase cursor-pointer text-olive text-sm font-semibold rounded-l-lg bg-white p-2">
                                    <div class="flex items-center">
                                        <img src="/images/icons/spring.png" alt="" class="w-4 h-4">
                                        <span v-if="selectedSeason == 'spring'" class="ml-1">весна</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 flex justify-end md:hidden" v-if="hasAnimalsAt('autumn')" @click="selectedSeason = 'autumn'" :class="{ 'md:hidden': selectedSeason == 'autumn' }">
                                <div class="inline-block uppercase cursor-pointer text-red-autumn text-sm font-semibold rounded-l-lg bg-white p-2">
                                    <div class="flex items-center">
                                        <img src="/images/icons/autumn.png" alt="" class="w-4 h-4">
                                        <span v-if="selectedSeason == 'autumn'" class="ml-1">осень</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 flex justify-end md:hidden" v-if="hasAnimalsAt('winter')" @click="selectedSeason = 'winter'" :class="{ 'md:hidden': selectedSeason == 'winter' }">
                                <div class="inline-block uppercase cursor-pointer text-teal text-sm font-semibold rounded-l-lg bg-white p-2">
                                    <div class="flex items-center">
                                        <img src="/images/icons/winter.png" alt="" class="w-4 h-4">
                                        <span v-if="selectedSeason == 'winter'" class="ml-1">зима</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden md:absolute md:pin-r md:pin-t mt-8 md:flex md:flex-col md:mr-2 md:mt-10">
                <div class="mb-3 flex justify-start md:mb-2" v-if="hasAnimalsAt('summer')" @click="selectedSeason = 'summer'">
                    <div class="inline-block uppercase cursor-pointer text-yellow text-sm font-semibold rounded-r-lg bg-white p-2">
                        <div class="flex items-center">
                            <span v-if="selectedSeason == 'summer'" class="w-10 mr-1">лето</span>
                            <img src="/images/icons/summer.png" alt="" class="w-4 h-4">
                        </div>
                    </div>
                </div>

                <div class="mb-3 flex justify-start md:mb-2" v-if="hasAnimalsAt('spring')" @click="selectedSeason = 'spring'">
                    <div class="inline-block uppercase cursor-pointer text-olive text-sm font-semibold rounded-r-lg bg-white p-2">
                        <div class="flex items-center">
                            <span v-if="selectedSeason == 'spring'" class="w-10 mr-1">весна</span>
                            <img src="/images/icons/spring.png" alt="" class="w-4 h-4">
                        </div>
                    </div>
                </div>

                <div class="mb-3 flex justify-start md:mb-2" v-if="hasAnimalsAt('autumn')" @click="selectedSeason = 'autumn'">
                    <div class="inline-block uppercase cursor-pointer text-red-autumn text-sm font-semibold rounded-r-lg bg-white p-2">
                        <div class="flex items-center">
                            <span v-if="selectedSeason == 'autumn'" class="w-10 mr-1">осень</span>
                            <img src="/images/icons/autumn.png" alt="" class="w-4 h-4">
                        </div>
                    </div>
                </div>

                <div class="mb-3 flex justify-start md:mb-2" v-if="hasAnimalsAt('winter')" @click="selectedSeason = 'winter'">
                    <div class="inline-block uppercase cursor-pointer text-teal text-sm font-semibold rounded-r-lg bg-white p-2">
                        <div class="flex items-center">
                            <span v-if="selectedSeason == 'winter'" class="w-10 mr-1">зима</span>
                            <img src="/images/icons/winter.png" alt="" class="w-4 h-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- List item without image -->
        <div v-else class="relative mb-4">
            <div class="flex flex-col rounded-2xl md:mr-20 md:border-2 md:border-white md:border-dashed lg:flex-row">
                <model-category v-if="showCategory"
                                title="рыбалка и охота"
                                image="/images/icons/site-category-icons/fishing-and-hunting.png">
                </model-category>

                <div class="relative bg-white rounded-2xl flex-1" :class="{ 'rounded-t-none lg:rounded-tr-2xl lg:rounded-l-none': showCategory }">
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
                                <template v-if="model.region">
                                    р-н. {{ model.region.name }},
                                </template>
                                <template v-if="model.place">
                                    {{ model.place }}
                                </template>
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

                        <div v-if="animals.length" class="flex items-center border-dotted border-teal-dark py-2 md:w-1/2 md:pl-2 md:items-start">
                            <div class="w-8 h-8 flex-no-shrink mr-3">
                                <img src="/images/icons/bird.png" alt="address" class="block w-8 h-8">
                            </div>

                            <div class="flex-1 break-words min-w-0">
                                <span v-for="(animal, index) in animals">
                                    {{ animal.name }}<template v-if="index !== animals.length - 1">, </template>
                                </span>
                            </div>
                        </div>

                        <div v-if="fishes.length" class="flex items-center border-dotted border-teal-dark py-2 md:w-1/2 md:pl-2 md:items-start">
                            <div class="w-8 h-8 flex-no-shrink mr-3">
                                <img src="/images/icons/fish.png" alt="address" class="block w-8 h-8">
                            </div>

                            <div class="flex-1 break-words min-w-0">
                                <span v-for="(fish, index) in fishes">
                                    {{ fish.name }}<template v-if="index !== fishes.length - 1">, </template>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="absolute pin-r pin-center mt-2 flex flex-col md:mr-1">
                        <div class="mb-2 flex justify-end md:mb-1" v-if="hasAnimalsAt('summer')" @click="selectedSeason = 'summer'" :class="{ 'md:hidden': selectedSeason == 'summer' }">
                            <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-yellow rounded-l-lg p-2 md:bg-white md:text-yellow">
                                <div class="flex items-center">
                                    <img src="/images/icons/summer-white.png" alt="" class="w-4 h-4 md:hidden">
                                    <img src="/images/icons/summer.png" alt="" class="hidden w-4 h-4 md:block">

                                    <span v-if="selectedSeason == 'summer'" class="ml-1">лето</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 flex justify-end md:mb-1" v-if="hasAnimalsAt('spring')" @click="selectedSeason = 'spring'" :class="{ 'md:hidden': selectedSeason == 'spring' }">
                            <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-olive rounded-l-lg p-2 md:text-olive md:bg-white">
                                <div class="flex items-center">
                                    <img src="/images/icons/spring-white.png" alt="" class="w-4 h-4 md:hidden">
                                    <img src="/images/icons/spring.png" alt="" class="hidden w-4 h-4 md:block">
                                    <span v-if="selectedSeason == 'spring'" class="ml-1">весна</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 flex justify-end md:mb-1" v-if="hasAnimalsAt('autumn')" @click="selectedSeason = 'autumn'" :class="{ 'md:hidden': selectedSeason == 'autumn' }">
                            <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-red-autumn rounded-l-lg p-2 md:bg-white md:text-red-autumn">
                                <div class="flex items-center">
                                    <img src="/images/icons/autumn-white.png" alt="" class="w-4 h-4 md:hidden">
                                    <img src="/images/icons/autumn.png" alt="" class="hidden w-4 h-4 md:block">
                                    <span v-if="selectedSeason == 'autumn'" class="ml-1">осень</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 flex justify-end md:mb-1" v-if="hasAnimalsAt('winter')" @click="selectedSeason = 'winter'" :class="{ 'md:hidden': selectedSeason == 'winter' }">
                            <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-teal rounded-l-lg p-2 md:bg-white md:text-teal">
                                <div class="flex items-center">
                                    <img src="/images/icons/winter-white.png" alt="" class="w-4 h-4 md:hidden">
                                    <img src="/images/icons/winter.png" alt="" class="hidden w-4 h-4 md:block">
                                    <span v-if="selectedSeason == 'winter'" class="ml-1">зима</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden md:block md:absolute pin-center md:pin-r md:mt-10 md:flex md:flex-col md:mr-4 md:mt-6">
                <div class="mb-2 flex justify-end" v-if="selectedSeason == 'summer'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-yellow rounded-r-lg md:bg-white md:text-yellow">
                        <div class="flex items-center p-2">
                            <span class="mr-1">лето</span>
                            <img src="/images/icons/summer.png" alt="" class="w-4 h-4">
                        </div>
                    </div>
                </div>

                <div class="mb-2 flex justify-end" v-if="selectedSeason == 'spring'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-olive rounded-r-lg md:bg-white md:text-olive">
                        <div class="flex items-center p-2 pl-0">
                            <span class="mr-1">весна</span>
                            <img src="/images/icons/spring.png" alt="" class="w-4 h-4">
                        </div>
                    </div>
                </div>

                <div class="mb-2 flex justify-end" v-if="selectedSeason == 'autumn'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-red-autumn rounded-r-lg md:bg-white md:text-red-autumn">
                        <div class="flex items-center p-2 pl-0">
                            <span class="mr-1">осень</span>
                            <img src="/images/icons/autumn.png" alt="" class="w-4 h-4">
                        </div>
                    </div>
                </div>

                <div class="mb-2 flex justify-end" v-if="selectedSeason == 'winter'">
                    <div class="inline-block uppercase cursor-pointer text-white text-sm font-semibold bg-teal rounded-r-lg md:bg-white md:text-teal">
                        <div class="flex items-center p-2">
                            <span class="mr-1">зима</span>
                            <img src="/images/icons/winter.png" alt="" class="w-4 h-4">
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

        data() {
            return {
                selectedSeason: null
            };
        },

        created() {
            if (this.hasAnimalsAt('summer')) return this.selectedSeason = 'summer';
            if (this.hasAnimalsAt('spring')) return this.selectedSeason = 'spring';
            if (this.hasAnimalsAt('autumn')) return this.selectedSeason = 'autumn';
            if (this.hasAnimalsAt('winter')) return this.selectedSeason = 'winter';
        },

        computed: {
            previewImageUrl () {
                if (this.model.media.length === 0) return '/images/defaults/beach.jpg';

                let mainImage = this.model.media.find(item => item.collection_name === 'main-image');

                if (! mainImage) {
                    mainImage = this.model.media[0];
                }

                return mainImage.thumbnail_path;
            },

            animals() {
                return this.model.animals
                    .filter(item => item[this.selectedSeason] == 1)
                    .filter(item => item.type !== 'fish')
            },

            fishes() {
                return this.model.animals
                    .filter(item => item[this.selectedSeason] == 1)
                    .filter(item => item.type === 'fish')
            }
        },

        methods: {
            hasAnimalsAt(season) {
                return this.model.animals.some(item => item[season] == 1);
            }
        }
    }
</script>
