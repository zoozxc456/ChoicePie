$(document).ready(function () {
    $('.pbtn').click(function () {
        $(this).addClass('click');
        $(this).parent().siblings().children('.pbtn').removeClass('click');
    });
});