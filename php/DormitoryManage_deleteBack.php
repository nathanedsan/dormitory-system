<?php
include_once("config.php");

$method = $_POST["method"];
$dorm_no = $_POST["dorm_no"];
$build_name = $_POST["build_name"];
if($method == "dorm"){
    $del = "DELETE FROM `dorm` WHERE `Dorm_No` = '$dorm_no' and `Dorm_BuildingName` = '$build_name'";
    if (!mysqli_query($link, $del)) {
        die("wrong");
    }
}else{
    $eq = $_POST["eq_name"];
    $del = "DELETE FROM `equipment` WHERE `Dorm_No` = '$dorm_no' and `Dorm_BuildingName` = '$build_name' and `Eq_Name` = '$eq'";
    if (!mysqli_query($link, $del)) {
        die("wrong");
    }
}
header('Location: DormitoryManage.php');

?>