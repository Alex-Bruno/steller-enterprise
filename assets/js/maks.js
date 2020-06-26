require('jquery-mask-plugin');
$(document).ready(function($) {
    $(".phone-mask").attr('maxlength', '16');
    $(".phone-mask").attr('minlength', '14');
    $(".phone-mask").mask('(99) 99999-99999');
});