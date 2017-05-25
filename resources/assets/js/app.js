$('.chips').material_chip();

$('.chips-placeholder').material_chip({
    placeholder: 'Upišite tag',
    secondaryPlaceholder: '+Tag',
});

$('.chips').on('chip.add', function(e, chip){
    console.log(chip);
});

