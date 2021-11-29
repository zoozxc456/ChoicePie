clickBtn='';
TargetID = location.search.substring(1, location.search.length).split("=")[1];
typeID = location.search.substring(1, location.search.length).split("=")[0];
$(document).ready(function () {
    if (typeID == 'GId') {
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "wb-unreviewedviewer",
                "TargetID": TargetID
            },
            url: '../bin/models/Game.php',
            success: function (res) {
                
                GameHeader = res;
                // console.log(TargetID);
                $('.RecordTitle').text(res.GName);
                $('.notice').text('').addClass('d-none');
                $('.red2').text('append');
                $('.title').text(res.GName);
                // Request Question
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    data: {
                        "origin": "wb-unreviewedviewer",
                        "GId": GameHeader.GId
                    },
                    url: '../bin/models/Question.php',
                    success: function (response) {
                        
                        
                        // console.log(response);
                        Question = response.Question;
                        createHTMLNode();
                    },
                    error: function (jqXHR) {
                        console.error(jqXHR);
                    }
                });
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    } else if (typeID == 'RId') {
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                "origin": "wb-unreviewedviewer",
                "TargetID": TargetID
            },
            url: '../bin/models/Report.php',
            success: function (res) {
                // console.log(res);
                GameHeader = res;
                $('.RecordTitle').text(res.GName);
                $('.notice').text('Reason：'+res.Reason);
                $('.red2').text('delete');
                $('.modal-body .title').text((typeID == 'RId') ? 'this Report' : res.GName);
                // Request Question
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    data: {
                        "origin": "wb-unreviewedviewer",
                        "GId": GameHeader.GId
                    },
                    url: '../bin/models/Question.php',
                    success: function (response) {
                        // console.log(response);
                        Question = response.Question;
                        createHTMLNode();
                    },
                    error: function (jqXHR) {
                        console.error(jqXHR);
                    }
                });
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    } else {
        return;
    }
    // if()









    let txt = "";
    txt = $(".RecordTitle").html();
    $('.title').text(txt + ' ?');

    $('.RecordList *').hide();
    $('.RecordList *').fadeIn(600);

    $('.back').click(function () {
        window.location.href = "../wb-unreviewed";
    });

    // reviewbtn modal
    //X
    $("#cancel").click(function () {
        clickBtn='Left';
        // console.log('cancel');
        $('.red2').text("reject");
        
        $("#myModal").modal();   
    });
    //O
    $("#rec").click(function () {
        clickBtn='Right';
        // console.log($('.red2'));
        $('.red2').text("accept");
        $("#myModal").modal();
        
    });

    $('#confirm').click(function(){
        if(clickBtn=='Left'){
            if(typeID=='GId'){
                // console.log('no append DB');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {
                        "origin": "wb-unreviewedviewer",
                        "GId": TargetID,
                        "event": "disagree"
                    },
                    url: '../bin/models/Game.php',
                    success: function (response) {
                        // console.log(response);
                        Question = response.Question;
                   
                        location.href = '../wb-unreviewed';
                    },
                    error: function (jqXHR) {
                        console.error(jqXHR);
                    }
                });
                location.href = '../wb-unreviewed';
            }else{
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {
                        "origin": "wb-unreviewedviewer",
                        "RId": TargetID,
                        "event":"Audited"
                    },
                    url: '../bin/models/Report.php',
                    success: function (response) {
                        // console.log(response);
                        Question = response.Question;
                        location.href = '../wb-unreviewed';
                    },
                    error: function (jqXHR) {
                        console.error(jqXHR);
                    }
                });
                // console.log('report reject DB');
            }
        }else if(clickBtn=='Right'){
            if(typeID=='GId'){
                // console.log('append DB');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {
                        "origin": "wb-unreviewedviewer",
                        "GId": TargetID,
                        "event": "agree"
                    },
                    url: '../bin/models/Game.php',
                    success: function (response) {
                        // console.log(response);
                        Question = response.Question;
                        
                        location.href = '../wb-unreviewed';
                    },
                    error: function (jqXHR) {
                        console.error(jqXHR);
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {
                        "origin": "wb-unreviewedviewer",
                        "RId": TargetID,
                        "event": "illegal"
                    },
                    url: '../bin/models/Report.php',
                    success: function (response) {
                        // console.log(response);
                        Question = response.Question;
                       
                        location.href = '../wb-unreviewed';
                    },
                    error: function (jqXHR) {
                        console.error(jqXHR);
                    }
                });
                
            }
            
        }
        // console.log('add');
    });  

    $('.red').click(function () {
        // window.location.href = "../wb-unreviewed";
    });

});
function createHTMLNode() {
    {
        // <li class="row p-0 my-2 listitem">
        //                     <div class="row m-0 mt-1">
        //                         <div class="col p-1 text-start">
        //                             <label class="h3 q">Q1.</label>
        //                             <label class="h4">Which song was not released in 2020?</label>
        //                         </div>
        //                     </div>
        //                     <div class="row my-1">
        //                         <div class="col article-btn">
        //                             <button type="button" class="btn fs-4 fw-bolder">Dynamite</button>
        //                         </div>
        //                         <div class="col article-btn">
        //                             <button type="button" class="btn fs-4 fw-bolder ans">Go Go</button>
        //                         </div>
        //                     </div>
        //                     <div class="row mb-1">
        //                         <div class="col article-btn">
        //                             <button type="button" class="btn fs-4 fw-bolder">Dis-ease</button>
        //                         </div>
        //                         <div class="col article-btn">
        //                             <button type="button" class="btn fs-4 fw-bolder">Abyss</button>
        //                         </div>
        //                     </div>
        //                 </li>
    }
    $.each(Question,function(index,element){
        const ans=element.Ans;
        const OP_A=element.OP_A;
        const OP_B=element.OP_B;
        const OP_C=element.OP_C;
        const OP_D=element.OP_D;
        const Title=element.Title;
        $('.RecordList').append(
            $('<li></li>').addClass('row py-2 my-2 listitem').append(
                $('<div></div>').addClass('row m-0 mt-1').append(
                    $('<div></div>').addClass('col p-1 text-start').append(
                        $('<label></label>').addClass('h3 q').text('Q'+(index+1)+'.')
                    ).append(
                        $('<label></label>').addClass('h4').text(Title)
                    )
                ).append(
                    $('<div></div>').addClass('row my-1').append(
                        $('<div></div>').addClass('col article-btn').append(
                            $('<button></button>').addClass('btn fs-4 fw-bolder'+(ans=="OP_A"?' ans':'')).text(OP_A).attr('type', 'button')
                        )
                    ).append(
                        $('<div></div>').addClass('col article-btn').append(
                            $('<button></button>').addClass('btn fs-4 fw-bolder'+(ans=="OP_B"?' ans':'')).text(OP_B).attr('type', 'button')
                        )
                    )
                ).append(
                    $('<div></div>').addClass('row mb-1').append(
                        $('<div></div>').addClass('col article-btn').append(
                            $('<button></button>').addClass('btn fs-4 fw-bolder'+(ans=="OP_C"?' ans':'')).text(OP_C).attr('type', 'button')
                        )
                    ).append(
                        $('<div></div>').addClass('col article-btn').append(
                            $('<button></button>').addClass('btn fs-4 fw-bolder'+(ans=="OP_D"?' ans':'')).text(OP_D).attr('type', 'button')
                        )
                    )
                )
            )
        );
    })
    
    // const ListItem = document.createElement('li');
    // ListItem.classList = ['row p-0 my-2 listitem'];
    // const TitleBox = doc













    // const option = document.createElement('div');
    // option.classList = ['row option'];
    // // OPTION 1
    // const opt1_Box = document.createElement('div');
    // opt1_Box.classList = ['col article-btn'];
    // const btn_opt1 = document.createElement('button');
    // btn_opt1.type = "button";
    // btn_opt1.classList = ['btn fs-3 fw-bolder opt1'];
    // btn_opt1.innerHTML = MODALTXT.opt1;
    // btn_opt1.addEventListener('click', function () {
    //     $(btn_opt1).parent().siblings().children('.btn').removeClass('click');
    //     $(btn_opt1).addClass('click');
    //     let Q = $(btn_opt1).parent().parent().siblings('.question').find('.h2').text();
    //     let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
    //     (data.Question[questionNum]).Ans = "Op_A";
    //     console.log(data);
    // });
    // btn_opt1.addEventListener('mouseover', () => $('.toast').toast('show'));
    // opt1_Box.appendChild(btn_opt1);
    // option.appendChild(opt1_Box);
    // // OPTION 2
    // const opt2_Box = document.createElement('div');
    // opt2_Box.classList = ['col article-btn'];
    // const btn_opt2 = document.createElement('button');
    // btn_opt2.type = "button";
    // btn_opt2.classList = ['btn fs-3 fw-bolder opt2'];
    // btn_opt2.innerHTML = MODALTXT.opt2;
    // btn_opt2.addEventListener('click', function () {
    //     $(btn_opt2).parent().siblings().children('.btn').removeClass('click');
    //     $(btn_opt2).addClass('click');
    //     let Q = $(btn_opt2).parent().parent().siblings('.question').find('.h2').text();
    //     let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
    //     (data.Question[questionNum]).Ans = "Op_B";
    //     console.log(data);
    // });
    // btn_opt2.addEventListener('mouseover', () => $('.toast').toast('show'));
    // opt2_Box.appendChild(btn_opt2);
    // option.appendChild(opt2_Box);
    // // OPTION 3
    // const opt3_Box = document.createElement('div');
    // opt3_Box.classList = ['col article-btn'];
    // const btn_opt3 = document.createElement('button');
    // btn_opt3.type = "button";
    // btn_opt3.classList = ['btn fs-3 fw-bolder opt3'];
    // btn_opt3.innerHTML = MODALTXT.opt3;
    // btn_opt3.addEventListener('click', function () {
    //     $(btn_opt3).parent().siblings().children('.btn').removeClass('click');
    //     $(btn_opt3).addClass('click');
    //     let Q = $(btn_opt3).parent().parent().siblings('.question').find('.h2').text();
    //     let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
    //     (data.Question[questionNum]).Ans = "Op_C";
    //     console.log(data);
    // });
    // btn_opt3.addEventListener('mouseover', () => $('.toast').toast('show'));
    // opt3_Box.appendChild(btn_opt3);
    // option.appendChild(opt3_Box);
    // // OPTION 4
    // const opt4_Box = document.createElement('div');
    // opt4_Box.classList = ['col article-btn'];
    // const btn_opt4 = document.createElement('button');
    // btn_opt4.type = "button";
    // btn_opt4.classList = ['btn fs-3 fw-bolder opt4'];
    // btn_opt4.innerHTML = MODALTXT.opt4;
    // btn_opt4.addEventListener('click', function () {
    //     $(btn_opt4).parent().siblings().children('.btn').removeClass('click');
    //     $(btn_opt4).addClass('click');
    //     let Q = $(btn_opt4).parent().parent().siblings('.question').find('.h2').text();
    //     let questionNum = parseInt(Q.substring(1, Q.length - 1)) - 1;
    //     (data.Question[questionNum]).Ans = "Op_D";
    //     console.log(data);
    // });
    // btn_opt4.addEventListener('mouseover', () => $('.toast').toast('show'));
    // opt4_Box.appendChild(btn_opt4);
    // option.appendChild(opt4_Box);
    // outcol.appendChild(option);
    // outrow.appendChild(outcol);
}