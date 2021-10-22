import * as Turbo from '@hotwired/turbo';
import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';
import Foundation from 'foundation-sites';
import Swiper, { Navigation } from 'swiper';
import $ from "jquery";

const application = Application.start();
const context = require.context('./controllers', true, /\.js$/);
application.load(definitionsFromContext(context))


$(document).foundation();

$(document).ready(function($) {
//console.log(application, context);
  // Swipers
  const swiper = new Swiper('.single-product-swiper', {
    // Install modules
    modules: [Navigation],
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoHeight: true
  });

  const productSwiper = new Swiper('.product-swiper', {
    slidesPerView: 4,
  })
});


