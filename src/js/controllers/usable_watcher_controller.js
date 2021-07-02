import { Controller } from 'stimulus';
import { useDispatch } from 'stimulus-use';

export default class extends Controller {
  static values = {
    id: String,
  }

  connect(){
    useDispatch(this);
  }

  sendUsable() {
    this.dispatch('usable', {id: this.idValue })
  }

  sendDisable() {
    this.dispatch('disable', {id: this.idValue })
  }
}