<?php
session_start();
$link = require_once "config.php";
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinStd"]) == null) {
    header("location:index.php");
    exit;
}
include_once("config.php");

$std_ID = $_SESSION["stdID"];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>設置安全問答</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <style>
      .change {
        position: relative;
        transition-property: font-size;
        transition-duration: 4s;
        transition-delay: 2s;
        opacity: 0;
      }
      .change:hover {
        transition-property: font-size;
        transition-duration: 4s;
        transition-delay: 2s;
        opacity: 1;
      }
    </style>
  </head>

  <body>

    <div class="wrapper-page">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="card">
              <div class="card-header border-bottom text-center">
                <h4 class="card-title">設置安全問答</h4>
              </div>
              <div class="card-body">
                <form class="form-horizontal m-t-20" method="POST">
                  <input class="form-control" required="" placeholder="請輸入安全問題" name="Std_Question" autocomplete="off"><br>
                  <input class="form-control" required="" placeholder="請輸入答案" name="Std_Answer" autocomplete="off"><br>
                  <button class="btn btn-common btn-block" type="submit" id="submit">提交</button>
                </form>
                <?php
                  if (isset($_POST['Std_Answer'])&&isset($_POST['Std_Question'])) {
                    $stdQuestion = $_POST['Std_Question'];
                    $stdAnswer = $_POST['Std_Answer'];

                    $sql = "UPDATE student SET Std_Question = '$stdQuestion', Std_Answer = '$stdAnswer' WHERE Std_ID = '$std_ID'";
    
                    $result = mysqli_query($link, $sql);
                    echo '<script>window.close();</script>';
                  }
                ?>
              </div>
              <img class="change" src="https://imgur.com/66ydfJp.gif" alt="" width="20px">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>

    <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>