<?php
$conn=require("config.php");
$ID = $_GET['ST_id'];
$ag = $_GET['AG'];
$arNo = $_GET['arNo'];
$adminid = $_GET['AD'];
if($ag==1){
    $sql = "UPDATE `apply_record` SET `AR_Result`='通過',`AR_Status`='已審核' where `Std_ID`='$ID';";
    $result = mysqli_query($conn, $sql);


    $sql = "INSERT INTO `ad_mng_ar`(`AR_No`, `Admin_ID`) VALUES ('$arNo','$adminid')";
    $result = mysqli_query($conn, $sql);
    echo "<script>location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
}
else{
    $sql = "UPDATE `apply_record` SET `AR_Result`='不通過',`AR_Status`='已審核' where `Std_ID`='$ID';";
    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO `ad_mng_ar`(`AR_No`, `Admin_ID`) VALUES ('$arNo','$adminid')";
    $result = mysqli_query($conn, $sql);
    echo "<script>location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
}
?>