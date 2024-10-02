<!DOCTYPE html>
<html>

<head>
    <title>申請中</title>
    <link rel="stylesheet" href="/Dormitory/css/style.css" />
    <!-- 新 Bootstrap5 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- 最新的 Bootstrap5 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>

</head>

</html>

<?php
session_start();
$conn = include "config.php";
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinAdmin"]) == null) {
    header("location:index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["stdid"]) && isset($_POST["type"])) {
        $option = $_POST["stdid"];
        $type = $_POST["type"];
    } else {

        echo "未接收到参数";
    }
}
$sql = "SELECT `Std_ID` FROM `apply_record` WHERE `AR_No`='$option';";
$result = mysqli_query($conn, $sql);
$id = mysqli_fetch_assoc($result)['Std_ID'];

if ($type=='1') {
    $sql = "UPDATE `student` SET `Dorm_No` = NULL, `Dorm_BuildingName` = NULL WHERE `student`.`Std_ID` = '$id';";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `apply_record` SET `AR_Result`='核准',`AR_Status`='受理完成' WHERE `AR_No`='$option'";
    $result2 = mysqli_query($conn, $sql);
}
else{
    $sql = "UPDATE `apply_record` SET `AR_Result`='不核准',`AR_Status`='受理完成' WHERE `AR_No`='$option'";
    $result2 = mysqli_query($conn, $sql);
}


if ($result and $result2) {
    header("location:DropApplicationRecord.php");
} else {
    echo 'fail';
}
