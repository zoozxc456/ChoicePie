$(document).ready(function () {
    $('.RecordList').hide().fadeIn(600);
    const RoomId = location.search.substring(1, location.search.length).split("=")[1];
    $.ajax({
        type: "GET",
        data: {
            'origin': 'searchGameResult',
            'RoomId': RoomId
        },
        dataType: "json",
        url: "../bin/Models/Play.php",
        success: function (res) {
            // console.log(res);
            if (res.status == true) {
                createHTMLnode(res.body);
                $('#PIN').text(res.body[0].PIN == undefined ? "PUBLIC" : "PIN : " + res.body[0].PIN);
                $('#RcCnt').text(res.body.length);
                $('#GameName').text((res.body[0].GName));
            }else{
                $('#PIN').text(res.body.PIN == undefined ? "PUBLIC" : "PIN : " + res.body.PIN);
                $('#RcCnt').text("0");
                $('#GameName').text((res.body.GName));                
                $('#null-list').addClass("d-block");
                $('.list').addClass("d-none");
            }
            // $('#txtTitle').text(res[0].Title);
            // $('#txtTag').text(res[0].Tag);
            // $('#txtHits').text(res[0].Hits);
            // $('#txtTime').text(res[0].ReleaseTime);
            // $('#txtLink').text(res[0].Link);
            // $('#txtContent').text(res[0].Content);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });

    $('.back').click(function () {
        window.location.href = "../questionrecord";
    });

});

function createHTMLnode(data) {
    // <li class="row listitem">
    //                     <p class="col No">1</p>
    //                     <p class="col ">Titi</p>
    //                     <p class="col ">1023</p>
    //                 </li>
    const ul = document.querySelector('.RecordList');
    // console.log(ul);
    $.each(data, (index, element) => {
        // console.log(element);
        const li = document.createElement('li');
        const no = document.createElement('p');
        const uname = document.createElement('p');
        const score = document.createElement('p');
        li.classList = ['row listitem'];
        no.classList = ['col No'];
        uname.classList = ['col'];
        score.classList = ['col'];
        no.innerHTML = index + 1;
        uname.innerHTML = element.Username;
        score.innerHTML = element.Score;
        li.appendChild(no);
        li.appendChild(uname);
        li.appendChild(score);
        ul.appendChild(li);
    });
}