<?php
session_start();
date_default_timezone_set('Asia/Taipei');
$PATH = '../public/history.json';
$user_ip = $_SERVER["REMOTE_ADDR"];
$DATE = date("Y/m/d");
$TIME = date("H:i");
$nowDate = date("Y/m/d,H:i");
if (!isset($_SESSION['acc']['acc'])) {
    $_SESSION['acc']['acc'] = 'announce';
    $context = json_decode(file_get_contents($PATH), true);
    // echo $context;
    $newRecord = array(
        "USER_IP" => $user_ip, "DATE" => $DATE, "TIME" => $TIME
    );
    array_push($context, $newRecord);
    file_put_contents($PATH, json_encode($context));
}

// 判斷 URL 把暫時性 SESSION 關閉
$page = explode("/", $_SERVER['REQUEST_URI'])[2];
if ($page != 'questionviewer' && isset($_SESSION['acc']['look'])) {
    unset($_SESSION['acc']['look']);
}
if ($page != 'gaming' && isset($_SESSION['acc']['play'])) {
    unset($_SESSION['acc']['play']);
}
if ($page != 'gamepinlist' && isset($_SESSION['acc']['GamePIN'])) {
    unset($_SESSION['acc']['GamePIN']);
}
if ($page != 'more' && isset($_SESSION['acc']['Tag'])) {
    unset($_SESSION['acc']['Tag']);
}


// 判斷role，限制該role的活動頁面
if (($page == 'signin' || $page == 'signup') && isset($_SESSION['acc']['login'])) {
    if($_SESSION['acc']['role']=='user'){
        header("Location:../index");
    }else if($_SESSION['acc']['role']=='root'){
        header("Location:../wb-index");
    }    
}

if (substr($page, 0, 2) != 'wb' && isset($_SESSION['acc']['login']) && $_SESSION['acc']['role'] == 'root') {
    header("Location:../wb-index");
}
if (substr($page, 0, 2) == 'wb' && ($_SESSION['acc']['role'] != 'root')) {
    header("Location:../index");
}