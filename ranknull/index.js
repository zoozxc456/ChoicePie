$(document).ready(function() {
    $('.btn-close').click(function() {
        $("#RankDetails").css("display", "none");
    });
    $('.play').click(function() {
        window.location = "/ChoicePie/gameCategory";
    });

});