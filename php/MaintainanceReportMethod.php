<?php
session_start();
include_once("config.php");

date_default_timezone_set('Asia/Taipei');
$std_id = $_POST["id"];
$MR_Contact = $_POST["phone"];
$Dorm_No = $_POST["room_no"];
$Dorm_BuildingName = $_POST["dorm_building"];
$MR_Content = $_POST["content"];
$MR_ApplyDate = date("Y/n/j");
$MR_WorkDate = $_POST["date_repair"];
$MR_Progress = $_POST["process"];

$sql = "INSERT INTO `maintenance_report` (`Std_ID`, `MR_Contact`, `Dorm_No`, `Dorm_BuildingName`, `MR_Content`, `MR_ApplyDate`, `MR_WorkDate`, `MR_Progress`) 
            VALUES ('$std_id', '$MR_Contact', '$Dorm_No', '$Dorm_BuildingName', '$MR_Content', '$MR_ApplyDate', '$MR_WorkDate', '$MR_Progress')";
if (!mysqli_query($link, $sql))
    die("wrong");

    
header('Location: MaintainanceReport.php');
?>
