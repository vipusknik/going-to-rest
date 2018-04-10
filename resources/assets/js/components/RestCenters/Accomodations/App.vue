<template>
   <div class="bg-white p-6">
       <div class="mb-6 pb-3 border-b border-grey-light">
           <h3 class="text-lg text-grey-darker font-bold">{{ restCenter.name }}: размещения</h3>
       </div>

       <!-- accomodations -->
       <div class="text-black">
         <div v-for="accomodation in restCenter.accomodations" :key="accomodation.id" class="mb-4 p-4 border border-grey-light">
           <div class="text-lg text-blue-light">
             <span class="text-blue font-bold" v-text="`${accomodation.type_in_russian}: `"></span>
             <span v-text="accomodation.guest_count" class="font-bold"></span> человек,
             <span v-text="accomodation.price_per_day" class="font-bold"></span> тг за день.
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
       </div>

        <!-- new accomodation form -->
       <div class="p-4">
           <form :action="`/admin/rest-centers/${restCenter.slug}/accomodations`" method="post">
               <input type="hidden" name="_token" :value="csrf">
               <div class="flex mb-6">
                   <div class="w-1/3 mr-8">
                       <div class="flex mb-3">
                           <label for="type" class="w-1/3">Тип: </label>
                           <select v-model="type"
                                   name="type"
                                   id="type"
                                   class="w-2/3 p-0 px-2 border border-blue-lighter rounded">
                               <option value="room">Номер</option>
                               <option value="house">Домик</option>
                           </select>
                       </div>

                       <div class="flex mb-3">
                           <label for="guest_count" class="w-1/3">Кол-во гостей:</label>
                           <input type="number"
                                  name="guest_count"
                                  v-model="guest_count"
                                  min="1"
                                  id="guest_count"
                                  class="w-2/3 p-1 border border-blue-lighter rounded">
                       </div>

                       <div class="flex">
                           <label for="price_per_day" class="w-1/3">Цена за день: </label>
                           <input type="number"
                                  name="price_per_day"
                                  v-model="price_per_day"
                                  id="price_per_day"
                                  min="0"
                                  class="w-2/3 p-1 border border-blue-lighter rounded">
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

               <attach-features :features-initial="features" belongs-to="accomodation" class="mb-6"></attach-features>

               <button class="button is-primary">Добавить</button>
           </form>
       </div>
   </div>
</template>

<script>
    import AttachFeatures from '../AttachFeatures.vue';

    export default {
        props: [ 'restCenter', 'features', 'csrf' ],

        data() {
            return {
                type: '',
                guest_count: '',
                price_per_day: '',
                description: '',
            };
        }
    }
</script>
