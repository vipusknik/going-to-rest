<template>
     <div v-if="visible">
       <div class="text-lg text-blue-light">
         <span class="text-blue font-bold" v-text="`${accomodation.type_in_russian}: `"></span>
         <span v-text="accomodation.guest_count" class="font-bold"></span> человек,
         <span v-text="accomodation.price_per_day" class="font-bold"></span> тг за день.
       </div>

       <!-- buttons like delete -->
       <div class="absolute pin-t pin-r mt-4 mr-4">
          <div class="action-buttons mb-8">
            <div class="control is-grouped">
                <a @click.prevent="$emit('edit', accomodation)"
                   class="button is-small text-xs border-none bg-grey-lighter hover:bg-blue-light hover:text-white"
                   :title="`Отредактировать ${accomodation.type_in_russian}`">
                    <i class="fas fa-edit"></i>
                </a>

                <a @click.prevent="destroy(accomodation)"
                   class="button is-small text-xs border-none bg-grey-lighter hover:bg-red-light hover:text-white"
                   :title="`Удалить ${accomodation.type_in_russian}`">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
          </div>
       </div>

       <div v-if="accomodation.features.length">
            <div class="flex flex-wrap text-sm">
                <div v-for="feature in accomodation.features"
                     class="text-xs px-1 my-1 mr-2 bg-green-lighter border border-green rounded-sm">
                    {{ feature.name }} {{ feature.pivot.description }}
                </div>
            </div>
        </div>

       <div v-text="accomodation.description" class="text-sm"></div>
     </div>
</template>

<script>
    export default {
        props: [ 'accomodation' ],

        data() {
            return {
                visible: true
            };
        },

        methods: {
            destroy() {
                axios.delete(`/admin/rest-centers/${this.$parent.restCenter.slug}/accomodations/${this.accomodation.id}`)
                  .then(response => {
                      this.visible = false;
                      flash('Удалено');
                  })
                  .catch(error => flash('Ошибка при удалении'));
            }
        }
    }
</script>
