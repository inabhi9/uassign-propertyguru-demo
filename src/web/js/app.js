$(document).on('ready pjax:success', function () {
    "use strict";

    // Select Box Replacements
    $('select').selectBox({
        mobile   : true,
        menuSpeed: 'fast'
    });

    // Checkbox Replacements
    $('input.checkbox').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass   : 'iradio_square-green',
        increaseArea : '20%'
    });

    // Favorite click
    $('.favorite').on('click', function () {
        var $this      = $(this),
            id         = $this.data('id'),
            currentFav = localStorage['fav' + id];

        if (isNaN(currentFav))
            localStorage['fav' + id] = 0;

        localStorage['fav' + id]++;

        // Changing counter
        $this.children('.count').html(localStorage['fav' + id]);
    });

    $(".favorite").each(function () {
        var $this      = $(this),
            id         = $this.data('id'),
            currentFav = localStorage['fav' + id];

        $this.children('.count').html(currentFav);
    })
});
