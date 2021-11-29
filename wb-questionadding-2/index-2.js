$(document).ready(function() {
    // $('.questionadding2').addClass('now')
    let p = "";
    let q, qno, opt1, opt2, opt3, opt4 = "";
    // 設定opt答案
    $('.article-btn>.btn').click(function() {
        console.log("123");
        if ($(this).parent().siblings().children('.btn').hasClass('click')) {
            $(this).addClass('click');
            $(this).parent().siblings().children('.btn').removeClass('click');
        } else {
            $(this).addClass('click');
        }

    });

    $('#Q2-alert .btn-close').click(function () {
        $('#Q2-alert').hide();
    });

    // edit & add modal
    // $(".draw").click(function() {
    //     q = $(this).parent().siblings().children('.h3').html();
    //     qno = $(this).parent().siblings().children('.h2').html();
    //     opt1 = $(this).parent().parent().siblings().children().children('.opt1').html();
    //     opt2 = $(this).parent().parent().siblings().children().children('.opt2').html();
    //     opt3 = $(this).parent().parent().siblings().children().children('.opt3').html();
    //     opt4 = $(this).parent().parent().siblings().children().children('.opt4').html();

    //     $("#header-qno").text(qno);
    //     document.getElementById("form-q").value = q;
    //     document.getElementById("form-opt1").value = opt1;
    //     document.getElementById("form-opt2").value = opt2;
    //     document.getElementById("form-opt3").value = opt3;
    //     document.getElementById("form-opt4").value = opt4;

    //     $("#myModal1").modal();
    // });
});