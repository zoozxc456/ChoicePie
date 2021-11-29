$(document).ready(function () {
  // list淡入效果
  $('.lglist ul *').hide();
  $('.lglist ul *').fadeIn(600);
  // small list
  $('input').focusin(function () {
    $(this).attr("placeholder", "");
    $(this).css("outline", "none");
    $(this).animate({ opacity: 0.7, height: "+=1vh" });

  });

  $('input').focusout(function () {
    $(this).attr("placeholder", "search");
    $(this).animate({ opacity: 1, height: "-=1vh" });
  });
  
  $(".btn-warning").click(function () {
    // console.log($(this).children('.collapse'));
    $(this).siblings('.collapse').collapse('toggle');//只開點擊的collapse
    $(".collapse").collapse('hide');//點擊收前一個collapse
    $(this).addClass("active");
    $(this).parents().siblings().find('.active').removeClass('active');
  });

  // 點擊換按鈕外觀
  $(".RecordPage button").click(() => {
    // $(this).css("background-color", "#F8931D");
    // $(this).css("color", "#ffffff");
    $(this).addClass("click");
    $(this).siblings().removeClass('click');
  });

  //listtitle
  $(".titleitem").click(function () {
    $('.lglist ul *').hide();
    $('.lglist ul *').fadeIn(600);
  });

  // more add
  $(".cancel").click(function () {
    $.each($('.form-group input,.form-group textarea'),function(index,obj){
      $(obj).val("");
      $(obj).removeClass('is-invalid').removeClass('is-valid')
    });
  });

  // list click
  $('.list >li').click(function () {
    $(this).addClass("active");
    $(this).siblings().removeClass('active');
  });

});

$(window).resize(() => {
  if ($(window).width() >= 800) {
    $(".collapse").removeClass('show');
  }
});

