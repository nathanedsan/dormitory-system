<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>登入中</title>
</head>

</html>

<?php
session_start();
$conn = require_once "config.php";

$userID = $_POST["username"];
$password = $_POST["password"];

$password_hash = password_hash($password, PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT * FROM `admin` WHERE  Admin_ID ='" . $userID . "'";    //登入管理員ID
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1 && $password == mysqli_fetch_assoc($result)["Admin_Password"]) {        //登入管理員密碼
        $result = mysqli_query($conn, $sql);
        $_SESSION["AdminID"] = mysqli_fetch_assoc($result)["Admin_ID"];//紀錄管理者ID

        $_SESSION["loggedinAdmin"] = true;   //登入成功

        $result = mysqli_query($conn, $sql);
        $_SESSION["Username"] = mysqli_fetch_assoc($result)["Admin_Name"]; //取得使用者名字

       
        header("location:admin.php");
    } else {
        $sql = "SELECT * FROM `supervisor` WHERE Supervisor_ID ='" . $userID . "'";   //登入舍監ID
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1 && $password == mysqli_fetch_assoc($result)["Supervisor_Password"]) {        //登入舍監密碼
            $result = mysqli_query($conn, $sql);
            $_SESSION["SupervisorID"] = mysqli_fetch_assoc($result)["Supervisor_ID"];//紀錄舍監ID

            $_SESSION["loggedinSupervisor"] = true;   //登入成功

            $result = mysqli_query($conn, $sql);    //取得使用者名字
            $_SESSION["Username"] = mysqli_fetch_assoc($result)["Supervisor_Name"];

            header("location:supervisor.php");
        } else {
            $sql = "SELECT * FROM `student` WHERE  Std_ID ='" . $userID . "'";    //登入學生ID
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1 && $password == mysqli_fetch_assoc($result)["Std_Password"]) {        //登入學生密碼
                $result = mysqli_query($conn, $sql);
                $_SESSION["stdID"] = mysqli_fetch_assoc($result)["Std_ID"];
                $_SESSION["loggedinStd"] = true;   //登入成功
                $result = mysqli_query($conn, $sql);
                $_SESSION["sex"] = mysqli_fetch_assoc($result)["Std_Sex"];

                $result = mysqli_query($conn, $sql);
                $_SESSION["question"] = mysqli_fetch_assoc($result)["Std_Question"];

                $result = mysqli_query($conn, $sql);
                $_SESSION["answer"] = mysqli_fetch_assoc($result)["Std_Answer"];


                $result = mysqli_query($conn, $sql);    //取得使用者名字
                $_SESSION["Username"] = mysqli_fetch_assoc($result)["Std_Name"];
                header("location:std.php");
            } else {
                function_alert();
            }
        }
    }
} else {
    function_alert();
}





// Close connection
mysqli_close($link);

function function_alert()
{

    echo '<script type="text/javascript">sweetAlert("帳密錯誤 !","Try again !","error").then(function(){location.href="index.php"})</script>'; //sweetAlert錯誤訊息
    return false;
}
