<template>
   <div class="bg-white p-6">
       <div class="mb-6 pb-4">
           <h3 class="text-lg text-grey-darker mb-4 font-bold">{{ restCenter.name }}: размещения</h3>

           <!-- accomodations description -->
           <accomodation-description :rest-center="restCenter"></accomodation-description>
       </div>

       <!-- accomodations -->
       <div class="text-black">
         <accomodation v-for="accomodation in restCenter.accomodations"
                       :key="accomodation.id"
                       :accomodation="accomodation"
                       class="relative mb-4 p-4 border border-grey-light"
                       @edit="edit(accomodation)">
         </accomodation>
       </div>

        <!-- accomodation form -->
       <div class="p-4">
           <h3 v-text="editing ? 'Редактирование' : 'Новое размещение'"
               class="text-lg text-orange-light font-bold underline mb-6">
           </h3>

           <form :action="form.action" method="post" id="form" @keydown.enter.prevent="">
               <input type="hidden" name="_method" :value="form.method">
               <input type="hidden" name="_token" :value="csrf">
               <div class="flex mb-6">
                   <div class="w-1/3 mr-8">
                       <div class="flex mb-3">
                           <label for="type" class="w-2/5">Тип: </label>
                           <select v-model="type"
                                   name="type"
                                   id="type"
                                   class="w-3/5 p-0 px-2 border border-blue-lighter rounded"
                                   required="true">
                               <option value="room">Номер</option>
                               <option value="house">Домик</option>
                           </select>
                       </div>

                       <div class="flex mb-3">
                           <label for="guest_count" class="w-2/5">Кол-во гостей:</label>
                           <input type="number"
                                  name="guest_count"
                                  v-model="guest_count"
                                  min="1"
                                  id="guest_count"
                                  class="w-3/5 p-1 border border-blue-lighter rounded"
                                  required="true">
                       </div>

                       <div class="flex">
                           <label for="price_per_day" class="w-2/5">Цена за день от: </label>
                           <input type="number"
                                  name="price_per_day"
                                  v-model="price_per_day"
                                  id="price_per_day"
                                  min="0"
                                  class="w-3/5 p-1 border border-blue-lighter rounded"
                                  required="true">
                       </div>
                   </div>

                   <div class="w-2/3">
                        <textarea name="description"
                                  v-model="description"
                                  class="w-5/6 p-2 border border-blue-lighter rounded"
                                  placeholder="Описание"
                                  rows="5">
                        </textarea>
                   </div>
               </div>

               <features-attach :features="features" :features-attached="attachedFeatures"></features-attach>

               <div v-if="! editing">
                 <button class="button is-primary">Добавить</button>
               </div>

               <div v-else class="field is-grouped">
                <p class="control">
                  <button class="button is-primary block">Сохранить</button>
                </p>

                <p class="control">
                  <a class="button is-text" :href="`/admin/rest-centers/${this.restCenter.slug}/accomodations`">Отмена</a>
                </p>
              </div>
           </form>
       </div>
   </div>
</template>

<script>
    import Accomodation from './ListItem.vue';
    import AccomodationDescription from './AccomodationDescription.vue';

    export default {
        components: { Accomodation, AccomodationDescription },

        props: [ 'restCenter', 'features', 'csrf' ],

        data() {
            return {
                type: '',
                guest_count: '',
                price_per_day: '',
                description: '',

                form: {
                    action: `/admin/rest-centers/${this.restCenter.slug}/accomodations`,
                    method: 'post'
                },

                attachedFeatures: [],
                editing: false
            };
        },

        methods: {
            edit(accomodation) {
                this.form.action += `/${accomodation.id}`;
                this.form.method = 'patch';

                this.type = accomodation.type;
                this.guest_count = accomodation.guest_count;
                this.price_per_day = accomodation.price_per_day;
                this.description = accomodation.description;

                this.attachedFeatures = accomodation.features;

                this.editing = true;

                window.location.hash = 'form';
            }
        }
    }
</script>
