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
                axios.get(`/admin/kid-camps?query=${this.query}`)
                    .then(response => {
                        this.$parent.kidCamps = response.data.kidCamps;
                    })
                    .catch(() => flash('Ошибка :('));
            }
        }
    }
</script>
