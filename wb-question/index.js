$(document).ready(function() {
    // list淡入效果
    // $('.lglist ul').hide().fadeIn(600);

    $('input').focusin(function() {
        $(this).css("outline", "none");
        $(this).animate({ opacity: 0.7, height: "+=1vh" });
    });
    $('input').focusout(function() {
        $(this).animate({ opacity: 1, height: "-=1vh" });
    });


    // 點擊換按鈕外觀
    $(".RecordPage button").click(() => {
        // $(this).css("background-color", "#F8931D");
        // $(this).css("color", "#ffffff");
        $(this).addClass("click");
        $(this).siblings().removeClass('click');
    });
    //listtitle
    $(".titleitem").click(function() {
        $(this).addClass("titlestyle");
        $(this).parents().siblings().find('.titlestyle').removeClass('titlestyle');
        $('.lglist ul *').hide();
        $('.lglist ul *').fadeIn(600);
    });
    // button
    $(".add button").click(function() {
        window.location = "../wb-questionadding"
    });
    $('.search button').click(function() {
        $('.lglist ul').hide().fadeIn(600);
    });
});

$(window).resize(() => {
    if ($(window).width() >= 800) {
        // 換大小的時候，list-group-item點擊時，顏色要變
        $(".collapse").removeClass('show');
        // let obj = $(".datelist>.list-group").find('.list-group-item');
        // for (let i=0;i<obj.length;i++){
        //     if(obj[i].innerHTML==tmp_date){
        //         obj[i].classList.add("active");
        //     }else{
        //         obj[i].classList.remove("active");
        //     }
        // }
    }
});