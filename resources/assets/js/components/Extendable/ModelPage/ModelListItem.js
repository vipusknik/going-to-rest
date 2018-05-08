export default Vue.extend({
    template: `
        <div @click="$emit('selected')" class="p-4 border-b border-grey-light" :class="{ 'bg-grey-lighter': active }">
            <div>
                <h3 class="text-base text-black font-semibold">{{ model.name }}</h3>
            </div>
        </div>
    `,

    props: {
        model: {
            type: Object,
            required: true
        },

        active: {
            type: Boolean,
            required: true
        }
    }
});
