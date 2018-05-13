<template>
    <div>
        <div v-if="! showSearchDrowdown" class="flex space-between items-center py-3 px-4">
            <div @click="$parent.showMainMenu = true">
                <img src="/images/icons/menu.svg" alt="menu" class="block w-8 h-8">
            </div>

            <div class="flex-1 text-center text-2xl italic">Пляжный отдых</div>

            <div class="hidden p-1 border-2 border-white rounded bg-yellow-dark mr-2 md:block" @click="showSorting = !showSorting">
                <img src="/images/icons/sorting.png" alt="menu" class="block w-8 h-8">
            </div>

            <div class="p-2 border-2 border-white rounded bg-yellow-dark" @click="showSearchDrowdown = true">
                <img src="/images/icons/search.png" alt="menu" class="block w-6 h-6">
            </div>
        </div>

        <div v-else class="flex space-between items-center py-3 px-4">
            <div class="flex-1 h-10 border-2 border-white rounded-l-lg">
                <input type="text" class="w-full h-full px-2 main-search-input" placeholder="Введите название">
            </div>

            <div class="p-2 border border-white rounded-r-lg bg-yellow-dark">
                <img src="/images/icons/search.png" alt="menu" class="block w-6 h-6">
            </div>
        </div>

        <!-- Dropdown search filters menu for sm and md devices -->
        <portal to="sm-md-rest-centers-search-filters">
            <div v-if="showSearchDrowdown" class="absolute bg-yellow-dark w-full px-6 py-10 pb-4 sm:z-10 sm:flex sm:flex-wrap sm:py-6">
                <div class="flex space-between mb-3 sm:w-1/2 sm:pr-6 sm:items-end sm:mb-4">
                    <div class="w-1/2 mr-3">
                        <select name="" id="" class="w-full rounded-lg p-2">
                            <option value="">Водоем</option>
                            <option value="">Алаколь</option>
                            <option value="">Сибины</option>
                        </select>
                    </div>

                    <div class="w-1/2">
                        <select name="" id="" class="w-full rounded-lg p-2">
                            <option value="">1 человек</option>
                            <option value="">2 человека</option>
                            <option value="">3 человека</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4 sm:w-1/2 sm:flex sm:flex-col sm:justify-end">
                    <div class="text-2xl text-grey-darker text-center font-bold mb-3">
                        Цена за сутки
                    </div>

                    <div class="flex space-between">
                        <div class="w-1/2 mr-3 flex items-center">
                            <div class="text-lg text-white bg-teal-dark rounded-l-lg h-10 px-2 pt-2">
                                от
                            </div>

                            <div class="h-10">
                                <input type="text" class="rounded-r-lg w-full h-full px-2">
                            </div>
                        </div>

                        <div class="w-1/2 mr-3 flex items-center">
                            <div class="text-lg text-white bg-teal-dark rounded-l-lg h-10 px-2 pt-2">
                                до
                            </div>

                            <div class="h-10">
                                <input type="text" class="rounded-r-lg w-full h-full px-2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 sm:w-1/2 sm:pr-6 sm:mb-0">
                    <div class="text-2xl text-grey-darker text-center font-bold mb-3">
                        Тип размещения
                    </div>

                    <select name="" id="" class="w-full rounded-lg p-2">
                        <option value=""></option>
                        <option value="">Домик</option>
                        <option value="">Номер</option>
                    </select>
                </div>

                <div class="flex sm:w-1/2 sm:items-end">
                    <div class="flex items-center w-1/2 mr-4">
                        <div class="mr-3">
                            <label for="cheap-first" class="block h-8 w-8 rounded-lg bg-white"></label>
                            <input type="radio" name="sorting-price" id="cheap-first" value="cheap-first" class="hidden">
                        </div>
                        <div class="flex-1 text-xl text-grey-darker font-bold">Только с питанием</div>
                    </div>

                    <div class="flex justify-center w-1/2">
                        <button class="text-lg text-white font-bold tracking-wide bg-teal-dark px-4 rounded-lg w-full h-10">
                            Поиск
                        </button>
                    </div>
                </div>
            </div>
        </portal>

        <!-- Sorting for sm and md devices -->
        <portal to="sm-md-rest-centers-search-sorting">
            <div class="md:absolute md:pin-t md:pin-l md:bg-yellow-dark md:w-full md:z-50">
                <div class="flex space-between items-center px-4 md:hidden">
                    <div>
                        <img src="/images/icons/sorting.png" alt="sorting" class="block w-10 h-12">
                    </div>

                    <div class="flex-1 text-center text-2xl text-black font-bold">Сортировка</div>

                    <div @click="showSorting = !showSorting">
                        <img v-if="! showSorting" src="/images/icons/angle-down.svg" alt="expand sorting" class="block w-6 h-4">
                        <img v-else src="/images/icons/close.svg" alt="expand sorting" class="block w-6 h-4">
                    </div>
                </div>

                <!-- Sorting expanded -->
                <div v-if="showSorting" class="mt-3 px-8 md:flex md:items-start">
                    <div class="mb-6 md:flex md:flex-wrap md:space-between md:mb-0 md:w-3/4">
                        <div class="flex items-center mb-2 md:w-1/2 md:flex-order-1">
                            <div class="flex-1 text-2xl text-grey-darker font-bold">Сначала дешевые</div>
                            <div>
                                <label for="cheap-first" class="block h-10 w-10 rounded-lg bg-white"></label>
                                <input type="radio" name="sorting-price" id="cheap-first" value="cheap-first" class="hidden">
                            </div>
                        </div>

                        <div class="flex items-center mb-2 md:w-1/2 md:flex-order-3">
                            <div class="flex-1 text-2xl text-grey-darker font-bold">Сначала дорогие</div>
                            <div>
                                <label for="expensive-first" class="block h-10 w-10 rounded-lg bg-white"></label>
                                <input type="radio" name="sorting-price" id="expensive-first" value="expensive-first" class="hidden">
                            </div>
                        </div>

                        <div class="flex items-center mb-2 md:w-1/2 md:flex-order-2 md:justify-end">
                            <div class="flex-1 text-2xl text-grey-darker font-bold md:flex-initial mr-6">От А до Я</div>
                            <div>
                                <label for="a-z" class="block h-10 w-10 rounded-lg bg-white"></label>
                                <input type="radio" name="sorting-abc" id="a-z" value="a-z" class="hidden">
                            </div>
                        </div>

                        <div class="flex items-center md:w-1/2 md:flex-order-4 md:justify-end">
                            <div class="flex-1 text-2xl text-grey-darker font-bold md:flex-initial mr-6">От Я до А</div>
                            <div>
                                <label for="z-a" class="block h-10 w-10 rounded-lg bg-white"></label>
                                <input type="radio" name="sorting-abc" id="z-a" value="z-a" class="hidden">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center md:w-1/4 md:justify-end">
                        <button class="text-lg text-white font-bold tracking-wide bg-teal-dark py-2 px-4 rounded-lg md:text-xl">
                            Применить
                        </button>
                    </div>
                </div>
            </div>
        </portal>

        <!-- Search for lg and xl devices -->
        <portal to="lg-xl-rest-centers-search">
            <div class="hidden lg:block lg:mb-6">
                <div class="flex mb-4">
                    <div class="w-1/3 mr-3">
                        <input type="text" name="query" placeholder="Введите название" class="w-full rounded-lg px-3 py-2">
                    </div>

                    <div class="w-2/3 flex">
                        <div class="w-1/3 mr-3">
                            <select name="" class="w-full rounded-lg px-3 py-2">
                                <option value="">Водоем</option>
                            </select>
                        </div>

                        <div class="w-1/3 mr-3">
                            <select name="" class="w-full rounded-lg px-3 py-2">
                                <option value="">1 человек</option>
                            </select>
                        </div>

                        <button class="w-1/3 rounded-lg flex items-center">
                            <div class="text-lg text-white bg-teal-dark rounded-l-lg h-8">
                                <img src="/images/icons/sorting.png" alt="menu" class="block w-8 h-8">
                            </div>

                            <div class="h-8 bg-white rounded-r-lg text-grey flex-1 flex items-center justify-center">
                                От А до Я
                            </div>
                        </button>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-2/5 mr-2">
                        <div class="mb-4 flex flex-col justify-end">
                            <div class="text-xl text-grey-darker text-center font-bold mb-3">
                                Цена за сутки
                            </div>

                            <div class="flex space-between">
                                <div class="w-1/2 mr-3 flex items-center">
                                    <div class="text-lg text-white bg-teal-dark rounded-l-lg h-8 px-2 pt-1">
                                        от
                                    </div>

                                    <div class="h-8">
                                        <input type="text" class="rounded-r-lg w-full h-full px-2">
                                    </div>
                                </div>

                                <div class="w-1/2 mr-3 flex items-center">
                                    <div class="text-lg text-white bg-teal-dark rounded-l-lg h-8 px-2 pt-1">
                                        до
                                    </div>

                                    <div class="h-8">
                                        <input type="text" class="rounded-r-lg w-full h-full px-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-2/5 mr-2">
                        <div class="">
                            <div class="text-xl text-grey-darker text-center font-bold mb-3">
                                Тип размещения
                            </div>

                            <select name="" id="" class="w-full h-8 rounded-lg p-2">
                                <option value=""></option>
                                <option value="">Домик</option>
                                <option value="">Номер</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-1/5">
                        <div class="h-full flex items-center mt-2">
                            <div class="text-lg text-grey-darker text-right font-bold pl-6 mr-2">только с питанием</div>
                            <div>
                                <label for="cheap-first" class="block h-8 w-8 rounded-lg bg-white"></label>
                                <input type="radio" name="sorting-price" id="cheap-first" value="cheap-first" class="hidden">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </portal>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                showSearchDrowdown: false,
                showSorting: false
            };
        },

        mounted () {
            axios.get('/pljazhnyj-otdyh')
                .then(response => {
                    this.$emit('resultsupdated', response.data.models);
                })
                .catch(error => flash('Ошибка при выполнении.', 'danger'));
        }
    }
</script>
