<template>
    <div>
        <div v-if="! showSearchDropdown" class="flex space-between items-center py-3 px-4">
            <div @click="$parent.showMainMenu = true">
                <img src="/images/icons/menu.svg" alt="menu" class="block w-8 h-8">
            </div>

            <div class="flex-1 text-center text-2xl font-hortensia -mb-2">Детский отдых</div>

            <div class="p-2 border-2 border-white rounded bg-yellow-dark" @click="showSearchDropdown = true">
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
        <portal to="sm-md-kid-camps-search-filters">
            <div v-if="showSearchDropdown" class="absolute bg-yellow-dark w-full px-6 py-10 pb-4 sm:z-10 sm:flex sm:py-6 lg:hidden">
                <div class="w-full mb-4 md:w-5/6 md:mr-3 md:h-10">
                    <select v-model="search.city" class="w-full h-full rounded-lg p-2">
                        <option value="">Город</option>
                        <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
                    </select>
                </div>

                <div class="sm:w-full flex justify-end md:w-1/6 md:h-10">
                    <button @click="showSearchDropdown = false" class="text-lg text-white font-bold tracking-wide bg-teal-dark px-4 rounded-lg w-1/2 h-8 md:w-full md:h-full">
                        Поиск
                    </button>
                </div>
            </div>
        </portal>

        <!-- Search for lg and xl devices -->
        <portal to="lg-xl-kid-camps-search">
            <div class="hidden lg:block lg:mb-6">
                <div class="flex mb-4">
                    <div class="w-1/3 mr-3">
                        <input type="text" v-model="search.query" placeholder="Введите название" class="w-full rounded-lg px-3 py-2">
                    </div>

                    <div class="w-2/3 flex">
                        <!-- <div class="w-1/3 mr-3">
                            <select v-model="search.reservoir" class="w-full rounded-lg px-3 py-2">
                                <option value="">Водоем</option>
                                <option v-for="reservoir in reservoirs" :value="reservoir.id">{{ reservoir.name }}</option>
                            </select>
                        </div> -->

                       <!--  <div class="w-1/3 mr-3">
                            <select name="guestCount" v-model="search.guest_count" class="w-full rounded-lg px-3 py-2">
                                <option value="">Вмещаемость</option>
                                <option v-for="n in 30" :value="n">{{ n }} человек</option>
                            </select>
                        </div> -->

                        <div class="w-1/3 rounded-lg flex items-center cursor-pointer">
                            <div class="hidden h-full text-lg text-white bg-teal-dark rounded-l-lg xl:block">
                                <img src="/images/icons/sorting-white.png" alt="menu" class="block w-8 p-1 h-full">
                            </div>

                            <div class="flex-1 h-full text-grey">
                                <select v-model="search.sort_by" name="guestCount" class="w-full px-1 py-2 rounded-lg xl:rounded-none xl:rounded-r-lg">
                                    <option value="">Сортировка</option>
                                    <option value="a-z">От А до Я</option>
                                    <option value="z-a">От Я до А</option>
                                    <option value="price_asc">Сначала дешевые</option>
                                    <option value="price_desc">Сначала дорогие</option>
                                </select>
                            </div>
                        </div>
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

                    <div class="w-2/5 mr-2">
                        <div class="">
                            <div class="text-xl text-grey-darker text-center font-bold mb-3">
                                Тип размещения
                            </div>

                            <select v-model="search.accomodation_type" class="w-full h-8 rounded-lg p-2">
                                <option value="">Любой</option>
                                <option value="room">Гостинница / Номер</option>
                                <option value="house">Коттедж / Домик</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-1/5">
                        <div class="h-full flex items-center mt-2">
                            <label for="has-food-checkbox-2" class="block text-lg text-grey-darker text-right font-bold pl-6 mr-2 cursor-pointer">
                                только с питанием
                            </label>

                            <div class="styled-checkbox">
                                <input type="checkbox" v-model="search.has_food" id="has-food-checkbox-2" class="hidden">
                                <label for="has-food-checkbox-2" class="flex items-center justify-center h-8 w-8 rounded-lg bg-white cursor-pointer">
                                    <i class="hidden fas fa-check text-black"></i>
                                </label>
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
        props: {
            cities: {
                type: Array,
                required: true
            }
        },

        data () {
            return {
                showSearchDropdown: false,
                showSorting: false,
                search: {
                    query: '',
                    city: ''
                }
            };
        },

        mounted () {
            axios.get('/detskij-otdyh')
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
                axios.get('/detskij-otdyh', {
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
