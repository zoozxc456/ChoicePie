<?php
// header('Content-Type: application/json; charset=UTF-8');
// Read json
$source = file_get_contents('Question.json');
$jsonArray = json_decode($source, true);


// Connect DB
$link = @mysqli_connect('localhost', 'root', '', 'choicepie') or dir('DB Can\'t open');
foreach ($jsonArray as $index => $val) {
    // Query to Game
    $GID = 'G';
    $Mode = 'Public';
    $Acc = 'Titi';
    $GName = $val['GName'];
    $GClassify = $val['GClassify'];
    $Amount = count($val['Questions']);
    for ($i = 0; $i < 7 - floor(log10($index + 1)) - 1; $i++) {
        $GID .= '0';
    }
    $GID .= strval($index + 1);
    $command = "INSERT INTO Game(GId,GName,GClassify,Amount,Mode,Acc) VALUES('{$GID}','{$GName}','{$GClassify}','{$Amount}','{$Mode}','{$Acc}')";
    echo $command . "<br>";
    mysqli_query($link, $command);
    if (mysqli_affected_rows($link) > 0) {
        echo '$GID query ok' . "<br>";
    } else {
        echo '$GID query ng' . "<br>";
    }
    //Query to Question
    foreach ($val['Questions'] as $key => $value) {
        $Seq_No = $key + 1;
        $Title = str_replace("'", "\'", $value['Question']);
        $Title = str_replace('"', '\"', $Title);
        $Ans = str_replace("'", "\'", $value['Ans']);
        $Ans = str_replace('"', '\"', $Ans);
        $OP_A = str_replace("'", "\'", $value['OP_A']);
        $OP_A = str_replace('"', '\"', $OP_A);
        $OP_B = str_replace("'", "\'", $value['OP_B']);
        $OP_B = str_replace('"', '\"', $OP_B);
        $OP_C = str_replace("'", "\'", $value['OP_C']);
        $OP_C = str_replace('"', '\"', $OP_C);
        $OP_D = str_replace("'", "\'", $value['OP_D']);
        $OP_D = str_replace('"', '\"', $OP_D);
        $QuestionCommand = "INSERT INTO Question(GId,Seq_No,Title,Ans,Op_A,Op_B,Op_C,Op_D) VALUES('{$GID}','{$Seq_No}','{$Title}','{$Ans}','{$OP_A}','{$OP_B}','{$OP_C}','{$OP_D}')";
        echo $QuestionCommand . "<br>";
        mysqli_query($link, $QuestionCommand);
        if (mysqli_affected_rows($link) > 0) {
            echo '$GID = > $Seq_No query ok' . "<br>";
        } else {
            echo '$GID = > $Seq_No query ng' . "<br>";
        }
    }

    // echo $command;













    // var_dump($jsonArray[$index]);
}
// $command="INSERT INTO "