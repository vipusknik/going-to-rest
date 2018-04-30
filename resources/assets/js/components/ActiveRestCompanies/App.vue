<template>
    <div>
        <div class="flex h-full bg-white border border-grey-light">
            <div class="w-1/6 p-4 border-r border-grey-light bg-grey-lighter">
                <aside>
                    <div class="mb-6 pb-6 border-b border-grey">
                        <a href="/admin/active-rest-companies/create"
                           class="
                                block
                                text-white
                                text-center
                                font-semibold
                                px-6
                                py-1
                                bg-indigo
                                rounded-sm
                                hover:opacity-9
                           ">
                            Новая компания
                        </a>
                    </div>
                    <search-panel></search-panel>
                </aside>
            </div>

            <div class="flex w-5/6">
                <div class="w-2/5 p-6 border-r border-grey-light">
                    <!-- List -->
                    <div class="border border-grey-light shadow">
                        <list-item v-for="company in companies"
                                   :key="company.id"
                                   :company="company"
                                   @selected="show(company)"
                                   :active="selectedCompany && company.id === selectedCompany.id"
                                   class="cursor-pointer hover:bg-grey-lightest">
                        </list-item>
                    </div>
                </div>

                <div class="w-3/5 p-4">
                    <company-profile v-if="selectedCompany"
                                    :company="selectedCompany"
                                    @destroyed="remove">
                    </company-profile>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchPanel from './SearchPanel.vue';
    import ListItem from './ListItem.vue';
    import CompanyProfile from './CompanyProfile.vue';

    export default {
        components: { SearchPanel, ListItem, CompanyProfile },

        props: [ 'companiesInitial' ],

        data() {
            return {
                companies: this.companiesInitial,
                selectedCompany: null,
            };
        },

        methods: {
            show(company) {
                this.selectedCompany = null;

                axios.get(`/admin/active-rest-companies/${company.slug}`)
                    .then(response => {
                        this.selectedCompany = response.data.company;
                    })
                    .catch(() => flash('Ошибка при загрузке!', 'danger'));
            },

            remove(company) {
                let index = this.companies.findIndex(item => item.id === company.id);

                this.companies.splice(index, 1);
                this.selectedCompany = null;
            }
        }
    }
</script>
