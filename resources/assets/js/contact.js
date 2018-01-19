import Vue from 'vue';
import Validator from 'validator';
import isEmpty from 'lodash/isEmpty';

const contact = new Vue({
    el: '#contact',

    components: {
    },
    beforeCreate() {
      console.log('contact created');
    },
    data: {
        notif: false,
        loader: false,
        contactForm: {
          name: '',
          email: '',
          phone: '',
          date: '',
          time: '',
          type: 'Asuransi Rumah'
        },
        errors: {
          errEmail:'',
          errName:'',
          errPhone:'',
          errDate:'',
          errTime: '',
        },
        isValid: false,
    },

    mounted() {
    },

    methods: {
      changeTime(evt) {
        this.contactForm.time = evt.target.value;
      },
      changeDate(evt) {
        this.contactForm.date = evt.target.value;
      },
      submitContact() {
        let vm = this;
        let formData = new FormData();
        const {name, email, phone, date, time, type} = this.contactForm;
        if(!vm.validate().isValid) {
          console.log('invalid');
          vm.errors = vm.validate().errors;
          return;
        }
        vm.loader = true;
        formData.append('name', name);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('date', date);
        formData.append('time', time);
        formData.append('type', type);
        axios.post('/registration', formData)
        .then( (d) => {
          vm.notif = true;
          setTimeout(function() {
            vm.notif = false;
            vm.loader = false;
            vm.resetForm();
            vm.errors = {};
          }, 3000);
        })
        .catch(error => {
            const err = error.response.data;
            alert(err.message);
            vm.loader = false;
        });
      },
      validate() {
        const {contactForm}  = this;
        let errors = {};
        if (!Validator.isEmail(contactForm.email)) {
            errors.errEmail = 'This field must be a valid email address.';
        }
        if (Validator.isEmpty(contactForm.email)) {
            errors.errEmail = 'This field is required.';
        }
        if (Validator.isEmpty(contactForm.name)) {
            errors.errName = 'This field is required.';
        }
        if (Validator.isEmpty(contactForm.phone)) {
            errors.errPhone = 'This field is required.';
        }
        if (!Validator.isNumeric(contactForm.phone)) {
            errors.errPhone = 'This field must be a number.';
        }
        if (Validator.isEmpty(contactForm.date)) {
            errors.errDate = 'This field is required.';
        }
        if (Validator.isEmpty(contactForm.time)) {
            errors.errTime = 'This field is required.';
        }
        // console.log(errors);
        return {
          errors,
          isValid: isEmpty(errors)
        };
      },
      resetForm() {
        this.contactForm = {
          name: '',
          email: '',
          phone: '',
          date: '',
          time: '',
          type: 'Asuransi Rumah'
        };
      }
    },

    updated: function () {
    }
});
