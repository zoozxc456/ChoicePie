$(document).ready(function() {
    //addListener in gameBox
    let gameBox = document.getElementsByClassName("gamebox");
    for (let item in gameBox) {
        // console.log(gameBox[item]);
        gameBox[item].onmouseover = function() {
            let front = this.children[0];
            let back = this.children[1];
            // if (front.style['display'] == "none") {
            //     front.style.display="block";
            //     back.style.display="none";
            // } else {
            //     front.style.display = "none";
            //     back.style.display = "block";
            // }
        };
        // gameBox[item].onmouseenter = gameBoxEnter;
        // gameBox[item].onmouseleave = gameBoxLeave;
    }
    let tmp_date = "Games";
    $(".dropdown-toggle").click(function() {
        $("#navbar-sm").collapse("toggle");
    });

    $('img.pie').click(function(){
        $("#navbar-lg .nav-item").removeClass('click');
        tmp_date = "Games";
        $("#game").text(tmp_date);
        $("#game").css("text-transform", "capitalize");
    });

    // lg view
    $("#navbar-lg .nav-item").click(function() {
        $(this).addClass("click");
        $(this).siblings(".nav-item").removeClass("click");
        tmp_date = $(this).html();
        $("#game").text(tmp_date);
        $("#game").css("text-transform", "capitalize");
    });

    // sm view
    $(".collapse .nav-item").click(function() {
        tmp_date = $(this).html();
        $("#navbar-sm").collapse("toggle");
        $("#game").text(tmp_date);
        $("#game").css("text-transform", "capitalize");
    });

    // change gamename
    $(".gamebox").on("mouseover", function() {
        gamename = $(this).children(".front").children(".gamename").html();
        $(".gn").text(gamename);
    });

    // share modal
    $(".share").click(function() {
        $("#content").css("position", "unset");
        $("#myModal").modal();
    });

    // delete modal
    $(".report").click(function() {
        $("#content").css("position", "unset");
        $("#myModal2").modal();
    });

    // create modal
    $(".create").click(function() {
        $("#content").css("position", "unset");
        $("#myModal3").modal();
    });
    $(".go").click(function() {});

    $(window).resize(() => {
        // maxgamename();
        // if ($(window).width() >= 768) {
        //     $("#game").text("Games");
        //     $("#game").css("text-transform", "capitalize");
        //     $("#navbar-sm").removeClass("show");
        //     let obj = $("#navbar-lg>.d-flex>.nav-pills").find(".nav-item");
            
        //     // console.log(obj);
        //     // for (let i = 0; i < obj.length; i++) {
        //     //     if (obj[i].innerHTML == tmp_date) {
        //     //         obj[i].classList.add("click");
        //     //     } else {
        //     //         // obj[i].innerHTML=classname;
        //     //         obj[i].classList.remove("click");
        //     //     }
        //     // }
        // } else {
        //     $("#game").text(tmp_date);
        // }
    });

    // button click
    $(".play").click(function() {
        window.location = "/ChoicePie/gaming";
    });

    
});

function gameBoxEnter(obj) {
    // let front = obj.item(0);
    // let back = obj.children["1"];
    // if (front.style.display == "none") {
    //     front.style.display = "block";
    //     back.style.display = "none";
    // }
    // else {
    //     front.style.display = "none";
    //     back.style.display = "block";
    // }
}

function gameBoxLeave(obj) {
    let front = obj.target.children[0];
    let back = obj.target.children[1];
    front.style.display = "block";
    back.style.display = "none";
}

// function maxgamename() {
//     let row = $(".middle").find(".row");
//     let maxname = row
//         .children(".gamebox")
//         .children(".front")
//         .children(".gamename");
//     let max = 0;
//     for (let i = 0; i < maxname.length; i++) {
//         console.log(maxname[i].offsetHeight);
//         if (maxname[i].offsetHeight > max) {
//             max = maxname[i].offsetHeight;
//         }
//     }
//     maxname.css("height", max);
// }