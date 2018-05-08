export default Vue.extend({
    template: `
        <div class="flex flex-wrap content-between">
            <div class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-grey-dark mr-1"><i class="fas fa-phone"></i></span>
                <span>{{ model.contacts }}</span>
            </div>

            <div class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-grey-dark mr-1"><i class="fas fa-envelope"></i></span>
                <span>{{ model.email }}</span>
            </div>

            <div class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-grey-dark mr-1"><i class="fas fa-link"></i></span>
                <span>
                    <a :href="model.site_link"
                       target="_blank"
                       class="text-blue-light no-underline hover:underline">
                        {{ model.site_link }}
                    </a>
                </span>
            </div>

            <div v-if="model.social_media_sites.vk" class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-red-lighter mr-1"><i class="fab fa-vk"></i></span>
                <span>
                    <a :href="model.social_media_sites.vk"
                       v-text="model.social_media_sites.vk"
                       target="_blank"
                       class="text-red-lighter no-underline hover:underline">
                    </a>
                </span>
            </div>

            <div v-if="model.social_media_sites.instagram"
                 class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-red-lighter mr-1"><i class="fab fa-instagram"></i></span>
                <span>
                    <a :href="model.social_media_sites.instagram"
                       v-text="model.social_media_sites.instagram"
                       target="_blank"
                       class="text-red-lighter no-underline hover:underline">
                    </a>
                </span>
            </div>

            <div v-if="model.social_media_sites.facebook"
                 class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-red-lighter mr-1"><i class="fab fa-facebook"></i></span>
                <span>
                    <a :href="model.social_media_sites.facebook"
                       v-text="model.social_media_sites.facebook"
                       target="_blank"
                       class="text-red-lighter no-underline hover:underline">
                    </a>
                </span>
            </div>
        </div>
    `,

    props: {
        model: {
            type: Object,
            required: true
        }
    }
});
