window.Vue = require('vue');

const app = new Vue({
    el: '#calculator',

    components: {
    },

    data: {
        buildingStatus: 1,
        type: 1,
        package: 'both',
        earthquake: 0
    },

    mounted() {

    },

    methods: {
        changeType(evt) {
            this.type = evt.target.value;
        },

        changePackage(evt) {
            this.package = evt.target.value;
        },

        changeEq(evt) {
            console.log(evt.target.value);
        }
    },

    updated: function () {

    }
});
