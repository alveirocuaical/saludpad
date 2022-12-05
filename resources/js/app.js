/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

$(document).ready(function() {
        
     $('#id_paciente').select2({
         placeholder: 'Seleccione una paciente'
     });
});

$('#servicio').change(function(){
    let s = document.getElementById('servicio').value;
    
    if (s==1||s==2||s==3||s==4||s==5||s==6||s==7) {
        $('#ocultos').show(400);
        //$("#docs")[0].reset();
        
    }else{
        $('#ocultos').hide(400);
        let p = document.getElementById('id');
        let n = document.getElementById('nombre');
        $("#id_paciente").val('0');
        let f = document.getElementById('fecha');
        let v = document.getElementById('valor');        
        
        p.value = '0000000';
        n.value='documentos';       
        f.value= '2021-10-14' ;
        v.value='10000';
       
        
    }
    
})

