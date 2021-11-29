<?php
    $db_host="127.0.0.1";
    $db_account="root";
    $db_password="";
    $db_name="ChoicePie";
    $db_connect = "mysql:host=".$db_host.";dbname=".$db_name;
    $db_link = new PDO($db_connect, $db_account, $db_password);
    $command="INSERT INTO member (Acc,Password,Username,Email,Favorite) VALUES (
        'test','test','test','test',null)";
    $sql="insert into t_user VALUES (?,?,?,?,?)";
    $stmt=$db_link->prepare($sql);
    $stmt->bindParam(0,$acc);
    $stmt->bindParam(1,$pwd);
    $stmt->bindParam(2,$uname);
    $stmt->bindParam(3,$email);
    $stmt->bindParam(4,$favorite);
    $acc='張三1';
    $pwd='1236541';
    $uname="test";
    $email="test";
    $favorite=null;
    $stmt->execute();