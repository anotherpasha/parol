
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
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
    format: "dddd, MMMM Do YYYY"
  });
  $('#hourpicker').datetimepicker({
    format: "LT"
  });
  $('.selectpicker').selectpicker({
    style: 'btn-info',
    size: 4
  });


// Tooggle sticky calculator
  $('#calculator-toggle').click(()=> {
    const $calculator = $('.calculator-container');
    if($calculator.hasClass('active')) {
      $calculator.removeClass('active');
       $calculator.animate({
        right: 0
      });
      return;
    }
    $calculator.addClass('active');
    $calculator.animate({
      right: '-20%'
    }, 300);
  })
});
