<?php
include_once("config.php");

$method = $_POST["method"];
if ($method == "delete") {
    $No = $_POST["am_no_target"];
    $SPV_Delete = "DELETE FROM `announce_message` WHERE `announce_message`.`AM_No` = '$No'";
    if (!mysqli_query($link, $SPV_Delete)) {
        die("wrong");
    }
}
header('Location: AnnounceMessageForSpv.php');
