<?php
$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
// $cmd="SELECT * FROM Member";
// $result=mysqli_query($link,$cmd);
// while($row=mysqli_fetch_assoc($result)){
//     $acc=$row['Acc'];
//     $newPwd=hash("sha256",$row['Password']);
//     $upCmd="UPDATE Member SET Password='{$newPwd}' WHERE Acc='{$acc}'";
//     mysqli_query($link,$upCmd);
//     echo mysqli_affected_rows($link)."<br>";
// }
// $command="SELECT GId FROM Game";
// $result=mysqli_query($link,$command);
// $cnt=1;
// while($row=mysqli_fetch_assoc($result)){
//     $RId='R00000';
//     $Mode='Public';
//     $Acc='Titi';
//     $GId=$row['GId'];
//     if($cnt<10){
//         $RId.='0'.strval($cnt++);
//     }else{
//         $RId.=strval($cnt++);
//     }
//     $cmd="INSERT INTO Gameroom(RoomId,Mode,Acc,GId) VALUES('{$RId}','{$Mode}','{$Acc}','{$GId}')";
//     echo $cmd."<br>";
//     mysqli_query($link,$cmd);
//     echo mysqli_affected_rows($link)>0 . "<br>";
// }
// $file = json_decode(file_get_contents('More.json'), true);

// for($i=0;$i<count($file);$i++){
//     $ESID="ES000000".(($i+1)<10?'0':'').($i+1);
//     $title=$file[$i]["Title"];
//     $Context=$file[$i]["Context"];
//     $Link=$file[$i]["Link"];
//     $Tag=$file[$i]["Tag"];
//     $cmd="INSERT INTO Extrasource(ESId,Title,Context,Link,Tag) VALUES('{$ESID}','{$title}','{$Context}','{$Link}','{$Tag}')";
//     // echo $cmd;
//     mysqli_query($link,$cmd);
//     echo (mysqli_affected_rows($link)>0)."<br>";
// }

// for ($i = 33; $i < 50; $i++) {
//     $RoomId = 'R00000' . strval($i);
//     $Mode = "Private";
//     $PIN = hash("crc32",uniqid());
    
//     $Acc = "test0412";
//     $GId = "G0000001";
//     $cmd = "INSERT INTO Gameroom(RoomId,Mode,PIN,Acc,GId) VALUES('{$RoomId}','{$Mode}','{$PIN}','{$Acc}','{$GId}')";
//     echo $cmd;
//     mysqli_query($link, $cmd);
//     echo $RoomId . "=>" . mysqli_affected_rows($link)>0?"true":"false" . "<br>";
// }
// header('Content-Type: application/json; charset=UTF-8');
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['origin'] == "APPTEST")) {
//     $command="SELECT * FROM member";
//     $result=mysqli_query($link,$command);
//     $json=array();
//     while($row=mysqli_fetch_assoc($result)){
//         array_push($json,$row);
//     }
//     echo json_encode($json);
// }
echo "morning";
mysqli_close($link);
