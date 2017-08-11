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

tinymce.init({
    selector: '.tinyTextarea',
    menubar: false,
    skin: 'lightgray',
    statusbar: false,
    plugins: [
        'advlist autolink lists link charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media  contextmenu paste code'
    ],
    toolbar: 'undo redo | styleselect | bold italic | bullist numlist | link code',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
});