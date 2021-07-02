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
    console.log('select');
  }

  change() {
    this.dispatchInputChange({id: this.id, name: `Räderanzahl: ${this.element.value}`, active: this.element.value != ''});
  }

  handleDeactivate(e) {
    if (e.detail.id == this.id) {
      this.element.value = '';
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
