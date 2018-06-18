// require('./bootstrap');
// window.Vue = require('vue');
import Vue from 'vue'
import 'materialize-css'

// Components
// import './components/users/index'
import weekly_verse from './components/verses/weekly_verse'
import poll_create_template from './components/polls/template/poll_template_create'

const vue = new Vue({
    el: '#feather',
    components: {
        'weekly-verse': weekly_verse,
        'app-poll-create-template': poll_create_template,
    },
});

// Materialize
$(document).ready(function(){
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
});
