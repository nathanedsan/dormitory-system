<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>忘記密碼</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  <body>

    <div class="wrapper-page">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="card">
              <div class="card-header border-bottom text-center">
                <h4 class="card-title">忘記密碼</h4>
              </div>
              <div class="card-body">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $link = require_once "config.php";
  
  $stdID = $_POST['Std_ID'];

  $query = "SELECT * FROM student WHERE Std_ID = '$stdID'";
  $result = mysqli_query($link, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $securityQuestion = $row['Std_Question'];
    $password = $row['Std_Password'];
    ?>

    <form class="form-horizontal m-t-20" method="POST">
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $securityQuestion; ?>
      </div>
      <div class="form-group">
        <input class="form-control" required="" placeholder="請輸入答案" name="Std_Answer" autocomplete="off">
        <input type="hidden" name="Std_ID" value="<?php echo $stdID; ?>">
      </div>
      <div class="form-group text-center m-t-20">
        <button class="btn btn-common btn-block" type="submit" id="submit">提交</button>
      </div>
    </form>

    <?php
    if (isset($_POST['Std_Answer'])) {
      $answer = $_POST['Std_Answer'];

      if ($answer === $row['Std_Answer']) {
        echo '<script>
                var password = "' . $password . '";
                function yourpw() {
                  swal({
                    title: "你的密碼",
                    text: "你的密碼為" + password + "\n請在記下密碼後盡快更新",
                    icon: "info",
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    }).then((confirmValue) => {
                    if (confirmValue) {
                      window.close();
                    }
                  });
                }
              </script>';
        ?>
          <script>yourpw()</script>
        <?php

      } else {
        echo '答案不正確';
      }
    }
  } else {
    echo '<div class="alert alert-danger">找不到帳號</div>';
  }
} else {
?>

<form class="form-horizontal m-t-20" method="POST">
  <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    輸入你的 <b>帳號</b>，我們將會進行安全驗證
  </div>
  <div class="form-group">
    <input class="form-control" required="" placeholder="請輸入帳號" name="Std_ID" autocomplete="off">
  </div>
  <div class="form-group text-center m-t-20">
    <button class="btn btn-common btn-block" type="submit" id="submit">提交</button>
  </div>
</form>

<?php
}
?>





              </div>
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