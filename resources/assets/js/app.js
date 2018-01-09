
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#loginform',



    data: {
        email: '',
        password: ''
    },

    methods: {
        login() {
            let $vm = this;
            axios.post('/api/login', {
                email: $vm.email,
                password: $vm.password
            })
            .then((res) => {
                let token = res.data.token;
                localStorage.setItem('token', token);
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                location.href = '/client/dashboard';
            })
            .catch((err) => {
                console.log(err);
            })
        },
        withoutLogin() {
            axios.get('/api/user')
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    },

    mounted() {

    }
});
