orderby = { 'by': null, 'asc': true };
tmp_title = "";
data = [];
$(document).ready(function() {
    orderby['by'] = 'Title';
    $.ajax({
        type: "GET",
        data: {
            'origin': 'wb-more',
            'search': '',
            'orderby': orderby['by'],
            'asc': orderby['asc']
        },
        dataType: "json",
        url: "../bin/Models/ExtraSource.php",
        success: function(res) {
            res.forEach(element => data.push(element));
            // console.log(data);
            $('.totnum .num').text(res.length);
            createHTMLnode(res);
            createSM_HTMLnode(res);
        },
        error: function(jqXHR) {
            console.error(jqXHR);
        }
    });
    $(".titleitem").click(function() {
        $(this).addClass("titlestyle");
        $(this).parent().siblings().find('.titleitem').each((index) => {
            // 把其他選項設為 ASC
            let target = $(this).parent().siblings('div').find('.titleitem')[index];
            target.classList.remove('titlestyle');
            if (target.innerHTML.indexOf('▲') == -1) {
                target.innerHTML = target.innerHTML.replace('▼', '▲');
            }
        });
        switch ($(this)[0].id) {
            case 'title':
                orderby['by'] = "title";
                break;
            case 'time':
                orderby['by'] = "time";
                break;
            case 'hits':
                orderby['by'] = "hits";
                break;
            case 'tag':
                orderby['by'] = "tag";
                break;
        }
        if ($(this).text().indexOf('▼') != -1) {
            $(this).text($(this).text().replace('▼', '▲'))
            orderby['asc'] = true;
        } else {
            $(this).text($(this).text().replace('▲', '▼'));
            orderby['asc'] = false;
        }
        // console.log(orderby);
        $.ajax({
            type: "GET",
            data: {
                'origin': 'wb-more',
                'search': '',
                'orderby': orderby['by'],
                'asc': orderby['asc']
            },
            dataType: "json",
            url: "../bin/Models/ExtraSource.php",
            success: function(res) {
                // console.log(res);
                createHTMLnode(res);
                createSM_HTMLnode(res);
            },
            error: function(jqXHR) {
                // console.error(jqXHR);
            }
        });
    });
    $('.search button').click(function() {
        $.ajax({
            type: "GET",
            data: {
                'origin': 'wb-more',
                'search': $('.search input').val(),
                'orderby': orderby['by'],
                'asc': orderby['asc']
            },
            dataType: "json",
            url: "../bin/Models/ExtraSource.php",
            success: function(res) {
                // console.log(res);
                $('.lglist ul *').remove();
                if(res.status!=undefined && res.status==false){
                    $('.totnum .num').text(0);
                }else{
                    $('.totnum .num').text(res.length);                    
                    createHTMLnode(res);
                    createSM_HTMLnode(res);
                }
                
            },
            error: function(jqXHR) {
                console.error(jqXHR);
            }
        });
    });
    $('#modal-btn-submit').click(function() {
        /*
            Model 內容輸入後，按下submit送出
        */
        let txtTitle = $.trim($('#form-title').val());
        let txtTag = $.trim($('#form-tag').val());
        let txtLink = $.trim($('#form-link').val());
        let txtContext = $.trim($('#form-context').val());
        let status = 1;
        // Check input_Data
        if (txtTitle == '') {
            $('#form-title').removeClass('is-valid').addClass('is-invalid');
            status &= 0;
        } else {
            $('#form-title').removeClass('is-invalid').addClass('is-valid');
        }

        if (txtTag == '') {
            $('#form-tag').removeClass('is-valid').addClass('is-invalid');
            status &= 0;
        } else {
            $('#form-tag').removeClass('is-invalid').addClass('is-valid');
        }

        if (txtLink == '') {
            $('#form-link').removeClass('is-valid').addClass('is-invalid');
            status &= 0;
        } else {
            $('#form-link').removeClass('is-invalid').addClass('is-valid');
        }

        if (txtContext == '') {
            $('#form-context').removeClass('is-valid').addClass('is-invalid');
            status &= 0;
        } else {
            $('#form-context').removeClass('is-invalid').addClass('is-valid');
        }
        if (status) {
            // location.href = "../wb-more";
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    'origin': 'wb-more',
                    'title': txtTitle,
                    'tag': txtTag,
                    'link': txtLink,
                    'content': txtContext
                },
                url: "../bin/Models/ExtraSource.php",
                success: function(res) {
                    // console.log(res);
                    setTimeout(function() {
                        $('#exampleModal').fadeOut(300, function() {
                            $('#exampleModal').modal('hide');
                        });
                        setTimeout(function() {
                            $('.form-group input,.form-group textarea').val("");
                            $('.lglist ul *').remove();
                            if(res.status==false){
                                $('.totnum .num').text(0);
                            }else{
                                $('.totnum .num').text(res.response.length);                    
                                createHTMLnode(res.response);
                                createSM_HTMLnode(res.response);
                            }
                        }, 500);
                    }, 500);
                },error:function(jqXHR){
                    console.log(jqXHR);
                }
            });
        }
    });
});

function createSM_HTMLnode(data) {
    $('.smlist *').remove();
    const list = document.querySelector('.smlist');

    for (let item in data) {
        const outRow = document.createElement('div');
        const btn = document.createElement('button');
        const collapse = document.createElement('ul');
        const collapse_list = document.createElement('li');
        const leftBox = document.createElement('div');
        const leftBox_title = document.createElement('p');
        const leftBox_amount = document.createElement('p');
        const midBox = document.createElement('div');
        const midBox_title = document.createElement('p');
        const midBox_amount = document.createElement('p');
        const rightBox = document.createElement('div');
        const rightBox_title = document.createElement('p');
        const rightBox_amount = document.createElement('p');
        outRow.classList = ['row'];
        btn.classList = ['btn btn-warning'];
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
            location.href = "../wb-moreviewer/?GId=" + data[item].ESId;
        });
        leftBox.classList = ['col p-0 text-center mx-3'];
        midBox.classList = ['col p-0 text-center mx-3'];
        rightBox.classList = ['col p-0 text-center mx-3'];
        leftBox_title.classList = ['text'];
        midBox_title.classList = ['text'];
        rightBox_title.classList = ['text'];
        btn.innerHTML = data[item].title;
        leftBox_title.innerHTML = 'tag';
        leftBox_amount.innerHTML = data[item].tag;
        midBox_title.innerHTML = 'time';
        midBox_amount.innerHTML = (data[item].time).replace(/-/g, '/');
        rightBox_title.innerHTML = 'hits';
        rightBox_amount.innerHTML = data[item].Hits;


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

    // console.log(list);
}

function createHTMLnode(data) {
    $('.lglist ul *').remove();
    let list = document.querySelector('.list');
    for (let item in data) {
        // 建立DOM節點
        let li = document.createElement('li');
        let Title = document.createElement('div');
        let Tag = document.createElement('div');
        let Time = document.createElement('div');
        let Hits = document.createElement('div');
        li.classList = ['row my-2 text-center'];
        li.addEventListener('click', () => {
            let thisNode = $(li);
            thisNode.siblings('li').removeClass('active');
            thisNode.addClass('active');
            location.href = "../wb-moreviewer/?ESId=" + data[thisNode.index()].ESId;
        });
        Title.classList = ['col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 fs-4 text-truncate'];
        Title.innerHTML = data[item].title;
        Tag.classList = ['col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4'];
        Tag.innerHTML = data[item].tag;
        Time.classList = ['col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4'];
        Time.innerHTML = (data[item].time).replace(/-/g, '/');
        Hits.classList = ['col p-0 text-center ml-xxl-5 fs-4'];
        Hits.innerHTML = data[item].Hits;;
        li.appendChild(Title);
        li.appendChild(Tag);
        li.appendChild(Time);
        li.appendChild(Hits);
        list.appendChild(li);
    }
    $('.lglist ul').hide().fadeIn(600);
}

function upgrateHTMLnode(data) {
    for (let item in data) {
        $('.list > li div')[item * 4 + 0].innerHTML = data[item].title;
        $('.list > li div')[item * 4 + 1].innerHTML = data[item].tag;
        $('.list > li div')[item * 4 + 2].innerHTML = (data[item].time).replace(/-/g, '/');
        $('.list > li div')[item * 4 + 3].innerHTML = data[item].Hits;
    }
}