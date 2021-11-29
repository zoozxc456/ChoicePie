<?php
header('Content-Type: application/json; charset=UTF-8');
/* Member
| Name | Data Type |
| Acc(PK) | varchar(12) |
| Password | varchar(15) |
| Username | varchar(20) |
| Email | varchar(50) |
| Favorite | varchar(20) |

 */
session_start();
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['origin'] == 'rank') {
        if ($_GET['event'] == 'GameList') {
            $acc = $_SESSION['acc']['acc'];
            $json = array();
            // $acc = $_SESSION['acc']['acc'];
            // $command = "SELECT Main.Acc,member.Username,Max(Main.Score) AS Score,R.RoomId,R.GName " .
            //     "FROM play AS Main,(SELECT DISTINCT RoomId,GName FROM play WHERE Acc='$acc')AS R,member " .
            //     "WHERE Main.`RoomId`= R.RoomId AND Main.Acc=member.Acc " .
            //     "GROUP BY Main.Acc ORDER BY GName,Score DESC";
            $command = "SELECT DISTINCT Play.RoomId,GName,PIN FROM Play LEFT JOIN Gameroom ON Play.RoomId=Gameroom.RoomId WHERE 1=1 AND Play.Acc='{$acc}' AND Gameroom.Mode!='Close' AND (SELECT Status FROM Game WHERE gameroom.GId=game.GId)!='-1'";
            $result = mysqli_query($link, $command);
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($json, $row);
            }
            echo json_encode($json);
        } else if ($_GET['event'] == 'RankDetails') {
            $json = array();
            $acc = $_SESSION['acc']['acc'];
            $RoomId = $_GET['RoomId'];
            $command = "SELECT Max(Play.Score) AS Score,Member.Acc,Member.Username FROM Play,Member WHERE 1=1 AND Play.RoomId='{$RoomId}' AND Play.Acc=Member.Acc GROUP BY Play.Acc ORDER BY Score DESC";
            $result = mysqli_query($link, $command);
            $isFind = false;
            $rank = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['Acc'] == $acc) {
                    $isFind = true;
                } else if ($isFind == false) {
                    $rank++;
                }
                array_push($json, $row);
            }

            echo json_encode(array('RankDetail' => $json, 'Rank' => $rank));
        }

        if (isset($_SESSION['acc']['login'])) {
        }
    } else if ($_GET['origin'] == 'gamerecord') {

        $acc = isset($_SESSION['acc']['login']) ? $_SESSION['acc']['acc'] : '';
        if ($acc != "") {
            $command = "SELECT Acc,RoomId,GName,Score,DATE(PlayingTime) AS time FROM Play WHERE Acc='{$acc}' ORDER BY Score DESC";
            $result = mysqli_query($link, $command);
            $arr = array();
            if (mysqli_num_rows($result) <= 0) {
                echo json_encode(array('status' => 'error'));
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($arr, $row);
                }
                echo json_encode($arr);
            }
        } else {
            echo json_encode(array("status" => "error"));
        }
    } else if ($_GET['origin'] == 'searchGameResult') {

        // $acc = isset($_SESSION['acc']['login']) ? $_SESSION['acc']['acc'] : '';
        $acc = 'test0412';
        $roomid = $_GET['RoomId'];
        if ($acc != "") {
            $command = "SELECT GName,Score,Play.Acc,Member.Username,Gameroom.PIN FROM (Play LEFT JOIN Member ON Play.Acc=Member.Acc)left JOIN gameroom on Play.RoomId=Gameroom.RoomId  WHERE Play.RoomId='{$roomid}' ORDER BY Score DESC";
            $result = mysqli_query($link, $command);
            $arr = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($arr, $row);
                }
                echo json_encode(array('body' => $arr, 'status' => true));
            } else {
                $command = "SELECT Gameroom.PIN ,Game.GName FROM Gameroom LEFT JOIN Game ON Gameroom.GId=Game.GId WHERE RoomId='{$roomid}'";
                $data = mysqli_fetch_assoc(mysqli_query($link, $command));

                echo json_encode(array('body' => $data, 'status' => false));
            }
        } else {
            echo json_encode(array("status" => "nologin"));
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['origin'] == 'gaming') {
        $GId = $_POST['GId'];
        $RoomId = $_POST['RoomId'];
        $GName = $_POST['GName'];
        $Score = $_POST['Score'];
        $Acc = $_POST['Acc'];
        $username = $_POST['Username'];
        $isBreak=false;
        if($Acc!='anonymous'){
            $command = "SELECT Max(Score) AS Score FROM Play WHERE 1=1 AND RoomId='{$RoomId}' AND Acc='{$Acc}'";
            $result=mysqli_query($link,$command);
            $oldScore=mysqli_fetch_assoc($result)['Score'];
            $isBreak=$oldScore<=$Score;
            $command = "INSERT INTO Play (Acc,RoomId,GName,Score) VALUES('{$Acc}','{$RoomId}','{$GName}','{$Score}')";
            mysqli_query($link, $command);
        }
        if (mysqli_affected_rows($link) > 0 || $Acc=='anonymous') {
            $json = array();
            $command = "SELECT play.Acc,username,Max(Score) AS Score FROM Play,(SELECT Acc,username FROM member)AS member WHERE 1=1 AND RoomId='{$RoomId}' AND member.Acc=play.Acc GROUP BY Play.Acc ORDER BY Score DESC";
            $result = mysqli_query($link, $command);
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($json, $row);
            }
            echo json_encode(array(
                'playRecords' => $json,
                'status' => true,
                'isLogin' => isset($_SESSION['acc']['login']),
                'isBreak'=>$isBreak
            ));
        } else {
            echo json_encode(array('status' => false));
        }
    }
}

mysqli_close($link);
