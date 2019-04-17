
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('curr-date', require('./components/curr-date.vue').default);

Vue.component('curr-time', require('./components/curr-time.vue').default);

Vue.component('count-down', require('./components/count-down.vue').default);

Vue.component('tic-tac-toe', require('./components/tic-tac-toe.vue').default);
Vue.component('tile', require('./components/tile.vue').default);

Vue.component('calculator', require('./components/calculator.vue').default);
Vue.component('calculatorButton', require('./components/calculatorButton.vue').default);

Vue.component('to-dos', require('./components/to-dos.vue').default);

Vue.component('mind-reader', require('./components/mind-reader.vue').default);

Vue.component('weather-app', require('./components/weather-app.vue').default);

Vue.component('food-card', require('./components/food-card.vue').default);
Vue.component('accordion', require('./components/accordion.vue').default);
Vue.component('accordionPanel', require('./components/accordion-panel.vue').default);

Vue.config.devtools = true;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
