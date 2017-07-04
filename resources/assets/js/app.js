/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

//load project js
require('./QuestionFormAdd');
require('./QuestionEdit');

$( document ).ready(function(){
    $(".button-collapse").sideNav();
});
