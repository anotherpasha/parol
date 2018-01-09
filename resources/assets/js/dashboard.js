
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#dashboard',

    data: {
        user: ''
    },

    methods: {
        getUser() {
            let token = localStorage.getItem('token');
            // console.log(token);
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            axios.get('/api/user')
                .then((res) => {
                    this.user = res.data;
                })
                .catch((err) => {
                    //console.log(err);
                    location.href = '/client/login';
                });
        }
    },

    mounted() {

    }
});
