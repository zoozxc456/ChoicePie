data = [];
deleteRegister = "";
$(document).ready(function () {
  // Load
  $.ajax({
    type: "GET",
    dataType: "json",
    data: {
      origin: "gamepinlist"
    },
    url: "../bin/models/gameroom.php",
    success: function (res) {
      // console.log(res);
      if (res.length > 0) {
        data = res;
        GId = data[0].GId;
        createSmNode();
        createHTMLNode(0);
        createFooterBtn();
        $('#GameName').text(res[0].GName + "'s");
      }

    },
    error: function (jqXHR) {
      // console.error(jqXHR);
    }
  })












  // list淡入效果
  $('.lglist ul *').hide();
  $('.lglist ul *').fadeIn(600);

  // small list
  $(".btn-warning").click(function () {
    // console.log($(this).children('.collapse'));      
    $(this).siblings('.collapse').collapse('toggle'); //只開點擊的collapse


    $(".collapse").collapse('hide'); //點擊收前一個collapse

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

  $(window).resize(() => {
    if ($(window).width() >= 999) {
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

  $('#DeleteModal .modal-footer .delete').click(function () {
    $.ajax({
      type: "POST",
      dataType: "json",
      data: {
        "origin": "gamepinlist",
        "event": "delete",
        "PIN": deleteRegister
      },
      url: "../bin/models/gameroom.php",
      success: function (res) {
        if (res.status == true) {
          for (let index = 0; index < data.length; index++) {
            let element = data[index];
            if (element.PIN == deleteRegister) {
              data.splice(index, 1);
              break;
            }
          }
          $('#DeleteModal').modal('hide');
          createSmNode();
          createHTMLNode(0)
          createFooterBtn();
        }
        // console.log(res);
      },
      error: function (jqXHR) {
        // console.error(jqXHR);
      }
    });
  });

  $('#AddModal .modal-footer .yep').click(function () {
    $.ajax({
      type: "POST",
      dataType: "json",
      data: {
        "origin": "gamepinlist",
        "event": "add"
      },
      url: "../bin/models/gameroom.php",
      success: function (res) {
        if (res.status == true) {
          data = res.data;
          $('#AddModal').modal('hide');
          createHTMLNode(0)
          createFooterBtn();
        }
        // console.log(res);
      },
      error: function (jqXHR) {
        // console.error(jqXHR);
      }
    });
  });


});





function createHTMLNode(offset) {
  $('#RecordList ul *').remove();
  const ulRoot = document.querySelector('#RecordList ul');
  for (let i = offset; i < data.length && i < offset + 8; i++) {
    const li = document.createElement('li');
    li.classList = ['row my-2 w-100 text-center'];

    const div_pin = document.createElement('div');
    div_pin.classList = ['col p-0 text-center fs-4'];
    div_pin.innerHTML = data[i].PIN;

    const div_time = document.createElement('div');
    div_time.classList = ['col p-0 text-center fs-4'];
    div_time.innerHTML = (data[i].CreateTime).replace(/-/g, '/');

    const div_share = document.createElement('div');
    div_share.classList = ['col p-0 text-center fs-4'];
    div_share.addEventListener('click', function () {
      $('#ShareModal .org.gn').text(data[i].PIN);
      $('#ShareModal').modal('show');
    });

    const img_share = document.createElement('img');
    img_share.setAttribute('src', '../src/img/share2.png');

    const div_delete = document.createElement('div');
    div_delete.classList = ['col p-0 text-center fs-4'];
    div_delete.addEventListener('click', function () {
      deleteRegister = data[i].PIN;
      $('#DeleteModal .org.gn').text(data[i].PIN);
      $('#DeleteModal').modal('show');

    });

    const img_delete = document.createElement('img');
    img_delete.setAttribute('src', '../src/img/delete.png');
    img_delete.style.width = '50px';
    img_delete.style.height = '50px';

    div_share.appendChild(img_share);
    div_delete.appendChild(img_delete);

    li.appendChild(div_pin);
    li.appendChild(div_time);
    li.appendChild(div_share);
    li.appendChild(div_delete);

    ulRoot.appendChild(li);
  }

  $('#RecordList ul *').hide().fadeIn(600);

}

function createSmNode() {
  
  $('.smlist *').remove();
  for (let i = 0; i < data.length; i++) {
    $('.smlist').append(
      $('<div></div>').addClass('row').append(
        $('<div></div>').addClass('col gamepinbox').append(
          $('<div></div>').addClass('row up').append(
            $('<div></div>').addClass('col gamepin h3').text(data[i].PIN)
          ).append(
            $('<div></div>').addClass('col-2 mt-1').append(
              $('<img></img>').attr('src', '../src/img/share.png').attr('width', '30px').attr('height', '30px')
            ).click(function () {
              $('#ShareModal .org.gn').text(data[i].PIN);
              $('#ShareModal').modal('show');
            })
          )
        ).append(
          $('<div></div>').addClass('row down').append(
            $('<div></div>').addClass('col date align-self-center py-2 text-center').text((data[i].CreateTime).replace(/-/g, '/'))
          ).append(
            $('<div></div>').addClass('col-2').append(
              $('<img></img>').attr('src', '../src/img/delete.png').attr('width', '40px').attr('height', '40px')
            ).click(function () {
              deleteRegister = data[i].PIN;
              $('#DeleteModal .org.gn').text(data[i].PIN);
              $('#DeleteModal').modal('show');
            })
          )
        )
      )
    );
  }


}

function createFooterBtn() {

  //     <ul class="btn-group RecordPage p-0 ">
  //     <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">1</button>
  //     </li>
  //     <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">2</button>
  //     </li>
  //     <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">3</button>
  //     </li>
  // </ul>
  $('footer .btn-group *').remove();
  const ulRoot = document.querySelector('footer .btn-group');
  // console.log(ulRoot);
  for (let i = 0; i < Math.ceil(data.length / 8); i++) {
    const li = document.createElement('li');
    li.classList = ['px-2'];
    const btn = document.createElement('button');
    btn.setAttribute('type', 'button');
    btn.classList = ['p-0 text-center rounded-circle btn' + (i == 0 ? ' active' : '')];
    btn.innerHTML = (i + 1);
    btn.addEventListener('click', function () {
      $(li).siblings().find('button').removeClass('active');

      $(btn).addClass('active');


      offset = (i * 8);
      createHTMLNode(offset);
    });
    li.appendChild(btn);
    ulRoot.appendChild(li);
  }

}