<?php
header('Content-Type: application/json; charset=UTF-8');
$search = isset($_GET['search']) ? $_GET['search'] : null;
$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
$asc = isset($_GET['asc']) ? $_GET['asc'] : null;
$item = isset($_GET['item']) ? $_GET['item'] : null;
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
$json = array();
if ($item == "ALL") {
    $gameCommand = "SELECT GId,GName as name,DATE(ReleaseTime) AS time,Amount FROM game WHERE 1=1 AND Status='0'";
    if ($_GET['search'] != "") {
        $gameCommand .= " AND GName LIKE '%{$_GET["search"]}%' ";
    }

    $gameCommand .= " ORDER BY {$_GET['orderby']} " . ($_GET['asc'] == "true" ? "ASC" : "DESC");
    $result = mysqli_query($link, $gameCommand);
    while ($row = mysqli_fetch_assoc($result)) {
        $temp = array('response' => $row, 'type' => 'Game');
        array_push($json, $temp);
    }
    if ($_GET['search'] != "" && strpos('REPORT', strtoupper($_GET['search'])) === false) {
    } else {
        $reportCommand = "SELECT RId,Reason,Result,G.GName AS name,G.Amount,DATE(G.ReleaseTime) AS time FROM report LEFT JOIN Game AS G ON report.GId=G.GId WHERE Result='Unreviewed'";
        $result = mysqli_query($link, $reportCommand);
        while ($row = mysqli_fetch_assoc($result)) {
            $temp = array('response' => $row, 'type' => 'Report');
            array_push($json, $temp);
        }
    }








    // if (!($_GET['search'] != "" && !(str_contains(strtoupper($_GET['search']), 'REPORT')))) {
    // }
    // $reportCommand .= " ORDER BY Reason" . ($_GET['asc'] == "true" ? "ASC" : "DESC");

} else if ($item == "Game") {
    $gameCommand = "SELECT GId,GName as name,DATE(ReleaseTime) AS time,Amount FROM game WHERE Status='0'";
    if ($_GET['search'] != "") {
        $gameCommand .= " AND GName LIKE '%{$_GET["search"]}%' ";
    }

    $gameCommand .= " ORDER BY {$_GET['orderby']} " . ($_GET['asc'] == "true" ? "ASC" : "DESC");
    $result = mysqli_query($link, $gameCommand);
    while ($row = mysqli_fetch_assoc($result)) {
        $temp = array('response' => $row, 'type' => 'Game');
        array_push($json, $temp);
    }
} else if ($item == "Report") {
    $reportCommand = "SELECT RId,Reason,Result,G.GName AS name,G.Amount,DATE(G.ReleaseTime) AS time FROM report LEFT JOIN Game AS G ON report.GId=G.GId WHERE Result='Unreviewed'";
    // $reportCommand .= " ORDER BY Reason" . ($_GET['asc'] == "true" ? "ASC" : "DESC");
    $result = mysqli_query($link, $reportCommand);
    while ($row = mysqli_fetch_assoc($result)) {
        $temp = array('response' => $row, 'type' => 'Report');
        array_push($json, $temp);
    }
}
// for ($i = 0; $i < count($json); $i++) {
//     for ($j = 0; $j < count($json) - $i - 1; $j++) {
//         if ($asc == "true") {
//             if ($json[$j][$orderby] > $json[$j + 1][$orderby]) {
//                 swap($json[$j][$orderby], $json[$j + 1][$orderby]);
//             }
//         } else {
//             if ($json[$j][$orderby] < $json[$j + 1][$orderby]) {
//                 swap($json[$j][$orderby], $json[$j + 1][$orderby]);
//             }
//         }

//         // } else {
//         //     swap($json[$j + 1][$orderby], $json[$j][$orderby]);
//         // }
//     }
// }
echo json_encode($json);
mysqli_close($link);
function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}