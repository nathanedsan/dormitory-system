<?php
session_start();
include_once("config.php");

$arr_origin_dorm_data = $_POST["DB_Std"];
$arr_STD_ID = $_POST["STD_ID"];
$arr_new_dorm_data = $_POST["pre_chosen"];

for ($i = 0; $i < count($arr_STD_ID); $i++) {
    $origin_data = $arr_origin_dorm_data[$i];
    $new_data = $arr_new_dorm_data[$i];
    $STD_ID = $arr_STD_ID[$i];
    $pattern = '/\d+/';
    // 更新學生資訊
    if ($new_data != $origin_data) {
        $arr_origin = array();
        $arr_new = array();
        preg_match_all($pattern, $origin_data, $arr_origin);
        preg_match_all($pattern, $new_data, $arr_new);

        $origin_data_1 =  $arr_origin[0][1];
        $new_data_1 =  $arr_new[0][1];

        $Std_Update = "UPDATE `student` SET `Dorm_No` = '$new_data_1' WHERE `Std_ID` = '$STD_ID';";
        if (!mysqli_query($link, $Std_Update)) {
            die("wrong");
        }
    }
}

header('Location: AllocateRoomAdmin.php');
