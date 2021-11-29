data = [];
deleteRegister = {
    "GId": "",
    "Mode": ""
};
$(document).ready(function () {
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "questionCategory",
            "event": "load"
        },
        url: "../bin/Models/gameroom.php",
        success: function (res) {
            // console.log(res);
            if (res.length > 0) {
                data = res;
                $('#GameList').css('display', 'flex');
                $('#null-gamelist').css('display', 'none');
                createHTMLnode(0);
                createFooterBtn();
            }
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }

    });


    //addListener in gameBox
    // button click
    $('.look').click(function () {
        window.location = "/ChoicePie/questionviewer";
    });
    $('.add').click(function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                origin: "questionCategory"
            },
            url: "../bin/models/Member.php",
            success: function (res) {
                if (res == true) {
                    window.location = "/ChoicePie/questionadding";
                } else {
                    window.location = "/ChoicePie/signin";
                }
            }, error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    });

    // change gamename
    $('.gamebox').on('mouseover', function () {
        let gamename = $(this).children('.front').children('.gamename').text();
        $(".gn").text(gamename);
    });


    $('#exampleModal2 .delete').click(function () {

        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                origin: "questionCategory",
                event: "delete",
                Mode: deleteRegister.Mode,
                GId: deleteRegister.GId
            },
            url: "../bin/models/Gameroom.php",
            success: function (res) {
                if (res.status == true) {
                    location.href = './';
                }
                // console.log(res);
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        })
    });

});

function gameBoxEnter(obj) {
    // let front = obj.item(0);
    // let back = obj.children["1"];
    // console.log(obj);
    // if (front.style.display == "none") {
    //     front.style.display = "block";
    //     back.style.display = "none";
    // }
    // else {
    //     front.style.display = "none";
    //     back.style.display = "block";
    // }

}

function gameBoxLeave(obj) {
    let front = obj.target.children[0];
    let back = obj.target.children[1];
    front.style.display = "block";
    back.style.display = "none";
}

function createHTMLnode(offset) {
    $('.middle *').remove();
    let list = document.querySelector('.middle');
    $(list).css('display', 'block');
    let outRow = document.createElement('div');
    outRow.classList = ['row'];
    for (let rows = offset; rows < data.length && rows < offset + 9; rows++) {
        let dataPostion = rows;
        if (data[dataPostion] == undefined) {
            let gameBox = document.createElement('div');
            gameBox.classList = ['gamebox'];
            outRow.appendChild(gameBox);
            continue;
        }
        let gameBox = document.createElement('div');
        let front = document.createElement('div');
        let gameName = document.createElement('div');
        let detail = document.createElement('div');
        let span_num = document.createElement('span');
        let span_date = document.createElement('span');
        let back = document.createElement('div');
        let dropup = document.createElement('div');
        let dropbtn = document.createElement('button');
        let img_dropbtn = document.createElement('img');
        let dropup_content = document.createElement('div');
        let a_delete = document.createElement('li');
        let img_a_delete = document.createElement('img');
        let a_share = document.createElement('li');
        let img_a_share = document.createElement('img');
        let a_pin = document.createElement('li');
        let img_a_pin = document.createElement('img');
        let btn_look = document.createElement('button');

        // dropbtn.classList = ['dropbtn'+(data[dataPostion].Mode=='Private'?" private":'')];
        img_dropbtn.setAttribute('src', "../src/img/more.png");
        img_dropbtn.setAttribute('width', "20px");
        img_dropbtn.setAttribute('height', "20px");
        dropup_content.classList = ['dropup-content'];
        a_delete.addEventListener('click', function () {
            $('#exampleModal2 label.org.gn').text(data[dataPostion].GName);
            deleteRegister.GId = data[dataPostion].GId;
            deleteRegister.Mode = data[dataPostion].Mode;
            $('#exampleModal2').modal('show');
        });
        a_delete.classList = ['report'];
        img_a_delete.setAttribute('src', "../src/img/delete2.png");
        img_a_delete.setAttribute('width', "40px");
        img_a_delete.setAttribute('height', "40px");

        a_share.addEventListener('click', function () {
            $('#exampleModal label.org.gn').text(data[dataPostion].GName);
            $('#exampleModal').modal('show');
        });
        a_share.classList = ['share'];
        img_a_share.setAttribute('src', "../src/img/share2.png");
        img_a_share.setAttribute('width', "30px");
        img_a_share.setAttribute('height', "30px");
        img_a_share.classList = ["ms-1 me-2"];

        a_pin.addEventListener('click', function () {
            $.ajax({
                type: "GET",
                dataType: "json",
                data: {
                    origin: "questionCategory",
                    event: "toGamePinList",
                    GId: data[dataPostion].GId
                },
                url: "../bin/models/Gameroom.php",
                success: function (res) {
                    // console.log(res);
                    if (res == true) {
                        location.href = "../gamepinlist/";
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            })
        });
        a_pin.classList = ['gamepin'];
        img_a_pin.setAttribute('src', "../src/img/key.png");
        img_a_pin.setAttribute('width', "25px");
        img_a_pin.setAttribute('height', "25px");
        img_a_pin.classList = ["mx-2"];

        // btn_look.classList = ['look' +(data[dataPostion].Mode=='Private'?" private":'')];
        btn_look.innerHTML = "LOOK";
        btn_look.addEventListener('click', function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    origin: "questionCategory",
                    event: "toViewer",
                    RoomId: data[dataPostion].RoomId
                },
                url: "../bin/models/gameroom.php",
                success: function (res) {
                    if (res.status == true) {
                        location.href = "../questionviewer/";
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }

            });
        });


        dropbtn.appendChild(img_dropbtn);
        a_delete.appendChild(img_a_delete);
        a_share.appendChild(img_a_share);
        a_pin.appendChild(img_a_pin);
        a_delete.innerHTML += "Delete";
        a_share.innerHTML += "Share";
        a_pin.innerHTML += "Game Pin"
        dropup_content.appendChild(a_delete);
        dropup_content.appendChild(a_share);
        if (data[dataPostion].Mode == 'Private') {
            dropup_content.appendChild(a_pin);
        }
        dropup.appendChild(dropbtn);
        dropup.appendChild(dropup_content);

        gameBox.classList = ['gamebox'];
        front.classList = ['front'];
        // gameName.classList = ['gamename'+(data[dataPostion].Mode=='Private'?" private":'')];
        gameName.innerHTML = data[dataPostion].GName;

        detail.classList = ['detail'];
        // span_num.classList = ['num'+(data[dataPostion].Mode=='Private'?" private":'')];
        span_num.innerHTML = data[dataPostion].Amount;

        span_date.innerHTML = (data[dataPostion].CreateTime).replace(/-/g, '/');
        // back.classList = ['back'+(data[dataPostion].Mode=='Private'?" private":'')];

        if (data[dataPostion].Mode == 'Public') {
            dropbtn.classList = ['dropbtn'];
            btn_look.classList = ['look'];
            gameName.classList = ['gamename text-truncate'];
            span_num.classList = ['num'];
            back.classList = ['back'];
        } else {
            if (data[dataPostion].RoomAcc == data[dataPostion].GameAcc) {
                dropbtn.classList = ['dropbtn private'];
                btn_look.classList = ['look private'];
                gameName.classList = ['gamename private text-truncate'];
                span_num.classList = ['num private'];
                back.classList = ['back private'];
            } else {
                dropbtn.classList = ['dropbtn copy'];
                btn_look.classList = ['look copy'];
                gameName.classList = ['gamename copy text-truncate'];
                span_num.classList = ['num copy'];
                back.classList = ['back copy'];
            }
        }
        dropup.classList = ['dropup'];
        detail.appendChild(span_num);
        detail.appendChild(span_date);
        front.appendChild(gameName);
        front.appendChild(detail);
        back.appendChild(dropup);
        back.appendChild(btn_look);
        gameBox.appendChild(front);
        gameBox.appendChild(back);
        outRow.appendChild(gameBox);
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
    for (let i = 0; i < Math.ceil(data.length / 9); i++) {
        const li = document.createElement('li');
        li.classList = ['px-2'];
        const btn = document.createElement('button');
        btn.setAttribute('type', 'button');
        btn.classList = ['p-0 text-center rounded-circle btn' + (i == 0 ? ' active' : '')];
        btn.innerHTML = (i + 1);
        btn.addEventListener('click', function () {
            $(li).siblings().find('button').removeClass('active');
            $(btn).addClass('active');
            offset = (i * 9);
            createHTMLnode(offset);
        });
        li.appendChild(btn);
        ulRoot.appendChild(li);
    }

}