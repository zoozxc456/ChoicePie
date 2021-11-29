<?php
date_default_timezone_set('Asia/Taipei');
header('Content-Type: application/json; charset=UTF-8');
/* ExtraSource
| Name | Data Type |
| ESId(PK) | varchar(10) |
| Context | varchar(100) |
| ESClassify | varchar(20) |

 */
session_start();
$dblink = @mysqli_connect('localhost', 'root', '', 'ChoicePie') or die('DataBase Can\'t Open.');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['origin'] == "wb-more") {
        // When Back-Front insert

        //找ESID最後一筆
        $newESID = 'ES';
        $command = 'SELECT ESId FROM ExtraSource ORDER BY ESId DESC LIMIT 1';
        $result = mysqli_fetch_assoc(mysqli_query($dblink, $command))['ESId'];
        for ($i = 2; $i < strlen($result); $i++) {
            if (substr($result, $i, 1) != '0') {
                $num = intval(substr($result, $i, strlen($result) - $i)) + 1;
                break;
            }
        }
        for ($i = 0; $i < 8 - floor(log10($num)) - 1; $i++) {
            $newESID .= '0';
        }
        $newESID .= strval($num);
        $title = $_POST['title'];
        $tag = $_POST['tag'];
        $link = $_POST['link'];
        $content = $_POST['content'];
        $time = date('Y-m-d H:i:s');
        $command = "INSERT INTO ExtraSource (ESId,Title,Context,Link,Tag) VALUES('{$newESID}','{$title}','{$content}','{$link}','{$tag}')";
        mysqli_query($dblink, $command);
        if (mysqli_affected_rows($dblink) > 0) {
            // INSERT Successful
            $command = "SELECT ESId, Title AS title,Tag AS tag,DATE(ReleaseTime) AS time,Hits FROM ExtraSource WHERE 1=1 ORDER BY ESId";
            $result = mysqli_query($dblink, $command);
            $json = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($json, $row);
            }
            echo json_encode(array('response' => $json, 'status' => true));
        } else {
            echo json_encode(array('response' => '', 'status' => false));
        }
    } elseif ($_POST['origin'] == "moreviewer") {
        if ($_POST['event'] == 'update') {
            //找ESID最後一筆
            $ESId = $_POST['ESId'];
            $link = $_POST['Link'];
            $content = $_POST['Content'];
            $command = "UPDATE ExtraSource SET Content='{$content}',Link='{$link}' WHERE ESId='{$ESId}'";
            mysqli_query($dblink, $command);
            echo json_encode(array('res' => mysqli_affected_rows($dblink) > 0));
        } else if ($_POST['event'] == 'delete') {
            $ESId = $_POST['ESId'];
            $command = "DELETE FROM ExtraSource WHERE ESId='{$ESId}'";
            mysqli_query($dblink, $command);

            echo json_encode(array('res' => mysqli_affected_rows($dblink) > 0));
        }
    } else if ($_POST['origin'] == 'index') {
        $Tag = $_POST['Tag'];
        $_SESSION['acc']['Tag'] = $Tag;
        echo json_encode(array(
            'status' => isset(
                $_SESSION['acc']['Tag']
            )
        ));
    } else if ($_POST['origin'] == 'more') {
        $ESId = $_POST['ESId'];
        $command = "UPDATE Extrasource SET Hits=(SELECT Hits FROM Extrasource WHERE ESId='{$ESId}')+1 WHERE ESId='{$ESId}'";
        mysqli_query($dblink, $command);
        echo json_encode(array(
            'status' => mysqli_affected_rows($dblink) > 0
        ));
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['origin'] == 'index') {
        // When index load
        $command = 'SELECT * FROM ExtraSource ORDER BY Hits DESC';
        $result = mysqli_query($dblink, $command);
        $json = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $Tag = $row['Tag'];
                $Title = $row['Title'];
                $isPush = false;
                foreach ($json as $key=>$value) {
                    // var_dump($value);
                    if ($value['Tag'] == $Tag) {
                        array_push($json[$key]['Title'], $Title);
                        $isPush = true;
                    }
                }
                if (!$isPush) {
                    array_push($json, array('Tag' => $Tag, 'Title' => array($Title)));
                }
                // var_dump($row);
            }
            echo json_encode($json);
        } else {
            echo json_encode(
                array('status' => false)
            );
        }
    } else if ($_GET['origin'] == 'more') {
        $Tag = "";
        if (isset($_SESSION['acc']['Tag'])) {
            $Tag = $_SESSION['acc']['Tag'];
            unset($_SESSION['acc']['Tag']);
        }
        if (isset($_GET['Tag'])) {
            $Tag = $_GET['Tag'];
        }
        $json = array();
        $command = "SELECT * FROM Extrasource WHERE 1=1" . ($Tag != '' ? " AND Tag='{$Tag}'" : '');
        $result = mysqli_query($dblink, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($json, $row);
        }
        echo json_encode(
            array('content' => $json, 'Tag' => $Tag)
        );
    } elseif ($_GET['origin'] == 'wb-more') {
        $command = "SELECT ESId, Title AS title,Tag AS tag,DATE(ReleaseTime) AS time,Hits FROM ExtraSource "
            . ($_GET['search'] != '' ? ("WHERE title LIKE '%" . $_GET['search'] . "%'") : '') .
            " ORDER BY {$_GET['orderby']} "
            . ($_GET['asc'] == 'true' ? 'ASC' : 'DESC');
        $result = mysqli_query($dblink, $command);
        $json = array();
        if (mysqli_num_rows($result) > 0) {
            $num = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($json, $row);
            }
            echo json_encode($json);
        } else {
            echo json_encode(
                array('status' => false)
            );
        }
    } elseif ($_GET['origin'] == 'moreviewer') {
        $command = "SELECT * FROM ExtraSource WHERE ESId='{$_GET["ESId"]}'";
        $result = mysqli_query($dblink, $command);
        $json = array();
        if (mysqli_num_rows($result) > 0) {
            $num = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($json, $row);
            }
            echo json_encode($json);
        } else {
            echo json_encode(
                array('status' => false)
            );
        }
    }
}

mysqli_close($dblink);
