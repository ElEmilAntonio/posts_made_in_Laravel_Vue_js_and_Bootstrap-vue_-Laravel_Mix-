

require('./bootstrap');

window.Vue = require('vue').default;

import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application


Vue.component('publicar-component', require('./components/PublicarComponent.vue').default);
Vue.component('comentarios-component', require('./components/ComentarioComponent.vue').default);
Vue.component('publicacion-component', require('./components/PublicacionComponent.vue').default);
Vue.component('publicaciones-component', require('./components/PublicacionesComponent.vue').default);


const app = new Vue({
    el: '#app',
});
