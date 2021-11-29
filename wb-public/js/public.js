$(document).ready(function () {
    // aside的數字
    let cnt_Unreviewed = 0;
    $.ajax({
        type: "GET",
        data: {
            'origin': 'wb-index',
        },
        dataType: "json",
        url: "../bin/Models/Game.php",
        success: function (res) {
            cnt_Unreviewed += parseInt(res.Unreviewed);
            $.ajax({
                type: "GET",
                data: {
                    'origin': 'wb-index',
                },
                dataType: "json",
                url: "../bin/Models/Report.php",
                success: function (response) {
                    cnt_Unreviewed += parseInt(response.Unreviewed);
                    $('#UnreviewedNum').text(cnt_Unreviewed > 99 ? '99+' : cnt_Unreviewed);
                    // console.log(cnt_Unreviewed);
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            });
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });

    document.addEventListener('click', function (event) {
        // 右上Settings 點擊時展開，點其他地方時關閉
        for (let i = 0; i < event.path.length - 2; i++) {
            if (event.path[i].classList.contains("Settings")) {
                $('#signout').collapse('toggle');
                break;
            } else if ((i == event.path.length - 2 - 1) && ($('#signout')[0].classList.contains('show'))) {
                $('#signout').collapse('toggle');
            }
        }

    }, true);

    $("#logo-content").click(function () {
        location.href = "../wb-index";
    });

    $("#btn-menu").click(function () {
        // console.log(document.getElementsByClassName("page-sidebar")[0].classList);
        if (document.getElementsByClassName("page-sidebar")[0].classList.contains("navShow")) {
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
    
    $(window).resize(function () {
        if ($(window).width() >= 1100) {
            $("nav").removeClass("navShow");
            $("#aside").removeClass("navShow");
        }
    });

    $(".setbtn").click(function () {
        $("#signout").collapse('toggle');

    });
    $("#signout").click(function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                "origin": "signout",
                "event": "signout"
            },
            url: "../bin/models/member.php",
            success: function (res) {
                location.href = "../index";
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        })
    });
});