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
            <div class="hidden lg:block lg:mb-10">
                <div class="flex mb-4">
                    <div class="w-3/4 mr-3">
                        <input type="text" v-model="search.query" placeholder="Введите название" class="w-full rounded-lg px-3 py-2">
                    </div>

                    <div class="w-1/4 flex">
                        <select v-model="search.city" class="w-full rounded-lg px-3 py-2">
                            <option value="">Город</option>
                            <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
                        </select>
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
