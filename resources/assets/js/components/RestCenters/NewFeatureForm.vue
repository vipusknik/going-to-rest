<template>
    <div>
        <div class="mt-2 p-1" v-if="! showNewFeatureInput">
            <a href="#" @click.prevent="showNewFeatureInput = true">
                Нет того что нужно? Добавьте сами!
            </a>
        </div>

        <div v-else class="m-1 p-4 bg-grey-lighter">
            <div class="mb-2">
                <input type="text"
                       v-model="newFeature.name"
                       placeholder="Название"
                       class="
                        text-black
                        text-sm
                        w-full
                        h-8
                        rounded-sm
                        p-2
                        hover:border
                        hover:border-grey-light">
           </div>

            <div class="field">
              <div class="control">
                <div class="select w-full h-8 border-none">
                  <select v-model="newFeature.category" class="text-sm w-full h-8">
                    <option value="" selected="true" disabled="true">Категория</option>
                    <option value="facilities">Удобство</option>
                    <option value="leasures">Досуг</option>
                  </select>
                </div>
              </div>
            </div>

            <button @click.prevent="store"
                    class="block
                           w-full
                           text-white
                           text-center
                           px-6
                           py-1
                           bg-teal
                           rounded-sm
                           hover:opacity-9
                        ">
                Добавить
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'feature' ],

        data() {
            return {
                showNewFeatureInput: false,
                newFeature: {
                    name: '',
                    category: '',
                    belongs_to: 'rest_center'
                }
            };
        },

        methods: {
            store() {
                if (this.newFeature.name == '' || this.newFeature.category == '') {
                    return alert('Укажите название и категорию');
                }

                let allFeatures = this.$parent.features.concat(this.$parent.selectedFeatures);

                if (allFeatures.find(feature => this.newFeature.name == feature.name)) {
                    return alert('Добавлено ранее');
                }

                axios.post('/admin/features', this.newFeature)
                    .then(response => {
                        this.newFeature.name = '';
                        this.$parent.features.push(response.data.feature);
                        alert('Добавлено');
                    })
                    .catch(error => alert('Ошибка приь добавлении'));
            }
        }
    }
</script>
