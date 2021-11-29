<?php
header('Content-Type: application/json; charset=UTF-8');
session_start();
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // When Back-Front insert
    if ($_POST['origin'] == 'gameCategory') {
        if ($_POST['event'] == 'copy') {
            $RoomId = $_POST['RoomId'];
            $acc = $_SESSION['acc']['acc'];

            $newRoomId = 'R';
            $findPkCMD = "SELECT RoomId FROM Gameroom ORDER BY RoomId DESC LIMIT 1";
            $lastPK = mysqli_fetch_assoc(mysqli_query($link, $findPkCMD))['RoomId'];
            for ($i = 1; $i < strlen($lastPK); $i++) {
                if (substr($lastPK, $i, 1) != '0') {
                    $num = intval(substr($lastPK, $i, strlen($lastPK) - $i)) + 1;
                    break;
                }
            }
            for ($i = 0; $i < 7 - floor(log10($num)) - 1; $i++) {
                $newRoomId .= '0';
            }
            $newRoomId .= strval($num);

            // 查 PIN有沒有相撞
            $PIN = hash('crc32', uniqid());
            while (true) {
                $searchCMD = "SELECT PIN FROM Gameroom WHERE PIN='{$PIN}'";
                if (mysqli_num_rows(mysqli_query($link, $searchCMD)) <= 0) {
                    break;
                }
            }


            $command = "INSERT INTO Gameroom(RoomId,Mode,PIN,Acc,GId) VALUES('{$newRoomId}','Private','{$PIN}','{$acc}',(SELECT G.GId FROM Gameroom AS G WHERE G.RoomId='{$RoomId}'))";
            // echo $command;
            mysqli_query($link, $command);
            echo json_encode(array(
                'status' => (mysqli_affected_rows($link) > 0),
                'PIN' => $PIN
            ));
        } else if ($_POST['event'] == "toGaming") {
            $_SESSION['acc']['play'] = $_POST['RoomId'];
            echo json_encode(array(
                'status' => isset($_SESSION['acc']['play'])
            ));
        } else if ($_POST['event'] == 'setGamePIN') {
            $PIN = $_POST['GamePIN'];
            $selectCMD = "SELECT RoomId,PIN FROM Gameroom WHERE 1=1 AND PIN='{$PIN}'";
            $result = mysqli_query($link, $selectCMD);
            if (mysqli_num_rows($result) > 0) {
                $RoomId = mysqli_fetch_assoc($result)['RoomId'];
                $_SESSION['acc']['play'] = $RoomId;
                echo json_encode(array(
                    'status' => isset($_SESSION['acc']['play'])
                ));
            } else {
                echo json_encode(array(
                    'status' => false
                ));
            }
        } else if ($_POST['event'] == 'toGamePinList') {

            $PIN = $_POST['GamePIN'];
            $command = "SELECT GId FROM Gameroom WHERE 1=1 AND PIN='{$PIN}'";
            $result = mysqli_query($link, $command);
            if (mysqli_num_rows($result) > 0) {
                $GId = mysqli_fetch_assoc($result)['GId'];
                $_SESSION['acc']['GamePIN'] = $GId;
                echo json_encode(array(
                    'status' => isset($_SESSION['acc']['GamePIN'])
                ));
            } else {
                echo json_encode(array(
                    'status' => false
                ));
            }
        }
    } else if ($_POST['origin'] == 'questionCategory') {
        $acc = $_SESSION['acc']['acc'];
        if ($_POST['event'] == 'delete') {
            $Mode = $_POST['Mode'];
            $GId = $_POST['GId'];
            if ($Mode == 'Public') {
                $command = "UPDATE Gameroom SET Mode='Close' WHERE 1=1 AND GId='{$GId}' AND Mode='Public'";
                mysqli_query($link, $command);
                $command = "UPDATE Game SET Status='-1' WHERE 1=1 AND GId='{$GId}'";
                mysqli_query($link, $command);
            } else {
                $command = "UPDATE Gameroom SET Mode='Close' WHERE 1=1 AND GId='{$GId}' AND Acc='{$acc}' AND Mode!='Public'";
                mysqli_query($link, $command);
                $command = "SELECT * FROM Gameroom WHERE GId='{$GId}' GROUP BY `RoomId`,`Mode` HAVING `Mode`='Public'";
                $result = mysqli_query($link, $command);
                if (mysqli_num_rows($result) <= 0) {
                    $command = "UPDATE Game SET Status='-1' WHERE 1=1 AND GId='{$GId}' AND Game.Acc='{$acc}'";
                    mysqli_query($link, $command);
                }
            }

            echo json_encode(array(
                'status' => true
            ));
        } else if ($_POST['event'] == 'toViewer') {
            $RoomId = $_POST['RoomId'];
            $cmd = "SELECT GId FROM Gameroom WHERE 1=1 AND RoomId='{$RoomId}'";
            $result = mysqli_fetch_assoc(mysqli_query($link, $cmd))['GId'];
            $_SESSION['acc']['look'] = $result;
            echo json_encode(array(
                'status' => isset($_SESSION['acc']['look'])
            ));
        }
    } else if ($_POST['origin'] == 'index') {

        $PIN = $_POST['GamePIN'];
        $selectCMD = "SELECT RoomId,PIN FROM Gameroom WHERE 1=1 AND PIN='{$PIN}' AND Mode!='Close'";
        $result = mysqli_query($link, $selectCMD);
        if (mysqli_num_rows($result) > 0) {
            $RoomId = mysqli_fetch_assoc($result)['RoomId'];
            $_SESSION['acc']['play'] = $RoomId;
            echo json_encode(array(
                'status' => isset($_SESSION['acc']['play'])
            ));
        } else {
            echo json_encode(
                array('status' => false)
            );
        }
    } else if ($_POST['origin'] == 'gamepinlist') {
        $Acc = $_SESSION['acc']['acc'];
        if ($_POST['event'] == 'delete') {
            $PIN = $_POST['PIN'];
            $command = "UPDATE Gameroom SET Mode='Close' WHERE Acc='{$Acc}' AND PIN='{$PIN}'";
            mysqli_query($link, $command);
            echo json_encode(array(
                'status' => mysqli_affected_rows($link) > 0
            ));
        } else if ($_POST['event'] == 'add') {
            $GId = $_SESSION['acc']['GamePIN'];
            $RoomId = create($link)['RoomId'];
            $PIN = create($link)['PIN'];
            $command = "INSERT INTO Gameroom(RoomId,Mode,PIN,Acc,GId) VALUES('{$RoomId}','Private','{$PIN}','{$Acc}','{$GId}')";
            mysqli_query($link, $command);
            if (mysqli_affected_rows($link) > 0) {
                $command = "SELECT PIN,DATE(CreateTime) AS CreateTime,GName FROM Gameroom LEFT JOIN Game ON Gameroom.GId=Game.GId WHERE 1=1 AND Gameroom.Acc='{$Acc}' AND Gameroom.GId='{$GId}' AND Gameroom.Mode!='Close' ORDER BY CreateTime DESC";
                $result = mysqli_query($link, $command);
                $json = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($json, $row);
                }
                echo json_encode(array('data' => $json, 'status' => true));
            } else {
                echo json_encode(array('status' => false));
            }
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // When index load
    if ($_GET['origin'] == "index") {
        $PIN = $_GET['GamePIN'];
        $command = "SELECT * FROM GameRoom WHERE PIN='{$PIN}' AND Mode='Private'";
        $result = mysqli_query($link, $command);
        $row = mysqli_fetch_assoc($result);
        echo json_encode(
            array('status' => mysqli_num_rows($result) > 0)
        );
    } else if ($_GET['origin'] == "questionrecord") {
        $acc = isset($_SESSION['acc']['login']) ? $_SESSION['acc']['acc'] : '';
        if ($acc != '') {
            $arr = array();
            $command = "SELECT GR.RoomId,GR.Mode,GR.Acc,DATE(GR.CreateTime)AS time,Game.GName,Game.Amount FROM GameRoom AS GR LEFT JOIN Game on Game.GId=GR.GId  WHERE GR.acc='{$acc}' AND GR.Mode!='Close' AND Game.Status!='-1'";
            // echo $command;
            $result = mysqli_query($link, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($arr, $row);
                }
                echo json_encode($arr);
            } else {
                echo json_encode(array("status" => "error"));
            }
        } else {
            echo json_encode(array("status" => "NOT LOGIN"));
        }
    } else if ($_GET['origin'] == "gaming") {
        $RoomId = $_SESSION['acc']['play'];
        $command = "SELECT * FROM GameRoom LEFT JOIN Game ON GameRoom.GId=Game.GId WHERE 1=1 AND GameRoom.RoomId='{$RoomId}' AND Game.Status!='-1'";

        $result = mysqli_query($link, $command);
        $row = mysqli_fetch_assoc($result);
        if (isset($row['GId'])) {
            echo json_encode(array(
                'GId' => $row['GId'],
                'GName' => $row['GName'],
                'RoomId' => $RoomId,
                'Status' => true,
                'playAcc' => isset($_SESSION['acc']['login']) ? $_SESSION['acc']['acc'] : 'anonymous'
            ));
        } else {
            echo json_encode(array(
                'Status' => false
            ));
        }
    } else if ($_GET['origin'] == "gameCategory") {
        $target = isset($_GET['target']) ? $_GET['target'] : "";
        $GClassify = isset($_GET['GClassify']) && $_GET['GClassify'] != 'Games' ? $_GET['GClassify'] : "";

        $command = "SELECT RoomId,gameroom.Mode,PIN,DATE(CreateTime) AS CreateTime,GName,Amount FROM Gameroom LEFT JOIN Game ON Gameroom.GId=Game.GId WHERE 1=1 AND gameroom.Mode='Public' AND Game.Status!='-1'"
            . ($target != "" ? " AND GName LIKE '%{$target}%'" : "")
            . ($GClassify != "" ? " AND GClassify='{$GClassify}'" : "")
            . (" ORDER BY CreateTime DESC");
        $result = mysqli_query($link, $command);
        $json = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($json, $row);
        }
        echo json_encode($json);
    } else if ($_GET['origin'] == "questionCategory") {
        // $acc='test0412';
        $acc = $_SESSION['acc']['acc'];
        if ($_GET['event'] == 'toGamePinList') {
            $GId = $_GET['GId'];
            $_SESSION['acc']['GamePIN'] = $GId;
            echo json_encode(isset($_SESSION['acc']['GamePIN']));
        } else if ($_GET['event'] == 'load') {
            $command = "SELECT RoomId,gameroom.Mode,PIN,DATE(CreateTime) AS CreateTime,GName,Game.GId,Amount,Gameroom.Acc AS RoomAcc,Game.Acc AS GameAcc" .
                " FROM Gameroom LEFT JOIN Game ON Gameroom.GId=Game.GId" .
                " WHERE 1=1 AND Gameroom.Acc='{$acc}' AND gameroom.Mode!='Close' AND Game.Status!='-1' ORDER BY CreateTime DESC";
            $result = mysqli_query($link, $command);
            $json = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $GId = $row['GId'];
                $Mode = $row['Mode'];
                $st = true;
                for ($index = 0; $index < count($json); $index++) {
                    if ($json[$index]['GId'] == $GId && $json[$index]['Mode'] == $Mode) {
                        $st &= false;
                        break;
                    }
                }
                if ($st) {
                    array_push($json, $row);
                }
            }
            echo json_encode($json);
        }
    } else if ($_GET['origin'] == "gamepinlist") {
        // $acc='test0412';
        $acc = $_SESSION['acc']['acc'];
        $GId = $_SESSION['acc']['GamePIN'];
        $command = "SELECT PIN,DATE(CreateTime) AS CreateTime,GName FROM Gameroom LEFT JOIN Game ON Gameroom.GId=Game.GId WHERE 1=1 AND Gameroom.Acc='{$acc}' AND Gameroom.GId='{$GId}' AND Gameroom.Mode='Private' ORDER BY CreateTime DESC";
        $result = mysqli_query($link, $command);
        $json = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($json, $row);
        }
        echo json_encode($json);
    }
}

mysqli_close($link);
function create($link)
{
    $newRoomId = 'R';
    $findPkCMD = "SELECT RoomId FROM Gameroom ORDER BY RoomId DESC LIMIT 1";
    $lastPK = mysqli_fetch_assoc(mysqli_query($link, $findPkCMD))['RoomId'];
    for ($i = 1; $i < strlen($lastPK); $i++) {
        if (substr($lastPK, $i, 1) != '0') {
            $num = intval(substr($lastPK, $i, strlen($lastPK) - $i)) + 1;
            break;
        }
    }
    for ($i = 0; $i < 7 - floor(log10($num)) - 1; $i++) {
        $newRoomId .= '0';
    }
    $newRoomId .= strval($num);

    // 查 PIN有沒有相撞
    $PIN = hash('crc32', uniqid());
    while (true) {
        $searchCMD = "SELECT PIN FROM Gameroom WHERE PIN='{$PIN}'";
        if (mysqli_num_rows(mysqli_query($link, $searchCMD)) <= 0) {
            break;
        }
    }
    return array('RoomId' => $newRoomId, 'PIN' => $PIN);
}