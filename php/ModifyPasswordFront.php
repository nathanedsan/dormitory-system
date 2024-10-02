<?php
session_start();
include_once("config.php");

if (isset($_SESSION["loggedinAdmin"]) && $_SESSION["loggedinAdmin"] === true) {
    $page = "admin.php";
    $id = $_SESSION["AdminID"];
    $password_fetch = "SELECT * FROM `admin` WHERE Admin_ID = '$id'";
    $password_result = mysqli_query($link, $password_fetch);
    $password = mysqli_fetch_assoc($password_result)["Admin_Password"];
} else if (isset($_SESSION["loggedinSupervisor"]) && $_SESSION["loggedinSupervisor"] === true) {
    $page = "supervisor.php";
    $id = $_SESSION["SupervisorID"];
    $password_fetch = "SELECT * FROM `supervisor` WHERE Supervisor_ID = '$id'";
    $password_result = mysqli_query($link, $password_fetch);
    $password = mysqli_fetch_assoc($password_result)["Supervisor_Password"];
} else if (isset($_SESSION["loggedinStd"]) && $_SESSION["loggedinStd"] === true) {
    $page = "std.php";
    $id = $_SESSION["stdID"];
    $password_fetch = "SELECT * FROM `student` WHERE Std_ID = '$id'";
    $password_result = mysqli_query($link, $password_fetch);
    $password = mysqli_fetch_assoc($password_result)["Std_Password"];
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
  <title>更改密碼</title>

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

</head>

<body style="background-color: #F1F2F7;">

    <div class="wrapper-page">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="card">

                <div class="card-header border-bottom text-center">
                    <h4 class="card-title">Reset Password</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div style="text-align:center;">
                            <input class="form-control" type="password" id="pass" oninput="setCustomValidity('')" autocomplete="off" placeholder="目前的密碼"><br>
                            <form name="f" action="ModifyPasswordBack.php" method="POST">
                                <input class="form-control" type="password" id="new_pass1" name="password" oninput="setCustomValidity('')" autocomplete="off" placeholder="新密碼"><br>
                                <input class="form-control" type="password" id="new_pass2" oninput="setCustomValidity('')" autocomplete="off" placeholder="再次輸入新密碼"><br>

                                <div style="display: flex; justify-content: space-between;">
                                    <button class="btn btn-common btn-lg" form="f" onclick="confirm()">確認</button>
                                    <button class="btn btn-secondary btn-lg" type="button" onclick="goBack()">返回</button>
                                </div>

                            </form>
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

</html>

<script>
    //驗證
    function confirm() {
        var x = true;
        var pass = document.getElementById("pass");
        var pass1 = document.getElementById("new_pass1");
        var pass2 = document.getElementById("new_pass2");
        if (pass.value != "<?php echo $password; ?>") {
            x = false;
            pass.setCustomValidity("密碼錯誤。");
            pass.reportValidity();
            return;
        } 
        if (pass1.value == "<?php echo $password; ?>") {
            x = false;
            pass1.setCustomValidity("不能與舊密碼相同。");
            pass1.reportValidity();
            return;
        }
        if (pass1.value != pass2.value) {
            x = false;
            pass2.setCustomValidity("與新密碼不一致。");
            pass2.reportValidity();
            return;
        }
        if (x)
            document.f.submit();
    }

    function goBack() {
        window.history.back();
    }

</script>