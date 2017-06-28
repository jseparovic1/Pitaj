let btn = $("#btn-edit");
let click = 1;
let questionDiv = $("#questionContent");
let questionEdit = $("#questionEdit");
let edited;
let questionId = questionDiv.attr("data-id");

btn.click(function() {
   if (click % 2 !== 0) {
       questionDiv.hide();
       questionEdit.text(questionDiv.text().trim());
       questionEdit.show();

       $('#btn-edit i').text('check');
   } else if (click % 2 === 0) {
       let token = document.head.querySelector('meta[name="csrf-token"]');
       let edited = questionEdit.val();
       questionDiv.text(edited);
       $("#questionContent").html(edited);
       questionEdit.hide();
       questionDiv.show();
       $('#btn-edit i').text('edit');

       $.post('/pitanja/edit/' + questionId ,{
           body : edited,
           id : questionId,
           _token : token.content
       }).done(function (data) {
          console.log(data);
       });
   }
   click++;
});