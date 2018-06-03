<template>
    <div>
        <div class="mb-3">
            <div class="flex items-center">
                <div class="w-1/3 mr-3">
                    <template v-if="bannerIsEmpty">
                        <label :for="'banner-' + uniqid"
                               class="block m-0 text-white text-center font-bold bg-green-light hover:bg-green cursor-pointer"
                               v-text="loading ? 'Загрузка ... ' : 'Загрузить изображение'">
                        </label>

                        <input type="file" name="banner" :id="'banner-' + uniqid" class="hidden" @change="onChange">
                    </template>

                    <div v-else class="relative">
                        <div class="absolute pin-t pin-r flex mr-1">
                            <div @click="removeImage">
                                <i class="fas fa-times text-grey-light cursor-pointer hover:text-red-light"
                                   title="Удалить изображение">
                                </i>
                            </div>
                        </div>

                        <img :src="banner.image_link" alt="" class="border w-full h-auto">
                    </div>
                </div>

                <div class="w-1/2 mr-3">
                    <input type="text" v-model="banner.external_link" placeholder="Внешняя ссылка" class="w-full p-1 border">
                </div>

                <div class="flex-1 flex items-center">
                    <div  @click="save" class="mr-6">
                        <i class="fas fa-save cursor-pointer hover:text-blue" title="Сохранить"></i>
                    </div>

                    <div v-if="banner.id" @click="destroy">
                        <i class="fas fa-times cursor-pointer hover:text-red-light" title="Удалить баннер"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            category: {
                type: String,
                required: true
            },

            bannerInitial: {
                type: Object,
                required: true
            },

            order: {
                type: Number,
                required: true
            }
        },

        data() {
            return {
                banner: this.bannerInitial,
                loading: false,
                uniqid: Math.random().toString(36).substring(7)
            };
        },

        created() {
            if (this.bannerIsEmpty) {
                this.banner = {
                    id: null,
                    image_link: '',
                }
            }
        },

        computed: {
            bannerIsEmpty() {
                return this.banner.image_link === undefined || this.banner.image_link === '';
            },

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

                data.append('banner', event.target.files[0]);

                axios.post('/admin/banners-image', data)
                    .then(response => {
                        this.banner.image_link = response.data.image_link;

                        this.loading = false;
                    })
                    .catch(error => {
                        this.loading = false;
                        flash('Ошибка при загрузке', 'danger');
                    });
            },

            save() {
                if (! this.banner.image_link || !this.banner.external_link) {
                    return flash('Загрузите картинку и укажите внешнюю ссылку!', 'warning');
                }

                axios.post('/admin/banners', {
                          order: this.order,
                          category: this.category,
                          image_link: this.banner.image_link,
                          external_link: this.banner.external_link
                      })
                      .then(response => {
                          this.banner.id = response.data.banner.id;
                          flash('Сохранено');
                      })
                      .catch(() => flash('Ошибка при выполнении', 'error'));
            },

            removeImage() {
                this.banner.image_link = '';
            },

            destroy() {
                if (! confirm('Удалить баннер?')) return;

                axios.delete(`/admin/banners/${this.banner.id}`)
                     .then(() => {
                        this.banner = {};
                        flash('Баннер удален');
                     })
                     .catch(() => flash('Ошибка при выполнении', 'error'));
            }
        }
    }
</script>
