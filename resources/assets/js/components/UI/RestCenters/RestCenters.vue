<template>
    <div class="px-2 lg:px-0">

        <!-- List item with image -->
        <div class="bg-white rounded-lg mb-3 md:rounded-2xl md:mb-6 lg:border-2 lg:border-dashed">

            <!-- List item name -->
            <div class="relative py-2 text-center">
                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6">
                <h3 class="inline text-teal-dark font-bold px-2 bg-white list-item-name">БО "NEW МОХНАТКА"</h3>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- List item image -->
                <div class="md:self-end md:w-2/5">
                    <img src="/images/photo.png" alt="" class="block w-full h-auto md:rounded-bl-2xl md:rounded-tr-2xl">
                </div>

                <div class="pt-3 px-4 pb-1 md:w-3/5 md:flex md:flex-wrap md:relative">
                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:border-r-2 md:pb-3 md:pr-1 md:items-start">
                        <div class="w-1/4">
                            <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-3/4">
                            Бухтарма. у подножия горы Мохнатка на территории б/о Мохнатка
                        </div>
                    </div>

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-2 md:pb-3 md:pl-3 md:items-start">
                        <div class="w-1/4">
                            <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-3/4">
                            8 777 279 40 33, 8 777 279 40 33
                        </div>
                    </div>

                    <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-r-2 md:pr-2 md:items-start">
                        <div class="w-1/4">
                            <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                        </div>

                        <div class="w-3/4">
                            стоимость проживания от  9 700 тг <span class="text-red-light">возможно питание</span>
                        </div>
                    </div>

                    <div class="flex items-center border-teal-dark py-2 md:w-1/2 md:border-b-0 md:border-dotted md:border-teal-dark md:pl-3 md:items-start">
                        <div class="w-1/4">
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
        <div class="bg-white rounded-lg lg:border-2 lg:border-dashed">

            <!-- List item name -->
            <div class="relative py-2 text-center">
                <hr class="absolute block pin-l ml-8 pin-t mt-4 text-teal-dark bg-teal-dark h-1 w-5/6">
                <h3 class="inline text-teal-dark font-bold px-2 bg-white">БО "УЛЬБА"</h3>
            </div>

            <div class="pt-3 px-4 pb-1 md:flex">
                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/location.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="w-3/4">
                        Бухтарма. у подножия горы Мохнатка на территории б/о Мохнатка
                    </div>
                </div>

                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/contacts.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="w-3/4">
                        8 777 279 40 33, 8 777 279 40 33
                    </div>
                </div>

                <div class="flex items-center border-b border-dotted border-teal-dark py-2 md:border-b-0 md:border-r-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/price.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="w-3/4">
                        стоимость проживания от  9 700 тг <span class="text-red-light">возможно питание</span>
                    </div>
                </div>

                <div class="flex items-center border-teal-dark py-2 md:w-1/4 md:pl-2 md:items-start">
                    <div class="mr-3 md:w-1/4 md:mr-1">
                        <img src="/images/icons/accomodation.png" alt="address" class="block w-8 h-8">
                    </div>

                    <div class="flex items-center w-full w-3/4">
                        <div class="flex-1">
                            2х и 4х местные домики
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
            restCenters: {
                type: Array,
                required: true
            }
        }
    }
</script>
