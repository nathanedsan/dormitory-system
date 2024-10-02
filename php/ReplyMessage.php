<?php
session_start();
include("config.php");

$method = $_POST["method"];
$who = $_POST["who"];
if ($method == "add") {
    date_default_timezone_set('Asia/Taipei');
    $today = date('Y/m/d H:i:s');
    $reply = $_POST["reply"];
    $reply = addslashes($reply);
    $username = $_SESSION["Username"];
    $msgNo = $_POST["No"];
    if ($who == "spv") { //舍監
        $id = $_SESSION["SupervisorID"];
        $username = $username . "(舍監)";
        //新增回覆
        $sql = "INSERT INTO `reply_message` (`RM_Message`, `RM_Name`, `RM_Date`, `RM_PID`, `MB_No`) VALUES ('$reply', '$username', '$today', '$id', '$msgNo')";
        if (!mysqli_query($link, $sql)) {
            die("wrong");
        }
        header('Location: MessageBoardSpv.php');
    } else if ($who == "std") { //學生
        $id = $_SESSION["stdID"];
        $username = $username . "(學生)";
        //新增回覆
        $sql = "INSERT INTO `reply_message` (`RM_Message`, `RM_Name`, `RM_Date`, `RM_PID`, `MB_No`) VALUES ('$reply', '$username', '$today', '$id', '$msgNo')";
        if (!mysqli_query($link, $sql)) {
            die("wrong");
        }
        header('Location: MessageBoardStd.php');
    }
} else if ($method == "delete") {
    $replyNo = $_POST["No"];
    $del = "DELETE FROM `reply_message` WHERE RM_No ='" . $replyNo . "'";
    if (!mysqli_query($link, $del)) {
        die("wrong");
    }
    if ($who == "spv")
        header('Location: MessageBoardSpv.php');
    else if ($who = "std")
        header('Location: MessageBoardStd.php');
} else if ($method == "update") {
    $reply = $_POST["reply"];
    $reply = addslashes($reply);
    $replyNo = $_POST["No"];
    $sql = "UPDATE `reply_message` SET `RM_Message` = '$reply' WHERE `RM_No` = '$replyNo'";
    if (!mysqli_query($link, $sql)) {
        die("wrong");
    }
    if ($who == "spv")
        header('Location: MessageBoardSpv.php');
    else if ($who = "std")
        header('Location: MessageBoardStd.php');
}
