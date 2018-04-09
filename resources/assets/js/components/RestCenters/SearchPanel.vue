<template>
    <div>
        <div class="mb-6">
            <input type="text" v-model="query" placeholder="Поиск ..." class="w-full p-2 border border-grey rounded-sm">
        </div>

        <!-- Reservoirs -->
        <div class="whitespace-no-wrap">
            <div class="flex mb-1 px-2">
                <h4 class="text-lg text-black font-semibold">Водоем</h4>
            </div>

            <div v-for="reservoir in reservoirs" class="px-2 py-1">
                <input type="checkbox" :id="reservoir.name" class="mr-1">
                <label :for="reservoir.name" v-text="reservoir.name" class="cursor-pointer"></label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'reservoirs' ],

        data() {
            return {
                query: ''
            };
        },

        watch: {
            query() {
                axios.get(`/admin/rest-centers?query=${this.query}`)
                    .then(response => {
                        this.$parent.restCenters = response.data.restCenters;
                    })
                    .catch(error => console.log(error));
            }
        }
    }
</script>
