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
                    <paid-companies-button :model="medicalCenter"></paid-companies-button>
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

                <div class="text-sm text-grey-dark">
                    <span class="text-grey">Распространение путевок:</span> {{ medicalCenter.distribution_address }}
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap content-between">
                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-phone"></i></span>
                        <span>{{ medicalCenter.contacts }}</span>
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

                    <div v-if="medicalCenter.social_media_sites.vk" class="text-sm mr-3 pr-3 border-r border-grey">
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
                    </div>
                </div>
            </div>

            <!-- features -->
            <features-attached v-if="medicalCenter.features.length" :features="medicalCenter.features" class="mb-6"></features-attached>

            <!-- images -->
            <image-upload-widget :model="medicalCenter"
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
    export default {
        props: [ 'medicalCenter' ],

        methods: {
            remove() {
                if (! confirm('Удалить медицинский центр?')) return;

                axios.delete(`/admin/medical-centers/${this.medicalCenter.slug}`)
                    .then(response => {
                        this.$emit('destroyed', this.medicalCenter);
                        flash('Медицинский центр удален');
                    });
            }
        }
    }
</script>
