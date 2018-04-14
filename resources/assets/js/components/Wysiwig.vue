<template>
    <div>
        <input id="trix" type="hidden" :name="name" :value="value">

        <trix-editor
                ref="trix"
                input="trix"
                @trix-change="change"
                :placeholder="placeholder"
                :style="styles">
        </trix-editor>
    </div>
</template>

<style>
    @import '~trix/dist/trix.css';
</style>

<script>
    import Trix from 'trix';

    export default {
        props: {
            name: {
                type: String,
                required: true
            },

            value: {
                type: String,
                required: false,
                default: ''
            },

            placeholder: {
                type: String,
                required: false,
                default: ''
            },

            minHeight: {
                type: Number,
                required: false,
                default: 300
            }
        },

        methods: {
            change({target}) {
                this.$emit('input', target.value)
            }
        },

        computed: {
            styles() {
                return `min-height: ${this.minHeight}px`;
            }
        },

        watch: {
            value(val) {
                if (val === '') {
                    this.$refs.trix.value = '';
                }
            }
        }
    }
</script>
