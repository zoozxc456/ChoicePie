$(document).ready(function () {
    var gamename = "";

    $("#RankDetails button").click(function () {
        $("#RankDetails").removeClass("d-block");
    });

    // list淡入效果
    $('#GameList li').hide();
    $('#GameList li').fadeIn(600);

    // bar animate
    // $('.bar1').animate({
    //     height: "10vw"
    // });
    // $('.bar2').animate({
    //     height: "7vw"
    // });
    // $('.bar3').animate({
    //     height: "4vw"
    // });

    // GameList li click
    // $('#GameList li').click(function () {
    //     // gamename change
    //     gamename = $(this).html();
    //     console.log(gamename);
    //     $('#gn').text(gamename);

    //     // style
    //     $(this).addClass('click');
    //     $(this).siblings('li').removeClass('click');

    //     $('.bar1').css("height", "0vw");
    //     $('.bar2').css("height", "0vw");
    //     $('.bar3').css("height", "0vw");

    //     if ($(window).width() < 768) {
    //         $("#RankDetails").css("display", "block");
    //         $(".pluebtn").css("display", "none");
    //         // bar animate
    //         $('.bar1').animate({
    //             height: "15vw"
    //         });
    //         $('.bar2').animate({
    //             height: "11vw"
    //         });
    //         $('.bar3').animate({
    //             height: "8vw"
    //         });

    //     } else {
    //         $(".pluebtn").css("display", "block");
    //         // bar animate
    //         $('.bar1').animate({
    //             height: "10vw"
    //         });
    //         $('.bar2').animate({
    //             height: "7vw"
    //         });
    //         $('.bar3').animate({
    //             height: "4vw"
    //         });
    //     }

    //     //RankList li 淡入效果
    //     $('#RankList li').hide();
    //     $('#RankList li').fadeIn(600);


    // });

    $('.btn-close').click(function(){
        $(".pluebtn").css("display", "block");
        $("#RankDetails").css("display", "none");
    });

    $('.updown').click(function () {
        // $('#GameList li').hide();
        // $('#GameList li').fadeIn(600);
        // $('#GameList li').siblings('li').removeClass('click');
    });

    $('.play').click(function(){
        window.location="../gameCategory";
    });
});
$(window).resize(function () {
    if ($(window).width() >= 768) {
        $("#RankDetails").css("display", "block");
        $(".pluebtn").css("display", "block");
        $('.bar1').css("height", "10vw");
        $('.bar2').css("height", "7vw");
        $('.bar3').css("height", "4vw");
    }
    else{
        if(!($('#GameList li').hasClass('click'))){
            $("#RankDetails").css("display", "none");
            $(".pluebtn").css("display", "block");
        }else{
            $(".pluebtn").css("display", "none");
        }
        
        $('.bar1').css("height", "15vw");
        $('.bar2').css("height", "11vw");
        $('.bar3').css("height", "8vw");
    }
});
