<?php
session_start();
include_once("config.php");

$MR_Progress = $_POST["options"];
$Mr_no = $_POST["mr_no"];

$sql = "UPDATE `maintenance_report` SET `MR_Progress` = '$MR_Progress' WHERE `MR_No` = '$Mr_no'";
    if (!mysqli_query($link, $sql)) {
        die("wrong");
    }
    

header('Location:Maintainmanageradmin.php');
?>
