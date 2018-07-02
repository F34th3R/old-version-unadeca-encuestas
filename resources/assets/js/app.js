// window.Vue = require('vue');
// require('./bootstrap');
import Vue from 'vue'
import 'materialize-css'

// Components
import weekly_verse from './components/verses/weekly_verse'
import c_poll_template from './components/polls/template/poll_template_create'
import myTest from './components/polls/template/selects/select_quarters'

const vue = new Vue({
    el: '#feather',
    components: {
        'weekly-verse': weekly_verse,
        'app-create-poll-template': c_poll_template,
        'test-vue':myTest
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


