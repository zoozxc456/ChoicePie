personal = null;
$(document).ready(function () {
    $('input').focusin(function () {
        $(this).attr("placeholder", "");
        $(this).css("outline", "none");
    });
    $('input').focusout(function () {
        $(this).attr("placeholder", $(this).val() ? "" : "Enter Password");
    });
    $.ajax({
        type: "POST",
        dataype: "json",
        data: {
            origin: "profile",
            event: "load"
        },
        url: "../bin/models/member.php",
        success: function (res) {
            $('#acc').text(res.Acc);
            $('#username').text(res.Username);
            $('#email').text(res.Email);
            $('.theface>div').text((res.Username).substring(0, 1));
            personal = res;
            pie(res.TotalScore)
            // console.log(res);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });

    $('#bottom-article-btn').click(function () {
        $('#EditModal input').removeClass('is-valid', 'is-invalid')
            .attr("placeholder", "Enter Password")
            .val("");
    });

    // 第一個驗證身分Modal
    $('#EditModal .done').click(function () {
        $('#EditModal input').removeClass('is-valid', 'is-invalid');
        if ($('#EditModal input').val().trim() == '') {
            $('#EditModal input').addClass('is-invalid');
            $('#invalida_Tag_Feedback').text('Please Enter Password!');
        } else {
            $.ajax({
                type: "POST",
                dataype: "json",
                data: {
                    origin: "profile",
                    event: "vaildPwd",
                    pwd: $('#EditModal input').val()
                },
                url: "../bin/models/member.php",
                success: function (res) {
                    // console.log(res);
                    if (res.status == true) {
                        $("#EditModal2").modal('show');
                        $("#EditModal").modal('hide');
                        modal2();
                    } else {
                        $('#invalida_Tag_Feedback').text('Password incorrect !');
                        $('#EditModal input').removeClass('is-valid').addClass('is-invalid');
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            });
        }
    });
    $('#form-pwd').click(function () {
        $('#form-new-pwd,#form-confirm-pwd').val("");
        $('#EditModal3').modal('show');
    });

    $('#EditModal2 .save').click(function () {

        let password = $("#form-pwd").val();
        let username = $('#form-user').val();
        let email = $('#form-email').val();
        // Check fleid is empty 
        if (password != "" && username != "" && email != "") {
            $.ajax({
                type: "POST",
                dataype: "json",
                data: {
                    origin: "profile",
                    event: "update",
                    pwd: password,
                    username: username,
                    email: email
                },
                url: "../bin/models/member.php",
                success: function (res) {
                    // console.log(res);
                    $("#EditModal2").modal('hide');
                    $('#invalid_Form_Feedback').text('').removeClass('d-block');
                    location.href = ".";
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            })
        } else {
            $('#invalid_Form_Feedback').text("Please Enter Complete Password!").addClass('d-block');
        }
    });
    $('#EditModal3 .ok').click(function () {
        if ($.trim($('#form-new-pwd').val()) == '' || $.trim($('#form-confirm-pwd').val()) == '') {
            $('#invalid_newPwd_Feedback').text('Please Enter Complete Password!').addClass('d-block');
        } else if ($.trim($('#form-new-pwd').val()) != $.trim($('#form-confirm-pwd').val())) {
            $('#invalid_newPwd_Feedback').text('The two passwords you entered are different!').addClass('d-block');
        } else {
            $('#invalid_newPwd_Feedback').text('').removeClass('d-block');
            $("#form-pwd").val($.trim($('#form-new-pwd').val()));
            $('#form-new-pwd,#form-confirm-pwd').val("");
            $('#EditModal3').modal('hide');
        }
    });


    // $('input').focusin(function () {
    //     $(this).attr("placeholder", "");
    //     $(this).css("outline", "none");
    //     $(this).animate({ opacity: 0.7, height: "+=1vh" });

    // });
    // $('input').focusout(function () {
    //     // let txt = $(this).getAttribute("placeholder");
    //     console.log($(this));
    //     $(this).attr("placeholder", $(this).val() ? "" : "bug");
    //     $(this).animate({ opacity: 1, height: "-=1vh" });
    // });

    // Edit modal

});


function pie(tot_score) {
    // let tot_score = Math.floor(Math.random() * 600000);
    // console.log(tot_score);
    switch (true) {
        case tot_score >= 500000:
            document.getElementById('purpie').src = '../src/img/pie-p.png';
        case tot_score >= 300000:
            document.getElementById('dbpie').src = '../src/img/pie-db.png';
        case tot_score >= 150000:
            document.getElementById('bluepie').src = '../src/img/pie-b.png';
        case tot_score >= 100000:
            document.getElementById('grepie').src = '../src/img/pie-g.png';
        case tot_score >= 50000:
            document.getElementById('yelpie').src = '../src/img/pie-y.png';
        case tot_score >= 30000:
            document.getElementById('orgpie').src = '../src/img/pie-o.png';
        case tot_score >= 10000:
            document.getElementById('redpie').src = '../src/img/pie-r.png';
        default:
            break;
    }
};

function modal2() {
    let acc = personal.Acc;
    let username = personal.Username;
    let email = personal.Email;
    $('#form-acc').text(acc);
    $("#form-pwd").val($('#EditModal input').val());
    $('#form-user').val(username);
    $('#form-email').val(email);
};