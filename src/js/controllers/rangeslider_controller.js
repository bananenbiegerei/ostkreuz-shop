import { Controller } from 'stimulus';
import noUiSlider from 'nouislider';
import { useDispatch } from 'stimulus-use';
import { useInput } from '../mixins/useInput';

export default class extends Controller {
  static targets = ['slider', 'display']
  static values = {
    id: String,
    name: String,
    start: Array,
    step: Number,
    rangemin: Number,
    rangemax: Number,
  }

  initialize() {
    this.active = false;
  }

  connect() {
    useDispatch(this);
    useInput(this);
    this.slider = noUiSlider.create(this.sliderTarget, {
      start: this.startValue,
      step: this.stepValue,
      range: {
        'min': this.rangeminValue,
        'max': this.rangemaxValue,
      },
      format: {
        to: function(value) {
          return parseInt(value);
        },
        from: function(value) {
          return parseInt(value);
        }
      }
    })

    this.disabled = true;

    this.slider.on('update', (values, handle) => this.updateDisplay(values, handle));
    this.slider.on('update', (e) => this.sendChange(e));
    this.slider.on('start', (e) => this.enable(e), {
      once: true,
    });
  }

  updateDisplay(values, handle) {
    this.displayTargets[handle].value = values[handle];
  }

  sendChange(e) {
    this.dispatchInputChange({id: this.id, name: this.name, active: this.active});
  }

  enable(e) {
    this.displayTargets.forEach(d => {d.removeAttribute('disabled')});

    // TODO: WTF
    this.active = true;
    this.disabled = false;
  }

  handleDeactivate(e) {
    if (e.detail.id == this.id) {
      this.slider.set(this.startValue);

      // TODO: deactivate enbale, naming makes no sense
      this.enable();
    }
  }

  checkDisabled(e) {
    if (e.detail.id == this.id) {
      this.disabled = !e.detail.usable;
    }
  }

  get name() {
    return this.nameValue;
  }

  get id() {
    return this.idValue;
  }

  get disabled() {
    return this.sliderTarget.getAttribute('disabled');
  }

  set disabled(value) {
    if (value){
      this.sliderTarget.setAttribute('disabled', 'true');
    } else {
      this.sliderTarget.removeAttribute('disabled');
    }
  }
}