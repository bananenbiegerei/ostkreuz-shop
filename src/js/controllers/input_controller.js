import { Controller } from "stimulus";
import { useInput } from '../mixins/useInput';

export default class extends Controller { 
  static values = {
    name: String,
    id: String,
  }

  connect() {
    useInput(this);
    this.element[this.identifier] = this;
  }

  toggle() {
    this.dispatchInputChange({id: this.id, name: this.name, active: this.element.checked});
  }

  handleDeactivate(e) {
    if (e.detail.id == this.id) {
      this.element.checked = false;
      this.dispatchInputChange({id: this.id, name: this.name, active: this.element.checked});
    }
  }

  get name() {
    return this.nameValue;
  }

  get id() {
    return this.idValue;
  }
}
