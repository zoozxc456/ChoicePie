$(document).ready(function () {
    $.ajax({
        type: "GET",
        data: {
            'origin': 'wb-review',
        },
        dataType: "json",
        url: "../bin/Controllers/wb-review.php",
        success: function (res) {
            $('#Unreviewed_total').text(parseInt(res.Game_Unreviewed) + parseInt(res.Report_Unreviewed));
            $('#Audited_total').text(parseInt(res.Game_Audited) + parseInt(res.Report_Audited));
            $('#Unreviewed_box>.cube1>.num').text(parseInt(res.Report_Unreviewed));
            $('#Unreviewed_box>.cube2>.num').text(parseInt(res.Game_Unreviewed));
            $('#Audited_box>.cube1>.num').text(parseInt(res.Report_Audited));
            $('#Audited_box>.cube2>.num').text(parseInt(res.Game_Audited));
            $('.num').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 700,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
            createPie(res);
        },
        error: function (jqXHR) {
            console.error(jqXHR);
        }
    });



});
$(window).resize(() => {
    window.location.replace("")
});
function createPie(res) {
    var w = ($(".cube").width()) * 0.6;
    var h = w;
    //資料   
    var data1 = [res.Game_Unreviewed, res.Report_Unreviewed];
    var data2 = [res.Game_Audited, res.Report_Audited];
    var outerRadius = w / 2;
    var tot1 = data1[0] + data1[1];
    var tot2 = data2[0] + data2[1];
    // console.log(tot2);
    //如果大於0就會是甜甜圈   
    var innerRadius = 0;
    var arc = d3.svg.arc()
        .innerRadius(innerRadius)
        .outerRadius(outerRadius);
    var arc2 = d3.svg.arc().innerRadius(innerRadius).outerRadius(outerRadius + 30);
    var pie = d3.layout.pie();

    //定義顏色
    var color = d3.scale.ordinal()
        .range(["#F8931D", "#F15F2B"]);
    var color2 = d3.scale.ordinal()
        .range(["#F8931D", "#F15F2B"]);

    // pie1 
    //Create SVG element   
    var svg1 = d3.select(".pie1")
        .append("svg")
        .attr("width", w)
        .attr("height", h);

    //Set up groups   
    var arcs1 = svg1.selectAll("g.arc")
        .data(pie(data1))
        .enter()
        .append("g")
        .attr("class", "arc")
        .attr("transform", "translate(" + outerRadius + "," + outerRadius + ")");

    //Draw arc paths   
    arcs1.append("path")
        .style("fill", function (d) {
            return color(d.data);
        })
        .style("fill", function (d) {
            return color(d.data);
        })
        .attr("d", arc);
    arcs1.transition().duration(2000);


    //Labels   
    arcs1.append("text")
        .attr("transform", function (d) {
            //設定文字在各區塊中央
            // console.log((d));
            return "translate(" + arc.centroid(d) + ")";
        })
        .attr("text-anchor", "middle")
        .attr("fill", "#ffffff")
        .text(function (d) {
            // console.log(d.value);
            return Math.round((d.value / tot1) * 100) + "%";
        });

    // pie2
    //Create SVG element   
    var svg2 = d3.select(".pie2")
        .append("svg")
        .attr("width", w)
        .attr("height", h);

    //Set up groups   
    var arcs2 = svg2.selectAll("g.arc")
        .data(pie(data2))
        .enter()
        .append("g")
        .attr("class", "arc")
        .attr("transform", "translate(" + outerRadius + "," + outerRadius + ")");

    //Draw arc paths   
    arcs2.append("path")
        .style("fill", function (d) {
            return color2(d.data);
        })
        .style("fill", function (d) {
            return color2(d.data);
        })
        // .style("z-index","-1")
        .attr("d", arc);
    //Labels   
    arcs2.append("text")
        .attr("transform", function (d) {
            //設定文字在各區塊中央   
            return "translate(" + arc.centroid(d) + ")";
        })
        .attr("text-anchor", "middle")
        .style("fill", "#ffffff")
        // .style("z-index","1")
        .text(function (d) {
            return Math.round((d.value / tot2) * 100) + "%";
        });


    //hover
    $('path').on('mouseover', function () {
        // console.log('123');
        $(this).css("opacity", "0.8");
        d3.select(this).select('path').transition().attr('d', function (d) {
            // console.log('123');
            return arc2(d);
        });
    });
    $('path').on('mouseout', function () {
        $(this).css("opacity", "1");
        d3.select(this).select('path').transition().attr('d', function (d) {

            return arc(d);
        });
    });
}