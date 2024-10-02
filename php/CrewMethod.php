<?php
include_once("config.php");

$method = $_POST["method"];
$who = $_POST["who"];
$id = $_POST["id"];

if ($method == "add") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    if ($who == "ad") {
        $sql = "INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Admin_Email`, `Admin_Phone`, `Admin_Password`)
                VALUES ('$id', '$name', '$email', '$phone', '$id')";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "spv") {
        $building = (string)$_POST["building"];
        $sql = "INSERT INTO `supervisor` (`Supervisor_ID`, `Supervisor_Name`, `Supervisor_Email`, `Supervisor_Phone`, `Supervisor_Password`, `Supervisor_Building`)
                VALUES ('$id', '$name', '$email', '$phone', '$id', '$building')";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "std") {
        $sex = $_POST["sex"];
        $acdm = $_POST["acdm"];
        $grade = $_POST["grade"];
        $email = $id . "@mail.nuk.edu.tw";
        $sql = "INSERT INTO `student` (`Std_ID`, `Std_Acdm_Year`, `Std_Name`, `Std_Sex`, `Std_Grade`, `Std_Email`, `Std_Phone`, `Std_Password`)
                VALUES ('$id', '$acdm', '$name', '$sex', '$grade', '$email', '$phone', '$id')";
        if (!mysqli_query($link, $sql))
            die("wrong");
    }
} else if ($method == "update") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    if ($who == "ad") {
        $sql = "UPDATE `admin` SET `Admin_Name` = '$name', `Admin_Email` = '$email', `Admin_Phone` = '$phone' WHERE `Admin_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "spv") {
        $building = (string)$_POST["building"];
        $sql = "UPDATE `supervisor` SET `Supervisor_Name` = '$name', `Supervisor_Email` = '$email', `Supervisor_Phone` = '$phone', `Supervisor_Building` = '$building' 
            WHERE `Supervisor_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "std") {
        $sex = $_POST["sex"];
        $acdm = $_POST["acdm"];
        $grade = $_POST["grade"];
        $sql = "UPDATE `student` SET `Std_Acdm_Year` = '$acdm', `Std_Name` = '$name', `Std_Sex` = '$sex', `Std_Grade` = '$grade', 
                `Std_Phone` = '$phone'  WHERE `Std_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    }
} else if ($method == "delete") {
    if ($who == "ad") {
        $sql = "DELETE FROM `admin` WHERE `Admin_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "spv") {
        $sql = "DELETE FROM `supervisor` WHERE `Supervisor_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "std") {
        $sql = "DELETE FROM `student` WHERE `Std_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    }
} else if ($method == "reset") {
    if ($who == "ad") {
        $sql = "UPDATE `admin` SET `Admin_Password` = '$id' WHERE `Admin_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "spv") {
        $sql = "UPDATE `supervisor` SET `Supervisor_Password` = '$id' WHERE `Supervisor_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    } else if ($who == "std") {
        $sql = "UPDATE `student` SET `Std_Password` = '$id' WHERE `Std_ID` = '$id'";
        if (!mysqli_query($link, $sql))
            die("wrong");
    }
}

header('Location: CrewManage.php');
