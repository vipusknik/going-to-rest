<template>
    <div class="relative">
      <div v-if="! editing">
        <div v-if="accomodation" v-html="accomodation" class="text-sm mb-2"></div>
        <div v-else v-text="'Общее описание не добавлено'"></div>
      </div>

      <div v-else>
          <wysiwig :name="accomodation" v-model="accomodation" :min-height="100" class="mb-2"></wysiwig>
          <div class="flex">
              <button type="button"
                      @click="update"
                      class="text-sm text-white mr-2 px-2 py-1 bg-teal rounded-sm hover:bg-teal">
                    Сохранить
              </button>

              <button class="text-sm text-black px-2 py-1 hover:underline"
                      @click="editing = false">
                  Отмена
              </button>
          </div>
      </div>

      <div class='absolute pin-t pin-r mr-2'>
        <a v-if="!editing"
           @click.prevent="editing = true"
           class="button is-small text-xs border-none bg-white hover:bg-blue-light hover:text-white"
           title="Отредактировать общее описание">
            <i class="fas fa-pencil-alt"></i>
        </a>
      </div>
    </div>
</template>

<script>
    import Wysiwig from '../../Wysiwig.vue';

    export default {
        components: { Wysiwig },

        props: [ 'restCenter' ],

        data() {
            return {
                accomodation: this.restCenter.accomodation,
                editing: false
            };
        },

        methods: {
            update() {
                axios.patch(`/admin/rest-centers/${this.restCenter.slug}/accomodation-description/update`, {
                        accomodation: this.accomodation
                    })
                    .then(response => {
                        this.editing = false;
                        flash('Изменения сохранены');
                    })
                    .catch(error => {
                        this.editing = false;
                        flash('Ошибка при обновлении');
                    });
            }
        }
    }
</script>
