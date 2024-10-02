<?php
include_once("config.php");

$method = $_POST["method"];
$dorm_no = $_POST["dorm_no"];
$build_name = $_POST["build_name"];
if ($method == "dorm") {
    $dorm_ppl = $_POST["dorm_ppl"];
    $update = "UPDATE `dorm` SET `Dorm_People` = '$dorm_ppl' 
                WHERE `Dorm_No`= '$dorm_no' and `Dorm_BuildingName` = '$build_name'";
    if (!mysqli_query($link, $update)) {
        die("wrong");
    }
} else {
    $eq_name = $_POST["eq_name"];
    $eq_num = $_POST["eq_num"];
    $eq_status = $_POST["eq_status"];
    $update = "UPDATE `equipment` SET `Eq_Num` = '$eq_num', `Eq_Status` = '$eq_status' 
                WHERE `Dorm_No`= '$dorm_no' and `Dorm_BuildingName` = '$build_name' and`Eq_Name` = '$eq_name'";
    if (!mysqli_query($link, $update)) {
        die("wrong");
    }
}
header('Location: DormitoryManage.php');
