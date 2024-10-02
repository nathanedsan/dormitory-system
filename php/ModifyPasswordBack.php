<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>


<?php
session_start();
include_once("config.php");

$password = $_POST["password"];

if (isset($_SESSION["loggedinAdmin"]) && $_SESSION["loggedinAdmin"] === true) {
    $id = $_SESSION["AdminID"];
    $sql = "UPDATE `admin` SET `Admin_Password` = '$password' WHERE `Admin_ID` = '$id'";
    if (!mysqli_query($link, $sql))
        die("wrong");
    echo '<script type="text/javascript">sweetAlert("修改成功 !","返回主頁面","success").then(function(){location.href="admin.php"})</script>';
} else if (isset($_SESSION["loggedinSupervisor"]) && $_SESSION["loggedinSupervisor"] === true) {
    $id = $_SESSION["SupervisorID"];
    $sql = "UPDATE `supervisor` SET `Supervisor_Password` = '$password' WHERE `Supervisor_ID` = '$id'";
    if (!mysqli_query($link, $sql))
        die("wrong");
    echo '<script type="text/javascript">sweetAlert("修改成功 !","返回主頁面","success").then(function(){location.href="supervisor.php"})</script>';
} else if (isset($_SESSION["loggedinStd"]) && $_SESSION["loggedinStd"] === true) {
    $id = $_SESSION["stdID"];
    $sql = "UPDATE `student` SET `Std_Password` = '$password' WHERE `Std_ID` = '$id'";
    if (!mysqli_query($link, $sql))
        die("wrong");
    echo '<script type="text/javascript">sweetAlert("修改成功 !","返回主頁面","success").then(function(){location.href="std.php"})</script>';
}
