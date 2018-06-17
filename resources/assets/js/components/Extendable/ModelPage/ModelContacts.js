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

            <div v-if="socialMediaSite('vk')" class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-red-lighter mr-1"><i class="fab fa-vk"></i></span>
                <span>
                    <a :href="socialMediaSite('vk').link"
                       v-text="socialMediaSite('vk').link_placeholder || socialMediaSite('vk').link"
                       target="_blank"
                       class="text-red-lighter no-underline hover:underline">
                    </a>
                </span>
            </div>

            <div v-if="socialMediaSite('instagram')"
                 class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-red-lighter mr-1"><i class="fab fa-instagram"></i></span>
                <span>
                    <a :href="socialMediaSite('instagram').link"
                       v-text="socialMediaSite('instagram').link_placeholder || socialMediaSite('instagram').link"
                       target="_blank"
                       class="text-red-lighter no-underline hover:underline">
                    </a>
                </span>
            </div>

            <div v-if="socialMediaSite('facebook')"
                 class="text-sm mr-3 pr-3 border-r border-grey">
                <span class="text-red-lighter mr-1"><i class="fab fa-facebook"></i></span>
                <span>
                    <a :href="socialMediaSite('facebook').link"
                       v-text="socialMediaSite('facebook').link_placeholder || socialMediaSite('facebook').link"
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
    },

    methods: {
        socialMediaSite(service) {
            return this.model.social_media.find(item => item.service == service);
        }
    }
});
