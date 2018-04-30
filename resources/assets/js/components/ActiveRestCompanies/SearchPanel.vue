<template>
    <div>
        <div class="mb-6">
            <input type="text" v-model="query" placeholder="Поиск ..." class="w-full p-2 border border-grey rounded-sm">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                query: ''
            };
        },

        watch: {
            query() {
                axios.get(`/admin/active-rest-companies?query=${this.query}`)
                    .then(response => {
                        this.$parent.companies = response.data.companies;
                    })
                    .catch(() => flash('Ошибка :('));
            }
        }
    }
</script>
