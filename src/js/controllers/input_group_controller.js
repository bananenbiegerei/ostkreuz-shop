import { Controller } from 'stimulus';
import { useDispatch } from 'stimulus-use';

export default class extends Controller {
  static targets = ['input'];
  static values = {
    id: String,
  }

  connect(){
    useDispatch(this);
  }

  handleChange() {
    this.dispatch('usable', {id: this.idValue, usable: this.inputTargets.some(i => i.checked)})
  }
}