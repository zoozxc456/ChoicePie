<?php
header('Content-Type: application/json; charset=UTF-8');
/* ExtraSource
| Name | Data Type |
| ESId(PK) | varchar(10) |
| Context | varchar(100) |
| ESClassify | varchar(20) |

 */
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // When Back-Front insert
    if ($_POST['origin'] == 'wb-unreviewedviewer') {
        $event = $_POST['event'];
        $RId = $_POST['RId'];
        $affectRows=0;
        if ($event == 'illegal') {
            // 修改 Game
            $command = "UPDATE Report SET Result = '{$event}' WHERE GId=(SELECT GId FROM report WHERE RId='{$RId}') AND 1=1";
            mysqli_query($link, $command);
            $command = "UPDATE Game SET Status='-1' WHERE GId=(SELECT GId FROM report WHERE RId='{$RId}')";
            mysqli_query($link, $command);
            $affectRows = $affectRows > 0 && mysqli_affected_rows($link) > 0 ? 1 : 0;
        } else {
            $command = "UPDATE Report SET Result = '{$event}' WHERE RId='{$RId}' AND 1=1";
            mysqli_query($link, $command);
            $affectRows = mysqli_affected_rows($link);
        }
        echo json_encode(array('status' => $affectRows > 0));
    } else if ($_POST['origin'] == 'gameCategory') {
        
        $reason = str_replace("'","\'",$_POST['reason']);
        $RoomId = $_POST['RoomId'];
        $newRId = 'R';
        $findPkCMD = "SELECT RId FROM Report ORDER BY RId DESC LIMIT 1";
        $result=mysqli_query($link,$findPkCMD);
        if(mysqli_num_rows($result)<=0){
            $newRId="R0000001";
        }else{
            $lastPK = mysqli_fetch_assoc($result)['RId'];
            for ($i = 1; $i < strlen($lastPK); $i++) {
                if (substr($lastPK, $i, 1) != '0') {
                    $num = intval(substr($lastPK, $i, strlen($lastPK) - $i)) + 1;
                    break;
                }
            }
            for ($i = 0; $i < 7 - floor(log10($num)) - 1; $i++) {
                $newRId .= '0';
            }
            $newRId .= strval($num);
        }
        

        $command = "INSERT INTO Report(RId,Reason,Result,GId) VALUES ('{$newRId}','{$reason}','Unreviewed',(SELECT GId FROM Gameroom WHERE RoomId='{$RoomId}'))";
        mysqli_query($link, $command);
        echo json_encode(array('status' => mysqli_affected_rows($link) > 0));
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['origin'] == "wb-index") {
    $arr = array('Unreviewed' => 0, 'Audited' => 0);
    $command = "SELECT Result,COUNT(*) AS cnt FROM report GROUP BY Result";
    $result = mysqli_query($link, $command);
    while ($row = mysqli_fetch_assoc($result)) {
        switch ($row['Result']) {
            case "Audited":
                $arr["Audited"] = $row['cnt'];
                break;
            case "Unreviewed":
                $arr["Unreviewed"] = $row['cnt'];
                break;
            default:
                break;
        }
    }
    echo json_encode($arr);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['origin'] == "wb-unreviewed") {
    $arr = array();
    $command = "SELECT Reason,Result,DATE(ReportTime) AS time FROM report WHERE Result='Unreviewed'";
    $result = mysqli_query($link, $command);
    while ($row = mysqli_fetch_assoc($result)) {
        $tmp = array();
        $tmp['name'] = 'report';
        $tmp['reason'] = $row['Reason'];
        $tmp['result'] = $row['Result'];
        $tmp['time'] = $row['time'];
        array_push($arr, $tmp);
    }
    echo json_encode($arr);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['origin'] == "wb-unreviewedviewer") {
    $RId = $_GET['TargetID'];
    $command = "SELECT R.RId,R.Reason,R.GId,G.GName FROM Report AS R LEFT JOIN Game AS G ON R.GId=G.GId WHERE 1=1 AND RId='{$RId}'";
    $result = mysqli_fetch_assoc(
        mysqli_query($link, $command)
    );
    echo json_encode($result);
}
mysqli_close($link);