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
if (isset($_SESSION["loggedinStd"]) == null) {
    unset($_GET["confirm"]);
    header("location:index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_POST["option"])) {
        
        $option = $_POST["option"];
    } else {
        
        echo "未接收到参数 option";
    }
}
$conn = require_once "config.php";
$ID=$_SESSION['stdID'];//學生ID
$sql = "SELECT * FROM `apply_record` WHERE `Std_ID`='$ID' and `AR_Type`='3'and `AR_Result`='未審核';";
$result = mysqli_query($conn, $sql);

$sql ="SELECT * FROM `student` WHERE `Std_ID`='$ID' AND `Dorm_No` is null;";
$ifhasdor = mysqli_query($conn, $sql);//有沒有宿舍判斷

$sql ="SELECT * FROM `student` WHERE `Std_ID`='$ID';";
$ifsamedor=mysqli_query($conn, $sql);//有沒有和原本重複

$sql="SELECT * FROM `apply_record` WHERE `Std_ID`='$ID' and `AR_Result`='未審核';";
$ifcomplex=mysqli_query($conn, $sql);

date_default_timezone_set('Asia/Taipei');
$today = date('Y/m/d H:i:s');
$month = date("n");
$year = date("Y");
$AR_Semester = ' ';
if ($month > 6) {
    $AR_Semester = '下學期';
    $year -= 1911;
} else {
    $year -= 1912;
    $AR_Semester = '上學期';
}


if (mysqli_num_rows($result) == 1 ) {    
    showMessage();
}elseif(mysqli_num_rows($ifhasdor) == 1){
    shownodor();
}elseif($option===mysqli_fetch_assoc($ifsamedor)["Dorm_No"]){
    same();
}elseif(mysqli_num_rows($ifcomplex) == 1){
    ifcomplex();

}
else {
    $sql = "INSERT INTO `apply_record`( `AR_Acdm_Year`, `AR_Semester`, `AR_Date`, `AR_Result`, `AR_Status`, `AR_Type`, `Std_ID`,`AR_Building`) VALUES ('$year','$AR_Semester','$today','未審核','受理中','3','$ID',$option)";
    mysqli_query($conn, $sql);
    showsuccess();
   
}
function showMessage()
{
    echo '<script type="text/javascript">sweetAlert("你已申請過 !","Try again !","error").then(function(){location.href="DormitoryMenu.php"})</script>'; //sweetAlert錯誤訊息
    return false;
}
function showsuccess(){
    echo '<script type="text/javascript">sweetAlert("申請成功 !","請等待審核 !","success").then(function(){location.href="DormitoryMenu.php"})</script>';
    return true;
}
function shownodor()
{
    echo '<script type="text/javascript">sweetAlert("你沒宿舍 !","Try again !","error").then(function(){location.href="DormitoryMenu.php"})</script>'; //sweetAlert錯誤訊息
    return false;
}
function same()
{
    echo '<script type="text/javascript">sweetAlert("不可選擇原宿舍 !","Try again !","error").then(function(){location.href="DormitoryMenu.php"})</script>'; //sweetAlert錯誤訊息
    return false;
}
function ifcomplex()
{
    echo '<script type="text/javascript">sweetAlert("不可同時擁有其他申請 !","Try again !","error").then(function(){location.href="DormitoryMenu.php"})</script>'; //sweetAlert錯誤訊息
    return false;
}
?>

