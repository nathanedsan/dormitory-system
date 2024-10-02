<?php
date_default_timezone_set('Asia/Taipei');
session_start();
include_once("config.php");

$arr_apply_No = $_POST["apply_No"];
$arr_std_ID = $_POST["std_ID"];
$arr_building_Name = $_POST["building_Name"];
$arr_dorm_No = $_POST["dorm_No"];
$AR_AllocateNo = $_POST["allocateNo_Max"];
for ($i = 0; $i < count($arr_apply_No); $i++) {
    $AR_No = $arr_apply_No[$i];
    $Std_ID = $arr_std_ID[$i];
    $Dorm_BuildingName = $arr_building_Name[$i];
    $Dorm_No = $arr_dorm_No[$i];

    // 先更新申請紀錄
    $AR_Result = "核准";
    $AR_Status = "受理完成";
    $AR_FeeStatus = "未繳費";
    if ($Dorm_No == "null") {
        $AR_Result = "不核准";
        $AR_FeeStatus = "無紀錄";
    }
    $AR_Update = "UPDATE `apply_record` SET `AR_AllocateNo` = '$AR_AllocateNo', `AR_Result` = '$AR_Result', `AR_Status` = '$AR_Status', 
                 `AR_FeeStatus` = '$AR_FeeStatus' WHERE `apply_record`.`AR_No` = '$AR_No';";
    if (!mysqli_query($link, $AR_Update)) {
        die("wrong");
    }

    // 更新學生資訊
    if ($Dorm_No != "null") {
        $Std_Update = "UPDATE `student` SET `Dorm_No` = '$Dorm_No', `Dorm_BuildingName` = '$Dorm_BuildingName' 
        WHERE `student`.`Std_ID` = '$Std_ID';";
        if (!mysqli_query($link, $Std_Update)) {
            die("wrong");
        }
    }
}

header('Location: AllocateRoomAdmin.php');
