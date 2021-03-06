
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * OAuth Axios for token requesting
 */
window.oauthAxios = window.axios.create({
    withCredentials : true,
    headers : {
        'X-CSRF-TOKEN': window.Laravel.csrfToken,
        'X-REQUESTED-WITH': 'XMLHttpRequest',
        'Accept-Language': document.getElementsByTagName('html')[0].getAttribute('lang'),
    }
});

/**
 * Api Axios
 */
window.apiAxios = window.axios.create({
    baseURL : process.env.MIX_AXIOS_API_URL,
    withCredentials : true,
    headers : {
        'X-CSRF-TOKEN': window.Laravel.csrfToken,
        'X-REQUESTED-WITH': 'XMLHttpRequest',
        'Accept-Language': document.getElementsByTagName('html')[0].getAttribute('lang'),
    }
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// No pusher anymore : Redis instead (socket.io)

/*
import Pusher from 'pusher-js';
import Echo from "laravel-echo";

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: window.Laravel.pusher.appKey,
    cluster: window.Laravel.pusher.cluster,
    encrypted: window.Laravel.pusher.encrypted,
});
*/

import Echo from "laravel-echo";

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':' + process.env.MIX_LARAVEL_ECHO_SERVER_PORT
});

/**
 * Vuex Store
 */
import store from './store';
window.store = store;

/**
 * Gravatar for users
 */
import Gravatar from 'vue-gravatar';
Vue.component('v-gravatar', Gravatar);

/**
 * Vue i18n
 */

import VueI18n from 'vue-i18n';

Vue.use(VueI18n);
Vue.config.lang = document.getElementsByTagName('html')[0].getAttribute('lang');

import locales from './locales';

var i18n = new VueI18n({
    locale: Vue.config.lang,
    messages : locales
})

// Set moment.js locale
window.moment.locale(Vue.config.lang);

// Set bootstrap-datepicker locale
$.fn.datepicker.defaults.language = Vue.config.lang;

window.changeLang = function(lang) {
    // Update document lang
    document.getElementsByTagName('html')[0].setAttribute('lang', lang);

    // Update Vue-I18n lang
    window.Dashboard.$i18n.locale = lang;

    // Update momentjs lang
    window.moment.locale(lang);

    // Update datepicket lang
    $.fn.datepicker.defaults.language = lang;

    /**
     * Recreate OAuth Axios for token requesting
     */
    window.oauthAxios = window.axios.create({
        withCredentials : true,
        headers : {
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
            'X-REQUESTED-WITH': 'XMLHttpRequest',
            'Accept-Language': lang,
        }
    });

    /**
     * Recreate Api Axios
     */
    window.apiAxios = window.axios.create({
        baseURL : process.env.MIX_AXIOS_API_URL,
        withCredentials : true,
        headers : {
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
            'X-REQUESTED-WITH': 'XMLHttpRequest',
            'Accept-Language': lang,
        }
    });
};

/**
 * Vue router
 */

import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Import the actual routes, aliases, ...
import routes from './routes';

// Create our router object and set options on it
const DashboardRouter = new VueRouter({
    mode: 'hash',
    routes: routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const DashboardVue = Vue.extend(require('./dashboard.vue'));

window.Dashboard = new DashboardVue({
    i18n : i18n,
    router : DashboardRouter,
    store : store,
}).$mount('#dashboard');

/**
 * Handle date rendering with local browser timezone
 */

window.Vue.prototype.momentLocalDate = (date) => {
    return moment.utc(date, 'YYYY-MM-DD H:mm:ss').local().format(window.Dashboard.$i18n.t('common.datetime_format'));
};

window.Vue.prototype.momentFromNow = (date) => {
    return moment.utc(date, 'YYYY-MM-DD H:mm:ss').local().fromNow();
};