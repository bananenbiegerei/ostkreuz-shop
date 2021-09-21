import { Controller } from "stimulus";
import "form-request-submit-polyfill";
import { useDebounce } from "stimulus-use";
//import { create } from "./active_filter_controller";

export default class extends Controller {
  static targets = [ 'submit', 'activeinputs' ];
  static debounces = [ 'submit' ];

  connect() {
    useDebounce(this);
    this.activeInputs = [];
    console.log('form');

    this.removeSubmitButton();
  }

  submit() {
    console.log("SUBMIT");
    this.element.requestSubmit();
  }

  addActiveInput(e) {
    const newActiveInput = create(e.detail.id, e.detail.label, this);
    this.activeInputs.push({
      id: e.detail.id,
      label: e.detail.label,
      el: newActiveInput,
    });
    this.activeinputsTarget.appendChild(newActiveInput); 
  }

  removeActiveInput(e) {
    const delEl = this.activeInputs.find(item => item.id == e.detail.id);
    this.activeInputs = this.activeInputs.filter(item => item.id !== e.detail.id);
    delEl.el.remove();
  }

  removeSubmitButton() {
    console.log('remove submit');
    if (this.hasSubmitTarget) {
      console.log('IF remove submit');
      this.submitTarget.remove();
    }
  }
}
