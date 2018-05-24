// require('./bootstrap');
// window.Vue = require('vue');
import Vue from 'vue'
import 'materialize-css'

// Components
// import './components/users/index'

const vue = new Vue({
    el: '#feather',
    components: {
    },
});

$(document).ready(function(){
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
});
