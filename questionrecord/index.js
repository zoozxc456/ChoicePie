data = [];
$(document).ready(function() {
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "questionrecord"
        },
        url: "../bin/Models/gameroom.php",
        success: function(res) {
            if (res.status == undefined) {
                // console.log(res);
                data = res;
                createHTMLnode(0);
                createSM_HTMLnode(0);
                createFooterBtn();
                $('.RecordPage').css('display', 'inline-flex');
                $('.smlist button').css('display', "block");
                // 每頁8筆，超過就生新的分頁按鈕

            } else {
                $("#RecordList-null").css('display', 'block');
                $('.null-txt').css('display', 'block');
                $('.title').css('display', 'none');
            }
        },
        error: function(jqXHR) {
            console.error(jqXHR);
        }
    });

    // list淡入效果


    // small list
    $(".btn-warning").click(function() {
        $(this).siblings('.collapse').collapse('toggle'); //只開點擊的collapse


        $(".collapse").collapse('hide'); //點擊收前一個collapse

        $(this).addClass("active");
        $(this).parents().siblings().find('.active').removeClass('active');

    });

    // 點擊換按鈕外觀
    $(".RecordPage button").click(() => {
        $(this).addClass("click");
        $(this).siblings().removeClass('click');
    });

    $(window).resize(() => {
        if ($(window).width() >= 999) {
            // 換大小的時候，list-group-item點擊時，顏色要變
            $(".collapse").removeClass('show');
        }
    });
});

function createHTMLnode(offset) {
    let list = document.querySelector('.lglist ul');
    $(list).css('display', 'block');
    $('#RecordList').css('display', '-webkit-box');
    $('.lglist ul *').remove();
    for(let index=offset;index<data.length && index < offset + 8;index++){
        let li = document.createElement('li');
        let GName = document.createElement('div');
        let Amount = document.createElement('div');
        let Time = document.createElement('div');
        let Result = document.createElement('div');
        let img = document.createElement('img');
        li.classList = ['row my-2 w-100 text-center'];
        li.addEventListener('click', () => {
            let thisNode = $(li);
            thisNode.siblings('li').removeClass('active');
            thisNode.addClass('active');
        });
        GName.classList = ['col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4 text-truncate'];
        GName.innerHTML = data[index].GName;
        Amount.classList = ['col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4'];
        Amount.innerHTML = data[index].Amount;
        Time.classList = ['col p-0 text-center ml-xxl-5 fs-4'];
        Time.innerHTML = (data[index].time).replace(/-/g, '/');
        img.setAttribute("src", "../src/img/" + ((data[index].Mode == "Public") ? "letter-c.png" : "privacy.png"));
        Result.classList = ['col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5'];
        Result.addEventListener('click', function() {
            location.href = "../searchgameresult/?" + "RoomId=" + data[index].RoomId;
        });
        Result.appendChild(img);
        li.appendChild(GName);
        li.appendChild(Amount);
        li.appendChild(Time);
        li.appendChild(Result);
        list.appendChild(li);
    }
    $('.lglist ul *').hide();
    $('.lglist ul *').fadeIn(600);
}

function createSM_HTMLnode() {
    const list = document.querySelector('.smlist');

    for (let item in data) {
        const outRow = document.createElement('div');
        const btn = document.createElement('button');
        const collapse = document.createElement('ul');
        const collapse_list = document.createElement('li');
        const leftBox = document.createElement('div');
        const leftBox_title = document.createElement('p');
        const leftBox_amount = document.createElement('p');
        const midBox = document.createElement('div');
        const midBox_title = document.createElement('p');
        const midBox_time = document.createElement('p');
        const rightBox = document.createElement('div');
        const rightBox_title = document.createElement('p');
        const rightBox_img = document.createElement('img');

        outRow.classList = ['row'];
        btn.classList = ['btn btn-warning'];
        btn.addEventListener('click', (event) => {
            let thisBtn = $(event.target);
            thisBtn.siblings('.collapse').collapse('toggle'); //只開點擊的collapse
            $(".collapse").collapse('hide'); //點擊收前一個collapse
            thisBtn.addClass("active");
            thisBtn.parents().siblings().find('.active').removeClass('active');
        });
        collapse.classList = ['collapse'];
        collapse_list.classList = ['row my-2 w-100 text-center'];
        leftBox.classList = ['col p-0 text-center mx-3'];
        midBox.classList = ['col p-0 text-center mx-3'];
        rightBox.classList = ['col p-0 text-center mx-3'];
        leftBox_title.classList = ['text'];
        midBox_title.classList = ['text'];
        rightBox_title.classList = ['text'];
        btn.innerHTML = data[item].GName;
        leftBox_title.innerHTML = 'amonut';
        leftBox_amount.innerHTML = data[item].Amount;
        midBox_title.innerHTML = 'time';
        midBox_time.innerHTML = (data[item].time).replace(/-/g, '/');
        rightBox_title.innerHTML = 'result';
        rightBox_img.classList = ['collapseimg'];
        rightBox_img.setAttribute("src", "../src/img/" + ((data[item].Mode == "public") ? "letter-c.png" : "privacy.png"));
        rightBox_img.addEventListener('click', function() {
            location.href = "../searchgameresult/?" + "RoomId=" + data[item].RoomId;
        });
        // 結合節點
        leftBox.appendChild(leftBox_title);
        leftBox.appendChild(leftBox_amount);
        midBox.appendChild(midBox_title);
        midBox.appendChild(midBox_time);
        rightBox.appendChild(rightBox_title);
        rightBox.appendChild(rightBox_img);
        collapse_list.appendChild(leftBox);
        collapse_list.appendChild(midBox);
        collapse_list.appendChild(rightBox);
        collapse.appendChild(collapse_list);
        outRow.appendChild(btn);
        outRow.appendChild(collapse);
        list.appendChild(outRow);
    }

    // console.log(list);
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
            createHTMLnode(offset);
        });
        li.appendChild(btn);
        ulRoot.appendChild(li);
    }

}