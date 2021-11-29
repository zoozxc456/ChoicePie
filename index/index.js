moreData = null;
moreIndex = 0;
moreLen = 0;
$(document).ready(function () {
    // Load More Access in moreData
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "index"
        },
        url: "../bin/models/ExtraSource.php",
        success: function (data) {
            // console.log(data);
            moreData = data;
            createCube();
            // moreData = data;
            // moreLen = data.length;
            // for (let item = 0; item < 3; item++) {
            //     let element = moreData[(moreIndex + item) % moreLen];
            //     $('#carousel-content .cube>.title')[item].innerHTML = element['Tag'];
            //     for (let li_num = 0; li_num < 4; li_num++) {
            //         let ele_len = element['Title'].length;
            //         if (li_num < ele_len) {
            //             // console.log(ele_len);
            //             const context = element['Title'][li_num];
            //             const li = document.createElement('li');
            //             li.classList = ['nav-item text-truncate'];
            //             li.innerHTML = context.substring(0, 250);
            //             // console.log($('#carousel-content .cube .content')[item]);
            //             $('#carousel-content .cube .content')[item].appendChild(li);
            //         }
            //     }
            // }
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });

    $('#article-btn>button').click(function () {
        let PIN = $.trim($("#input_GamePIN").val());
        // console.log(PIN);
        if (PIN == '') {
            $("#input_GamePIN").addClass('is-invalid');
            // return;
        } else {
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    "origin": "index",
                    "GamePIN": PIN
                },
                url: "../bin/models/GameRoom.php",
                success: function (res) {
                    // console.log(res);
                    if (res.status == true) {
                        $("#input_GamePIN").removeClass('is-invalid');
                        location.href = "../gaming/";
                    } else {
                        $("#input_GamePIN").addClass('is-invalid');
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            });
        }

    });
    $('#preArrow').click(function () {
        //設計點選more左箭頭，更新其innerHTML
        var delay = function (r, s) {
            return new Promise(function (resolve, reject) {
                setTimeout(function () {
                    resolve([r, s]);
                }, s);
            });
        };
        delay($('#carousel-content,#carousel-content *').stop().fadeOut(300), 300).then(function (v) {
            return delay(update(-1), 1);
        });
    });
    $('#nextArrow').click(function () {
        //設計點選more右箭頭，更新其innerHTML
        var delay = function (r, s) {
            return new Promise(function (resolve, reject) {
                setTimeout(function () {
                    resolve([r, s]);
                }, s);
            });
        };
        delay($('#carousel-content,#carousel-content *').stop().fadeOut(300), 300).then(function (v) {
            return delay(update(1), 1);
        });
    });

    // Animation
    $('#carousel-content,#carousel-content *').hide();
    $('#carousel-content,#carousel-content *').fadeIn(500);

    $('input').focusin(function () {
        $(this).attr("placeholder", "");
        $(this).css("outline", "none");
        // console.log($(this));
        $(this).animate({
            opacity: 0.7,
            height: "+=2vh"
        });

    });
    $('input').focusout(function () {
        $(this).attr("placeholder", $(this).val() ? "" : "Game PIN");
        $(this).animate({
            opacity: 1,
            height: "-=2vh"
        });
    });

    $('.more').click(function () {
        window.location.href = "../more";
    });

    $('.col.cube').click(function () {
        const tag = $(this).find('.title').text();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                origin: "index",
                Tag: tag
            },
            url: "../bin/models/Extrasource.php",
            success: function (res) {
                if (res.status == true) {
                    location.href = "../more";
                }
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    });

});

function update(step) {
    $('#carousel-content .cube .content *').remove();
    if (step > 0) {
        moreIndex = (moreIndex + 3) % moreLen;
        for (let item = 0; item < 3; item++) {
            let element = moreData[(moreIndex + item) % moreLen];
            $('#carousel-content .cube>.title')[item].innerHTML = element['Tag'];
            for (let li_num = 0; li_num < 4; li_num++) {
                let ele_len = element['Title'].length;
                if (li_num < ele_len) {
                    // console.log(ele_len);
                    const context = element['Title'][li_num];
                    const li = document.createElement('li');
                    li.classList = ['nav-item text-truncate'];
                    li.innerHTML = context.substring(0, 250);
                    // console.log($('#carousel-content .cube .content')[item]);
                    $('#carousel-content .cube .content')[item].appendChild(li);
                }
            }
        }

    } else {
        moreIndex = moreIndex - 3;
        if (moreIndex < 0) {
            moreIndex = moreIndex + moreLen;
        }
        for (let item = 0; item < 3; item++) {
            let element = moreData[(moreIndex + item) % moreLen];
            $('#carousel-content .cube>.title')[item].innerHTML = element['Tag'];
            for (let li_num = 0; li_num < 4; li_num++) {
                let ele_len = element['Title'].length;
                if (li_num < ele_len) {
                    // console.log(ele_len);
                    const context = element['Title'][li_num];
                    const li = document.createElement('li');
                    li.classList = ['nav-item text-truncate'];
                    li.innerHTML = context.substring(0, 250);
                    // console.log($('#carousel-content .cube .content')[item]);
                    $('#carousel-content .cube .content')[item].appendChild(li);
                }
            }
        }
    }
    $('#carousel-content,#carousel-content *').fadeIn(600);
    return moreIndex;
}



function createCube() {
    for (let i = 0; i < 3; i++) {
        let carousel_item = $('.carousel-item')[i];
        for (let cube_cnt = 0; cube_cnt < 3; cube_cnt++) {
            let cube = $(carousel_item).find('.cube')[cube_cnt];
            $(cube).find('.title').text(moreData[i * 3 + cube_cnt]['Tag']);
            for (let contents = 0; contents < 4; contents++) {
                $(cube).find('.content').find('.nav-item')[contents].innerHTML = moreData[i * 3 + cube_cnt]['Title'][contents];
            }
        }
    }
}