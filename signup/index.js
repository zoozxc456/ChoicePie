$(document).ready(function () {
    $('input').focusin(function () {
        $(this).attr("placeholder", "");
        $(this).css("outline", "none");
        $(this).animate({
            opacity: 0.7,
            height: "+=1vh"
        });

    });
    $('input').focusout(function () {
        let txt = $(this).parent().siblings("div").find("label")[0].innerHTML;
        // console.log(txt);
        $(this).attr("placeholder", $(this).val() ? "" : "Your " + txt);
        $(this).animate({
            opacity: 1,
            height: "-=1vh"
        });
    });
    $("#bottom-article-btn").click(function () {
        $('input').each((index, element) => {
            if ($.trim(element.value) == "") {
                element.value = "";
                element.classList.remove('is-valid');
                element.classList.add('is-invalid');
            } else {
                element.classList.remove('is-invalid');
            }
        });

        if(checkData()){
            let account = $("#input_acc").val().trim();
            let password = $("#input_pwd").val().trim();
            let username = $("#input_uname").val().trim();
            let email = $("#input_email").val().trim();
            let json = {
                account: account,
                password: password,
                username: username,
                email: email
            };
            postData(json);
        }else{
            $('#MessageModal').modal('show');
        }
    });
});

function signUp_OK() {
    // 註冊成功後的動畫
    var delay = function (r, s) {
        return new Promise(function (resolve, reject) {
            setTimeout(function () {
                resolve([r, s]);
            }, s);
        });
    };

    delay($('#bottom-article-btn').animate({
        opacity: 0
    }).attr('disabled', 'disabled'), 1000).then(function (v) {
        return delay($('#bottom-article-btn').css("display", "none"), 300);
    }).then(function (v) {
        return delay($('#img-checkmark').css('display', 'block'), 1000);
    }).then(function (v) {
        return delay(window.location.assign("../signin"), 5000);
    });

};
let checkData = function () {
    // Check fleid data
    let account = $("#input_acc").val().trim();
    let password = $("#input_pwd").val().trim();
    let username = $("#input_uname").val().trim();
    let email = $("#input_email").val().trim();
    let accformat = /\w{3,20}/;
    let pwdformat = /\w{6,24}/;
    let usernameformat = /\w{1,20}/;
    let mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // Check fleid is empty 
    if (account == "" || password == "" || username == "" || email == "") {
        $('#MessageModal .msg1').text("The fields are incomplete !");
        $('#MessageModal .msg2').text("Please check again !");
        return false;
    } else {
        switch (null) {
            case account.match(accformat):
                $('#MessageModal .msg1').text("Account format is invalid !");
                $('#MessageModal .msg2').text("Use 3 ~ 20 characters with letters or numbers");
                break;
            case password.match(pwdformat):
                $('#MessageModal .msg1').text("Password format is invalid !");
                $('#MessageModal .msg2').text("Use 6 ~ 24 characters with letters or numbers");
                break;
            case username.match(usernameformat):
                $('#MessageModal .msg1').text("Username format is invalid !");
                $('#MessageModal .msg2').text("Use 1 ~ 20 characters with letters or numbers");
                break;
            case email.match(mailformat):
                $('#MessageModal .msg1').text("Email format is invalid !");
                $('#MessageModal .msg2').text("Please check again !");
                break;
            default:
                
                return true;
        }
        return false;
    }
}
let postData = function (json) {
    $.ajax({
        type: "POST",
        url: "../bin/Models/Member.php",
        dataType: "json",
        data: {
            'origin': 'signup',
            "form_data": json
        },
        success: function (data) {
            // console.log(data);
            if (data['status'] == "SignUp Successful") {
                signUp_OK();

            } else if (data['status'] == "SignUp Failure") {
                $('#input_acc').addClass('is-invalid');
                $('#MessageModal .msg1').text("The account is already exist !");
                $('#MessageModal .msg2').text("Please rename again !");
                $('#MessageModal').modal('show');
            }
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });
}