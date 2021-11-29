<?php
header('Content-Type: application/json; charset=UTF-8');
$json = array('Game_Unreviewed' => 0, "Game_Audited" => 0, 'Report_Unreviewed' => 0, "Report_Audited" => 0);
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
$command = "SELECT Status,COUNT(*)AS CNT FROM game GROUP BY Status";
$result = mysqli_query($link, $command);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Status'] == 0) {
        $json['Game_Unreviewed'] += $row['CNT'];
    } else if ($row['Status'] == 1) {
        $json['Game_Audited'] += $row['CNT'];
    }
}
$command = "SELECT Result,COUNT(*)AS CNT FROM report GROUP BY Result";
$result = mysqli_query($link, $command);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Result'] == 'Unreviewed') {
        $json['Report_Unreviewed'] += $row['CNT'];
    } else if ($row['Result'] == 'Audited') {
        $json['Report_Audited'] += $row['CNT'];
    }
}
echo json_encode($json);