import { Controller } from 'stimulus'
import Cookies from 'js-cookie'

export default class extends Controller {
  static values = {
    isdark: Boolean,
  }

  initialize() {
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
      this.isdarkValue = e.matches
      this.writeCookie()
    })
  }

  connect() {
    console.log('darkmode');
  }

  toggle() {
    console.log('toggle', this.isdarkValue);
    this.isdarkValue = !this.isdarkValue
    this.writeCookie()
  }

  readSystemPreference() {
    return window.matchMedia('(prefers-color-scheme: dark)').matches
  }

  writeCookie() {
    if(Cookies.get('cmplz_functional') == 'allow') {
      Cookies.set('isdark', this.isdarkValue)
      return true
    } else {
      return false
    }
  }
}