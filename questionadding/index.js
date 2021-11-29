data = {
    "origin": "questionadding",
    "GName": "",
    "GClassify": "",
    "Mode": "",
    "PIN": "",
    "Question": []
};
// data = {
//     "GName": "test",
//     "GClassify": "bts",
//     "Mode": "Private",
//     "GamePIN": "",
//     "Question": [{
//         "No": 1,
//         "Title": "Who is the most beautiful girl?",
//         "Op_A": "Tina",
//         "Op_B": "Jasmy",
//         "Op_C": "Not all above",
//         "Op_D": "All above",
//         "Ans": "Op_D"
//     }]
// };
GameCategory = ['education', 'art', 'movie', 'science', 'animal', 'celebrity', 'personality',
    'food', 'sociology', 'sport', 'natural',
    'economics', 'language', 'history', 'biology',
    'music', 'mathematics', 'technology', 'outer space',
    'geography'
];
questionCNT = 0;
modalMODE = "";
modalEditTarget = undefined;
modalDeleteTarget = undefined;
page = 1;
$(document).ready(function () {
    /**************************
     *                        *
     *      Initialize        *
     *                        *
     **************************/
    loadGameCategory();

    /**************************
     *                        *
     *      addListener       *
     *                        *
     **************************/

    $('.questionadding1 .next').click(function () {

    });

    // Q2-ADD-QUESTION
    $('.add').click(() => {
        modalMODE = "Create";
        $('#EditModal .modal-body input').val("");
        $('#header-qno').text(("Q" + (questionCNT + 1) + "."));
    });
    // Q2-DONE-QUESTION
    $('#btn_done').click(function () {
        // 資料新增修改檢查
        let status = 1;
        $.each($('#EditModal .modal-body input'), function (index, element) {
            if ($.trim(element.value) != '') {
                let compares = $('#EditModal .modal-body input');

                for (let i = 1; i < index; i++) {
                    // console.log(compares[i].value);
                    if (element.value == $.trim(compares[i].value)) {
                        status &= 0;
                        $(element).removeClass('is-valid').addClass('is-invalid');
                        $(element).siblings('.invalid-feedback').addClass('d-block');
                        $(element).siblings('.invalid-feedback').text('! Have the same option !');
                        break;
                    } else if (i == index - 1) {
                        $(element).removeClass('is-invalid').addClass('is-valid');
                        $(element).siblings('.invalid-feedback').removeClass('d-block');
                        $(element).siblings('.invalid-feedback').text('');
                    }
                }
            } else {
                status &= 0;
                $(element).removeClass('is-valid').addClass('is-invalid');
                $(element).siblings('.invalid-feedback').addClass('d-block');
                $(element).siblings('.invalid-feedback').text('! Have the same option !');
            }
        });
        if (status == 1) {
            $('#EditModal .modal-body input').removeClass('is-valid');
            $('#EditModal').modal('hide');
            $('#Q2-alert').hide();
            if (modalMODE == "Create") {
                createHTMLnode();
                $('#addItem').css('height', '150px');
            } else if (modalMODE == "Edit") {
                // UPDATE OPTION AND TITLE 
                const QuestionIndex = $(modalEditTarget).parent().index();
                modalEditTarget.children('.question').find('.h3').text($('#form-q').val());
                modalEditTarget.children('.option').find('.opt1').text($('#form-opt1').val());
                modalEditTarget.children('.option').find('.opt2').text($('#form-opt2').val());
                modalEditTarget.children('.option').find('.opt3').text($('#form-opt3').val());
                modalEditTarget.children('.option').find('.opt4').text($('#form-opt4').val());
                data["Question"][QuestionIndex]["Op_A"] = $.trim($('#form-opt1').val());
                data["Question"][QuestionIndex]["Op_B"] = $.trim($('#form-opt2').val());
                data["Question"][QuestionIndex]["Op_C"] = $.trim($('#form-opt3').val());
                data["Question"][QuestionIndex]["Op_D"] = $.trim($('#form-opt4').val());
            }
        }

    });

    // Q2-DELETE-QUESTION
    $('#btn_delete').click(function () {
        modalDeleteTarget.fadeOut(600);
        let targetTxt = modalDeleteTarget.find('.question').find('.h2').text();
        let targetNum = parseInt(targetTxt.substring(1, targetTxt.length - 1));
        $.each(modalDeleteTarget.parent().children(), function (index, element) {
            /* 
                Question Num UPDATE in the View and
                Data Storage UPDATE by JSON object
            */
            let eleTxt = $(element).find('.question').find('.h2').text();
            let eleNum = parseInt(eleTxt.substring(1, eleTxt.length - 1));
            if (eleNum > targetNum) {
                $(element).find('.question').find('.h2').text("Q" + (eleNum - 1) + ".");
                (data.Question)[index].No = parseInt((data.Question)[index].No) - 1;
            }
        });
        setTimeout(() => modalDeleteTarget.remove(), 800);
        (data.Question).splice(targetNum - 1, 1);
        questionCNT--;

        if (questionCNT <= 0) {
            setTimeout(() => $('#addItem').animate({ 'height': "90%" }), 600);
        }
    });

    // input
    $('input').focusin(function () {
        p = $(this).attr('placeholder');
        $(this).attr("placeholder", "");
        $(this).css("outline", "none");
        $(this).animate({ opacity: 0.7, height: "+=1vh" });

    });

    $('input').focusout(function () {
        $(this).attr("placeholder", p);
        $(this).animate({ opacity: 1, height: "-=1vh" });
    });

    $('.next').click(function () {
        switch (page) {
            case 1:
                // SET GAME NAME
                let gName = $.trim($('.questionadding1 input[type="text"]').val());
                if (gName != '') {
                    data.GName = gName;
                    $('.questionadding1,.questionadding3,.questionadding4,.questionadding5').css("display", "none");
                    $('.questionadding2').css("display", "block");
                    $('.questionadding1 input').removeClass('is-invalid');
                    $('.questionadding1 .invalid-feedback').css('opacity', '0');
                    page++;
                } else {
                    $('.questionadding1 input').addClass('is-invalid');
                    $('.questionadding1 .invalid-feedback').css('opacity', '1');
                }
                break;
            case 2:
                // SET QUESTION
                // console.log(data.Question.length);
                if (data.Question.length > 0) {
                    let checkStatus = 1;
                    $.each(data.Question, function (index, element) {
                        if (element.Ans == "") {
                            checkStatus &= 0;
                        }
                    });
                    if (checkStatus == 0) {
                        $('#Q2-alert h4').text('! You have to choose an answer for your question !');
                        $('#Q2-alert').show();
                    } else {
                        $('#Q2-alert').hide();
                        $('.questionadding1,.questionadding2,.questionadding4,.questionadding5').css("display", "none");
                        $('.questionadding3').css("display", "block");
                        page++;
                    }
                } else {
                    $('#Q2-alert h4').text('! You have to create at least one question !');
                    $('#Q2-alert').show();
                }
                // $('.questionadding1,.questionadding3,.questionadding4,.questionadding5').css("display", "none");
                // $('.questionadding2').css("display", "block");
                break;
            case 3:
                // SET GAME CATEGORY
                if ($.trim($('#categorybtn').text()) != 'Category name') {
                    $('#categorybtn').removeClass('is-invalid').addClass('is-valid');
                    $('#categorybtn').siblings('.invalid-feedback').css('opacity', '0');
                    $('.questionadding1,.questionadding2,.questionadding3,.questionadding5').css("display", "none");
                    $('.questionadding4').css("display", "block");
                    page++;
                } else {
                    $('#categorybtn').removeClass('is-valid').addClass('is-invalid');
                    $('#categorybtn').siblings('.invalid-feedback').css('opacity', '1');
                }
                break;
            case 4:
                let mode = undefined;
                if ($('#Q4-btn-Public').hasClass('click') || $('#Q4-btn-Private').hasClass('click')) {
                    if ($('#Q4-btn-Public').hasClass('click')) {
                        mode = "Public";
                    } else {
                        mode = "Private";
                    }
                    data.Mode = mode;
                    // console.log(data);
                    $('.questionadding4 .invalid-feedback').css('opacity', '0');
                    // AJAX to DataBase
                    $.ajax({
                        // AJAX to Gameroom
                        type: "POST",
                        dataType: "json",
                        data: data,
                        url: "../bin/models/Game.php",
                        success: function (res) {
                            data.GamePIN = res.GamePIN;
                            // AJAX to Question
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                data: {
                                    "origin": "questionadding",
                                    "GId": res.GId,
                                    "Question": data.Question
                                },
                                url: "../bin/models/Question.php",
                                success: function (response) {
                                    // console.log(response);
                                    $('.questionadding5 .gn').text(data.GName);
                                    $('.questionadding5 .gamename').text(data.GName);
                                    if (data.Mode == "Private") {
                                        $('#Q5-GamePIN .q5-org').text(data.GamePIN);
                                        $('#Q5-GamePIN').addClass('d-block');
                                    }
                                    $('.questionadding1,.questionadding2,.questionadding3,.questionadding4').css("display", "none");
                                    $('.questionadding5').css("display", "block");
                                    page++;
                                },
                                error: function (jqXHR) {
                                    console.error(jqXHR);
                                }
                            });
                            // console.log(res);
                        },
                        error: function (jqXHR) {
                            console.error(jqXHR);
                        }
                    });
                } else {
                    $('.questionadding4 .invalid-feedback').css('opacity', '1');
                }
                break;
            case 5:
                window.location = "/ChoicePie/questioncategory";
                break;
            default:
                break;
        }
    });

    $('.back').click(function () {
        page -= 1;
        // console.log(page);
        switch (page) {
            case 1:
                $('.questionadding2,.questionadding3,.questionadding4,.questionadding5').css("display", "none");
                $('.questionadding1').css("display", "block");
                break;
            case 2:
                $('.questionadding1,.questionadding3,.questionadding4,.questionadding5').css("display", "none");
                $('.questionadding2').css("display", "block");
                break;
            case 3:
                $('.questionadding1,.questionadding2,.questionadding4,.questionadding5').css("display", "none");
                $('.questionadding3').css("display", "block");
                break;
            case 4:
                $('.questionadding1,.questionadding2,.questionadding3,.questionadding5').css("display", "none");
                $('.questionadding4').css("display", "block");
                break;
            case 5:
                $('.questionadding1,.questionadding2,.questionadding3,.questionadding4').css("display", "none");
                $('.questionadding5').css("display", "block");
                break;
            default:
                window.location = "/ChoicePie/questioncategory";
                break;
        }
        // $('.questionadding1').removeClass('page');
    });
});

function createHTMLnode() {
    const MODALTXT = {
        "Title": $('#form-q').val(),
        "opt1": $('#form-opt1').val(),
        "opt2": $('#form-opt2').val(),
        "opt3": $('#form-opt3').val(),
        "opt4": $('#form-opt4').val()
    }; {
        // <div class="row p-0 my-3 q2-main">
        //         <div class="col">
        //             <!--  -->
        //             <div class="row question">
        //                 <!-- question -->
        //                 <div class="col text-start">
        //                     <label class="h2">Q1.</label>
        //                     <label class="h3">Which song was not released in 2019?</label>
        //                 </div>
        //                 <!-- button -->
        //                 <div class="col-2 text-end">
        //                     <button class="draw" data-bs-toggle="modal" data-bs-target="#EditModal">
        //                         <img src="../src/img/draw.png" width="25px" height="25px">
        //                     </button>
        //                     <button class="delete" data-bs-toggle="modal" data-bs-target="#exampleModal2">
        //                         <img src="../src/img/delete.png" width="40px" height="40px">
        //                     </button>
        //                 </div>
        //             </div>
        //             <!-- option -->
        //             <div class="row option">
        //                 <div class="col article-btn">
        //                     <button type="button" class="btn fs-3 fw-bolder opt1">Dynamite</button>
        //                 </div>
        //                 <div class="col article-btn">
        //                     <button type="button" class="btn fs-3 fw-bolder opt2">Go Go</button>
        //                 </div>
        //                 <div class="col article-btn">
        //                     <button type="button" class="btn fs-3 fw-bolder opt3">Dis-ease</button>
        //                 </div>
        //                 <div class="col article-btn">
        //                     <button type="button" class="btn fs-3 fw-bolder opt4">Dis-ease</button>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
    }
    const outrow = document.createElement('div');
    outrow.classList = ['row p-0 my-3 q2-main'];
    const outcol = document.createElement('div');
    outcol.classList = ['col'];
    const question = document.createElement('div');
    question.classList = ['row question'];
    const titleBox = document.createElement('div');
    titleBox.classList = ['col text-start'];
    const qNo = document.createElement('label');
    qNo.classList = ['h2'];
    qNo.innerHTML = "Q" + (questionCNT + 1) + ".";
    const title = document.createElement('label');
    title.classList = ['h3'];
    title.innerHTML = MODALTXT.Title;
    titleBox.appendChild(qNo);
    titleBox.appendChild(title);
    const btnBox = document.createElement('div');
    btnBox.classList = ['col-2 text-end'];
    const btn_edit = document.createElement('button');
    btn_edit.classList = ['draw'];
    btn_edit.setAttribute('data-bs-toggle', 'modal');
    btn_edit.setAttribute('data-bs-target', '#EditModal');
    btn_edit.addEventListener('click', function () {
        modalMODE = "Edit";
        $('#form-q').val($.trim(title.innerHTML));
        $('#form-opt1').val($.trim(btn_opt1.innerHTML));
        $('#form-opt2').val($.trim(btn_opt2.innerHTML));
        $('#form-opt3').val($.trim(btn_opt3.innerHTML));
        $('#form-opt4').val($.trim(btn_opt4.innerHTML));
        modalEditTarget = $(outcol);
    });

    const img_btn_edit = document.createElement('img');
    img_btn_edit.src = '../src/img/draw.png';
    img_btn_edit.width = '25';
    img_btn_edit.height = '25';
    btn_edit.appendChild(img_btn_edit);
    btnBox.appendChild(btn_edit);
    const btn_delete = document.createElement('button');
    btn_delete.classList = ['delete'];
    btn_delete.setAttribute('data-bs-toggle', 'modal');
    btn_delete.setAttribute('data-bs-target', '#DeleteModal');
    btn_delete.addEventListener('click', function () {
        $('#DeleteModal .modal-body .qno').text('"' + MODALTXT.Title + '"');
        modalDeleteTarget = $(outrow);
    });
    const img_btn_delete = document.createElement('img');
    img_btn_delete.src = '../src/img/delete.png';
    img_btn_delete.width = '40';
    img_btn_delete.height = '40';
    btn_delete.appendChild(img_btn_delete);
    btnBox.appendChild(btn_delete);
    question.appendChild(titleBox);
    question.appendChild(btnBox);
    outcol.appendChild(question);


    const option = document.createElement('div');
    option.classList = ['row option'];
    // OPTION 1
    const opt1_Box = document.createElement('div');
    opt1_Box.classList = ['col article-btn'];
    const btn_opt1 = document.createElement('button');
    btn_opt1.type = "button";
    btn_opt1.classList = ['btn fs-3 fw-bolder opt1'];
    btn_opt1.innerHTML = MODALTXT.opt1;
    btn_opt1.addEventListener('click', function () {
        $(btn_opt1).parent().siblings().children('.btn').removeClass('click');
        $(btn_opt1).addClass('click');
        let Q = $(btn_opt1).parent().parent().siblings('.question').find('.h2').text();
        let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
        (data.Question[questionNum]).Ans = "OP_A";
        // console.log(data);
    });
    btn_opt1.addEventListener('mouseover', () => $('.toast').toast('show'));
    opt1_Box.appendChild(btn_opt1);
    option.appendChild(opt1_Box);
    // OPTION 2
    const opt2_Box = document.createElement('div');
    opt2_Box.classList = ['col article-btn'];
    const btn_opt2 = document.createElement('button');
    btn_opt2.type = "button";
    btn_opt2.classList = ['btn fs-3 fw-bolder opt2'];
    btn_opt2.innerHTML = MODALTXT.opt2;
    btn_opt2.addEventListener('click', function () {
        $(btn_opt2).parent().siblings().children('.btn').removeClass('click');
        $(btn_opt2).addClass('click');
        let Q = $(btn_opt2).parent().parent().siblings('.question').find('.h2').text();
        let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
        (data.Question[questionNum]).Ans = "OP_B";
        // console.log(data);
    });
    btn_opt2.addEventListener('mouseover', () => $('.toast').toast('show'));
    opt2_Box.appendChild(btn_opt2);
    option.appendChild(opt2_Box);
    // OPTION 3
    const opt3_Box = document.createElement('div');
    opt3_Box.classList = ['col article-btn'];
    const btn_opt3 = document.createElement('button');
    btn_opt3.type = "button";
    btn_opt3.classList = ['btn fs-3 fw-bolder opt3'];
    btn_opt3.innerHTML = MODALTXT.opt3;
    btn_opt3.addEventListener('click', function () {
        $(btn_opt3).parent().siblings().children('.btn').removeClass('click');
        $(btn_opt3).addClass('click');
        let Q = $(btn_opt3).parent().parent().siblings('.question').find('.h2').text();
        let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
        (data.Question[questionNum]).Ans = "OP_C";
        // console.log(data);
    });
    btn_opt3.addEventListener('mouseover', () => $('.toast').toast('show'));
    opt3_Box.appendChild(btn_opt3);
    option.appendChild(opt3_Box);
    // OPTION 4
    const opt4_Box = document.createElement('div');
    opt4_Box.classList = ['col article-btn'];
    const btn_opt4 = document.createElement('button');
    btn_opt4.type = "button";
    btn_opt4.classList = ['btn fs-3 fw-bolder opt4'];
    btn_opt4.innerHTML = MODALTXT.opt4;
    btn_opt4.addEventListener('click', function () {
        $(btn_opt4).parent().siblings().children('.btn').removeClass('click');
        $(btn_opt4).addClass('click');
        let Q = $(btn_opt4).parent().parent().siblings('.question').find('.h2').text();
        let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
        (data.Question[questionNum]).Ans = "OP_D";
        // console.log(data);
    });
    btn_opt4.addEventListener('mouseover', () => $('.toast').toast('show'));
    opt4_Box.appendChild(btn_opt4);
    option.appendChild(opt4_Box);
    outcol.appendChild(option);
    outrow.appendChild(outcol);
    document.querySelector('.q2-article-top').insertBefore(outrow, document.querySelector('#addItem'));
    data['Question'].push({
        "No": (questionCNT + 1),
        "Title": $.trim($('#form-q').val()),
        "Op_A": $.trim($('#form-opt1').val()),
        "Op_B": $.trim($('#form-opt2').val()),
        "Op_C": $.trim($('#form-opt3').val()),
        "Op_D": $.trim($('#form-opt4').val()),
        "Ans": ""
    });
    // console.log(data);
    questionCNT++;
}

function loadGameCategory() {
    let modal_body = document.querySelector('#GameCategoryModal .modal-body');

    for (let row = 0; row < GameCategory.length / 4; row++) {
        let rowElement = document.createElement('div');
        rowElement.classList = ['row d-flex justify-content-around text-center'];
        for (let item = 0; item < 4 && (row * 4 + item) < GameCategory.length; item++) {
            let itemElement = document.createElement('div');
            itemElement.classList = ['col-6 col-sm-3 my-1'];
            let btn = document.createElement('button');
            btn.type = "button";
            btn.setAttribute('data-bs-dismiss', "modal");
            btn.classList = ['btn btn-secondary h-100'];
            btn.innerHTML = GameCategory[row * 4 + item];
            btn.style.width = "95%";
            btn.addEventListener('click', function () {
                data.GClassify = GameCategory[row * 4 + item];
                $('#categorybtn').text(GameCategory[row * 4 + item]).css('color', '#212529').removeClass('is-invalid').addClass('is-valid');
            });
            itemElement.appendChild(btn);
            rowElement.appendChild(itemElement);
        }
        modal_body.appendChild(rowElement);
    }
}