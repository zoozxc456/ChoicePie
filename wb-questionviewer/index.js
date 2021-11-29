$(document).ready(function () {
    $('.RecordList *').hide();
    $('.RecordList *').fadeIn(600);
    $('.back').click(function(){
        window.location.href="../wb-question";
    });
    let GId = location.search.substring(1, location.search.length).split("=")[1];
    $.ajax({
        type: "GET",
        data: {
            "origin": "wb-questionviewer",
            "GId": GId,
        },
        dataType: "json",
        url: "../bin/Models/Question.php",
        success: function (res) {
            // console.log(res);
            $('.RecordTitle').text(res.GName);
            createQuestionBox(res.Question);
            // $("#txtTitle").text(res[0].Title);
            // $("#txtTag").text(res[0].Tag);
            // $("#txtHits").text(res[0].Hits);
            // $("#txtTime").text(res[0].ReleaseTime);
            // $("#txtLink").text(res[0].Link);
            // $("#txtContent").text(res[0].Content);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        },
    });
});

function createQuestionBox(data) {
    /*{
        <li class="row p-0 my-2 listitem">
            <div class="col p-1 text-start">
                <label class="h3 q">Q1.</label>
                <label class="h4">Which song was not released in 2020?</label>
            </div>
        <div class="row my-1">
            <div class="col article-btn">
                <button type="button" class="btn fs-4 fw-bolder">Dynamite</button>
            </div>
            <div class="col article-btn">
                <button type="button" class="btn fs-4 fw-bolder ans">Go Go</button>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col article-btn">
                <button type="button" class="btn fs-4 fw-bolder">Dis-ease</button>
            </div>
            <div class="col article-btn">
                <button type="button" class="btn fs-4 fw-bolder">Abyss</button>
            </div>
        </div>
    </li> }*/
    $('ul.RecordList *').remove();
    const ulRoot = document.querySelector('ul.RecordList');
    // console.log(data);
    $.each(data, function (index, element) {
        // console.log(element);
        const listItem = document.createElement('li');
        listItem.classList = ['row p-0 my-2 listitem'];
        // Title
        const TitleWrapper = document.createElement('div');
        TitleWrapper.classList = ['col p-1 text-start'];
        const QNO = document.createElement('label');
        QNO.classList = ['h3 q'];
        QNO.innerHTML = "Q" + (index + 1) + ".";
        const Title =  document.createElement('label');
        Title.classList = ['h4'];
        Title.innerHTML = element.Title;
        TitleWrapper.appendChild(QNO);
        TitleWrapper.appendChild(Title);
        // Top Buttons
        const TopBtnWrapper = document.createElement('div');
        TopBtnWrapper.classList = ['row my-1'];

        const OP_ACol = document.createElement('div');
        OP_ACol.classList = ['col article-btn'];
        const OP_A = document.createElement('button');
        OP_A.classList = ['btn fs-4 fw-bolder ' + (element.Ans == "OP_A" ? "ans" : "")];
        OP_A.innerHTML = element.OP_A;
        OP_ACol.appendChild(OP_A);

        const OP_BCol = document.createElement('div');
        OP_BCol.classList = ['col article-btn'];
        const OP_B = document.createElement('button');
        OP_B.classList = ['btn fs-4 fw-bolder ' + (element.Ans == "OP_B" ? "ans" : "")];
        OP_B.innerHTML = element.OP_B;
        OP_BCol.appendChild(OP_B);
        TopBtnWrapper.appendChild(OP_ACol);
        TopBtnWrapper.appendChild(OP_BCol);

        // Buttom Buttons
        const ButtomBtnWrapper = document.createElement('div');
        ButtomBtnWrapper.classList = ['row my-1'];

        const OP_CCol = document.createElement('div');
        OP_CCol.classList = ['col article-btn'];
        const OP_C = document.createElement('button');
        OP_C.classList = ['btn fs-4 fw-bolder ' + (element.Ans == "OP_C" ? "ans" : "")];
        OP_C.innerHTML = element.OP_C;
        OP_CCol.appendChild(OP_C);

        const OP_DCol = document.createElement('div');
        OP_DCol.classList = ['col article-btn'];
        const OP_D = document.createElement('button');
        OP_D.classList = ['btn fs-4 fw-bolder ' + (element.Ans == "OP_D" ? "ans" : "")];
        OP_D.innerHTML = element.OP_D;
        OP_DCol.appendChild(OP_D);
        ButtomBtnWrapper.appendChild(OP_CCol);
        ButtomBtnWrapper.appendChild(OP_DCol);
        listItem.appendChild(TitleWrapper);
        listItem.appendChild(TopBtnWrapper);
        listItem.appendChild(ButtomBtnWrapper);
        ulRoot.appendChild(listItem);
    });
}