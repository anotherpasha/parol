import Vue from 'vue';
import Validator from 'validator';
import isEmpty from 'lodash/isEmpty';

const contact = new Vue({
    el: '#contactus',

    components: {
    },
    
    beforeCreate() {
      // console.log('contact created');
    },

    data: {
      occupation: 'Daftar',
    },

    mounted() {
    },

    updated: function () {
      $('.selectpicker').selectpicker('refresh');
    },

    methods: {
    }

});
