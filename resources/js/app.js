require('./bootstrap');

const swal = Swal = require('sweetalert2');
const moment = require('moment');
require('moment/locale/ru');
moment.locale('ru');
window.moment = moment;
// moment().format();
