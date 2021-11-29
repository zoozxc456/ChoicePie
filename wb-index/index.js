data = { 'Visitor': 0, 'Question': 0,'Member':0,'Unreviewed':0,'Audited':0};
$(document).ready(function () {
    let promise = new Promise(function (resolve, reject) {
        setTimeout(function () {
            resolve();
        }, 100);
    });
    promise.then(function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            data: { "origin": "wb-index" },
            url: "../bin/models/Member.php",
            success: function (res) {
                data.Visitor = res.Visitor;
                data.Member = parseInt(res.Member);
                $('#Members .text').text(data.Member);
                // console.log(data);

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    data: { "origin": "wb-index" },
                    url: "../bin/models/Game.php",
                    success: function (res) {
                        data.Question = parseInt(res.Audited);
                        data.Audited += parseInt(res.Audited);
                        data.Unreviewed += parseInt(res.Unreviewed);
                        // console.log(data);

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            data: { "origin": "wb-index" },
                            url: "../bin/models/Report.php",
                            success: function (res) {
                                data.Audited += parseInt(res.Audited);
                                data.Unreviewed += parseInt(res.Unreviewed);
                                // console.log(data);
                                $('#Questions .text').text(data.Question);
                                $('#Members .text').text(data.Member);
                                $('#Unreviewed .text').text(data.Unreviewed);
                                $('#Audited .text').text(data.Audited);
                                numberAnimate();
                            }, error: (jqXHR) => console.error(jqXHR)
                        });
                    }, error: (jqXHR) => console.error(jqXHR)
                });
            }, error: (jqXHR) => console.error(jqXHR)
        });
    });































    
    

    var a = new Promise(function (resolve, reject) {
        setTimeout(function () {
            resolve('hello world');
        }, 100);
    });
    a.then(function (value) {
       
    });

    // console.log(a);

});
function ajaxMax(url, item) {

    $.ajax({
        type: "GET",
        dataType: "json",
        data: { "origin": "wb-index" },
        url: "../bin/models/" + url + ".php",
        success: (res) => {
            if (url == "Game") {
                let temp = document.querySelector("#Questions .text");
                temp.innerHTML = parseInt(res[item[1]]);
            }
            for (let i in item) {

                let ele = document.querySelector("#" + item[i] + " .text");
                if (url == "Report") {
                    ele.innerHTML = parseInt(ele.innerHTML) + parseInt(res[item[i]]);
                } else {
                    ele.innerHTML = res[item[i]];
                }
                console.log(res);
            }
        },
        error: (jqXHR) => console.error(jqXHR)
    });
}
function numberAnimate() {
    $('.text').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 700,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}