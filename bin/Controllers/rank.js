GameList = [];
RankDetail = [];
$(document).ready(function () {
    // Load Game List
    // $('#bar').css('display', 'none !important');
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "rank",
            "event": "GameList"
        },
        url: "../bin/models/Play.php",
        success: function (res) {
            // console.log(res);
            if (res.length > 0) {
                GameList = res;
                $('#rank-null').addClass('d-none');
                $('#rank').css('display', 'flex');
                createGameList();
                $('.up').attr('disabled', 'disabled');
                // if ($('#GameList ul')[0].scrollHeight > $('#GameList ul').height()) {
                //     $('.updown').addClass('d-block');
                // } else {
                //     $('.updown').addClass('d-none');
                // }
                if (res.length>9) {
                    $('.updown').addClass('d-block');
                } else {
                    $('.updown').addClass('d-none');
                }
            }
            else {
                $('.updown').addClass('d-none');
            }

        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });
    $('.up').mouseover(function () {
        $('.down').removeAttr('disabled');
        let oldScrollTop = $('#GameList ul')[0].scrollTop;
        let scrollHeight = $('#GameList ul')[0].scrollHeight;
        let newScrollTop = 0;
        let dy = $('#GameList ul li').outerHeight(true);
        let nowHeight = $('#GameList ul').height() + oldScrollTop;
        // newScrollTop = oldScrollTop - dy;
        // console.log(oldScrollTop);
        if (oldScrollTop <10) {
            // console.log("00000")
            $('.up').attr('disabled', '');
        }


        $('#GameList ul').stop().animate({
            scrollTop: newScrollTop - dy
        }, 1200, 'swing', function () {
            // console.log($('#GameList ul')[0].height);
            // console.log($('#GameList ul')[0].scrollHeight);
            // console.log($('#GameList ul')[0].scrollTop);
        });

        
    });
    $('.up').mouseout(function () {
        // console.log("stop");
        $('#GameList ul').stop();
    });
    $('.down').mouseover(function () {
        $('.up').removeAttr('disabled');
        let oldScrollTop = $('#GameList ul')[0].scrollTop;
        let scrollHeight = $('#GameList ul')[0].scrollHeight;
        let newScrollTop = 0;
        let dy = $('#GameList ul li').outerHeight(true);
        let nowHeight = $('#GameList ul').height() + oldScrollTop;
        if (nowHeight + dy > scrollHeight+10) {
            $('.down').attr('disabled', '');
            // newScrollTop = oldScrollTop + scrollHeight - newScrollTop;
        }
        // else {
        //     newScrollTop = oldScrollTop + dy;
        // }


        $('#GameList ul').stop().animate({
            scrollTop: newScrollTop + scrollHeight
        }, 2500, 'swing', function () {
            // console.log($('#GameList ul')[0].height);
            // console.log($('#GameList ul')[0].scrollHeight);
            // console.log($('#GameList ul')[0].scrollTop);
        });
    });
    $('.down').mouseout(function () {
        $('#GameList ul').stop();
    });

});

function createGameList() {

    let ul_Game = document.querySelector('#GameList ul');
    // console.log(ul_Game);
    for (let i = 0; i < GameList.length; i++) {
        let GameName = GameList[i].GName;
        let RoomId = GameList[i].RoomId;
        let PIN = GameList[i].PIN == null ? "Public" : GameList[i].PIN;
        let li = document.createElement('li');
        li.innerHTML = GameName;
        if (i == 0) {
            if ($(window).width() < 768) {
                $("#RankDetails").css("display", "block");
                $(".pluebtn").css("display", "none");
                // bar animate
                $('.bar1').animate({
                    height: "15vw"
                });
                $('.bar2').animate({
                    height: "11vw"
                });
                $('.bar3').animate({
                    height: "8vw"
                });

            } else {
                $(".pluebtn").css("display", "block");
                // bar animate
                $('.bar1').animate({
                    height: "10vw"
                });
                $('.bar2').animate({
                    height: "7vw"
                });
                $('.bar3').animate({
                    height: "4vw"
                });
            }
            $('#gn').text(GameName);
            $('#PIN').text(PIN);
            li.classList = ['click'];
            requestRankDetail(RoomId);
        }
        li.addEventListener('click', function () {
            $('#gn').text(GameName);
            $('#PIN').text(PIN);
            $(li).siblings().removeClass('click');
            $(li).addClass('click');

            $('.bar1').css("height", "0vw");
            $('.bar2').css("height", "0vw");
            $('.bar3').css("height", "0vw");

            if ($(window).width() < 768) {
                $("#RankDetails").css("display", "block");
                $(".pluebtn").css("display", "none");
                // bar animate
                $('.bar1').animate({
                    height: "15vw"
                });
                $('.bar2').animate({
                    height: "11vw"
                });
                $('.bar3').animate({
                    height: "8vw"
                });

            } else {
                $(".pluebtn").css("display", "block");
                // bar animate
                $('.bar1').animate({
                    height: "10vw"
                });
                $('.bar2').animate({
                    height: "7vw"
                });
                $('.bar3').animate({
                    height: "4vw"
                });
            }

            //RankList li 淡入效果
            $('#RankList li').hide();
            $('#RankList li').fadeIn(600);
            requestRankDetail(RoomId);
        });
        ul_Game.appendChild(li);
    }
}

function requestRankDetail(RoomId) {
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "rank",
            "event": "RankDetails",
            "RoomId": RoomId
        },
        url: "../bin/models/Play.php",
        success: function (res) {
            // console.log(res);
            RankDetail = res.RankDetail;
            $('#ranknum').text(res.Rank + '/' + res.RankDetail.length);
            switch (res.RankDetail.length) {
                case 2:
                    $('.bar1,.bar2').parent().removeClass('d-none');
                    $('.bar3').parent().addClass('d-none');
                    $('.bar2').siblings('.theface').find('div').text((RankDetail[1].Username).substring(0, 1));
                    $('.bar1').siblings('.theface').find('div').text((RankDetail[0].Username).substring(0, 1));
                    break;
                case 1:
                    $('.bar1').parent().removeClass('d-none');
                    $('.bar2,.bar3').parent().addClass('d-none');
                    $('.bar1').siblings('.theface').find('div').text((RankDetail[0].Username).substring(0, 1));
                    break;
                default:
                    $('#bar>.col').removeClass('d-none');
                    $('.bar3').siblings('.theface').find('div').text((RankDetail[2].Username).substring(0, 1));
                    $('.bar2').siblings('.theface').find('div').text((RankDetail[1].Username).substring(0, 1));
                    $('.bar1').siblings('.theface').find('div').text((RankDetail[0].Username).substring(0, 1));
                    break;

            }
            createRankDetails();
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });
}

function createRankDetails() {
    $('#RankDetails').css('display', 'block');
    let ul_Rank = document.querySelector('#RankList ul');
    $('#RankList ul *').remove();
    // console.log(ul_Rank);
    for (let i = 0; i < RankDetail.length; i++) {
        let username = RankDetail[i].Username;
        let score = RankDetail[i].Score;
        let li = document.createElement('li');
        li.classList = ['row my-2 px-3'];
        const div_no = document.createElement('div');
        div_no.classList = ['col-1 p-0 red'];
        div_no.innerHTML = (i + 1);
        const div_username = document.createElement('div');
        div_username.classList = ['col p-0 black text-truncate'];
        div_username.innerHTML = username;
        const div_score = document.createElement('div');
        div_score.classList = ['col p-0 text-end org'];
        div_score.innerHTML = score;
        li.appendChild(div_no);
        li.appendChild(div_username);
        li.appendChild(div_score);
        ul_Rank.appendChild(li);
    }
}