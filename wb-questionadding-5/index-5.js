$(document).ready(function () {
  var gamename = "";
  gamename=$('.gamename').html();
  // $('.play').click(function () {
  //   window.location = "/ChoicePie/questioncategory";
  // });

  $('.gn').text(gamename);
  // more add
  $(".btn-close").click(function () {
    $("#myModal").modal();
  });
  
});

// $(window).resize(() => {
//   if ($(window).width() >= 800) {
//     // 換大小的時候，list-group-item點擊時，顏色要變
//     $(".collapse").removeClass('show');
//   }
// });