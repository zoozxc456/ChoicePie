$(document).ready(function () {
  // 設定時間 For list-group-item
  tmp_date = myTime();
  $('#mainTitle').text('Visitor');
  $(".dropdown-toggle").click(function () {
    // 點擊換焦點時的背景顏色
    $("#datelist").collapse('toggle');
    $(this).css("background-color", "#da5728");

  });

  $(".list-group-item").click(function () {
    // 點擊日期 Button 換 Text
    tmp_date = $(this).html();
    $(this).siblings(".list-group-item").removeClass("active");
    $(".dropdown-toggle").text(tmp_date);
    $("#datelist").collapse('toggle');

    let obj = $(".datelist>.list-group").find('.list-group-item');
    for (let i = 0; i < obj.length; i++) {
      if (obj[i].innerHTML == tmp_date) {
        obj[i].classList.add("active");
      } else {
        obj[i].classList.remove("active");
      }
    }
    $('.cube .time').text($(this).text());
  });

  // chartbtn
  $('.chartbtn').click(function () {
    $(this).addClass('click');
    $(this).siblings(".chartbtn").removeClass("click");
    // mainTitle
  });

  $(window).resize(() => {
    if ($(window).width() >= 620) {
      $("#datelist").removeClass('show');
      let obj = $(".datelist>.list-group").find('.list-group-item');
      for (let i = 0; i < obj.length; i++) {
        if (obj[i].innerHTML == tmp_date) {
          obj[i].classList.add("active");
        } else {
          obj[i].classList.remove("active");
        }
      }
    }
    // $('.bargraph *').remove();
    // let svg=document.createElement("svg");
    // svg.classList.add('svg');
    // document.getElementsByClassName('bargraph')[0].appendChild(svg);
    


  });



});
function myTime() {
  let Today = new Date();
  let obj = $('.datelist .list-group-item');
  let obj_2 = $('.dd .list-group-item');
  let thisYear = Today.getFullYear();
  let thisMon = (Today.getMonth() + 1);
  let thisDay = Today.getDate();
  let thisHour = Today.getHours();
  let thisMin = Today.getMinutes();
  let nowDate = thisYear + "/" + thisMon + "/" + thisDay;
  let nowTime = thisHour + ":" + (thisMin < 10 ? ("0" + thisMin) : thisMin);
  for (let item in obj) {
    // 建立前三天、今天、後三天
    let dateObj = date(thisYear, thisMon, thisDay, item)
    obj[item].innerHTML = dateObj[0] + "/" + (dateObj[1] < 10 ? ("0" + dateObj[1]) : dateObj[1]) + "/" + (dateObj[2] < 10 ? ("0" + dateObj[2]) : dateObj[2]);
    obj_2[item].innerHTML = dateObj[0] + "/" + (dateObj[1] < 10 ? ("0" + dateObj[1]) : dateObj[1]) + "/" + (dateObj[2] < 10 ? ("0" + dateObj[2]) : dateObj[2]);
  }
  //設定 cube 的日期

  $(".cube .time").text(function () {
    let hr = parseInt(thisHour % 2 == 0 ? thisHour : (thisHour - 1));
    hr = parseInt(hr) < 10 ? ("0" + hr) : hr;
    // return (nowDate) + " " + hr + ":00"
    return $('.datelist .active').text();
  });
  return nowDate;
}
function date(thisYear, thisMon, thisDay, item) {
  // 建立日期
  let year, mon, day;
  let table = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
  day = (thisDay - 6) + parseInt(item);
  if (day < 1) {
    mon = thisMon - 1;
    if (mon <= 1) {
      year = thisYear - 1;
      mon = 12;
      day += table[11];
    } else {
      year = thisYear;
      day += table[mon - 1 ];
    }
  }
  else if (day > table[thisMon - 1]) {
    year = thisYear;
    if (mon >= 12) {
      year = thisYear + 1;
      mon = 1;
      day -= 31;
    }
    else {
      mon = thisMon + 1;
      day -= table[thisMon - 1];
    }
  }
  else {
    year = thisYear
    mon = thisMon;
  }
  return [year, mon, day];
}
