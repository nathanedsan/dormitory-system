<?php
include_once("config.php");

$method = $_POST["Dorm"];
$dorm_no = $_POST["dorm_no"];
$build_name = $_POST["build_name"];
$building_fee_list = [7500, 7500, 10000, 10000, 9500, 9500];
$building_fee = $building_fee_list[(int)$build_name - 1];
if ($method == "dorm") {
    $dorm_ppl = $_POST["dorm_ppl"];
    $dorm_fee = $_POST["dorm_fee"];
    $sql = "INSERT INTO `dorm` (`Dorm_No`, `Dorm_BuildingName`, `Dorm_People`, `Dorm_Fee`) 
            VALUES ('$dorm_no', '$build_name', '$dorm_ppl', '$building_fee')";
    if (!mysqli_query($link, $sql)) {
        die("wrong");
    }
} else {
    $eq_name = $_POST["eq_name"];
    $eq_num = $_POST["eq_num"];
    $eq_status = $_POST["eq_status"];
    $sql = "INSERT INTO `equipment` (`Eq_Name`, `Eq_Num`, `Eq_Status`, `Dorm_No`, `Dorm_BuildingName`) 
            VALUES ('$eq_name', '$eq_num', '$eq_status', '$dorm_no', '$build_name')";
    if (!mysqli_query($link, $sql)) {
        die("wrong");
    }
}
header('Location: DormitoryManage.php');
