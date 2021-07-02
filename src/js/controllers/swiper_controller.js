import { Controller } from 'stimulus';
import Swiper, { Autoplay } from 'swiper';

Swiper.use([Autoplay]);

export default class extends Controller {
  static values = {
    autoplay: Boolean,
    loop: Boolean,
    speed: Number,
  }
  connect() {
    this.swiper = new Swiper(this.element, {
      autoplay: this.autoplay,
      loop: this.loop,
      speed: this.speed,
    });
  }

  get autoplay() {
    return this.hasAutoplayValue ? this.autoplayValue : false;
  }

  get loop() {
    return this.hasLoopValue ? this.loopValue : false;
  }

  get speed() {
    return this.hasSpeedValue ? this.speedValue : 500;
  }
}