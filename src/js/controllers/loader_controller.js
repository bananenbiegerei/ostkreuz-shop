import { Controller } from 'stimulus';

export default class extends Controller {
  static classes = ['loading'];

  loading(){
    this.element.classList.add(this.loadingClass);
  }

  finished(){
    this.element.classList.remove(this.loadingClass);
  }
}