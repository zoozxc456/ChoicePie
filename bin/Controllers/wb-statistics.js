$(document).ready(function() {
    // Line 3 ~ Line 8 SVG Graph Globel Variables
    maindata = [];
    chartType = "visitor"; // Init

    $.ajax({
        type: "GET",
        dataType: "json",
        data: {
            'origin': 'wb-statistics',
            "date": $('.datelist .active').text(),
            'option': "visitor"
        },
        url: "../bin/Controllers/wb-statistics.php",
        success: function(data) {
            maindata = data.slice();
            setTimeout(() => {
                myd3js(); // 建立d3.js圖表
                createBar("visitor");
            }, 300);

        },
        error: function(jqXHR) {
            console.error(jqXHR);
        }
    });

    $('#button-container > button').click(function() {
        // 統計項目按鈕

        let title = $(this).text();
        title = title[0].toUpperCase() + title.slice(1);
        $('#mainTitle').text(title);
        chartType = $(this).text();

        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                'origin': 'wb-statistics',
                "date": $('.datelist .active').text(),
                'option': $(this).text()
            },
            url: "../bin/Controllers/wb-statistics.php",
            success: function(data) {
                maindata = data.slice();
                setTimeout(() => {
                    createBar(chartType);
                }, 300);

            },
            error: function(jqXHR) {
                console.error(jqXHR);
            }
        });
    });
    $(".list-group-item").click(function() {
        // 點擊日期 Button 換 Text
        // console.log($('.datelist .active').text(), $('.chartbtn.click').text());
        chartType = $('.chartbtn.click').text();
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                'origin': 'wb-statistics',
                "date": $('.datelist .active').text(),
                'option': $('.chartbtn.click').text()
            },
            url: "../bin/Controllers/wb-statistics.php",
            success: function(data) {
                maindata = data.slice();
                createBar(chartType);
            },
            error: function(jqXHR) {
                console.error(jqXHR);
            }
        });

    });
});
$(window).resize(function() {

    setTimeout(() => {
        $('.svg *').remove();
        myd3js(); // 建立d3.js圖表
        createBar("visitor");
    }, 300);
    // createBar(chartType);
});

function myd3js() {
    // 建立d3.js圖表

    // 設定畫布尺寸 & 邊距
    svg = d3.select('.svg');
    svg.attr({
        "width": "100%",
        "height": "100%",
        "transform": "translate(" + 0 + "," + 0 + ")"
    });

    margin = 38;
    width = $(".svg").width();
    height = $(".svg").height();
    xScale_price = d3.scale.linear().domain([0, 12]).range([0, width - margin * 1.5]);
    yScale2_price = d3.scale.linear().domain([0, 1]).range([height - margin * 2, 0]);
    // x 軸
    var cnt = 0;
    var xAxis = d3.svg.axis()
        .scale(xScale_price)
        .orient("bottom")
        .ticks(12)
        .tickFormat(function(i) {
            return cnt < 12 ? 2 * cnt++ : ''; // 這裡控制坐標軸的單位
        });

    // y 軸
    var yAxis = d3.svg.axis()
        .scale(yScale2_price)
        .orient("left");

    // 繪製 x 軸
    svg.append("g")
        .attr({
            "class": "x axis",
            "transform": "translate(" + margin + "," + (height - margin) + ")",
            'fill': '#585857'
        })
        .call(xAxis);

    // 繪製 y 軸
    svg.append("g")
        .attr({
            "class": "y axis",
            "transform": "translate(" + margin + ", " + margin + ")",
            'fill': '#585857'
        })
        .call(yAxis);

    // 處理軸線位移
    svg.select('.x.axis').selectAll('.tick text').attr("dx", width * 0.045);
    svg.select('.x.axis').selectAll('.tick line').attr('transform', 'translate(' + width * 0.045 + ', 0)');

}

function createBar(chartType) {
    // console.log(maindata);
    // console.log('maindata');
    let sum = 0

    for (let i in maindata) {
        let arr = Object.values(maindata[i]);
        sum += arr[1];
    }
    $('.cube .num').text(sum).each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 700,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $('.date .avg').text(sum / 24).each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 700,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.floor(now));
            }
        });
    });
    // 依照圖表的類別，重新定義 x, y 比例尺
    var xScale, yScale, yScale2, xAxis, yAxis, max;
    if (chartType == 'visitor') {
        // x 軸比例尺
        max = d3.max(maindata, function(d) { return d.visitor }) // 訪客最大值
    } else if (chartType == 'question') {
        max = d3.max(maindata, function(d) { return d.question }) // 題目最大值
    } else if (chartType == 'member') {
        max = d3.max(maindata, function(d) { return d.member }) // 會員人數最大值
    } else {
        return;
    }
    // x 軸比例尺
    xScale = d3.scale.linear().domain([0, 12]).range([0, width - margin * 1.3]);;
    // y 軸比例尺 給繪製矩形用
    yScale = d3.scale.linear().domain([0, max]).range([0, height - margin * 2.0]);
    // y 軸比例尺 2 繪製座標軸用
    yScale2 = d3.scale.linear().domain([0, max > 0 ? max : 1]).range([height - margin * 2.0, 0]);
    // 座標軸重繪
    // x 軸
    xAxis = d3.svg.axis()
        .scale(xScale)
        .orient("bottom")
        .ticks(12)
        .tickFormat(function(i) {
            return (maindata[i]) && (maindata[i].region >= 0) ? maindata[i].region : ''; // 這裡控制坐標軸的單位
        });
    // y 軸
    yAxis = d3.svg.axis().scale(yScale2).orient("left");

    // 更新軸線
    svg.selectAll('.x.axis').transition().duration(600).call(xAxis);
    svg.selectAll('.y.axis').transition().duration(1000).call(yAxis);


    // 資料排序, 透過 d3.descending 或 d3.ascending 來決定排序方式
    // data.sort(function(a, b){
    //   // 降冪
    //   // return d3.descending(a[chartType], b[chartType]);

    //   // 升冪
    //   return d3.ascending(a[chartType], b[chartType]);
    // });

    // 產生長條圖
    svg.selectAll('.bar')
        .data(maindata)
        .enter()
        .append('rect')
        .classed('bar', true)
        .on('click', function() {
            let parent = this.parentNode;
            //取出父層第一個子元素
            let sibling = parent.firstChild;
            //如果有sibling子元素執行迴圈
            while (sibling) {
                if (sibling.nodeName == "rect" && sibling.classList.contains("active")) {
                    sibling.classList.remove("active");
                }

                sibling = sibling.nextSibling;
            }
            this.classList.add("active");
        });

    svg.selectAll('.bar')
        .transition()
        .duration(700)
        .attr({
            'x': function(d, i) {
                return xScale(i) * 0.99 + margin
            },
            'y': function(d, i) {
                let y = yScale(d[chartType]) > 0 ? yScale(d[chartType]) : 0
                return height - y - margin;
            },
            'width': width * 0.04,
            'height': function(d, i) {
                return yScale(d[chartType]) > 0 || yScale(d[chartType]) == 'NaN' ? yScale(d[chartType]) : 0;
            },
            "transform": "translate(" + width * (0.03) + ", " + 0 + ")",
            // 'onclick': "style='fill:#F15F2B;'"
        });
}