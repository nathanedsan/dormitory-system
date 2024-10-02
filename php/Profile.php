<?php
session_start();
include_once("config.php");
if (isset($_SESSION["loggedinAdmin"]) && $_SESSION["loggedinAdmin"] === true) {
    $page = "admin.php";
    $id = $_SESSION["AdminID"];
    $profile_fetch = "SELECT * FROM `admin` WHERE Admin_ID = '$id'";
    $profile_result = mysqli_query($link, $profile_fetch);
    $profile = mysqli_fetch_assoc($profile_result);
} else if (isset($_SESSION["loggedinSupervisor"]) && $_SESSION["loggedinSupervisor"] === true) {
    $page = "supervisor.php";
    $id = $_SESSION["SupervisorID"];
    $profile_fetch = "SELECT * FROM `supervisor` WHERE Supervisor_ID = '$id'";
    $profile_result = mysqli_query($link, $profile_fetch);
    $profile = mysqli_fetch_assoc($profile_result);
} else if (isset($_SESSION["loggedinStd"]) && $_SESSION["loggedinStd"] === true) {
    $page = "std.php";
    $id = $_SESSION["stdID"];
    $profile_fetch = "SELECT * FROM `student` WHERE Std_ID = '$id'";
    $profile_result = mysqli_query($link, $profile_fetch);
    $profile = mysqli_fetch_assoc($profile_result);
}
   
?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>個人資料</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- Responsive Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <style>
        table {
            border-spacing: 0;
            width: 100%;
        }
        tr {
            text-align: center;
        }
        th {
            padding: 10px;
        }
        td {
            padding: 10px;
            word-wrap: break-word;
            max-width: 200px;
        }

        table tbody tr:nth-child(odd){
            background-color: #eee
        }
    </style>

</head>

<body style="background-color: #F1F2F7;">

    <div class="wrapper-page">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="card">

                <div class="card-header border-bottom text-center">
                    <h4 class="card-title">個人資料</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div style="font-size:18px;">
                            <?php
                                 if(isset($_SESSION["loggedinAdmin"]) && $_SESSION["loggedinAdmin"] === true){
                                    echo "<table><tr><th>系統管理員ID：</th><th>" . $profile["Admin_ID"] . "</th></tr>";
                                    echo "<tr><td>姓名：</td><td>" . $profile["Admin_Name"] . "</td></tr>";
                                    echo "<tr><td>Email：</td><td>" . $profile["Admin_Email"] . "</td></tr>";
                                    echo "<tr><td>手機號碼：</td><td>" . $profile["Admin_Phone"] . "</td></tr></table>";
                                 }
                                 else if(isset($_SESSION["loggedinSupervisor"]) && $_SESSION["loggedinSupervisor"] === true){
                                    echo "<table><tr><th>舍監ID：</th><th>" . $profile["Supervisor_ID"] . "</th></tr>";
                                    echo "<tr><td>姓名：</td><td>" . $profile["Supervisor_Name"] . "</th></tr>";
                                    echo "<tr><td>Email：</td><td>" . $profile["Supervisor_Email"] . "</td></tr>";
                                    echo "<tr><td>手機號碼：</td><td>" . $profile["Supervisor_Phone"] . "</td></tr>";
                                    if($profile["Supervisor_Building"] == "1"){
                                        echo "<tr><td>負責大樓：</td><td>學一(男)</td></tr></table>";
                                    }
                                    else if($profile["Supervisor_Building"] == "2"){
                                        echo "<tr><td>負責大樓：</td><td>學一(女)</td></tr></table>";
                                    }
                                    else if($profile["Supervisor_Building"] == "3"){
                                        echo "<tr><td>負責大樓：</td><td>學二(男)</td></tr></table>";
                                    }
                                    else if($profile["Supervisor_Building"] == "4"){
                                        echo "<tr><td>負責大樓：</td><td>學二(女)</td></tr></table>";
                                    }
                                    else if($profile["Supervisor_Building"] == "5"){
                                        echo "<tr><td>負責大樓：</td><td>綜合(男)</td></tr></table>";
                                    }
                                    else if($profile["Supervisor_Building"] == "6"){
                                        echo "<tr><td>負責大樓：</td><td>綜合(女)</td></tr></table>";
                                    }
                                 }
                                 else if(isset($_SESSION["loggedinStd"]) && $_SESSION["loggedinStd"] === true){
                                    echo "<table><tr><th>學號：</th><th>" . $profile["Std_ID"] . "</th></tr>";
                                    echo "<tr><td>姓名：</td><td>" . $profile["Std_Name"] . "</td></tr>";
                                    echo "<tr><td>性別：</td><td>" . $profile["Std_Sex"] . "</td></tr>";
                                    echo "<tr><td>Email：</td><td>" . $profile["Std_Email"] . "</td></tr>";
                                    echo "<tr><td>手機號碼：</td><td>" . $profile["Std_Phone"] . "</td></tr>";
                                    if($profile["Dorm_BuildingName"] == "1"){
                                        echo "<tr><td>居住宿舍：</td><td>學一(男)-";
                                    }
                                    else if($profile["Dorm_BuildingName"] == "2"){
                                        echo "<tr><td>居住宿舍：</td><td>學一(女)-";
                                    }
                                    else if($profile["Dorm_BuildingName"] == "3"){
                                        echo "<tr><td>居住宿舍：</td><td>學二(男)-";
                                    }
                                    else if($profile["Dorm_BuildingName"] == "4"){
                                        echo "<tr><td>居住宿舍：</td><td>學二(女)-";
                                    }
                                    else if($profile["Dorm_BuildingName"] == "5"){
                                        echo "<tr><td>居住宿舍：</td><td>綜合(男)-";
                                    }
                                    else if($profile["Dorm_BuildingName"] == "6"){
                                        echo "<tr><td>居住宿舍：</td><td>綜合(女)-";
                                    }
                                    echo $profile["Dorm_No"] . "</td></tr></table>";
                                }
                            ?>
                            <p style="color:red;margin-top:10px;float:left;">※如有資料更改請通知系統管理員/舍監</p> 
                            <button style="float:right;" class="btn btn-secondary mt-3" type="button" onclick="goBack()">返回</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    <script src="assets/js/main.js"></script>
</body>

<script>
    function goBack() {
        window.history.back();
    }

</script>

</html>