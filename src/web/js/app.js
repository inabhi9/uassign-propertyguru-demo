jQuery(document).ready(function ($) {


});


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
});
