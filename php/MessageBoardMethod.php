<?php
session_start();
include("config.php");

$method = $_POST["method"];
$who = $_POST["who"];
if ($method == "add") {
    date_default_timezone_set('Asia/Taipei');
    $today = date('Y/m/d H:i:s');
    $msg = $_POST["msg"];
    $msg = addslashes($msg);
    $username = $_SESSION["Username"];
    if ($who == "spv") { //舍監
        $id = $_SESSION["SupervisorID"];
        $username = $username . "(舍監)";
        //新增留言
        $sql = "INSERT INTO `message_board` (`MB_Message`, `MB_Name`, `MB_Date`) VALUES ('$msg', '$username', '$today')";
        if (!mysqli_query($link, $sql)) {
            die("wrong");
        }
        //取得剛新增的留言No
        $sql = "SELECT * FROM `message_board` ORDER BY `MB_No`desc LIMIT 1";
        $result = mysqli_query($link, $sql);
        $msgNo = mysqli_fetch_assoc($result)["MB_No"];
        //新增舍監與留言版的關聯
        $sql = "INSERT INTO `spv_use_mb` (`Supervisor_ID`, `MB_No`) VALUES ('$id', '$msgNo')";
        if (!mysqli_query($link, $sql)) {
            die("wrong");
        }
        header('Location: MessageBoardSpv.php');
    } else if ($who == "std") { //學生
        $id = $_SESSION["stdID"];
        $username = $username . "(學生)";
        //新增留言
        $sql = "INSERT INTO `message_board` (`MB_Message`, `MB_Name`, `MB_Date`) VALUES ('$msg', '$username', '$today')";
        if (!mysqli_query($link, $sql)) {
            die("wrong");
        }
        //取得剛新增的留言No
        $sql = "SELECT * FROM `message_board` ORDER BY `MB_No`desc LIMIT 1";
        $result = mysqli_query($link, $sql);
        $msgNo = mysqli_fetch_assoc($result)["MB_No"];
        //新增學生與留言的關聯
        $sql = "INSERT INTO `std_use_mb` (`MB_No`, `Std_ID`) VALUES ('$msgNo', '$id')";
        if (!mysqli_query($link, $sql)) {
            die("wrong");
        }
        header('Location: MessageBoardStd.php');
    }
} else if ($method == "delete") {
    $msgNo = $_POST["No"];
    //刪除留言板上的訊息
    $del = "DELETE FROM `message_board` WHERE MB_No ='" . $msgNo . "'";
    if (!mysqli_query($link, $del)) {
        die("wrong");
    }
    if ($who == "spv")
        header('Location: MessageBoardSpv.php');
    else if ($who = "std")
        header('Location: MessageBoardStd.php');
} else if ($method == "update") {
    $msg = $_POST["msg"];
    $msg = addslashes($msg);
    $msgNo = $_POST["No"];
    $sql = "UPDATE `message_board` SET `MB_Message` = '$msg' WHERE `MB_No` = '$msgNo'";
    if (!mysqli_query($link, $sql)) {
        die("wrong");
    }
    if ($who == "spv")
        header('Location: MessageBoardSpv.php');
    else if ($who = "std")
        header('Location: MessageBoardStd.php');
}
