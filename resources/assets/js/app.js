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
    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            hover: true,
            gutter: 0,
            belowOrigin: true,
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false
        }
    );
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

//Real time search
$("#search-box" ).keyup(function() {
    if (this.value === '') {
        $('#dropDown-data').html('');
        return;
    }

    axios.get('/api/questions?query='+ this.value)
        .then(function (response) {
            let results = response.data;
            console.log(results.length);
            if (results.length === 0) {
                let item = document.createElement('a');
                item.href = '/pitaj';
                item.innerHTML = "Nema pitnaja za traženi pojam.";
                item.className ='collection-item';
                $('#dropDown-data').html(item);
            } else {
                let items = [];
                results.forEach(function (result) {
                    let item = document.createElement('a');
                    item.innerHTML = result.title;
                    item.href = '/pitanja/' + result.id;
                    item.className ='collection-item';
                    items.push(item);
                });
                $('#dropDown-data').html(items);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
});

$("#app").click(function () {
    $('#dropDown-data').html('');
    $('#search-box').val('');
});
