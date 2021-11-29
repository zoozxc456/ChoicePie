<?php
session_start();
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['origin'] == "more") {
        $acc = "";
        if (isset($_SESSION['acc']['login'])) {
            $acc = $_SESSION['acc']['acc'];
            $ESId = $_POST['ESId'];
            $command = "INSERT INTO recommand(Acc,ESId) VALUES('{$acc}','{$ESId}')";
            mysqli_query($link, $command);

            // 更新User的Favorite

            // 查點閱最多的Tag
            $MaxCommand="SELECT Tag,COUNT(Tag)AS CNT FROM recommand LEFT JOIN extrasource on recommand.ESId=extrasource.ESId WHERE Acc='{$acc}' GROUP BY Tag ORDER BY CNT DESC LIMIT 1";
            $Tag=mysqli_fetch_assoc(mysqli_query($link,$MaxCommand))['Tag'];
        
            $UpdateCommand = "UPDATE member SET Favorite='{$Tag}' WHERE Acc='{$acc}'";
            mysqli_query($link, $UpdateCommand);
            echo json_encode(array(
                'status' => true
            ));
        } else {
            echo json_encode(array(
                'status' => true
            ));
        }
    }
}
