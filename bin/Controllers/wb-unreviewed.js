orderby = { 'by': null, 'asc': true };
tmp_title = "";
$(document).ready(function () {
    $('#RecordList,.num').hide().fadeIn(600);
    orderby['by'] = 'name';
    $.ajax({
        type: "GET",
        data: {
            'origin': 'wb-unreviewed',
            'search': '',
            'item': $('#options option:selected').val(),
            'orderby': orderby['by'],
            'asc': orderby['asc']
        },
        dataType: "json",
        url: "../bin/Controllers/wb-unreviewed.php",
        success: function (res) {
            // console.log(res);
            createHTMLnode(res);
            createSM_HTMLnode(res);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });
    $("#options>select").change(function () {
        // console.log($(this));
        $('.smlist .row,.lglist .list li').remove();
        $.ajax({
            type: "GET",
            data: {
                'origin': 'wb-unreviewed',
                'search': $('.search input').val(),
                'item': $('#options option:selected').val(),
                'orderby': orderby['by'],
                'asc': orderby['asc']
            },
            dataType: "json",
            url: "../bin/Controllers/wb-unreviewed.php",
            success: function (res) {
                createHTMLnode(res);
                createSM_HTMLnode(res);
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }

        });
    });
    $(".titleitem").click(function () {
        $(this).parent().siblings().find('.titleitem').each((index) => {
            // 把其他選項設為 ASC
            let target = $(this).parent().siblings('div').find('.titleitem')[index];
            if (target.innerHTML.indexOf('▲') == -1) {
                target.innerHTML = target.innerHTML.replace('▼', '▲');
            }
        });
        switch ($(this)[0].id) {
            case 'name':
                orderby['by'] = "name";
                break;
            case 'time':
                orderby['by'] = "time";
                break;
            case 'amount':
                orderby['by'] = "Amount";
                break;
        }
        if ($(this).text().indexOf('▼') != -1) {
            $(this).text($(this).text().replace('▲', '▼'))
            orderby['asc'] = true;
        } else {
            $(this).text($(this).text().replace('▼', '▲'));
            orderby['asc'] = false;
        }
        $.ajax({
            type: "GET",
            data: {
                'origin': 'wb-unreviewed',
                'search': $('.search input').val(),
                'item': $('#options option:selected').val(),
                'orderby': orderby['by'],
                'asc': orderby['asc']
            },
            dataType: "json",
            url: "../bin/Controllers/wb-unreviewed.php",
            success: function (res) {
                createHTMLnode(res);
                createSM_HTMLnode(res);
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }
        });
    });
    $('.search button').click(function () {
        $('.smlist .row,.lglist .list li').remove();
        $.ajax({
            type: "GET",
            data: {
                'origin': 'wb-unreviewed',
                'item': $('#options option:selected').val(),
                'search': $('.search input').val(),
                'orderby': orderby['by'],
                'asc': orderby['asc']
            },
            dataType: "json",
            url: "../bin/Controllers/wb-unreviewed.php",
            success: function (res) {
                createHTMLnode(res);
                createSM_HTMLnode(res);
            },
            error: function (jqXHR) {
                console.error(jqXHR);
            }

        });
    });
});

function createSM_HTMLnode(data) {
    $('.smlist ul *').remove();
    const list = document.querySelector('.smlist');

    for (let item in data) {
        const outRow = document.createElement('div');
        const btn = document.createElement('button');
        const collapse = document.createElement('ul');
        const collapse_list = document.createElement('li');
        const leftBox = document.createElement('div');
        const leftBox_title = document.createElement('p');
        const leftBox_amount = document.createElement('p');
        const rightBox = document.createElement('div');
        const rightBox_title = document.createElement('p');
        const rightBox_amount = document.createElement('p');
        outRow.classList = ['row'];
        btn.classList = ['btn btn-warning' + (data[item].type == 'Report' ? ' report' : '')];
        btn.addEventListener('click', (event) => {
            let thisBtn = $(event.target);
            thisBtn.siblings('.collapse').collapse('toggle'); //只開點擊的collapse
            $(".collapse").collapse('hide'); //點擊收前一個collapse
            thisBtn.addClass("active");
            thisBtn.parents().siblings().find('.active').removeClass('active');
        });
        collapse.classList = ['collapse'];
        collapse_list.classList = ['row my-2 w-100 text-center'];
        collapse_list.addEventListener('click',function(){
            location.href = "../wb-unreviewedviewer?" + (data[item].type == 'Report' ? "RId="+data[item].response.RId : "GId="+data[item].response.GId);
        });
        leftBox.classList = ['col p-0 text-center mx-3'];
        rightBox.classList = ['col p-0 text-center mx-3'];
        leftBox_title.classList = ['text'];
        rightBox_title.classList = ['text'];
        btn.innerHTML = data[item].response.name;
        leftBox_title.innerHTML = 'time';
        leftBox_amount.innerHTML = (data[item].response.time).replace(/-/g, '/');
        rightBox_title.innerHTML = 'amount';
        rightBox_amount.innerHTML = data[item].response.Amount;


        // 結合節點


        leftBox.appendChild(leftBox_title);
        leftBox.appendChild(leftBox_amount);
        rightBox.appendChild(rightBox_title);
        rightBox.appendChild(rightBox_amount);
        collapse_list.appendChild(leftBox);
        collapse_list.appendChild(rightBox);
        collapse.appendChild(collapse_list);
        outRow.appendChild(btn);
        outRow.appendChild(collapse);
        list.appendChild(outRow);
    }
}

function createHTMLnode(data) {
    $('.lglist ul *').remove();
    $('.totnum .num').text(data.length);
    // <li class="row my-2 text-center">
    //     <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
    //                         </div>
    //     <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
    //     <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
    // </li>
    let list = document.querySelector('.list');
    for (let item in data) {
        // 建立DOM節點
        let li = document.createElement('li');
        let GName = document.createElement('div');
        let Time = document.createElement('div');
        let Amount = document.createElement('div');
        li.classList = ['row my-2 text-center' + (data[item].type == 'Report' ? ' report' : '')];
        li.addEventListener('click', () => {
            let thisNode = $(li);
            thisNode.siblings('li').removeClass('active');
            thisNode.addClass('active');
            location.href = "../wb-unreviewedviewer?" + (data[item].type == 'Report' ? "RId="+data[item].response.RId : "GId="+data[item].response.GId);
        });
        GName.classList = ['col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4 text-truncate'];
        GName.innerHTML = data[item].response.name;
        Time.classList = ['col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4'];
        Time.innerHTML = (data[item].response.time).replace(/-/g, '/');
        Amount.classList = ['col p-0 text-center ml-xxl-5 fs-4'];
        Amount.innerHTML = data[item].response.Amount;
        li.appendChild(GName);
        li.appendChild(Time);
        li.appendChild(Amount);
        list.appendChild(li);
    }
    $('.lglist ul').hide().fadeIn(600);
}

function upgrateHTMLnode(data) {
    // console.log(data);
    for (let item in data) {
        $('.list > li div')[item * 3 + 0].innerHTML = data[item].type == 'Report' ? 'Report' : data[item].response.name;
        $('.list > li div')[item * 3 + 1].innerHTML = (data[item].response.time).replace(/-/g, '/');
        $('.list > li div')[item * 3 + 2].innerHTML = (data[item].type == 'Report') ? 1 : data[item].response.Amount;
        // 建立DOM節點

        // let li = document.createElement('li');
        // let GName = document.createElement('div');
        // let Time = document.createElement('div');
        // let Amount = document.createElement('div');
        // li.classList = ['row my-2 text-center'];
        // GName.classList = ['col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4'];
        // GName.innerHTML = data[item].GName;
        // Time.classList = ['col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4'];
        // Time.innerHTML = (data[item].Time).replace(/-/g, '/');
        // Amount.classList = ['col p-0 text-center ml-xxl-5 fs-4'];
        // Amount.innerHTML = data[item].Amount;
        // console.log(Amount);
        // li.appendChild(GName);
        // li.appendChild(Time);
        // li.appendChild(Amount);
        // list.appendChild(li);
    }
}