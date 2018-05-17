<template>
    <div>
        <textarea :id="identifier"
                  :name="name"
                  :value="value"
                  :placeholder="placeholder"
                  :style="styles">
        </textarea>
    </div>
</template>

<style>
    /*@import '~trix/dist/trix.css';*/
</style>

<script>
    import CKEDITOR from 'ckeditor';

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

        mounted () {
            window.CKEDITOR.replace(this.identifier);

            window.CKEDITOR.instances[this.identifier].on('change', (event) => {
                this.$emit('input', event.editor.getData())
            });
        },

        computed: {
            identifier() {
                return Math.random().toString(36).substring(7);
            },

            styles() {
                return `min-height: ${this.minHeight}px`;
            }
        }
    }
</script>
