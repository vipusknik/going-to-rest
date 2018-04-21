<template>
    <div class="field flex items-center">
      <input id="is_paid" type="checkbox" v-model="is_paid" class="switch">
      <label for="is_paid" class="text-base text-grey-darkest font-bold pt-0">Платник</label>
    </div>
</template>

<style scoped>
    @import '/css/bulma.switch.min.css';
</style>

<script>
    export default {
        props: [ 'model' ],

        data() {
            return {
                is_paid: this.model.is_paid
            };
        },

        mounted() {
            this.$watch('is_paid', () => this.togglePaid());
        },

        methods: {
            togglePaid() {
                this.is_paid ? this.create() : this.destroy();
            },

            create() {
                axios.post('/admin/paid-companies', {
                    class: this.model.class,
                    id: this.model.id
                })
                .then(response => flash('Добавлено в список платников!'))
                .catch(error => flash('Ошибка при выполнении', 'danger'));
            },

            destroy() {
                axios.delete('/admin/paid-companies', {
                    params: {
                        class: this.model.class,
                        id: this.model.id
                    }
                })
                .then(response => flash('Удалено из списка платников!'))
                .catch(error => flash('Ошибка при выполнении', 'danger'));
            }
        }
    }
</script>
