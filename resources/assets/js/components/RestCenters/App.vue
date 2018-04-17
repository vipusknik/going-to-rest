<template>
	<div>
		<div class="flex h-full bg-white border border-grey-light">
			<div class="w-1/6 p-4 border-r border-grey-light bg-grey-lighter">
				<aside>
					<div class="mb-6 pb-6 border-b border-grey">
			            <a href="/admin/rest-centers/create"
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
			                Новая база
			            </a>
			        </div>
					<search-panel :reservoirs="reservoirs"></search-panel>
				</aside>
			</div>

			<div class="flex w-5/6">
				<div class="w-2/5 p-6 border-r border-grey-light">
					<!-- List -->
					<div class="border border-grey-light shadow">
						<list-item v-for="restCenter in restCenters"
						           :rest-center="restCenter"
						           :key="restCenter.id"
						           @selected="show(restCenter)"
						           :active="selectedRestCenter && restCenter.id === selectedRestCenter.id"
						           class="cursor-pointer hover:bg-grey-lightest">
						</list-item>
					</div>
				</div>

				<div class="w-3/5 p-4">
					<rest-center-profile v-if="selectedRestCenter" :rest-center="selectedRestCenter" @destroyed="remove">
					</rest-center-profile>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import SearchPanel from './SearchPanel.vue';
	import ListItem from './ListItem.vue';
	import RestCenterProfile from './RestCenterProfile.vue';

	export default {
		components: { SearchPanel, ListItem, RestCenterProfile },

		props: [ 'restCentersInitial', 'reservoirs' ],

		data() {
			return {
				restCenters: this.restCentersInitial,
				selectedRestCenter: null,
			};
		},

		methods: {
			show(restCenter) {
				this.selectedRestCenter = null;

				axios.get(`/admin/rest-centers/${restCenter.slug}`)
					.then(response => {
						this.selectedRestCenter = response.data.restCenter;
					});
			},

			remove(restCenter) {
				let index = this.restCenters.findIndex(item => item.id === restCenter.id);

                this.restCenters.splice(index, 1);
				this.selectedRestCenter = null;
			}
		}
	}
</script>
