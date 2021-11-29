$(document).ready(function () {
  let tmp_title = "";
  let orderby = { 'by': null, 'asc': true };
  orderby['by'] = 'name';
  // list淡入效果
  $('.lglist ul *').hide();
  $('.lglist ul *').fadeIn(600);

  $('input').focusin(function () {
    $(this).attr("placeholder", "");
    $(this).css("outline", "none");
    $(this).animate({ opacity: 0.7, height: "+=1vh" });

  });

  $('input').focusout(function () {
    $(this).attr("placeholder", "search");
    $(this).animate({ opacity: 1, height: "-=1vh" });
  });

  // small list
  $(".btn-warning").click(function () {
    // console.log($(this).children('.collapse'));
    $(this).siblings('.collapse').collapse('toggle');//只開點擊的collapse


    $(".collapse").collapse('hide');//點擊收前一個collapse
    // console.log($(this));
    $(this).addClass("active");
    $(this).parents().siblings().find('.active').removeClass('active');
  })

  // 點擊換按鈕外觀
  $(".RecordPage button").click(() => {
    // $(this).css("background-color", "#F8931D");
    // $(this).css("color", "#ffffff");
    $(this).addClass("click");
    $(this).siblings().removeClass('click');
  });
  //listtitle
  $(".titleitem").click(function () {
    $(this).addClass("titlestyle");
    $(this).parents().siblings().find('.titlestyle').removeClass('titlestyle');
    $(this).parent().siblings().find('.titleitem').each((index) => {
      let target=$(this).parent().siblings('div').find('.titleitem')[index];
      if(target.innerHTML.indexOf('▲')==-1){
        target.innerHTML=target.innerHTML.replace('▼', '▲');
      }
    });

    tmp_title = $(this).html();
    orderby['by'] = $(this)[0].id;
    if (tmp_title.indexOf('▼') != -1) {
      $(this).text(tmp_title.replace(' ▼', ' ▲'));
      orderby['asc'] = false;
    } else {
      $(this).text(tmp_title.replace(' ▲', ' ▼'));
      orderby['asc'] = true;
    }
    // console.log(orderby);

    $('.lglist ul *').hide();
    $('.lglist ul *').fadeIn(600);
  })
  // list click
  $('.list >li').click(function () {
    // console.log($(this));
    $(this).addClass("active");
    $(this).siblings().removeClass('active');
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

