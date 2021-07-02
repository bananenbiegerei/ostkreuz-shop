import { Controller } from "stimulus";
import { useDispatch } from "stimulus-use";

export default class extends Controller {
  static targets = ['reset'];

  connect() {
    useDispatch(this);
    this.activeIds = [];
  } 

  handleInputChange(e) {
    if (e.detail.active) {
      this.add(e);
    } else {
      this.removeActiveId(e);
    }
  }

  add(e) {
    const inActiveIds = this.activeIds.find(a => a.id == e.detail.id);
    if (!inActiveIds) {
      this.activeIds.push({ id: e.detail.id, name: e.detail.name });
    } else if (inActiveIds.name != e.detail.name) {
      this.activeIds = this.activeIds.filter(a => a.id != e.detail.id);
      this.activeIds.push({ id: e.detail.id, name: e.detail.name });
    }

    this.render();
  }

  removeActiveId(e) {
    this.activeIds = this.activeIds.filter(a => {
      return a.id != e.detail.id;
    })

    this.render();
  }

  render() {
    [... this.element.childNodes].forEach(child => {
      if (child.classList == undefined) {
        this.element.removeChild(child);
      } else if (!child.classList.contains('active-filter--reset')) {
        this.element.removeChild(child);
      }
    });

    const fragment = new DocumentFragment();
    this.activeIds.forEach(element => {
      fragment.appendChild(this.createFilterTag(element.name, element.id));
    });

    this.element.appendChild(fragment);
    this.displayReset();
  }

  reset() {
    this.dispatch('reset');
  }

  displayReset() {
    if (this.activeIds.length > 1) {
      this.resetTarget.classList.add('active-filter--reset--active');
    } else {
      this.resetTarget.classList.remove('active-filter--reset--active');
    }
  }

  createFilterTag(name, id) {
    const newActiveInput = document.createElement('button');
    newActiveInput.classList.add('active-filter');
    newActiveInput.innerText = name;
    newActiveInput.setAttribute('data-controller', 'active-filter');
    newActiveInput.setAttribute('data-active-filter-id-value', id);
    newActiveInput.setAttribute('data-action', 'click->active-filter#deactivate input:change@window->active-filter#handleInputChange active-filters:reset@window->active-filter#deactivate');

    return newActiveInput;
  }

  get inputControllers() {
    return [... document.querySelectorAll('[data-controller~="input"')].map(el => el.input);
  }
}
