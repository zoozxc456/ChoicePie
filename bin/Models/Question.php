<?php
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $GId = $_POST['GId'];
    $Question = $_POST['Question'];
    foreach ($Question as $key => $value) {
        $Seq_No = $key + 1;
        $Title = $value['Title'];
        $Ans = $value['Ans'];
        $Op_A = $value['Op_A'];
        $Op_B = $value['Op_B'];
        $Op_C = $value['Op_C'];
        $Op_D = $value['Op_D'];
        $command = "INSERT INTO Question(GId,Seq_No,Title,Ans,OP_A,OP_B,OP_C,OP_D)" .
            " VALUES('{$GId}','{$Seq_No}','{$Title}','{$Ans}','{$Op_A}','{$Op_B}','{$Op_C}','{$Op_D}')";
        mysqli_query($link, $command);
    }
    if (mysqli_affected_rows($link) > 0) {
        echo json_encode(array('status' => 'Question Query OK'));
    } else {
        echo json_encode(array('status' => 'Question Query NG'));
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['origin'] == 'gaming') {
        $question = array();
        $GId = $_GET['GId'];
        $command = "SELECT * FROM Question WHERE 1=1 AND GId='{$GId}' ORDER BY Seq_No ASC";
        $result = mysqli_query($link, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($question, $row);
        }
        if (count($question) > 0) {
            echo json_encode(array(
                'Question' => $question,
                'Status' => true
            ));
        } else {
            echo json_encode(array(
                'Status' => false
            ));
        }
    } else if ($_GET['origin'] == 'wb-questionviewer') {
        $question = array();
        $GId = $_GET['GId'];
        $GName="";
        $command = "SELECT *,(SELECT GName FROM Game WHERE GId='{$GId}') AS GName FROM Question WHERE 1=1 AND GId='{$GId}' ORDER BY Seq_No ASC";
        $result = mysqli_query($link, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($question, $row);
        }
        if (count($question) > 0) {
            echo json_encode(array(
                'GName'=>$question[0]['GName'],
                'Question' => $question,
                'Status' => true
            ));
        } else {
            echo json_encode(array(
                'Status' => false
            ));
        }
    } else if ($_GET['origin'] == 'wb-unreviewedviewer') {
        $question = array();
        $GId = $_GET['GId'];
        $command = "SELECT * FROM Question WHERE 1=1 AND GId='{$GId}' ORDER BY Seq_No ASC";
        $result = mysqli_query($link, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($question, $row);
        }
        if (count($question) > 0) {
            echo json_encode(array(
                'Question' => $question,
                'Status' => true
            ));
        } else {
            echo json_encode(array(
                'Status' => false
            ));
        }
    }
    else if ($_GET['origin'] == 'questionviewer') {
        $question = array();
        $GId = $_SESSION['acc']['look'];
        $command = "SELECT * ,(SELECT GName FROM Game WHERE 1=1 AND GId='{$GId}') AS GName FROM Question WHERE 1=1 AND GId='{$GId}' ORDER BY Seq_No ASC";
        $result = mysqli_query($link, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($question, $row);
        }
        if (count($question) > 0) {
            echo json_encode(array(
                'Question' => $question,
                'Status' => true
            ));
        } else {
            echo json_encode(array(
                'Status' => false
            ));
        }
    }
}
mysqli_close($link);