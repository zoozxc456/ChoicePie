$(document).ready(function () {
    $("#article-btn").click(function () {
        $('input').each((index, element) => {
            if ($.trim(element.value) == "") {
                element.classList.add('is-invalid');
            } else {
                element.classList.remove('is-invalid');
            }
            let json = null;
        if (json = checkData()) {
            getData(json);
        } else {
            $('#MessageModal .msg1').text("The fields are incomplete !");
            $('#MessageModal .msg2').text("Please check again !");
            $('#MessageModal').modal('show');
        }
        });
        

    });

});
let checkData = function () {
    let account = $("#input_acc").val().trim();
    let password = $("#input_pwd").val().trim();
    if(account!="" &password!=""){
        return {
            account: account,
            password: password
        };
    }else{
        return null;
    }
    
}
let getData = function (json) {
    $.ajax({
        type: "POST",
        url: "../bin/Models/Member.php",
        dataType: "json",
        data: {
            "origin": "signin",
            "form_data": json
        },
        success: function (data) {
            console.log(data);
            // if(data['status']){
            //     setTimeout(()=>
            //         {window.location.assign("../index");},3000
            //     )
            // }
            // else{

            // }
            if (data['status'] == 'Login Successful') {
                if (data['role'] == "root") {
                    window.location.assign("../wb-index");
                } else {
                    window.location.assign("../index");
                }
            } else if (data['status'] == 'Login Failure') {
                $('#input_acc').addClass('is-invalid');
                $('#MessageModal .msg1').text("The Account or Password is incorrect !");
                $('#MessageModal .msg2').text("Please check again !");
                $('#MessageModal').modal('show');
            }
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });
}