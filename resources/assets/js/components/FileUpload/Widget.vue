<template>
    <div>
        <div>
            <label for="file" class="block text-white text-center font-bold bg-green-light hover:bg-green cursor-pointer">
                Загрузить изображение
            </label>

            <input type="file" name="file" id="file" class="hidden" :accept="accept" @change="onChange">
        </div>

        <div class="flex flex-wrap">
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
                percentCompleted: 0,
                images: this.imagesAttached
            };
        },

        methods: {
            onChange(event) {
                let data = new FormData();

                data.append('image', event.target.files[0]);

                let config = {
                    onUploadProgress(progressEvent) {
                        this.percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                    }
                };

                axios.post(this.endpoint, data, config)
                    .then(response => {
                        this.images.push(response.data.image);
                    })
                    .catch(error => console.log(error));
            },

            remove(image) {
                axios.delete(`/admin/rest-centers/${this.$parent.restCenter.slug}/media/${image.id}`)
                    .then(response => {
                        let index = this.images.findIndex(item => item.id === image.id);

                        this.images.splice(index, 1);
                    })
                    .catch(error => {
                        alert('Ошибка при удалении изображения');
                    });
            }
        }
    }
</script>
