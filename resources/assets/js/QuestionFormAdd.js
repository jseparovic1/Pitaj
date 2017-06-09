
$('.chips').material_chip();
$('.chips-placeholder').material_chip({
    placeholder: '+Tag'
});

let form = $('#questionFormSubmit');
form.click(function (event) {
    let titleDiv = $('#questionTitle');
    let bodyDiv = $('#questionBody');
    let chipsDiv = $('#chipsError');

    let title = titleDiv.val();
    let body = $('#questionBody').val();

    chips = $('.chips').material_chip('data');

    console.log("body: " + body);
    console.log("title: " + title);
    console.log(chips);

    if (title === '' ) {
        $('label[for="questionTitle"]').attr('data-error', 'Polje je obavezno');
        titleDiv.removeClass("valid");
        titleDiv.addClass("invalid");
        return "question empty";
    }
    if (chips.length < 1) {
        $('#chipsError').attr('data-error', 'Polje je obavezno');
        chipsDiv.removeClass("valid");
        chipsDiv.addClass("invalid");
        return "tagEmpty";
    }

    chips = JSON.stringify(chips);
    $.post('/pitaj', {
        title : title,
        body : body,
        tags : chips,
        _token : token.value
    }).done(function (questionId) {
        window.location.href = "/pitanja/" + questionId;
    });
});