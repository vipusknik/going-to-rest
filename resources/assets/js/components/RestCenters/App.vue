<template>
	<div>
		<div class="flex bg-white border border-grey-light">
			<div class="w-1/6 h-screen p-4 border-r border-grey-light bg-grey-lighter">
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
						<div v-for="restCenter in restCenters"
							 :key="restCenter.id"
						     @click="show(restCenter)"
						     class="p-4 border-b border-grey-light">
							<div class="mb-3">
								<h3 class="text-base text-black font-semibold">{{ restCenter.name }}</h3>
							</div>

							<div class="text-base text-grey-dark">
								{{ restCenter.reservoir.name }}
							</div>
						</div>
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
	import RestCenterProfile from './RestCenterProfile.vue';

	export default {
		components: { SearchPanel, RestCenterProfile },

		props: [ 'restCentersInitial', 'reservoirs' ],

		data() {
			return {
				restCenters: this.restCentersInitial,
				selectedRestCenter: null,
			};
		},

		methods: {
			show(restCenter) {
				axios.get(`/admin/rest-centers/${restCenter.id}`)
					.then(response => {
						this.selectedRestCenter = response.data.restCenter;
					});
			},

			remove(restCenter) {
				let index = this.restCenters.indexOf(restCenter);
                this.restCenters.splice(index, 1);
			}
		}
	}
</script>

<style scoped>
	.messages .action-buttons {
	  padding: 0;
	  margin-top: -20px;
	}
	.message .action-buttons {
	  padding: 0;
	  margin-top: -5px;
	}
	.action-buttons .control.is-grouped {
	  display: inline-block;
	  margin-right: 30px;
	}
	.action-buttons .control.is-grouped:last-child {
	  margin-right: 0;
	}
	.action-buttons .control.is-grouped .button:first-child {
	  border-radius: 5px 0 0 5px;
	}
	.action-buttons .control.is-grouped .button:last-child {
	  border-radius: 0 5px 5px 0;
	}
	.action-buttons .control.is-grouped .button {
	  margin-right: -5px;
	  border-radius: 0;
	}
	.pg {
	  display: inline-block;
	  top:10px;
	}
	.action-buttons .pg .title {
	  display: block;
	  margin-top: 0;
	  padding-top: 0;
	  margin-bottom: 3px;
	  font-size:12px;
	  color: #AAAAA;
	}
	.action-buttons .pg a{
	  font-size:12px;
	  color: #AAAAAA;
	  text-decoration: none;
	}
</style>
