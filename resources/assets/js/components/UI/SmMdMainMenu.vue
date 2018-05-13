<template>
    <div>
        <nav v-if="$parent.showMainMenu" class="fixed pin-t pin-l h-full w-64 bg-yellow-dark overflow-x-hidden z-50 sm:w-full sm:h-auto lg:hidden">
            <menu class="m-0 p-0">
                <div class="flex items-center justify-center bg-yellow-light w-full py-6 px-2 mb-4">
                    <div class="text-xl font-bold mr-2">
                        Выберите категорию
                    </div>

                    <div @click="$parent.showMainMenu = false">
                        <img src="/images/icons/close.svg" alt="" class="block w-3 h-3">
                    </div>
                </div>

                <div class="flex flex-col justify-around items-center sm:flex-row sm:px-4 sm:py-4">
                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="/pljazhnyj-otdyh" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="/images/icons/site-category-icons/beach-holidays.png"
                                     alt="Пляжный отдых"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Пляжный отдых</h2>
                            </div>
                        </a>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="#" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="/images/icons/site-category-icons/active-rest.png"
                                     alt="Активный отдых"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Активный отдых</h2>
                            </div>
                        </a>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="#" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="/images/icons/site-category-icons/children-holidays.png"
                                     alt="Детский отдых"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Детский <div class="hidden md:block"></div> отдых</h2>
                            </div>
                        </a>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <div class="flex items-center sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="/images/icons/site-category-icons/fishing-and-hunting.png"
                                     alt="Рыбалка и охота"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Рыбалка и охота</h2>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 py-2 px-2 w-52 border-2 border-dotted border-white rounded-lg shadow-lg cursor-pointer hover:bg-yellow-light hover:opacity-9 sm:w-32 sm:mr-3 sm:px-1 sm:py-4 sm:rounded-xl">
                        <a href="#" class="flex items-center no-underline sm:flex-col">
                            <div class="w-1/4 mr-4 sm:w-auto sm:mb-4 sm:mr-0">
                                <img src="/images/icons/site-category-icons/medical-tourism.png"
                                     alt="Медицинский туризм"
                                     class="block mx-auto w-10 h-10 rounded-full md:w-16 md:h-16">
                            </div>

                            <div class="text-center text-black font-thin break-words lowercase w-3/4 sm:w-24 md:w-auto">
                                <h2 class="text-lg font-normal">Медицинский туризм</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </menu>
        </nav>
    </div>
</template>

<script>
    export default {

    }
</script>
