let btn = $("#btn-edit");
let click = 1;
let questionDiv = $("#questionContent");
let questionId = questionDiv.attr("data-id");
let tinyId = '.questionEditMce';

btn.click(function() {
   if (click % 2 !== 0) {
       questionDiv.hide();
       makeTiny();
       let html = (questionDiv.html());
       html = $.trim(html);
       tinymce.activeEditor.show();
       tinymce.activeEditor.setContent(html);
       $('#btn-edit i').text('check');
   } else if (click % 2 === 0) {
       let token = document.head.querySelector('meta[name="csrf-token"]');
       let body = tinymce.activeEditor.getContent();
       questionDiv.html(body);
       questionDiv.show();
       $('#btn-edit i').text('edit');
       tinyMCE.activeEditor.setContent('');
       tinymce.activeEditor.hide(tinyId);
       $.post('/pitanja/edit/' + questionId ,{
           body : body,
           id : questionId,
           _token : token.content
       }).done(function (data) {
           Materialize.toast('Pitanje ažurirano', 3000, 'green');
       });
   }
   click++;
});

function makeTiny() {
    tinymce.init({
        selector: '.questionEditMce',
        menubar: false,
        skin: 'lightgray',
        statusbar: false,
        autoresize_max_height: 500,
        plugins: [
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media  contextmenu paste code autoresize'
        ],
        toolbar: 'undo redo | styleselect | bold italic | bullist numlist | link code',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
}