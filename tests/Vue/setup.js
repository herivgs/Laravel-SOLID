require('jsdom-global')();

global.expect = require('expect')
window.Date = Date;
global.axios = require('axios');
global.Vue = require('vue');
global.bus = new Vue();
