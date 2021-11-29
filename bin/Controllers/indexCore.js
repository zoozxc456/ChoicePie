moreData = null;
moreIndex = 0;
moreLen = 0;
$(document).ready(function() {
    // Load More Access in moreData
    $.ajax({
        type: "GET",
        dataType: "json",
        data: { "origin": "index" },
        url: "../bin/models/ExtraSource.php",
        success: function(data) {
            moreData = data;
            moreLen = data.length;
            for (let item = 0; item < 3; item++) {
                $('#carousel-content .cube>.title')[item].innerHTML = moreData[(moreIndex + item) % moreLen]['Tag'];
                $('#carousel-content .cube>.content')[item].innerHTML = (moreData[(moreIndex + item) % moreLen]['Context']).substring(0, 250) + (moreData[(moreIndex + item) % moreLen]['Context'].length > 250 ? "..." : "");
            }
        },
        error: function(jqXHR) {
            console.error(jqXHR);
        }
    });

    $('#article-btn').click(function() {
        let PIN = $("input").val();
        ajaxMax('GET', 'json', {
                "getItem": "GamePIN",
                "PIN": PIN
            },
            "../bin/models/GameRoom.php",
            vaildPIN
        );
    });
    $('#preArrow').click(function() {
        //設計點選more左箭頭，更新其innerHTML
        var delay = function(r, s) {
            return new Promise(function(resolve, reject) {
                setTimeout(function() {
                    resolve([r, s]);
                }, s);
            });
        };
        delay($('#carousel-content,#carousel-content *').stop().fadeOut(300), 300).then(function(v) {
            return delay(update(-1), 1);
        });
    });
    $('#nextArrow').click(function() {
        //設計點選more右箭頭，更新其innerHTML
        var delay = function(r, s) {
            return new Promise(function(resolve, reject) {
                setTimeout(function() {
                    resolve([r, s]);
                }, s);
            });
        };
        delay($('#carousel-content,#carousel-content *').stop().fadeOut(300), 300).then(function(v) {
            return delay(update(1), 1);
        });
    });
});

function update(step) {
    if (step > 0) {
        moreIndex = (moreIndex + 3) % moreLen;
        for (let item = 0; item < 3; item++) {
            $('#carousel-content .cube>.title')[item].innerHTML = moreData[(moreIndex + item) % moreLen]['Tag'];
            $('#carousel-content .cube>.content')[item].innerHTML = moreData[(moreIndex + item) % moreLen]['Context'].substring(0, 250) + (moreData[(moreIndex + item) % moreLen]['Context'].length > 250 ? "..." : "");
        }

    } else {
        moreIndex = moreIndex - 3;
        if (moreIndex < 0) {
            moreIndex = moreIndex + moreLen;
        }
        for (let item = 0; item < 3; item++) {
            $('#carousel-content .cube>.title')[item].innerHTML = moreData[(moreIndex + item) % moreLen]['Tag'];
            $('#carousel-content .cube>.content')[item].innerHTML = moreData[(moreIndex + item) % moreLen]['Context'].substring(0, 250) + (moreData[(moreIndex + item) % moreLen]['Context'].length > 250 ? "..." : "");
        }
    }
    $('#carousel-content,#carousel-content *').fadeIn(600);
    return moreIndex;
}

function vaildPIN(data) {
    if (data['status'])
        window.location.assign("../Game");
    else
        $("input").addClass('is-invalid');
}

function ajaxMax(type, dataType, data, url, successFunc) {
    $.ajax({
        type: type,
        dataType: dataType,
        data: data,
        url: url,
        success: successFunc,
        error: function(jqXHR) {
            console.error(jqXHR);
        }
    });

}