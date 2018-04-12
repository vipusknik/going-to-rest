<template>
    <div>
        <div>
            <label for="file" class="block text-white text-center font-bold bg-green-light hover:bg-green cursor-pointer">
                Загрузить изображение
            </label>

            <input type="file" name="file" id="file" class="hidden" :accept="accept" @change="onChange">
        </div>

        <div class="flex flex-wrap">
            <div v-for="image in images" class="mr-2 mb-2">
                <a :href="`/storage/${image.id}/${image.file_name}`" target="_blank">
                    <img :src="`/storage/${image.id}/${image.file_name}`" class="block w-24 h-24 rounded-sm">
                </a>
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
            }
        }
    }
</script>
