Header = {
    'RoomId': "",
    'GId': '',
    'GName': '',
    'Acc': '',
    'username': '',
    'Score': 0
};
playRecords = [];
data = [];
Questions = [];
currentQuestion = -1; //現在在第幾題
TotalScore = 0;
ClickOption = null;
$(document).ready(function () {
    /********************************************** 分 頁 說 明 ****************************************************************
     * 
     *  gameusername：使用者輸入遊戲名稱(特別針對匿名帳戶使用)，有會員的帳戶直接用 username                                         
     *  gameloadingtimer：題目開始前的倒數計時器                                                                                 
     *  gameing-1：答題內容
     *  gameing-2：判斷對錯以及分數的計算 & Bar條
     *  gameresult：遊玩完看結果
     * 
     ***************************************************************************************************************************/

    // AJAX to GameRoom
    myAjax('GET', '../bin/models/gameroom.php', {
        'origin': 'gaming'
    }, function (res) {
        // console.log(res);
        if (res.Status == true) {
            // console.log('Game Query True');
            // console.log(res);
            Header.GId = res.GId;
            Header.GName = res.GName;
            Header.Acc = res.playAcc;
            Header.RoomId = res.RoomId;
            $('.gameusername .h1').text(Header.GName);
            myAjax('GET', '../bin/models/question.php', {
                'origin': 'gaming',
                'GId': res.GId
            }, function (response) {
                // console.log('Question Query True');
                // console.log(response);
                Questions = response.Question;
            });

        }
    });

    // input
    $('input').focusin(function () {
        p = $(this).attr('placeholder');
        $(this).attr("placeholder", "");
        $(this).css("outline", "none");
        $(this).animate({
            opacity: 0.7,
            height: "+=1vh"
        });

    });

    $('input').focusout(function () {
        // console.log($("#form-q"));
        $(this).attr("placeholder", p);
        $(this).animate({
            opacity: 1,
            height: "-=1vh"
        });
    });


    // gameusername & gameloadingtimer
    $('#start').click(function () {
        Header.username = $.trim($('.gameusername input').val());
        // console.log(Header.username);
        if (Header.username != "") {
            $('.gameusername input').removeClass('is-invalid');
            $('.gameusername').css("display", "none");
            $('.gameloadingtimer').css("display", "block");
            changeQuestion();
            loadingTimer();
        } else {
            $('.gameusername input').addClass('is-invalid');
        }


    });

    // gameing-2 & gameresult
    $('.option button').click(function () {
        ClickOption = $(this).attr('id');
    });
});

function changeQuestion() {
    // console.log(currentQuestion);
    currentQuestion++;
    $('.gameing-1 .qNo').text('Q' + (currentQuestion + 1) + '.');
    $('#QuestionTitle').text(Questions[currentQuestion].Title);
    $('#OP_A').text(Questions[currentQuestion].OP_A);
    $('#OP_B').text(Questions[currentQuestion].OP_B);
    $('#OP_C').text(Questions[currentQuestion].OP_C);
    $('#OP_D').text(Questions[currentQuestion].OP_D);
}

function loadingTimer() {
    // Animation Initial
    $('.gameloadingtimer').css("display", "block");
    $('#circle').css({
        'stroke': '#F8931D'
    });

    // Inital Varients
    let time = 3;
    let initialOffset = '440';
    let i = 1;
    let now;
    setTimeout(() => {
        $('.circle_animation').css('stroke-dashoffset', initialOffset - (1 * (initialOffset / time)));
    }, 0);
    $('h1').text(time); // adding 3 at the beginning if needed

    /* Need initial run as interval hasn't yet occured */
    // $('.circle_animation').css('stroke-dashoffset', initialOffset);

    let interval = setInterval(function () {
        now = time - i;
        if (i == time) {
            $('.gameloadingtimer').css("display", "none")
            $('.gameing-1').css("display", "block")
            clearInterval(interval);
            progressBar();

        } else {
            $('h1').text(now);
            $('.circle_animation').css('stroke-dashoffset', initialOffset - ((i + 1) * (initialOffset / time)))
            i++;

            if (i == 2) {
                $('.glt').text('Two');
                $('#circle').css({
                    'stroke': '#f86d1d'
                });
            } else if (i == 3) {
                $('.glt').text('One');
                $('#circle').css({
                    'stroke': '#f81d1d'
                });
            }

        }
    }, 1000);
}

function progressBar() {
    // Animation Initial
    $('.gameing-1').css('display', 'block');
    $('.gameing-1 .progress-bar').css('width', '100%');
    $('.gameing-1 .progress-bar').css('background-color', 'RGB(248,147,29)');

    // Create countdownTimer
    let countdownTimer = 10 * 1000;
    let countdown = setInterval(function () {
        // 計算10秒的作答時間
        countdownTimer--;
    }, 1);
    if (countdownTimer <= 0) {
        clearInterval(countdown);
    }
    let barWidth = 100;
    let counterBack_1 = setInterval(function () {
        // console.log(currentQuestion, barWidth);
        barWidth--;
        // console.log(barWidth);
        if (barWidth >= -5) {
            $('.gameing-1 .progress-bar').css('width', barWidth + '%');
            // Target Color : RGB(248,73,29)
            let color = 147 - (100 - barWidth) * ((147 - 73) / 100);
            $('.gameing-1 .progress-bar').css('background-color', 'RGB(248,' + color + ',29)');
            if (ClickOption != null) {
                $('.gameing-1').css("display", "none")
                $('.gameing-2').css("display", "block")
                clearInterval(countdown);
                clearInterval(counterBack_1);
                $('.gameing-1 .progress-bar').css('width', '0%');
                playProcess(ClickOption, currentQuestion, countdownTimer / 1000.0);
            }
        } else {
            $('.gameing-1').css("display", "none")
            $('.gameing-2').css("display", "block")
            clearInterval(countdown);
            clearInterval(counterBack_1);
            playProcess(null, currentQuestion, 0);
            // 時間到了還沒有作答
        }
    }, countdownTimer / 1000 * 10);

}

function playProcess(option, qustionNo, cdTimer) {
    // 遊玩時的處理判斷
    // console.log('play');

    // 處理完把 ClickOption 清空
    ClickOption = null;
    const amount = Questions.length;
    let score = 0;
    if (option != null && option == Questions[qustionNo].Ans && cdTimer > 0) {
        /* Score = ln((countdownTimer+Amount)*1.5)*13+(Amount*6+countdownTimer*4)*15 */
        score = Math.floor(Math.log((cdTimer + amount) * 1.5) * 13 + (amount * 6 + cdTimer * 4) * 15);
        TotalScore += score;
    }
    scoreBar(score);
}




function scoreBar(score) {
    // score & text animate
    let ansContext = Questions[currentQuestion][Questions[currentQuestion].Ans];
    if (score == 0) {
        // console.log(currentQuestion);
        $('.point').text('0');
        $('#order').text('The answer is ' + ansContext);
    } else {
        $('.point').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: score
            }, {
                duration: 700,
                easing: 'swing',
                step: function (now) {
                    // console.log(now);
                    $(this).text(Math.ceil(now));
                }
            });
        });
        $('#order').text('The answer is ' + ansContext);
    }
    $('#score').text('Your score is ' + TotalScore);
    $('#score').fadeIn(400, function () {
        $('#order').fadeIn(400);
    });


    // progress-scoreBar animate
    $('.gameing-2 .progress-scoreBar').css('width', '100%');
    $('.gameing-2 .progress-scoreBar').css('background-color', '#F8931D');
    var barWidth = 100;
    let counterBack = setInterval(function () {
        // console.log(barWidth);
        barWidth--;
        if (barWidth >= 0) {
            $('.gameing-2 .progress-scoreBar').css('width', barWidth + '%');
            let color = 147 - (100 - barWidth) * ((147 - 73) / 60);
            $('.gameing-2 .progress-scoreBar').css('background-color', 'RGB(248,' + color + ',29)');
        } else {
            clearInterval(counterBack);
            $('.gameing-2').css("display", "none");
            if (currentQuestion == Questions.length - 1) {
                Header.Score = TotalScore;
                // console.log(Header);
                // AJAX TO　Play
                myAjax('POST',
                    '../bin/models/Play.php', {
                    "origin": "gaming",
                    "GId": Header.GId,
                    "RoomId": Header.RoomId,
                    "GName": Header.GName,
                    "Score": TotalScore,
                    "Acc": Header.Acc,
                    "Username": Header.username
                },
                    function (response) {
                        // console.log(response);
                        playRecords = response.playRecords;
                        if (response.isBreak == true) {
                            $('.gameresult .Conditiontxt1').text('Congratulations!');
                            $('.gameresult .Conditiontxt2').text('You set a new record !');
                        } else if (response.isBreak == false && Header.Acc != 'anonymous') {
                            $('.gameresult .Conditiontxt1').text('Don\'t be sad!');
                            $('.gameresult .Conditiontxt2').text('You can get a better record !');
                        }
                        else {
                            $('#ownscore').text(Header.Score);
                            $('#ownusername').text(Header.username);
                            $('.gameresult .Conditiontxt1').text('Join Us!');
                            $('.gameresult .Conditiontxt2').text('You\'re going to get own records');
                        }
                        createItem(playRecords);
                        if (playRecords.length != 0) {
                            $('#bar').addClass("d-flex");
                            $('#none').addClass("d-none");
                            switch (playRecords.length) {
                                case 2:
                                    $("#crown").css("max-width", "25%");
                                    $('.bar1,.bar2').parent().removeClass('d-none');
                                    $('.bar3').parent().addClass('d-none');
                                    $('.bar2').siblings('.theface').find('div').text((playRecords[1].username).substring(0, 1));
                                    $('.bar1').siblings('.theface').find('div').text((playRecords[0].username).substring(0, 1));
                                    break;
                                case 1:
                                    $("#crown").css("max-width", "12%");
                                    $('.bar1').parent().removeClass('d-none');
                                    $('.bar2,.bar3').parent().addClass('d-none');
                                    $('.bar1').siblings('.theface').find('div').text((playRecords[0].username).substring(0, 1));
                                    break;
                                default:
                                    $("#crown").css("max-width", "38%");
                                    $('#bar>.col').removeClass('d-none');
                                    $('.bar3').siblings('.theface').find('div').text((playRecords[2].username).substring(0, 1));
                                    $('.bar2').siblings('.theface').find('div').text((playRecords[1].username).substring(0, 1));
                                    $('.bar1').siblings('.theface').find('div').text((playRecords[0].username).substring(0, 1));
                                    break;
                            }
                        } else {
                            $('#none').hide();
                            $('#none').fadeIn(600);
                        }
                    });


                $('.gameresult').css("display", "block")
                $('.gameresult .top .RecordTitle').text(Header.GName);
                $('#content').css("height", "max-content");
                // gameresult js
                $('.RecordList *').hide();
                $('.RecordList *').fadeIn(600);

                // bar animate
                $('#crown').hide();
                $('.bar1').animate({
                    height: "14vw"
                }, function () {
                    $('#crown').fadeIn(300);
                });
                $('.bar2').animate({
                    height: "10vw"
                });
                $('.bar3').animate({
                    height: "6vw"
                });

            } else {
                // console.log('current', currentQuestion);
                progressBar();
                changeQuestion();
                $('#score,#order').hide();
            }
        }
    }, 25);
}

function myAjax(type, url, params, success) {
    $.ajax({
        type: type,
        dataType: 'json',
        url: url,
        data: params,
        success: success,
        error: (jqXHR => console.error(jqXHR))
    });
}

function createItem(playRecords) {
    let length = playRecords.length;
    // console.log(length);
    if (length == 0) {
        $("#null-list").css("display", "block");
        $(".RecordList").css("display", "none");
    } else {
        $(".RecordList").css("display", "block");
        $("#null-list").css("display", "none");
        const ulRoot = document.querySelector('.gameresult .RecordList');
        for (let index = 0; index < length && index < 10; index++) {
            const element = playRecords[index];
            const item = document.createElement('li');
            item.classList = ['row listitem'];
            const RankNo = document.createElement('p');
            RankNo.classList = ['col No'];
            RankNo.innerHTML = index + 1;
            const uname = document.createElement('p');
            uname.classList = ['col uname text-truncate'];
            const score = document.createElement('p');
            score.classList = ['col'];
            score.innerHTML = element.Score;

            if (element.Acc == Header.Acc) {
                item.classList.add('active');

                $('#ownscore').text(Header.Score);
                $('#ownusername').text(element.username);
                uname.innerHTML = element.username;
            } else {
                uname.innerHTML = element.username;
            }
            item.appendChild(RankNo);
            item.appendChild(uname);
            item.appendChild(score);
            ulRoot.appendChild(item);

        }
    }
}


function order(arg) {
    let ans = null;
    if (arg >= 20) {
        switch (arg % 10) {
            case 1:
                ans = arg + 'st';
                break;
            case 2:
                ans = arg + 'nd';
                break;
            case 3:
                ans = arg + 'rd';
                break;
            default:
                ans = arg + 'th';
        }
    } else if (arg >= 4) {
        ans = arg + 'th';
    } else {
        switch (arg % 10) {
            case 1:
                ans = arg + 'st';
                break;
            case 2:
                ans = arg + 'nd';
                break;
            case 3:
                ans = arg + 'rd';
                break;
            default:
                return 'error';
        }
    }
    return ans;
}