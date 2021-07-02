import * as Turbo from '@hotwired/turbo';
import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';
import Foundation from 'foundation-sites';
// core version + navigation, pagination modules:
// import Swiper, { Navigation, Pagination } from 'swiper';
import $ from "jquery";
// window.$ = $;
// configure Swiper to use modules
// Swiper.use([Navigation, Pagination]);

const application = Application.start();
const context = require.context('./controllers', true, /\.js$./);
application.load(definitionsFromContext(context))


$(document).foundation();

$(document).ready(function($) {
console.log(application, context);

  // Initialize new Swiper on each .swiper-container
  // $('.swiper-container').each(function() {
  //   new Swiper(this, {
  //     pagination: {
  //       el: $(this).find('.swiper-pagination'),
  //       dynamicBullets: false
  //     },
  //     navigation: {
  //       nextEl: $(this).find('.swiper-button-next'),
  //       prevEl: $(this).find('.swiper-button-prev')
  //     },
  //     spaceBetween: 30,
  //     autoHeight: true,
  //     slidesPerView: 3,
  //     loop: false
  //   })
  // })
  // var swiper = new Swiper('.swiper-container', {
  //   pagination: {
  //     el: '.swiper-pagination',
  //     type: 'fraction',
  //   },
  //   navigation: {
  //     nextEl: '.swiper-button-next',
  //     prevEl: '.swiper-button-prev',
  //   },
  // });
});
