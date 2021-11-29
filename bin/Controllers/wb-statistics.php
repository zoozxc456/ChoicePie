<?php
header('Content-Type: application/json; charset=UTF-8');
$date = $_GET['date'];
$option = $_GET['option'];
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
$json = array();
switch ($option) {
    case 'visitor':
        $slot = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $file = json_decode(file_get_contents('../../public/history.json'), true);
        foreach ($file as $target) {
            if ($target['DATE'] == $date) {
                $hour = intval(explode(':', $target['TIME'])[0]);
                $slot[floor($hour / 2)]++;
            }
        }
        foreach ($slot as $key => $value) {
            array_push($json, array('region' => $key * 2, 'visitor' => $slot[$key]));
        }
        break;
    case 'question':
        $command = "SELECT HOUR(ReleaseTime) AS HR,COUNT(ReleaseTime) AS CNT
        FROM game WHERE DATE(ReleaseTime)='{$date}'
        GROUP BY (HOUR(ReleaseTime)) ORDER BY HR";
        $result = mysqli_query($link, $command);
        $slot = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            $slot[$row['HR'] % 2 == 0 ? $row['HR'] / 2 : ($row['HR'] - 1) / 2] += $row['CNT'];
        }
        foreach ($slot as $key => $value) {
            array_push($json, array('region' => $key * 2, 'question' => $slot[$key]));
        }
        break;
    case 'member':
        $command = "SELECT HOUR(RegisterTime) AS HR,COUNT(RegisterTime) AS CNT
        FROM member WHERE DATE(RegisterTime)='{$date}'
        GROUP BY (HOUR(RegisterTime)) ORDER BY HR";
        $result = mysqli_query($link, $command);
        $slot = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            $slot[$row['HR'] % 2 == 0 ? $row['HR'] / 2 : ($row['HR'] - 1) / 2] += $row['CNT'];
        }
        foreach ($slot as $key => $value) {
            array_push($json, array('region' => $key * 2, 'member' => $slot[$key]));
        }
        break;
}
echo json_encode($json);
mysqli_close($link);
