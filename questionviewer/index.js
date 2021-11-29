Questions=[];
$(document).ready(function () {
    // LOAD
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            "origin": "questionviewer"
        },
        url: "../bin/models/question.php",
        success: function (res) {
            
            Questions=res.Question;
            // console.log(Questions);
            createQuestionBox();
            $('.RecordTitle').text(Questions[0].GName);
            $('.RecordList *').hide();
            $('.RecordList *').fadeIn(600);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });


    


    $('.back').click(function () {
        window.location.href = "../questioncategory";
    });

});


function createQuestionBox() {

    const ulRoot = document.querySelector('ul.RecordList');
    $.each(Questions, function (index, element) {
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