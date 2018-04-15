<template>
    <div>
        <div class="action-buttons mb-8">
            <div class="flex">
                <div class="control is-grouped">
                    <a :href="`/admin/medical-centers/${medicalCenter.slug}/edit`"
                       class="button is-small bg-grey-lighter"
                       title="Перейти в редактирование">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a @click.prevent="remove" class="button is-small bg-grey-lighter" title="Удалить медицинский центр">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>

                <div class="control ml-auto mr-2">
                    <div class="field flex items-center">
                      <input id="is_paid" type="checkbox" v-model="is_paid" class="switch">
                      <label for="is_paid" class="text-base text-grey-darkest font-bold pt-0">Платник</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical center info -->
        <div class="p-4 border border-grey-light rounded">
            <div class="mb-4 pb-4 border-b border-grey-light">
                <div class="mb-1">
                    <h3 class="text-base text-black font-semibold">
                        {{ medicalCenter.name }}
                    </h3>
                </div>

                <div class="text-base text-grey-dark">
                    {{ medicalCenter.location }}
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap content-between">
                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-phone"></i></span>
                        <span>{{ medicalCenter.contacts.join(', ') }}</span>
                    </div>

                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-envelope"></i></span>
                        <span>{{ medicalCenter.email }}</span>
                    </div>

                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-link"></i></span>
                        <span>
                            <a :href="medicalCenter.site_link"
                               target="_blank"
                               class="text-blue-light no-underline hover:underline">
                                {{ medicalCenter.site_link }}
                            </a>
                        </span>
                    </div>

                    <!-- <div v-if="medicalCenter.social_media_sites.vk" class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-vk"></i></span>
                        <span>
                            <a :href="medicalCenter.social_media_sites.vk"
                               v-text="medicalCenter.social_media_sites.vk"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                            </a>
                        </span>
                    </div>

                    <div v-if="medicalCenter.social_media_sites.instagram"
                         class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-instagram"></i></span>
                        <span>
                            <a :href="medicalCenter.social_media_sites.instagram"
                               v-text="medicalCenter.social_media_sites.instagram"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                                https://instagram.com/hey
                            </a>
                        </span>
                    </div>

                    <div v-if="medicalCenter.social_media_sites.facebook"
                         class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-facebook"></i></span>
                        <span>
                            <a :href="medicalCenter.social_media_sites.facebook"
                               v-text="medicalCenter.social_media_sites.facebook"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                            </a>
                        </span>
                    </div> -->
                </div>
            </div>

            <!-- features -->
            <div v-if="medicalCenter.features.length" class="mb-4">
                <div class="flex flex-wrap">
                    <div v-for="feature in medicalCenter.features"
                         class="text-xs px-1 my-1 mr-2 bg-green-lighter border border-green rounded-sm">
                        {{ feature.name }}
                        <span v-if="feature.pivot.description"
                              v-text="`(${feature.pivot.description})`">
                        </span>
                    </div>
                </div>
            </div>

            <!-- images -->
            <image-upload-widget :model="medicalCenter"
                                 accept="image/*"
                                 :images-attached="medicalCenter.media"
                                 class="mb-4">
            </image-upload-widget>

            <div>
                <div v-html="medicalCenter.description" class="text-sm"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import ImageUploadWidget from '../ImageUpload/Widget.vue';

    export default {
        components: { ImageUploadWidget },

        props: [ 'medicalCenter' ],

        data() {
            return {
                is_paid: this.medicalCenter.is_paid
            };
        },

        mounted() {
            this.$watch('is_paid', () => this.togglePaid());
        },

        methods: {
            remove() {
                if (! confirm('Удалить медицинский центр?')) return;

                axios.delete(`/admin/medical-centers/${this.medicalCenter.slug}`)
                    .then(response => {
                        this.$emit('destroyed', this.medicalCenter);
                        flash('Медицинский центр удален');
                    });
            },

            togglePaid() {
                this.is_paid ? this.create() : this.destroy();
            },

            create() {
                axios.post('/admin/paid-companies', {
                    class: this.medicalCenter.class,
                    id: this.medicalCenter.id
                })
                .then(response => flash('Добавлено в список платников!'))
                .catch(error => flash('Ошибка при выполнении', 'danger'));
            },

            destroy() {
                axios.delete('/admin/paid-companies', {
                    params: {
                        class: this.medicalCenter.class,
                        id: this.medicalCenter.id
                    }
                })
                .then(response => flash('Удалено из списка платников!'))
                .catch(error => flash('Ошибка при выполнении', 'danger'));
            }
        }
    }
</script>
