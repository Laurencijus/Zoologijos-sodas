
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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});


$(document).on("change", "#specie_id", function () {
    console.log("lala");
});


$(document).on("change", "#specie_id", function () {
    var id = $(this).val();
    axios.post("", { id: id })
        .then((response) => {
            $("#manager_id").empty();
            _.forEach(response.data.managers, function (value) {
                console.log(value);
                $('<option value="' + value.id + '">' + value.name + '</option>').appendTo("#manager_id");


            });
            $("#manager_id").show();
            //console.log(response.data.managers)
        }).catch((error) => {
            console.log(error.response.data)
        });
});
