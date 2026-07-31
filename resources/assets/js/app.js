
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('escritorio', require('./components/Escritorio.vue'));
Vue.component('padron', require('./components/Padron.vue'));
Vue.component('usuarios_password', require('./components/Usuarios_Password.vue'));
Vue.component('users', require('./components/Users.vue'));
Vue.component('notas', require('./components/Notas.vue'));
Vue.component('punteo', require('./components/Punteo.vue'));
Vue.component('comida', require('./components/Comida.vue'));
Vue.component('conteo', require('./components/Conteo.vue'));
Vue.component('graficos', require('./components/Graficos.vue'));
Vue.component('conteo_fiscal', require('./components/Conteo_Fiscal.vue'));
Vue.component('combustible', require('./components/Combustible.vue'));

const app = new Vue({
    el: '#app',
    data :{
    	menu : 0,
    	notifications: [],
		ruta: document.head.querySelector('meta[name="app-url"]').content
		//ruta: 'http://192.168.1.45/elecciones2025/public'
		//ruta: 'http://pronetsiweb.serveftp.com:8088/elecciones2023_balotage/public'
    	//ruta: ''
    },
    created(){
    	let me = this;
    	/*axios.post('/notification/get').then(function(response){
    		//console.log(response.data);
    		me.notifications = response.data;
    	}).catch(function(error){
    		console.log(error);
    	});*/

        var userId = $('meta[name="userId"]').attr('content');

        /*Echo.private('App.User.'+userId).notification((notification) =>{
            me.notifications.unshift(notification) ;
        });*/
    }
});
