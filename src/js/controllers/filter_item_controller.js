import { Controller } from 'stimulus';
import { gsap } from 'gsap';
import { fullConfig } from '../tailwindhelpers';

export default class extends Controller {
  static targets = ['title', 'content'];

  initialize() {
    this.open = true;
  }

  connect() {
    this.closeContent();
  }

  closeContent() {
    gsap.to(this.contentTarget, {
      duration: .2,
      height: 0,
      marginTop: 0,
      overflow: 'hidden',
    });
    this.titleTarget.classList.remove('filter-item__title--open');

    this.open = false;
  }

  openContent() {
    gsap.to(this.contentTarget, {
      duration: .2,
      height: 'auto',
      marginTop: fullConfig.theme.spacing[3],
      overflow: 'initial',
    })

    this.titleTarget.classList.add('filter-item__title--open');
    this.open = true;
  }

  toggle() {
    if (this.open) {
      this.closeContent();
    } else {
      this.openContent();
    }
  }
}