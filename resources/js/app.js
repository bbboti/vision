
window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

let routes = [{
    path: '/clientes',
    component: require('./components/clientes/Clientes.vue').default,
    meta: {
        title: 'Clientes'
    }
},
{
    path: '/administracion/companias',
    component: require('./components/administracion/companias/Companias.vue').default,
    meta: {
        title: 'Compañias'
    }
},
{
    path: '/administracion/companias/create',
    component: require('./components/administracion/companias/Create.vue').default,
    meta: {
        title: 'Compañias'
    }
},
{
    path: '/administracion/companias/:nombre/edit',
    component: require('./components/administracion/companias/Edit.vue').default,
    meta: {
        title: 'Compañias'
    }
},
{
    path: '/administracion/organizadores',
    component: require('./components/administracion/Organizadores.vue').default,
    meta: {
        title: 'Organizadores'
    }
},
{
    path: '/administracion/productores',
    component: require('./components/administracion/Productores.vue').default,
    meta: {
        title: 'Productores'
    }
},
{
    path: '/polizas/automotor',
    component: require('./components/polizas/Automotor.vue').default,
    meta: {
        title: 'Polizas Automotor'
    }
},
{
    path: '/polizas/create',
    component: require('./components/polizas/Create.vue').default,
    meta: {
        title: 'Polizas Automotor'
    }
},
{
    path: '/polizas/automotor/:numero_solicitud/edit',
    component: require('./components/polizas/Edit.vue').default,
    meta: {
        title: 'Polizas Automotor'
        }
    }]
    

const app = new Vue({
    el: '#app'
});
