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
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinAdmin"]) == null) {
    unset($_GET["confirm"]);
    header("location:index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["type"]) && isset($_POST["AR_No"]) && isset($_POST["building"]) && isset($_POST["arbuilding"])) {

        $type = $_POST["type"]; //核准還是不核准
        $AR_No = $_POST["AR_No"]; //申請表編號
        $building = $_POST["arbuilding"];
        $originbuilding = $_POST["building"];

        echo $type;
        echo $AR_No;
        echo $building;
        echo $originbuilding ;
    } else {

        echo "未接收到参数";
    }
}
$conn = require_once "config.php";


$sql = "SELECT * FROM `dorm` WHERE `Dorm_No`='$building' and `Dorm_BuildingName`='$originbuilding';";
$ifhasdor = mysqli_query($conn, $sql); //有沒有宿舍判斷

$sql = "SELECT `Std_ID` FROM `apply_record` WHERE `AR_No`='$AR_No';";
$result = mysqli_query($conn, $sql);
$id = mysqli_fetch_assoc($result)['Std_ID'];


if ($type === '1') {

    if (mysqli_num_rows($ifhasdor) == 0) {
        shownodor();
    } else {
        $sql = "UPDATE `student` SET `Dorm_No` = '$building' WHERE `student`.`Std_ID` = '$id';";
        mysqli_query($conn, $sql);

        $sql = "UPDATE `apply_record` SET `AR_Result`='核准',`AR_Status`='受理完成' WHERE `AR_No`='$AR_No'";
        mysqli_query($conn, $sql);
        showsuccess();
    }
} else {
    $sql = "UPDATE `apply_record` SET `AR_Result`='不核准',`AR_Status`='受理完成' WHERE `AR_No`='$AR_No'";
    mysqli_query($conn, $sql);
    showsuccessReject();
}

function showsuccess()
{
    echo '<script type="text/javascript">sweetAlert("成功 !","成功更換寢室","success").then(function(){location.href="ChangeDormitoryApplication.php"})</script>';
    return true;
}
function shownodor()
{
    echo '<script type="text/javascript">sweetAlert("無此房間 !","Try again !","error").then(function(){location.href="ChangeDormitoryApplication.php"})</script>'; //sweetAlert錯誤訊息
    return false;
}
function showsuccessReject()
{
    echo '<script type="text/javascript">sweetAlert("成功 !","不核准","success").then(function(){location.href="ChangeDormitoryApplication.php"})</script>';
    return true;
}


?>