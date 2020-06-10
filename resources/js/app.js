require('./bootstrap');

const swal = Swal = require('sweetalert2');
const moment = require('moment');
require('moment/locale/ru');
moment.locale('ru');
window.moment = moment;
// moment().format();

const noUiSlider = require('nouislider/distribute/nouislider.min');
window.noUiSlider = noUiSlider;

const wNumb = require('wnumb/wNumb.min');
window.wNumb = wNumb;

const TouchSpin = require('bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min');
window.TouchSpin = TouchSpin;
