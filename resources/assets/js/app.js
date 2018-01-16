
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import $ from "jquery";
import 'eonasdan-bootstrap-datetimepicker';
import 'bootstrap-select';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(document).ready(()=> {
  $('.carousel').carousel();
  $('#datepicker').datetimepicker({
    format: "dddd, Do MMMM YYYY",
    locale: 'id'
  });
  $('#hourpicker').datetimepicker({
    format: "LT"
  });
  $('.selectpicker').selectpicker({
    style: 'btn-info',
    size: 4
  });


  $('.selectPostal').selectpicker({
    style: 'btn-info',
    size: 4,
    liveSearch: true
  });

// Tooggle sticky calculator
  $('#calculator-toggle').click(()=> {
    const $calculator = $('.calculator-container');
    if($calculator.hasClass('active')) {
      $calculator.removeClass('active');
      $calculator.animate({
        right: '-20%'
      }, 300);

      return;
    }
    $calculator.addClass('active');
     $calculator.animate({
      right: 0
    });
  });

  $('.panel-parolamas .panel-heading').click(function() {
      $('.panel-parolamas .panel-heading').removeClass('active');
      $(this).addClass('active');
  })
});

// Vue

const contact = new Vue({
    el: '#contact',

    components: {
    },
    beforeCreate() {
      console.log('contact created');
    },
    data: {
        contactForm: {
          name: '',
          email: '',
          phone: '',
          date: '',
          time: '',
          type: 'Asuransi Rumah'
        }
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
        let formData = new FormData();
        const {name, email, phone, date, time, type} = this.contactForm;
        formData.append('name', name);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('date', date);
        formData.append('time', time);
        formData.append('type', type);
        axios.post('/registration', formData)
        .then( (d) => {
          alert('Terimakasih.');
          this.resetForm();
        })
        .catch(error => {
            const err = error.response.data;
            alert(err.message);
        });
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
