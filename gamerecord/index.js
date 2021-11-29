data = [];
$(document).ready(function() {
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "gamerecord"
        },
        url: "../bin/Models/Play.php",
        success: function(res) {
            // console.log(res);
            if (res.status == undefined) {
                $('.RecordPage').css('display', 'inline-flex');
                $('.smlist button,.lglist').css('display', "block");
                data = res;
                createHTMLnode(0);
                createSM_HTMLnode();
                createFooterBtn();

                // END
            } else {
                $(".text").css('display', 'none');
                $(".RecordPage").css('display', 'none');
                $("#RecordList-null").css('display', 'block');
                $('.null-txt').css('display', 'block');
                $('.title').css('display', 'none');
            }

        },
        error: (jqXHR) => { console.error(jqXHR); }
    });

    // small list
    $(".btn-warning").click(function() {
        // console.log($(this).children('.collapse'));
        $(this).siblings('.collapse').collapse('toggle'); //只開點擊的collapse


        $(".collapse").collapse('hide'); //點擊收前一個collapse
        // console.log($(this));
        $(this).addClass("active");
        $(this).parents().siblings().find('.active').removeClass('active');
    })

    // 點擊換按鈕外觀
    $(".RecordPage button").click(() => {
        // $(this).css("background-color", "#F8931D");
        // $(this).css("color", "#ffffff");
        $(this).addClass('click');
        $(this).siblings().removeClass('click');
    });
});

$(window).resize(() => {
    if ($(window).width() >= 999) {
        // 換大小的時候，list-group-item點擊時，顏色要變
        $(".collapse").removeClass('show');
    }
});

function createHTMLnode(offset) {
    let list = document.querySelector('.lglist ul');
    $(list).css('display', 'block');
    $('#RecordList').css('display', '-webkit-box');
    $('.lglist ul *').remove();

    for(let index=offset;index<data.length && index < offset + 8;index++){
        let li = document.createElement('li');
        let GName = document.createElement('div');
        let Score = document.createElement('div');
        let Time = document.createElement('div');
        li.classList = ['row my-2 w-100 text-center'];
        li.addEventListener('click', () => {
            let thisNode = $(li);
            thisNode.siblings('li').removeClass('active');
            thisNode.addClass('active');
        });
        GName.classList = ['col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4 text-truncate'];
        GName.innerHTML = data[index].GName;
        Score.classList = ['col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4'];
        Score.innerHTML = data[index].Score;
        Time.classList = ['col p-0 text-center ml-xxl-5 fs-4'];
        Time.innerHTML = (data[index].time).replace(/-/g, '/');
        li.appendChild(GName);
        li.appendChild(Score);
        li.appendChild(Time);
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
        const leftBox_score = document.createElement('p');
        const rightBox = document.createElement('div');
        const rightBox_title = document.createElement('p');
        const rightBox_time = document.createElement('p');
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
        rightBox.classList = ['col p-0 text-center mx-3'];
        leftBox_title.classList = ['text'];
        rightBox_title.classList = ['text'];
        btn.innerHTML = data[item].GName;
        leftBox_title.innerHTML = 'Score';
        leftBox_score.innerHTML = data[item].Score
        rightBox_title.innerHTML = 'Time';
        rightBox_time.innerHTML = (data[item].time).replace(/-/g, '/');


        // 結合節點


        leftBox.appendChild(leftBox_title);
        leftBox.appendChild(leftBox_score);
        rightBox.appendChild(rightBox_title);
        rightBox.appendChild(rightBox_time);
        collapse_list.appendChild(leftBox);
        collapse_list.appendChild(rightBox);
        collapse.appendChild(collapse_list);
        outRow.appendChild(btn);
        outRow.appendChild(collapse);
        list.appendChild(outRow);
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
            createHTMLnode(offset);
        });
        li.appendChild(btn);
        ulRoot.appendChild(li);
    }

}