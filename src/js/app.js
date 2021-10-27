//import * as Turbo from '@hotwired/turbo';
import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';
import Foundation from 'foundation-sites';
import Swiper, { Navigation } from 'swiper';
import $ from "jquery";

import FormController from './controllers/form_controller';

const application = Application.start();
//const context = require.context('./controllers', true, /\.js$/);
//application.load(definitionsFromContext(context))
//application.register('form', FormController);



$(document).ready(function($) {
  $(document).foundation();

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


