import { Controller } from 'stimulus';
import { useDispatch } from 'stimulus-use';

export default class extends Controller {
  static values = {
    id: String,
  }

  connect() {
    useDispatch(this);
  }

  handleInputChange(e) {
    if (this.id == e.detail.id && !e.detail.active) {
      this.element.remove();
    }
  }

  deactivate() {
    this.dispatch('deactivate', {id: this.id});
    this.element.remove();
  }

  get id() {
    return this.idValue;
  }
}