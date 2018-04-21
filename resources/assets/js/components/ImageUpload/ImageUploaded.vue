<template>
    <div class="group relative mr-3 mb-2">
        <a :href="`/storage/${image.id}/${image.file_name}`" target="_blank">
            <img :src="`/storage/${image.id}/${image.file_name}`"
                 class="block w-24 h-24 rounded-sm shadow-lg">
        </a>

        <!-- Main image badge -->
        <div v-if="isMain" class="absolute pin-t pin-l pl-2 pr-3 bg-green rounded-tl-sm rounded-br-full" title="Это изображение главное">
            <i class="fas fa-check text-base text-white"></i>
        </div>

        <div class="
                absolute
                pin-b
                flex
                flex-col
                items-center
                w-full
                py-2
                opacity-0
                group-hover:opacity-100
            "
            style="background: rgba(0, 0, 0, .8)">

            <button @click="toggleIsMain"
                    v-text="isMain ? 'Сделать не главным' : 'Сделать главным'"
                    class="w-full text-xs text-grey-light text-center leading-none font-bold hover:text-white active:text-green-light"
                    style="outline: none;">
            </button>
        </div>

        <div class="absolute pin-t pin-r flex mr-1">
            <div @click="destroy">
                <i class="fas fa-times text-grey-light cursor-pointer hover:text-red-light"
                   title="Удалить изображение">
                </i>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'imageInitial' ],

        data() {
            return {
                image: this.imageInitial
            };
        },

        mounted() {
            window.events.$on('main-image:set', image => {
                if (image.id !== this.image.id) {
                    this.image.collection_name = 'images';
                }
            });
        },

        computed: {
            isMain() {
                return this.image.collection_name === 'main-image';
            }
        },

        methods: {
            destroy() {
                axios.delete(`/admin/images/${this.image.id}`)
                    .then(response => this.$emit('destroyed', this.image))
                    .catch(error => flash('Ошибка при удалении изображения', 'danger'));
            },

            toggleIsMain() {
                this.isMain ? this.setAsRegularImage() : this.setAsMainImage();
            },

            setAsMainImage() {
                axios.post(`/admin/main-images/${this.image.id}`, {
                        class: this.$parent.model.class,
                        id: this.$parent.model.id
                    })
                    .then(response => {
                        window.events.$emit('main-image:set', this.image);
                        this.image = response.data.image;
                        flash('Изображение выбрано как главное.');
                    })
                    .catch(() => flash('Ошибка при выполнении.', 'danger'));
            },

            setAsRegularImage() {
                axios.delete(`/admin/main-images/${this.image.id}`)
                    .then((response) => {
                        this.image = response.data.image;
                        flash('Изображение помечено как обычное.');
                    })
                    .catch(() => flash('Ошибка при выполнении.', 'danger'));
            }
        }
    }
</script>
