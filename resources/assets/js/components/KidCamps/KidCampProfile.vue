<template>
    <div>
        <div class="action-buttons mb-8">
            <div class="flex">
                <div class="control is-grouped">
                    <a :href="`/admin/kid-camps/${kidCamp.slug}/edit`"
                       class="button is-small bg-grey-lighter"
                       title="Перейти в редактирование">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a @click.prevent="remove" class="button is-small bg-grey-lighter" title="Удалить детский лагерь">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>

                <div class="control ml-auto mr-2">
                    <paid-companies-button :model="kidCamp"></paid-companies-button>
                </div>
            </div>
        </div>

        <!-- Medical center info -->
        <div class="p-4 border border-grey-light rounded">
            <div class="mb-4 pb-4 border-b border-grey-light">
                <div class="mb-1">
                    <h3 class="text-base text-black font-semibold" v-text="kidCamp.name"></h3>
                </div>

                <div class="text-base text-grey-dark" v-text="kidCamp.location"></div>

                <div class="text-sm text-grey-dark">
                    <span class="text-grey">Распространение путевок:</span> {{ kidCamp.distribution_address }}
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap content-between">
                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-phone"></i></span>
                        <span>{{ kidCamp.contacts }}</span>
                    </div>

                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-envelope"></i></span>
                        <span>{{ kidCamp.email }}</span>
                    </div>

                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-link"></i></span>
                        <span>
                            <a :href="kidCamp.site_link"
                               target="_blank"
                               class="text-blue-light no-underline hover:underline">
                                {{ kidCamp.site_link }}
                            </a>
                        </span>
                    </div>

                    <div v-if="kidCamp.social_media_sites.vk" class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-vk"></i></span>
                        <span>
                            <a :href="kidCamp.social_media_sites.vk"
                               v-text="kidCamp.social_media_sites.vk"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                            </a>
                        </span>
                    </div>

                    <div v-if="kidCamp.social_media_sites.instagram"
                         class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-instagram"></i></span>
                        <span>
                            <a :href="kidCamp.social_media_sites.instagram"
                               v-text="kidCamp.social_media_sites.instagram"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                                https://instagram.com/hey
                            </a>
                        </span>
                    </div>

                    <div v-if="kidCamp.social_media_sites.facebook"
                         class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-facebook"></i></span>
                        <span>
                            <a :href="kidCamp.social_media_sites.facebook"
                               v-text="kidCamp.social_media_sites.facebook"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- features -->
            <features-attached v-if="kidCamp.features.length" :features="kidCamp.features" class="mb-6"></features-attached>

            <!-- images -->
            <image-upload-widget :model="kidCamp" :images-attached="kidCamp.media" class="mb-4">
            </image-upload-widget>

            <div>
                <div class="mb-3 pb-3 border-b border-blue-lighter">
                    <h3 class="text-grey-darker font-bold">Проживание:</h3>
                    <div v-html="kidCamp.accomodation" class="text-sm mb-2"></div>

                    <div>
                        <span class="text-grey-darker font-bold">Стоимость: </span>
                        <span v-text="kidCamp.cost" class="text-sm"></span>
                    </div>
                </div>

                <div v-html="kidCamp.description" class="text-sm"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'kidCamp' ],

        methods: {
            remove() {
                if (! confirm('Удалить детский лагерь?')) return;

                axios.delete(`/admin/kid-camps/${this.kidCamp.slug}`)
                    .then(response => {
                        this.$emit('destroyed', this.kidCamp);
                        flash('Детский лагерь удален');
                    });
            }
        }
    }
</script>
