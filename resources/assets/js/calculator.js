window.Vue = require('vue');

const app = new Vue({
    el: '#calculator',

    components: {
    },

    data: {
        buildingStatus: 1,
        type: 1,
        package: 'both',
        earthquake: 0,
        building_value: 0,
        content_value: 0
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

        checkContentValue(evt) {
            let max = 10/100 * this.building_value;
            if (evt.target.value > max) {
                alert('Content value can not higher then 10% of building value');
                this.$refs.content_value.value = 0;
                this.$refs.content_value.focus();
            }
        }
    },

    updated: function () {

    }
});
