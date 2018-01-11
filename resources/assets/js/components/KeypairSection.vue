<template>
    <div class="uk-card">
        <button class="uk-button uk-button-small" type="button" @click="addKeypair">Add</button>
        <div v-for="(keypair, index) in keypairList">
            <a uk-close @click="removeKeypair(index)"></a>
            <div class="uk-margin-small">
                <input class="uk-input" type="text" name="keypair[]" v-model="keypairList[index].key">
            </div>
            <div class="uk-margin-small">
                <wysiwyg v-model="keypairList[index].value" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'keypairsection',

        props: [ 'lang', 'index' ],

        mounted() {
            console.log('keypair mounted.')
        },

        data() {
            return {
                keypairList:[]
            }
        },

        methods: {
            addKeypair() {
                const keypair = {
                    key: '',
                    value: ''
                };
                this.keypairList.push(keypair);
            },

            removeKeypair(index) {
                if (this.keypairList.length > 0) {
                console.log(index);
                this.keypairList.splice(index, 1);
            }
            }
        }
    }
</script>
