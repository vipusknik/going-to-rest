<template>
    <div>
        <div class="action-buttons mb-8">
            <div class="flex">
                <div class="control is-grouped">
                    <a :href="`/admin/active-rest-companies/${company.slug}/edit`"
                       class="button is-small bg-grey-lighter"
                       title="Перейти в редактирование">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a @click.prevent="remove" class="button is-small bg-grey-lighter" title="Удалить компанию">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>

                <div class="control ml-auto mr-2">
                    <paid-companies-button :model="company"></paid-companies-button>
                </div>
            </div>
        </div>

        <!-- Medical center info -->
        <div class="p-4 border border-grey-light rounded">
            <div class="mb-4 pb-4 border-b border-grey-light">
                <div class="mb-1">
                    <h3 class="text-base text-black font-semibold" v-text="company.name"></h3>
                </div>

                <div class="text-base text-grey-dark" v-text="company.location"></div>

                <div class="text-sm text-grey-dark">
                    <span class="text-grey">Распространение путевок:</span> {{ company.distribution_address }}
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap content-between">
                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-phone"></i></span>
                        <span>{{ company.contacts }}</span>
                    </div>

                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-envelope"></i></span>
                        <span>{{ company.email }}</span>
                    </div>

                    <div class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-grey-dark mr-1"><i class="fas fa-link"></i></span>
                        <span>
                            <a :href="company.site_link"
                               target="_blank"
                               class="text-blue-light no-underline hover:underline">
                                {{ company.site_link }}
                            </a>
                        </span>
                    </div>

                    <div v-if="company.social_media_sites.vk" class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-vk"></i></span>
                        <span>
                            <a :href="company.social_media_sites.vk"
                               v-text="company.social_media_sites.vk"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                            </a>
                        </span>
                    </div>

                    <div v-if="company.social_media_sites.instagram"
                         class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-instagram"></i></span>
                        <span>
                            <a :href="company.social_media_sites.instagram"
                               v-text="company.social_media_sites.instagram"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                                https://instagram.com/hey
                            </a>
                        </span>
                    </div>

                    <div v-if="company.social_media_sites.facebook"
                         class="text-sm mr-3 pr-3 border-r border-grey">
                        <span class="text-red-lighter mr-1"><i class="fab fa-facebook"></i></span>
                        <span>
                            <a :href="company.social_media_sites.facebook"
                               v-text="company.social_media_sites.facebook"
                               target="_blank"
                               class="text-red-lighter no-underline hover:underline">
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- images -->
            <image-upload-widget :model="company" :images-attached="company.media" class="mb-6">
            </image-upload-widget>

            <!-- activities -->
            <activities-attached :activities="company.activities" class="mb-6"></activities-attached>

            <div>
                <div v-html="company.description" class="text-sm"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import ActivitiesAttached from '../Activities/ActivitiesAttached.vue';

    export default {
        components: { ActivitiesAttached },

        props: [ 'company' ],

        methods: {
            remove() {
                if (! confirm('Удалить компанию?')) return;

                axios.delete(`/admin/active-rest-companies/${this.company.slug}`)
                    .then(response => {
                        this.$emit('destroyed', this.company);
                        flash('Удалено');
                    });
            }
        }
    }
</script>
