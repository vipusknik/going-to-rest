<template>
    <div>
        <div v-if="! showSearchDropdown" class="flex space-between items-center py-3 px-4">
            <div @click="$parent.showMainMenu = true">
                <img src="/images/icons/menu.svg" alt="menu" class="block w-8 h-8">
            </div>

            <div class="flex-1 text-center text-2xl font-hortensia -mb-2">Пляжный отдых</div>

           <!--  <div class="hidden p-1 border-2 border-white rounded bg-yellow-dark mr-2 md:block" @click="showSorting = !showSorting">
                <img src="/images/icons/sorting-black.png" alt="menu" class="block w-8 h-8">
            </div> -->

            <div :class="{ 'invisible': !showDropdownButton }" class="p-2 border-2 border-white rounded bg-yellow-dark" @click="showSearchDropdown = true">
                <img src="/images/icons/search.png" alt="menu" class="block w-6 h-6">
            </div>
        </div>

        <div v-else class="flex space-between items-center py-3 px-4">
            <div class="flex-1 h-10 border-2 border-white rounded-l-lg">
                <input type="text" v-model="search.query" class="w-full h-full px-2 main-search-input" placeholder="Введите название">
            </div>

            <div class="p-2 border border-white rounded-r-lg bg-yellow-dark" @click="showSearchDropdown = false">
                <img src="/images/icons/search.png" alt="menu" class="block w-6 h-6">
            </div>
        </div>

        <!-- Dropdown search search menu for sm and md devices -->
        <portal to="sm-md-rest-centers-search-filters">
            <div v-if="showSearchDropdown" class="absolute bg-yellow-dark w-full px-6 py-10 pb-4 z-10 sm:z-10 sm:flex sm:flex-wrap sm:py-6 lg:hidden">
                <div class="flex space-between mb-3 sm:w-1/2 sm:pr-6 sm:items-end sm:mb-4">
                    <div class="w-full">
                        <select v-model="search.reservoir" class="w-full rounded-lg p-2 styled-select">
                            <option value="">Водоем</option>
                            <option v-for="reservoir in reservoirs" :value="reservoir.id">{{ reservoir.name }}</option>
                        </select>
                    </div>

                    <!-- <div class="w-1/2">
                        <select v-model="search.guest_count" class="w-full rounded-lg p-2">
                            <option value="">Вмещаемость</option>
                            <option v-for="n in 30" :value="n">{{ n }} человек</option>
                        </select>
                    </div> -->
                </div>

                <!-- <div class="mb-4 sm:w-1/2 sm:flex sm:flex-col sm:justify-end">
                    <div class="text-2xl text-grey-darker text-center font-bold mb-3">
                        Цена за сутки
                    </div>

                    <div class="flex space-between">
                        <div class="w-1/2 mr-3 flex items-center">
                            <div class="text-lg text-white bg-teal-dark rounded-l-lg h-10 px-2 pt-2">
                                от
                            </div>

                            <div class="h-10">
                                <input type="text" v-model="search.price_from" class="rounded-r-lg w-full h-full px-2">
                            </div>
                        </div>

                        <div class="w-1/2 mr-3 flex items-center">
                            <div class="text-lg text-white bg-teal-dark rounded-l-lg h-10 px-2 pt-2">
                                до
                            </div>

                            <div class="h-10">
                                <input type="text" v-model="search.price_to" class="rounded-r-lg w-full h-full px-2">
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="mb-4 sm:w-1/2 sm:mb-0">
                    <!-- <div class="text-2xl text-grey-darker text-center font-bold mb-3">
                        Тип размещения
                    </div> -->

                    <select v-model="search.accomodation_type" class="w-full rounded-lg p-2 styled-select">
                        <option value="">Тип размещения</option>
                        <option value="room">Гостинница / Номер</option>
                        <option value="house">Коттедж / Домик</option>
                    </select>
                </div>

                <div class="flex sm:w-1/2 sm:items-end md:w-2/3 md:justify-between">
                    <div class="flex items-center w-1/2 mr-4 md:w-1/3">
                        <div class="mr-3 styled-checkbox">
                            <input type="checkbox" v-model="search.has_food" id="has-food-checkbox" class="hidden">
                            <label for="has-food-checkbox" class="flex items-center justify-center h-8 w-8 rounded-lg bg-white">
                                <i class="fas fa-check text-black hidden"></i>
                            </label>
                        </div>
                        <label class="block flex-1 text-xl text-grey-darker font-bold" for="has-food-checkbox">Только с питанием</label>
                    </div>

                    <div class="flex justify-center w-1/2">
                        <button @click="showSearchDropdown = false" class="text-lg text-white font-bold tracking-wide bg-teal-dark px-4 rounded-lg w-full h-10">
                            Поиск
                        </button>
                    </div>
                </div>
            </div>
        </portal>

        <!-- Sorting for sm and md devices -->
        <!-- <portal to="sm-md-rest-centers-search-sorting">
            <div class="md:absolute md:pin-t md:pin-l md:bg-yellow-dark md:w-full md:z-50 lg:hidden">
                <div class="flex space-between items-center px-4 md:hidden">
                    <div>
                        <img src="/images/icons/sorting-black.png" alt="sorting" class="block w-10 h-12">
                    </div>

                    <div class="flex-1 text-center text-2xl text-black font-bold">Сортировка</div>

                    <div @click="showSorting = !showSorting">
                        <img v-if="! showSorting" src="/images/icons/angle-down.svg" alt="expand sorting" class="block w-6 h-4">
                        <img v-else src="/images/icons/close.svg" alt="expand sorting" class="block w-6 h-4">
                    </div>
                </div>

                <div v-if="showSorting" class="mt-3 px-8 md:flex md:items-start">
                    <div class="mb-6 md:flex md:flex-wrap md:space-between md:mb-0 md:w-3/4">
                        <div class="flex items-center mb-2 md:w-1/2 md:flex-order-1">
                            <label for="price_asc" class="flex-1 text-2xl text-grey-darker font-bold">
                                Сначала дешевые
                            </label>

                            <div class="styled-radio-button">
                                <input type="radio" v-model="search.sort_by" id="price_asc" value="price_asc" name="sorting" class="hidden">
                                <label for="price_asc" class="flex items-center justify-center h-10 w-10 rounded-lg bg-white">
                                    <i class="hidden fas fa-circle text-grey-darkest"></i>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center mb-2 md:w-1/2 md:flex-order-3">
                            <label for="price_desc" class="flex-1 text-2xl text-grey-darker font-bold">Сначала дорогие</label>
                            <div class="styled-radio-button">
                                <input type="radio" v-model="search.sort_by" id="price_desc" value="price_desc" name="sorting" class="hidden">
                                <label for="price_desc" class="flex items-center justify-center h-10 w-10 rounded-lg bg-white">
                                    <i class="hidden fas fa-circle text-grey-darkest"></i>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center mb-2 md:w-1/2 md:flex-order-2 md:justify-end">
                            <label for="a-z" class="flex-1 text-2xl text-grey-darker font-bold md:flex-initial mr-6">От А до Я</label>
                            <div class="styled-radio-button">
                                <input type="radio" v-model="search.sort_by" id="a-z" name="sorting" value="a-z" class="hidden">
                                <label for="a-z" class="flex items-center justify-center h-10 w-10 rounded-lg bg-white">
                                    <i class="hidden fas fa-circle text-grey-darkest"></i>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center md:w-1/2 md:flex-order-4 md:justify-end">
                            <label for="z-a" class="flex-1 text-2xl text-grey-darker font-bold md:flex-initial mr-6">От Я до А</label>
                            <div class="styled-radio-button">
                                <input type="radio" v-model="search.sort_by" id="z-a" name="sorting" value="z-a" class="hidden">
                                <label for="z-a" class="flex items-center justify-center h-10 w-10 rounded-lg bg-white">
                                    <i class="hidden fas fa-circle text-grey-darkest"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center md:w-1/4 md:justify-end" @click="showSorting = false">
                        <button class="text-lg text-white font-bold tracking-wide bg-teal-dark py-2 px-4 rounded-lg md:text-xl">
                            Применить
                        </button>
                    </div>
                </div>
            </div>
        </portal> -->

        <!-- Search for lg and xl devices -->
        <portal to="lg-xl-rest-centers-search">
            <div class="hidden lg:block lg:mb-6">
                <div class="flex mb-4">
                    <div class="w-2/5 mr-3">
                        <input type="text" v-model="search.query" placeholder="Введите название" class="w-full h-10 rounded-lg px-3 py-2">
                    </div>

                    <div class="flex w-3/5">
                        <div class="w-1/2 mr-3 relative">
                            <select v-model="search.reservoir" class="w-full h-10 rounded-lg px-3 py-2 styled-select">
                                <option value="">Водоем</option>
                                <option v-for="reservoir in reservoirs" :value="reservoir.id">{{ reservoir.name }}</option>
                            </select>
                        </div>

                        <div class="w-1/2">
                            <div class="">
                                <select v-model="search.accomodation_type" class="w-full h-10 rounded-lg p-2 styled-select">
                                    <option value="">Тип размещения</option>
                                    <option value="room">Гостинница / Номер</option>
                                    <option value="house">Коттедж / Домик</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="flex">
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
                                        <input type="text" v-model="search.price_from" class="rounded-r-lg w-full h-full px-2">
                                    </div>
                                </div>

                                <div class="w-1/2 mr-3 flex items-center">
                                    <div class="text-lg text-white bg-teal-dark rounded-l-lg h-8 px-2 pt-1">
                                        до
                                    </div>

                                    <div class="h-8">
                                        <input type="text" v-model="search.price_to" class="rounded-r-lg w-full h-full px-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </portal>
    </div>
</template>

<script>
    export default {
        props: {
            reservoirs: {
                type: Array,
                required: true
            },

            showDropdownButton: {
                type: Boolean,
                required: false,
                default: true
            }
        },

        data () {
            return {
                showSearchDropdown: false,
                showSorting: false,
                search: {
                    query: '',
                    reservoir: '',
                    guest_count: '',
                    price_from: '',
                    price_to: '',
                    accomodation_type: '',
                    has_food: null,
                    sort_by: ''
                }
            };
        },

        mounted () {
            axios.get('/pljazhnyj-otdyh/search')
                .then(response => {
                    this.$emit('resultsupdated', response.data.models);
                })
                .catch(error => flash('Ошибка при выполнении.', 'danger'));
        },

        watch: {
            search: {
                deep: true,
                handler () {
                    this.fetch();
                }
            }
        },

        methods: {
            fetch () {
                axios.get('/pljazhnyj-otdyh/search', {
                        params: this.search
                    })
                    .then(response => {
                        this.$emit('resultsupdated', response.data.models);
                    })
                    .catch(error => flash('Ошибка при выполнении.', 'danger'));
            }
        }
    }
</script>
