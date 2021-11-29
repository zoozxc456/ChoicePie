$(document).ready(function () {
    const signinTxt = $('#signin').text();
    //plushover
    // $(function () { $('.tooltip-toggle').tooltip('toggle');});
    //  $('data-mdb-toggle="tooltip"').tooltip();
    $('.pluebtn').click(function () {
        if ($.trim($('#signin').text()) == 'Sign in') {
            window.location = "/ChoicePie/signin";
        } else {
            window.location = "/ChoicePie/profile";
        }

    });
    $('#logo').click(function () {
        location.href = "../index";
    });

    $("#btn-menu").click(function () {
        // console.log(document.getElementsByTagName("nav")[0].classList);
        if (document.getElementsByTagName("nav")[0].classList.contains("navShow")) {
            $("nav").removeClass("navShow");
            $("#aside").removeClass("navShow");
            // $(".wrap").removeClass("wrapShow");
            //     $("body").addClass("wrap");
        } else {
            $("nav").addClass("navShow");
            $("#aside").addClass("navShow");
            // $(".wrap").addClass("wrapShow");
        }

    });
    // pluebtn color
    if ($.trim($('#signin').text()) != "Sign in") {
        // console.log($.trim($('#signin').text()));
        $("#signin").attr("data-bs-toggle", "modal");
        $("#signin").attr("data-bs-target", "#signoutModal");
        $(".pluebtn").attr("style", "");
        $(".pluebtn").css("display", "block");
    } else {
        // $("#signin").attr("data-bs-toggle", "");
        // $("#signin").attr("data-bs-target", "");
        $(".pluebtn").attr("style", "-webkit-filter:grayscale(1)");
        $(".pluebtn").css("display", "block");
    }

    $('#signin').mouseenter(function () {
        if ($.trim($(this).text()) != "Sign in") {
            $(this).text("Sign out");
        }
    });
    $('#signin').mouseleave(function () {
        if ($.trim($(this).text()) == "Sign out") {
            $(this).text(signinTxt);
        }
    });
    $('#signin').click(function () {
        if ($.trim($(this).text()) == "Sign in") {
            location.href = "../signin";
        }
    });
    $("#signoutyes").click(function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                "origin": "signout"
            },
            url: "../bin/Models/Member.php",
            success: function (data) {
                $('#signin').text("Sign in");
                window.location = "/ChoicePie/signin";
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    });
    $(window).resize(function () {
        if ($(window).width() >= 1400) {
            $("nav").removeClass("navShow");
            $("#aside").removeClass("navShow");
        }
    });

    $('.fa-facebook').click(function () {
        window.location = "https://www.facebook.com/";
    });
    $('.fa-twitter ').click(function () {
        window.location = "https://twitter.com/home";
    });
    $('.fa-google').click(function () {
        window.location = "https://mail.google.com/mail/u/0/#inbox";
    });
    $('.fa-instagram').click(function () {
        window.location = "https://www.instagram.com/";
    });
    $('.fa-snapchat-ghost').click(function () {
        window.location = "https://www.snapchat.com/";
    });
    $('.fa-skype').click(function () {
        window.location = "https://www.skype.com/zh-Hant/";
    });

});