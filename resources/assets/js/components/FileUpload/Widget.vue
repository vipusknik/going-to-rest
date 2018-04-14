<template>
    <div>
        <div>
            <label for="file"
                   class="block m-0 text-white text-center font-bold bg-green-light hover:bg-green cursor-pointer"
                   :class="classes"
                   v-text="loading ? 'Загрузка ... ' : 'Загрузить изображение'">
            </label>

            <input type="file" name="file" id="file" class="hidden" :accept="accept" @change="onChange">
        </div>

        <div v-if="images.length" class="flex flex-wrap mt-4">
            <div v-for="image in images" :key="image.id" class="relative mr-3 mb-2">
                <a :href="`/storage/${image.id}/${image.file_name}`" target="_blank">
                    <img :src="`/storage/${image.id}/${image.file_name}`" class="block w-16 h-16 rounded-sm shadow-lg">
                </a>

                <div class="absolute pin-t pin-r flex mr-1">
                    <div @click="remove(image)">
                        <i class="fas fa-times text-grey-light cursor-pointer hover:text-red-light"
                           title="Удалить изображение">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'endpoint', 'accept', 'imagesAttached' ],

        data() {
            return {
                images: this.imagesAttached,
                loading: false
            };
        },

        created() {
            this.$watch('imagesAttached', () => this.images = this.imagesAttached);
        },

        computed: {
            classes() {
                if (this.loading) {
                    return  [ 'cursor-wait', 'pointer-events-none', 'opacity-9' ];
                }

                return [];
            }
        },

        methods: {
            onChange(event) {
                if (! event.target.files.length) return;

                this.loading = true;

                let data = new FormData();

                data.append('image', event.target.files[0]);

                axios.post(this.endpoint, data)
                    .then(response => {
                        this.images.push(response.data.image);
                        this.loading = false;
                    })
                    .catch(error => {
                        this.loading = false;
                        flash('Ошибка при загрузке');
                    });
            },

            remove(image) {
                axios.delete(`/admin/rest-centers/${this.$parent.restCenter.slug}/media/${image.id}`)
                    .then(response => {
                        let index = this.images.findIndex(item => item.id === image.id);

                        this.images.splice(index, 1);
                    })
                    .catch(error => flash('Ошибка при удалении изображения'));
            }
        }
    }
</script>
