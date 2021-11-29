data = [];
reportRegister = "";
copyRegister = "";
newGamePIN = "";
$(document).ready(function () {
    //Page Loading
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "gameCategory",
        },
        url: "../bin/Models/Gameroom.php",
        success: (res) => {
            // console.log(res);
            data = res;
            createHTMLNode(0);
            createFooterBtn();
            // createFilter(data);
            // createList(data);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });

    // Modal Methods
    $('#exampleModal2 button.send').click(function () {
        // Report Modal
        let reason = $.trim($('#exampleModal2 textarea').val());
        if (reason != "") {
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    "origin": "gameCategory",
                    "reason": $.trim($('#exampleModal2 textarea').val()),
                    "RoomId": reportRegister
                },
                url: "../bin/Models/Report.php",
                success: (res) => {
                    if (res.status == true) {
                        // console.log(res);
                        $('#MessageModal .modal-dialog').removeClass("modal-lg");
                        let gn = $('#exampleModal2 div.org.gn').text();
                        $('#MessageModal .org').text(gn);
                        $('#MessageModal .msg').text(" is reported!");
                        $('#MessageModal .msg2').text("Thank you!");
                        $('#MessageModal .org2').text("");
                        $('#exampleModal2').modal('hide');
                        $('#MessageModal').modal('show');
                        $('#check').css("display", "none");
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            });
        } else {
            $('#exampleModal2 textarea').addClass('is-invalid');
        }
    });

    $('#exampleModal3 button.go').click(function () {
        // Copy Modal
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                "origin": "gameCategory",
                "event": "copy",
                "RoomId": copyRegister
            },
            url: "../bin/Models/Gameroom.php",
            success: (res) => {
                // console.log(res);
                if (res.status == true) {
                    $('#MessageModal .modal-dialog').addClass("modal-lg");
                    let gn = $('#exampleModal3 label.org.gn').text();
                    $('#MessageModal .org').text(gn);
                    $('#MessageModal .msg').text(" is copied to your room!");
                    $('#MessageModal .msg2').text("Its GamePIN is ");
                    $('#MessageModal .org2').text(res.PIN);
                    $('#exampleModal3').modal('hide');
                    $('#MessageModal').modal('show');
                    $('#check').css("display", "block");
                    newGamePIN = res.PIN;
                }
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });

    });



    // SEARCH
    $("#btn_search").click(function () {
        $("#game").text("Games");
        let search = $("#btn_search").siblings('input').val();
        // console.log(search);
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "gameCategory",
                "target": search
            },
            url: "../bin/Models/Gameroom.php",
            success: function (res) {
                data = res;
                // console.log(res);
                createHTMLNode(0);
                createFooterBtn();
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    });
    $('img.pie').click(function () {
        $("#btn_search").siblings('input').val("");
        $("#navbar-lg .nav-item").removeClass('click');
        $("#game").text("Games");
        $("#game").css("text-transform", "capitalize");
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "gameCategory",
                "GClassify": "Games"
            },
            url: "../bin/Models/Gameroom.php",
            success: function (res) {
                data = res;
                // console.log(res);
                createHTMLNode(0);
                createFooterBtn();
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    });

    $("#navbar-lg .nav-item,#navbar-sm .nav-item").click(function () {
        $("#btn_search").siblings('input').val("");
        let GClassify = $.trim($(this).text());
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "gameCategory",
                "GClassify": GClassify
            },
            url: "../bin/Models/Gameroom.php",
            success: function (res) {
                data = res;
                // console.log(res);
                createHTMLNode(0);
                createFooterBtn();
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    });

    // goGamePIN
    $('#goGamePIN').click(function () {
        const input = $(this).siblings('input');
        let GamePIN = $.trim(input.val());
        if (GamePIN != "") {
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    "origin": "gameCategory",
                    "event": "setGamePIN",
                    "GamePIN": GamePIN
                },
                url: "../bin/Models/Gameroom.php",
                success: function (res) {
                    // console.log(res);
                    if (res.status == true) {
                        input.val("").removeClass('is-invalid');
                        location.href = "../gaming/";
                    } else {
                        input.addClass("is-invalid");
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            });
        } else {
            $(this).siblings('input').addClass('is-invalid');
        }
    });

    $("#check").click(function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                origin: "gameCategory",
                event: "toGamePinList",
                GamePIN: newGamePIN
            },
            url: "../bin/models/gameroom.php",
            success: function (res) {
                // console.log(res);
                if (res.status == true) {
                    window.location = "/ChoicePie/gamepinlist";
                }
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        })

    });

});

function createHTMLNode(offset) {
    if (data.length <= 0) {
        $('#Game-null').addClass('d-block');
    } else {
        $('#Game-null').removeClass('d-block');
    }
    let list = document.querySelector('.middle');
    $(list).css('display', 'block');
    $('.middle *').remove();
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
        let a_report = document.createElement('li');
        let img_a_report = document.createElement('img');
        let a_share = document.createElement('li');
        let img_a_share = document.createElement('img');
        let a_copy = document.createElement('li');
        let img_a_copy = document.createElement('img');
        let btn_play = document.createElement('button');

        dropbtn.classList = ['dropbtn' + (data[dataPostion].Mode == 'Private' ? " private" : '')];
        img_dropbtn.setAttribute('src', "../src/img/more.png");
        img_dropbtn.setAttribute('width', "20px");
        img_dropbtn.setAttribute('height', "20px");
        dropup_content.classList = ['dropup-content'];
        a_report.addEventListener('click', function () {
            if ($.trim($('#signin').text()) == 'Sign in') {
                location.href = '../signin/';
            } else {
                $('#exampleModal2 div.org.gn').text(data[dataPostion].GName);
                $('#exampleModal2 textarea').val("");
                $('#exampleModal2 textarea').removeClass('is-invalid')
                reportRegister = data[dataPostion].RoomId;
                $('#exampleModal2').modal('show');
            }
        });
        a_report.classList = ['report'];
        img_a_report.setAttribute('src', "../src/img/flag.png");
        img_a_report.setAttribute('width', "38px");
        img_a_report.setAttribute('height', "38px");
        img_a_report.classList = ["ms-1"];

        a_share.addEventListener('click', function () {
            $('#exampleModal label.org.gn').text(data[dataPostion].GName);
            $('#exampleModal').modal('show');
        });
        a_share.classList = ['share'];

        img_a_share.setAttribute('src', "../src/img/share2.png");
        img_a_share.setAttribute('width', "30px");
        img_a_share.setAttribute('height', "30px");
        img_a_share.classList = ["ms-1 me-2"];

        a_copy.href = "#";
        a_copy.addEventListener('click', function () {
            if ($.trim($('#signin').text()) == 'Sign in') {
                location.href = '../signin/';
            } else {
                copyRegister = data[dataPostion].RoomId;
                $('#exampleModal3 label.org.gn').text(data[dataPostion].GName);
                $('#exampleModal3').modal('show');

            }
        });
        a_copy.classList = ['create'];
        img_a_copy.setAttribute('src', "../src/img/copy.png");
        img_a_copy.setAttribute('width', "25px");
        img_a_copy.setAttribute('height', "25px");
        img_a_copy.classList = ["mx-2"];
        img_a_copy.style = "margin-right: 2px;";

        btn_play.classList = ['play' + (data[dataPostion].Mode == 'Private' ? " private" : '')];
        btn_play.innerHTML = "PLAY!";
        btn_play.addEventListener('click', function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    origin: "gameCategory",
                    event: "toGaming",
                    RoomId: data[dataPostion].RoomId
                },
                url: "../bin/models/gameroom.php",
                success: function (res) {
                    // console.log(res);
                    if (res.status == true) {
                        location.href = "../gaming/";
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }

            });
        });
        dropbtn.appendChild(img_dropbtn);
        a_report.appendChild(img_a_report);
        a_share.appendChild(img_a_share);
        a_copy.appendChild(img_a_copy);
        a_report.innerHTML += "Report";
        a_share.innerHTML += "Share";
        a_copy.innerHTML += "Copy"
        dropup_content.appendChild(a_report);
        dropup_content.appendChild(a_share);
        dropup_content.appendChild(a_copy);

        dropup.appendChild(dropbtn);
        dropup.appendChild(dropup_content);

        gameBox.classList = ['gamebox'];
        front.classList = ['front'];
        gameName.classList = ['gamename text-truncate' + (data[dataPostion].Mode == 'Private' ? " private" : '')];
        gameName.innerHTML = data[dataPostion].GName;
        detail.classList = ['detail'];
        span_num.classList = ['num' + (data[dataPostion].Mode == 'Private' ? " private" : '')];
        span_num.innerHTML = data[dataPostion].Amount;
        span_date.innerHTML = (data[dataPostion].CreateTime).replace(/-/g, '/');
        back.classList = ['back' + (data[dataPostion].Mode == 'Private' ? " private" : '')];
        dropup.classList = ['dropup'];
        detail.appendChild(span_num);
        detail.appendChild(span_date);
        front.appendChild(gameName);
        front.appendChild(detail);
        back.appendChild(dropup);
        back.appendChild(btn_play);
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
            createHTMLNode(offset);
        });
        li.appendChild(btn);
        ulRoot.appendChild(li);
    }

}
























function child(element, classList, innerHTML = "") {
    let obj = document.createElement(element);
    classList.forEach(item => {
        obj.classList.add(item);
    });
    obj.innerHTML = innerHTML;
    return obj;
}
// function createFilter(data){
//     $("#navbar-lg ul *").remove();
//     for (let i = 0; i < data['Classify'].length; i++) {
//         //建 Classify Filter
//         let list = document.createElement("li");
//         list.classList.add("nav-item");
//         list.onclick=function () {
//             $.ajax({
//                 type: "GET",
//                 dataType: "json",
//                 data: {
//                     "getItem": "gameCategory",
//                     "filter": data['Classify'][i]
//                 },
//                 url: "../bin/Models/Game.php",
//                 success: createList,
//                 error: function (jqXHR) {
//                     console.error(jqXHR);
//                 }
//             });
//         };   
//         list.innerHTML=data['Classify'][i];
//         $("#navbar-lg ul")[0].appendChild(list);
//     }
// }
// function createList(data) {
//     $("#navbar-lg ul[class='nav']").remove();  
//     for (let i = 0; i < data['Game'].length; i++) {
//         let filter = document.createElement("h5");
//         filter.id = "music"; filter.classList.add("col-12");
//         filter.innerHTML = "-" + Object.keys(data['Game'][i]) + "-";
//         let root = document.createElement("div");
//         root.classList.add("row");
//         root.appendChild(filter);
//         console.log($("#navbar-lg ul"));
//         $("#navbar-lg ul")[0].appendChild(root);
//         console.log();
//         for (let j = 0; j < Object.values(data['Game'][i])[0].length; j++) {
//             let collect = [];
//             collect[0] = child("div", ["col", "mb-2"]);
//             collect[1] = child("div", ["col", "carousel-content-div", "p-0", "m-0", "mx-1"]);
//             collect[2] = child("div", ["wrap", "rounded-3"]);
//             collect[3] = child("div", ["titletxt", "title",
//                 "rounded", "border",
//                 "text-white", "text-center", "m-0"],
//                 Object.values(data['Game'][i])[0][j]['GName']);

//             collect[4] = child("div", ["text-center", "p-0"]);
//             collect[5] = child("div", ["paragraphtxt", "btn", "paragraph", "text-center"]);
//             collect[6] = child("span", ["badge", "btn", "rounded-circle", "me-1"], Object.values(data['Game'][i])[0][j]['Amount']);
//             collect[5].appendChild(collect[6]);
//             collect[5].innerHTML += Object.values(data['Game'][i])[0][j]['ReleaseTime'].substring(0, 10);
//             collect[4].appendChild(collect[5]);
//             collect[2].appendChild(collect[3]);
//             collect[2].appendChild(collect[4]);
//             collect[1].appendChild(collect[2]);
//             collect[0].appendChild(collect[1]);
//             // $("#gameList")[i].appendChild(collect[0]);
//         }
//     }
// }