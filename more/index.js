$(document).ready(function () {
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "more"
        },
        url: "../bin/models/ExtraSource.php",
        success: function (res) {
            // 建List Node
            const Tag = res.Tag == "" ? "MORE & MORE" : res.Tag;
            $('#game').text(Tag);
            createHTMLnode(res.content);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });



    let tmp_date = "MORE & MORE";
    $('.dropdown-toggle').click(function () {
        // console.log('clicked');
        $('#navbar-sm').collapse('toggle');
    });

    $("#carouselExampleIndicators").click(function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "more"
            },
            url: "../bin/models/ExtraSource.php",
            success: function (res) {
                // 建List Node
                const Tag = res.Tag == "" ? "MORE & MORE" : res.Tag;
                $('#game').text(Tag);
                createHTMLnode(res.content);
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    })

    // lg view
    $('#navbar-lg .nav-item').click(function () {
        const Tag = $.trim($(this).text());
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "more",
                Tag: Tag
            },
            url: "../bin/models/ExtraSource.php",
            success: function (res) {
                // 建List Node
                const Tag = res.Tag == "" ? "MORE & MORE" : res.Tag;
                $('#game').text(Tag).css("text-transform", "capitalize");
                createHTMLnode(res.content);

            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
        $(this).addClass('click');
        $(this).siblings(".nav-item").removeClass("click");
        tmp_date = $(this).html();
    });

    // sm view
    $('.collapse .nav-item').click(function () {
        const Tag = $.trim($(this).text());
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "more",
                Tag: Tag
            },
            url: "../bin/models/ExtraSource.php",
            success: function (res) {
                // 建List Node
                const Tag = res.Tag == "" ? "MORE & MORE" : res.Tag;
                $('#game').text(Tag);
                $("#game").css("text-transform", "capitalize");
                createHTMLnode(res.content);

            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
        $('.moreList *').hide();
        $('.moreList *').fadeIn(500);
        tmp_date = $(this).html();
        // console.log(tmp_date);
        $('#navbar-sm').collapse('toggle');
        $('#game').text(tmp_date);
        $('#game').css("text-transform", "capitalize");    
    });

    $(window).resize(() => {
        if ($(window).width() >= 768) {
            $("#game").text('MORE & MORE').css("text-transform", "capitalize");
            $('#navbar-sm').removeClass('show');
            let obj = $("#navbar-lg>.d-flex>.nav-pills").find('.nav-item');
            // console.log(obj);
            for (let i = 0; i < obj.length; i++) {
                if (obj[i].innerHTML == tmp_date) {
                    obj[i].classList.add("click");
                } else {
                    // obj[i].innerHTML=classname;
                    obj[i].classList.remove("click");
                }
            }
        } else {
            $("#game").text(tmp_date).css("text-transform", "capitalize");
        }
    });
});

function createHTMLnode(data) {
    if (data.length <= 0) {
        $('#null-morelist').addClass('d-block');
    } else {
        $('#null-morelist').removeClass('d-block');
    }
    
    $('.moreList *').remove();

    let list = document.querySelector('.moreList');
    let moreLen = data.length;

    for (let item = 0; item < moreLen; item++) {
        let moreBox = document.createElement('li');
        moreBox.classList = ['row morebox'];
        moreBox.addEventListener('click', function () {
            const ESId = data[item].ESId;
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    "origin": "more",
                    "ESId": ESId
                },
                url: "../bin/models/Recommand.php",
                success: function (res) {
                    // console.log(res);
                    if (res.status == true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            data: {
                                "origin": "more",
                                "ESId": ESId
                            },
                            url: "../bin/models/ExtraSource.php",
                            success: function (res) {
                                if (res.status == true) {
                                    location.href = data[item].Link;
                                }
                            },
                            error: function (jqXHR) {
                                console.error(jqXHR);
                            }
                        });
                    }
                },
                error: function (jqXHR) {
                    console.error(jqXHR);
                }
            });


        });
        let tag = document.createElement('div');
        tag.classList = ['col-2 No'];
        let title = document.createElement('div');
        title.classList = ['col title text-truncate'];
        let content = document.createElement('div');
        content.classList = ['col-12 content text-truncate'];
        list.appendChild(moreBox);
        moreBox.appendChild(tag);
        moreBox.appendChild(title);
        moreBox.appendChild(content);
        $('.moreList .morebox >.No')[item].innerHTML = data[item].Tag;
        $('.moreList .morebox >.title')[item].innerHTML = data[item].Title;
        $('.moreList .morebox >.content')[item].innerHTML = data[item].Context;
        // $('.moreList .morebox ')[item].setAttribute("href",);
    }
    $('.moreList *').hide()
    $('.moreList *').fadeIn(500);
    $('.moreList .morebox >.No').css("text-transform", "uppercase")
}