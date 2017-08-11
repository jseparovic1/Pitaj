
$('.chips').material_chip();
$(document).ready(function() {
    Materialize.updateTextFields();
});

$('.chips-placeholder').material_chip({
    placeholder: 'Dodajte tag',
    secondaryPlaceholder: '+Tag',
});

let form = $('#questionFormSubmit');
form.click(function () {
    let titleDiv = $('#questionTitle');
    let chipsError = $('#tagError');
    let title = titleDiv.val();
    let body = tinymce.activeEditor.getContent({format : 'raw'});
    let chips = $('.chips').material_chip('data');

    if (title === '' || title.length > 2000) {
        $('label[for="questionTitle"]').attr('data-error', 'Polje je obavezno');
        titleDiv.removeClass("valid");
        titleDiv.addClass("invalid");
    }

    if (chips.length < 1) {
        chipsError.text('Tag je obavezan');
        chipsError.removeAttr('hidden');
    } else {
        chipsError.hide();
    }

    if (title !== '' && chips.length > 0) {
        chips = JSON.stringify(chips);
        $.post('/pitaj', {
            title : title,
            body : body,
            tags : chips,
            _token : token.value
        }).done(function (data) {
            if (!isNaN(parseFloat(data)) && isFinite(data)) {
                window.location.href = "/pitanja/" + data;
            }
        });
    }
});