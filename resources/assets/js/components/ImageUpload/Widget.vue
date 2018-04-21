<template>
    <div>
        <div>
            <label for="file"
                   class="block m-0 text-white text-center font-bold bg-green-light hover:bg-green cursor-pointer"
                   :class="classes"
                   v-text="loading ? 'Загрузка ... ' : 'Загрузить изображение'">
            </label>

            <input type="file" name="file" id="file" class="hidden" @change="onChange">
        </div>

        <div v-if="images.length" class="flex flex-wrap mt-4">
            <image-uploaded v-for="image in images" :key="image.id" :image-initial="image" @destroyed="destroy">
            </image-uploaded>
        </div>
    </div>
</template>

<script>
    import ImageUploaded from './ImageUploaded.vue';

    export default {
        components: { ImageUploaded },

        props: [ 'model', 'imagesAttached' ],

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
                    return  [ 'cursor-not-allowed', 'pointer-events-none', 'opacity-9' ];
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

                data.append('class', this.model.class);
                data.append('id', this.model.id);

                axios.post('/admin/images', data)
                    .then(response => {
                        this.images.push(response.data.image);
                        this.loading = false;
                    })
                    .catch(error => {
                        this.loading = false;
                        flash('Ошибка при загрузке', 'danger');
                    });
            },

            destroy(image) {
                this.images.splice(index(image, this.images), 1);

                flash('Изображение удалено');
            }
        }
    }
</script>
