
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'eonasdan-bootstrap-datetimepicker';
import 'bootstrap-select';
import query from 'query-string';
// import jqueryMas from 'jquery-mask-plugin';
// import select2 from 'select2';
// import 'select2/dist/css/select2.min.css';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(document).ready(()=> {
  const $viewport = $(window).width();

  $('.carousel').carousel();
  $('#datepicker').datetimepicker({
    format: "dddd, Do MMMM YYYY",
    locale: 'id'
  });
  $('#hourpicker').datetimepicker({
    format: "LT",
    keepOpen: true
  });
  $('.selectpicker').selectpicker({
    style: 'btn-info',
    size: 4
  });

  $('.image-slider').each(function(i, e) {
      $(e).css(
        'background-image' ,`url(${$viewport > 740 ? $(e).attr('data-image-desktop') : $(e).attr('data-image-mobile')})`
      );
  })


  if(!localStorage.quiz) {
    // $('#modal-quiz').modal('show');
  }
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

  $('.toggle-menu').click(function() {
    var $menu = $('#menu-mobile');
    if($menu.hasClass('active')) {
      $menu.removeClass('active');
      $menu.animate({
        right: '-100%'
      }, 300);

      return;
    }
    $menu.addClass('active');
     $menu.animate({
      right: "0"
    });
  });
  $('.close-toggle').click(function() {
    var $menu = $('#menu-mobile');
    $menu.removeClass('active');
    $menu.animate({
      right: '-100%'
    }, 300);
  });

  $('.panel-parolamas .panel-heading').click(function() {
      $('.panel-parolamas .panel-heading').removeClass('active');
      $(this).addClass('active');
  });

  $('.to-section').click(function() {
      const to = $(this).attr('data-target-to');
      const offset  = $(`#${to}`).offset().top;
      $('html, body').animate({scrollTop: offset}, 2000)  ;
  });

  const params = query.parse(window.location.search);
  const tab    = $('.tab-pane');
  if(params.page) {
      tab.removeClass('active');
      $(`.nav-tabs a`).parents().removeClass('active');
      $(`#${params.page}`).addClass('active');
      $(`.nav-tabs a[href="#${params.page}"]`).parents().addClass('active');
  }

});
