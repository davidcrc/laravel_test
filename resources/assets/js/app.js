
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Video 38: hay q añadir el componente a la lista de componentes
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('responses', require('./components/Responses.vue'));

// Video 41: añadido a la lista, las notificaciones
Vue.component('notifications', require('./components/Notifications.vue'));


const app = new Vue({
    el: '#app'
});
