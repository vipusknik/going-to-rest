<template>
    <div>
        <div v-if="! showSearchDropdown" class="flex space-between items-center py-3 px-4">
            <div @click="$parent.showMainMenu = true">
                <img src="/images/icons/menu.svg" alt="menu" class="block w-8 h-8">
            </div>

            <div class="flex-1 text-center text-2xl font-hortensia -mb-2">Рыбалка и охота</div>

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
        <portal to="sm-md-hunting-companies-search-filters">
            <div v-if="showSearchDropdown" class="absolute z-20 bg-yellow-dark w-full px-10 py-10 pb-4 sm:z-10 sm:flex sm:flex-wrap sm:py-6 lg:hidden">
                <div class="w-full md:flex md:mb-4">
                    <div class="w-full mb-4 md:mb-0 md:w-1/2 md:mr-3">
                        <select v-model="search.type" class="w-full rounded-lg p-2">
                            <option value="">Охота и рыбалка</option>
                            <option value="hunting">охота</option>
                            <option value="fishing">рыбалка</option>
                        </select>
                    </div>

                    <div class="w-full mb-4 md:mb-0 md:w-1/2">
                        <select v-model="search.region" class="w-full rounded-lg p-2">
                            <option value="">Район</option>
                            <option v-for="region in regions" :value="region.id">{{ region.name }}</option>
                        </select>
                    </div>
                </div>

                <div class="sm:w-full flex justify-end">
                    <button @click="showSearchDropdown = false" class="text-lg text-white font-bold tracking-wide bg-teal-dark px-4 rounded-lg w-1/2 h-8 md:w-1/4">
                        Поиск
                    </button>
                </div>
            </div>
        </portal>

        <!-- Search for lg and xl devices -->
        <portal to="lg-xl-hunting-companies-search">
            <div class="hidden lg:block lg:mb-8">
                <div class="mb-4 flex">
                    <div class="w-1/2 mr-4">
                        <input type="text" v-model="search.query" placeholder="Введите название" class="w-full h-10 rounded-lg px-3 py-2">
                    </div>

                    <div class="w-1/2 flex">
                        <div class="w-2/5 mr-3">
                            <select v-model="search.type" class="w-full h-10 rounded-lg px-3 py-2">
                                <option value="">Охота и рыбалка</option>
                                <option value="hunting">охота</option>
                                <option value="fishing">рыбалка</option>
                            </select>
                        </div>

                        <div class="w-3/5">
                            <select name="region" v-model="search.region" class="w-full h-10 rounded-lg px-3 py-2">
                                <option value="">Район</option>
                                <option v-for="region in regions" :value="region.id">{{ region.name }}</option>
                            </select>
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
            regions: {
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
                    region: '',
                    type: ''
                }
            };
        },

        mounted () {
            axios.get('/ohota-i-rybalka/search')
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
                axios.get('/ohota-i-rybalka/search', {
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
