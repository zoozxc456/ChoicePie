<?php
header('Content-Type: application/json; charset=UTF-8');
/* Game

| Name        | Data Type   |
| GId(PK)     | varchar(15) |
| GName       | varchar(30) |
| GClassify   | varchar(20) |
| Amount      | int(11)     |
| ReleaseTime | datetime    |
| Status      | tinyint(1)  |
| Acc         | varchar(12) |

 */
session_start();
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['origin'] == 'GameList') {
        $acc = isset($_SESSION['acc']['login']) ? $_SESSION['acc']['acc'] : null;
        if ($acc != "") {
            // When Rank Load GameList
            $command = "SELECT GName FROM Game WHERE Status=1 ORDER BY GName";
            $result = mysqli_query($link, $command);
            $arr = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arr, $row);
            }
            echo json_encode($arr);
        } else {
            echo json_encode(array('status' => false));
        }
    } else if ($_GET['origin'] == 'questioncategory') {
        $acc = isset($_SESSION['acc']['login']) ? $_SESSION['acc']['acc'] : null;
        if ($acc != "") {
            $acc = 'Titi';
            // When Rank Load GameList
            $command = "SELECT Acc,Amount,GClassify,GName,DATE(ReleaseTime)AS ReleaseTime,Mode,Status  FROM Game WHERE Status=1 AND Acc='{$acc}' ORDER BY GName";
            $result = mysqli_query($link, $command);
            $arr = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arr, $row);
            }
            echo json_encode($arr);
        } else {
            echo json_encode(array('status' => false));
        }
    } else if ($_GET['origin'] == 'gameCategory') {
        //When gameCategory Load
        if (isset($_GET['target'])) {
            $command = "SELECT * FROM Game WHERE Status=1 AND GName like '%{$_GET["target"]}%' AND Mode='Public' Order BY GClassify";
        } else if (isset($_GET['filter'])) {
            $command = "SELECT * FROM Game WHERE Status=1 AND GClassify ='{$_GET["filter"]}' AND Mode='Public' Order BY GClassify";
        } else {
            $command = "SELECT * FROM Game WHERE Status=1 AND Mode='Public' Order BY GClassify";
        }
        $result = mysqli_query($link, $command);
        $arr = array('Classify' => array(), 'Game' => array());
        $num_class = -1;
        $num_data = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if (!in_array($row['GClassify'], $arr['Classify'])) {
                $num_class++;
                $num_data = 0;
                array_push($arr['Classify'], $row['GClassify']);
                $arr2 = array($row['GClassify'] => array());
                array_push($arr['Game'], $arr2);
                // $arr['Game'][$num_class] = array();
                // print_r($arr['Game'][$num_class]);
                // $arr['Game'][$num_class][$num_data] = $row['GClassify'];
                // print_r($arr['Game'][$num_class]);
            }
            // array_push($arr['Game'][$row['GClassify']], $row);
            $arr['Game'][$num_class][$row['GClassify']][$num_data++] = $row;
            // print_r($arr);
        }
        echo json_encode($arr);
    } else if ($_GET['origin'] == "wb-index") {
        $arr = array('Unreviewed' => 0, 'Audited' => 0);
        $command = "SELECT Status,COUNT(*) AS cnt FROM game GROUP BY Status";
        $result = mysqli_query($link, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            switch ($row['Status']) {
                case "0":
                    $arr["Unreviewed"] = $row['cnt'];
                    break;
                case "1":
                    $arr["Audited"] = $row['cnt'];
                    break;
                default:
                    break;
            }
        }
        // $arr["Audited"] = mysqli_fetch_row($result)[1][1];
        // $arr["Unreviewed"] = mysqli_fetch_row($result)[0];
        echo json_encode($arr);
    } else if ($_GET['origin'] == "wb-statistics") {
        $arr = array();
        $command = "SELECT ReleaseTime FROM game ";
        $result = mysqli_query($link, $command);
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row);
        }
        echo json_encode($array);
    } else if ($_GET['origin'] == 'wb-question') {
        $command = "SELECT GId,GName,DATE(ReleaseTime) AS Time,Amount FROM game WHERE Status!='-1'";
        if ($_GET['search'] != "") {
            $command .= " AND GName LIKE '%{$_GET["search"]}%'";
        }

        $command .= " ORDER BY {$_GET['orderby']} " . ($_GET['asc'] == "true" ? "ASC" : "DESC");

        $result = mysqli_query($link, $command);
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row);
        }
        echo json_encode($array);
    } else if ($_GET['origin'] == 'wb-unreviewed') {
        $command = "SELECT GName as name,DATE(ReleaseTime) AS time,Amount FROM game WHERE Status!='-1'";
        if ($_GET['search'] != "") {
            $command .= " AND GName LIKE '%{$_GET["search"]}%'";
        }

        $command .= " ORDER BY {$_GET['orderby']} " . ($_GET['asc'] == "true" ? "ASC" : "DESC");

        $result = mysqli_query($link, $command);
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row);
        }
        echo json_encode($array);
    } else if ($_GET['origin'] == 'wb-unreviewedviewer') {
        $GId = $_GET['TargetID'];
        $command = "SELECT * FROM game WHERE 1=1 AND GId='{$GId}'";
        $result = mysqli_query($link, $command);
        echo json_encode(mysqli_fetch_assoc($result));
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['origin'] == 'questionadding') {
        //找GId最後一筆
        $newGID = 'G';
        $command = 'SELECT GId FROM Game ORDER BY GId DESC LIMIT 1';
        $result = mysqli_fetch_assoc(mysqli_query($link, $command))['GId'];
        for ($i = 1; $i < strlen($result); $i++) {
            if (substr($result, $i, 1) != '0') {
                $num = intval(substr($result, $i, strlen($result) - $i)) + 1;
                break;
            }
        }
        for ($i = 0; $i < 7 - floor(log10($num)) - 1; $i++) {
            $newGID .= '0';
        }
        $newGID .= strval($num);
        $GId = $newGID;
        $Acc = $_SESSION['acc']['acc'];
        $GName = $_POST['GName'];
        $GClassify = $_POST['GClassify'];
        $Mode = $_POST['Mode'];
        $Amount = count($_POST['Question']);
        $Question = $_POST['Question'];
        // $Question = json_decode($_POST['Question'], true); // For POSTMAN
        // $q=$_POST['Question'];
        // var_dump($Question);
        // echo $Amount;

        // Hash
        if ($Mode == 'Private') {
            $GamePIN = hash('crc32', uniqid());
            $command = "INSERT INTO Game (GId,GName,GClassify,Amount,GamePIN,Mode,Acc) VALUES('{$GId}','{$GName}','{$GClassify}','{$Amount}','{$GamePIN}','{$Mode}','{$Acc}')";
        } else if ($Mode == 'Public') {
            $GamePIN = '';
            $command = "INSERT INTO Game (GId,GName,GClassify,Amount,Mode,Acc) VALUES('{$GId}','{$GName}','{$GClassify}','{$Amount}','{$Mode}','{$Acc}')";
        }

        // Query
       
        mysqli_query($link, $command);
        if (mysqli_affected_rows($link) > 0) {
            // Create New Gameroom

            $newRoomID = 'R';
            $command = 'SELECT RoomId FROM Gameroom ORDER BY RoomId DESC LIMIT 1';
            $result = mysqli_fetch_assoc(mysqli_query($link, $command))['RoomId'];
            for ($i = 1; $i < strlen($result); $i++) {
                if (substr($result, $i, 1) != '0') {
                    $num = intval(substr($result, $i, strlen($result) - $i)) + 1;
                    break;
                }
            }
            for ($i = 0; $i < 7 - floor(log10($num)) - 1; $i++) {
                $newRoomID .= '0';
            }
            $newRoomID .= strval($num);
            $RoomId = $newRoomID;
            if($Mode=='Private'){
                $command = "INSERT INTO Gameroom(RoomId,Mode,PIN,Acc,GId) VALUES('{$RoomId}','{$Mode}','{$GamePIN}','{$Acc}','{$GId}')";
            }else{
                $command = "INSERT INTO Gameroom(RoomId,Mode,Acc,GId) VALUES('{$RoomId}','{$Mode}','{$Acc}','{$GId}')";
            }
            

            mysqli_query($link,$command);
            if (mysqli_affected_rows($link) > 0) {
                echo json_encode(array('status' => 'ok', 'GId' => $GId, 'Mode' => $Mode, 'GamePIN' => $GamePIN));
            }else{
                echo json_encode(array('status' => 'ng'));
            }
            
            // Insert success
        } else {
            // Insert fail
            echo json_encode(array('status' => 'ng'));
        }
    } else if ($_POST['origin'] == 'wb-unreviewedviewer') {
        $status = $_POST['event'] == 'agree' ? 1 : -1;
        $GId = $_POST['GId'];
        $command = "UPDATE Game SET Status='{$status}' WHERE 1=1 AND GId='{$GId}'";
        mysqli_query($link, $command);
        $affectRows = mysqli_affected_rows($link);
        echo json_encode(array('status' => $affectRows > 0));
    }
}
mysqli_close($link);
