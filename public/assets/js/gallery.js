UIkit.tooltip('.galleries a', 'show');
$('.repeater').repeater({
    isFirstItemUndeletable: true,
    show: function () {
        $(this).slideDown('fast');
        UIkit.tooltip('.galleries a', 'show');
        UIkit.icon('.uk-icon','show');
    },
    hide: function (deleteElement) {
        UIkit.modal.confirm('Are you sure? This group will be deleted.').then(function() {
            $(this).slideUp('fast',deleteElement);
        }, function () {
        });
    }
});
