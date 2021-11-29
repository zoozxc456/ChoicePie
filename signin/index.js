$(document).ready(function () {
    $('input').focusin(function () {
        $(this).attr("placeholder", "");
        $(this).css("outline", "none");
        $(this).animate({ opacity: 0.7, height: "+=1vh" });

    });
    $('input').focusout(function () {
        let txt=$(this).parent().siblings("div").find("label")[0].innerHTML;
        // console.log(txt);
        $(this).attr("placeholder", $(this).val() ? "" : "Your " + txt);
        $(this).animate({ opacity: 1, height: "-=1vh" });
    });

    $('#preArrow').click(function () {
        $('#carousel-content,#carousel-content *').fadeOut(1000);
        $('#carousel-content,#carousel-content *').fadeIn(1500);
    });

    $('#nextArrow').click(function () {
        $('#carousel-content,#carousel-content *').stop().fadeOut(500);
        $('#carousel-content,#carousel-content *').fadeIn(1000);
    });
});