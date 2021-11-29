$(document).ready(function() {
    ESId = location.search.substring(1, location.search.length).split("=")[1];
    $.ajax({
        type: "GET",
        data: {
            origin: "moreviewer",
            ESId: ESId,
        },
        dataType: "json",
        url: "../bin/Models/ExtraSource.php",
        success: function(res) {
            // console.log(res[0]);
            $("#txtTitle").text(res[0].Title);
            $("#txtTag").text(res[0].Tag);
            $("#txtHits").text(res[0].Hits);
            $("#txtTime").text(res[0].ReleaseTime);
            $("#txtLink").text(res[0].Link);
            $("#txtContent").text(res[0].Context);
        },
        error: function(jqXHR) {
            console.error(jqXHR);
        },
    });
    $(".back").click(function() {
        window.location.href = "../wb-more";
    });

    // delete modal
    $(".delete").click(function() {
        $("#myModal2").modal();
    });
    $("#exampleModal2 .yes").click(function() {
        $.ajax({
            type: "POST",
            data: {
                origin: "moreviewer",
                event:"delete",
                ESId: ESId,
            },
            dataType: "json",
            url: "../bin/Models/ExtraSource.php",
            success: function(res) {
                // console.log(res);
                if (res.res==true){
                    window.location.href = "../wb-more";
                }
            },
            error: function(jqXHR) {
                console.error(jqXHR);
            },
        });
    });

    $(".edit").click(function() {
        let txt = $(".edit").html();
        if (txt == "Done") {
            $.ajax({
                type: "POST",
                data: {
                    origin: "moreviewer",
                    event:"update",
                    ESId: ESId,
                    Content: $("#txtContent").text(),
                    Link: $("#txtLink").text(),
                },
                dataType: "json",
                url: "../bin/Models/ExtraSource.php",
                success: function(res) {
                    alert("資料更新成功!");
                    $(".textarea")
                        .css("background-color", "#F2F2F2")
                        .removeAttr("contentEditable");
                    $(".edit").text("Edit");
                },
                error: function(jqXHR) {
                    console.error(jqXHR);
                },
            });
        } else {
            $(".textarea")
                .css("background-color", "#ffffff")
                .attr("contentEditable", "true");
            $(".edit").text("Done");
        }
    });
});