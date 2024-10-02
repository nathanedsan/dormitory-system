<?php
date_default_timezone_set('Asia/Taipei');
session_start();
include_once("config.php");

$AdminID = $_SESSION["AdminID"];
$method = $_POST["method"];
if ($method == "insert") {
    $title = $_POST["am_title"];
    $title = addslashes($title);
    $content = $_POST["am_content"];
    $content = addslashes($content);
    $today = date('Y-m-d H:i:s');
    $AM_Add = "INSERT INTO `announce_message` (`AM_Date`, `AM_Title`, `AM_Content`,`Admin_ID`)
    VALUES ('$today', '$title', '$content', '$AdminID')";
    if (!mysqli_query($link, $AM_Add)) {
        die("wrong");
    }
} else if ($method == "delete") {
    $No = $_POST["am_no_target"];
    $AM_Delete = "DELETE FROM `announce_message` WHERE `announce_message`.`AM_No` = '$No'";
    if (!mysqli_query($link, $AM_Delete)) {
        die("wrong");
    }
} else if ($method == "update") {
    $No = $_POST["am_no"];
    $title = $_POST["am_title"];
    $title = addslashes($title);
    $content = $_POST["am_content"];
    $content = addslashes($content);
    $today = date('Y-m-d H:i:s');
    $AM_Update = "UPDATE `announce_message` SET `AM_Date` = '$today', `AM_Title` = '$title', `AM_Content` = '$content' , `Admin_ID` = '$AdminID'
    WHERE `announce_message`.`AM_No` = '$No';";
    if (!mysqli_query($link, $AM_Update)) {
        die("wrong");
    }
}
header('Location: AnnounceMessageForAdmin.php');
