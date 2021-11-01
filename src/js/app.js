//import * as Turbo from '@hotwired/turbo';
import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';
import Foundation from 'foundation-sites';
import Swiper, { Navigation, Pagination, FreeMode, Autoplay, Parallax, EffectFade } from 'swiper';
import $ from "jquery";

import FormController from './controllers/form_controller';

const application = Application.start();
//const context = require.context('./controllers', true, /\.js$/);
//application.load(definitionsFromContext(context))
//application.register('form', FormController);

Swiper.use([Navigation, Pagination, Autoplay, EffectFade, FreeMode]);

$(document).ready(function($) {
  $(document).foundation();

  //console.log(application, context);

  // Swipers
  const swiper = new Swiper('.single-product-swiper', {
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoHeight: true
  });
  
  const heroSwiper = new Swiper('.hero-swiper', {
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoHeight: true
  });

  const productSwiper = new Swiper('.product-swiper', {
    freeMode: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 4,
      },
    },
    slidesPerView: 4,
    spaceBetween: 60,
  })
});


