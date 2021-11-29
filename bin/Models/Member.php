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

$link = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['origin'] == "signup")) {
    // When Sign up
    $data_in = $_POST["form_data"];
    $acc = $data_in['account'];
    $pwd = hash("sha256", $data_in['password']);
    $uname = $data_in['username'];
    $email = $data_in['email'];
    $command = "SELECT * FROM member WHERE Acc={$acc}";
    $result = mysqli_query($link, $command);
    if (!$result || mysqli_num_rows($result) <= 0) {
        // Favorite is allowed NULL,so that command doesn't insert it.
        $command = "INSERT INTO member (Acc,Password,Username,Email,Role,RegisterTime) VALUES (
            '{$acc}','{$pwd}','{$uname}','{$email}','user',CURRENT_TIMESTAMP)";
        mysqli_query($link, $command);
        $af_num = mysqli_affected_rows($link);
        if ($af_num > 0) {
            echo json_encode(
                array('status' => "SignUp Successful")
            );
        } else {
            echo json_encode(
                array('status' => "SignUp Failure")
            );
        }
    } else {
        echo json_encode(
            array('status' => 'Exist Same Account')
        );
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['origin'] == "signin")) {
    // When Sign in
    $data_in = $_POST["form_data"];
    $acc = $data_in['account'];
    $pwd = hash("sha256", $data_in['password']);
    if ($acc == '' || $pwd == '') {
        echo json_encode(
            array('status' => "Data Null")
        );
    } else {
        $command = "SELECT Acc,Password,Username,Role FROM member WHERE Acc='{$acc}'";
        $result = mysqli_query($link, $command);
        $row = mysqli_fetch_assoc($result);
        if ((mysqli_affected_rows($link) > 0) && $row['Acc'] == $acc && $row['Password'] == $pwd) {
            session_start();
            $username = $row['Username'];
            $_SESSION['acc'] = array('acc' => $acc, 'username' => $username, 'login' => true,'role'=>$row['Role']);
            echo json_encode(
                array('status' => "Login Successful",'role'=>$row['Role'])
            );
        } else {
            echo json_encode(
                array('status' => "Login Failure")
            );
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['origin'] == "signout")) {
    // When Sign out

    session_start();
    unset($_SESSION['acc']);
    $_SESSION['acc']['acc'] = 'announce';
    echo json_encode(array("status" => "Sign Out Successful"));
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['origin'] == "profile")) {
    // When Profile
    session_start();
    $acc=$_SESSION['acc']['acc'];
    // $acc = 'test0412';
    $event = $_POST['event'];
    switch ($event) {
        case "vaildPwd":
            $pwd = hash("sha256", $_POST['pwd']);
            $command = "SELECT Password FROM Member WHERE 1=1 AND Acc='{$acc}'";
            $result = mysqli_fetch_assoc(mysqli_query($link, $command))['Password'];
            echo json_encode(array("status" => $result == $pwd));
            break;
        case "load":
            $command = "SELECT Acc,Username,Email ,(SELECT SUM(Score) FROM Play WHERE 1=1 AND Acc='{$acc}') AS TotalScore FROM Member WHERE 1=1 AND Acc='{$acc}'";
            $result = mysqli_query($link, $command);
            $row = mysqli_fetch_assoc($result);
            if ($row['TotalScore'] == null) $row['TotalScore'] = 0;
            echo json_encode($row);
            break;
        case "update":
            $pwd = hash("sha256", $_POST['pwd']);
            $username = $_POST['username'];
            $email = $_POST['email'];
            
            $command = "UPDATE Member SET Password='{$pwd}',Username='{$username}',Email='{$email}' WHERE 1=1 AND Acc='{$acc}'";
            mysqli_query($link, $command);
            if(mysqli_affected_rows($link) > 0){
                $_SESSION['acc']['username']=$username;
            }
            echo json_encode(array("status" => mysqli_affected_rows($link) > 0));
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['origin'] == "questionCategory")) {

    session_start();

    echo json_encode(isset($_SESSION['acc']['login']));

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && ($_GET['origin'] == "wb-index")) {
    $path = "../../public/counter.inc";
    $cnt = "";
    $file = @fopen($path, "r");
    if ($file != null) {
        while (!feof($file)) {
            $cnt = fgets($file);
        }
        fclose($file);
    }
    $command = "SELECT COUNT(*) AS Members FROM Member";
    $result = mysqli_query($link, $command);
    $row = mysqli_fetch_assoc($result);
    echo json_encode(array("Visitor" => $cnt, "Member" => $row["Members"], 'status' => "Successful"));
} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && ($_GET['origin'] == "wb-statistics")) {
    $json = array();
    $slot = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $file = @fopen("../../public/history.inc", "r");
    while (!feof($file)) {
        // Split row by ","

        $fData = explode(",", fgets($file));
        var_dump($fData);
        if ($fData[1] == '2021/04/07') {

            for ($i = 0; $i < 12; $i++) {
                if (strtotime($fData[2]) - strtotime((string) ($i * 2) . ":00") < 2) {
                    $slot[$i]++;
                    break;
                }
            }
        }
    }
    foreach ($slot as $key => $value) {
        array_push($json, array('region' => $key * 2, 'visitor' => $slot[$key]));
    }

    $array = array();
    $command = "SELECT RegisterTime FROM Member";
    $result = mysqli_query($link, $command);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($array, $row);
    }
    echo json_encode($array);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && ($_GET['origin'] == "APPTEST")) {
    // ANDROID TEST
    $array = array();
    $command = "SELECT * FROM Member";
    $result = mysqli_query($link, $command);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($array, $row);
    }
    echo json_encode($array);
}
mysqli_close($link);
