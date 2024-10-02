<?php
session_start();
if (isset($_SESSION["loggedinAdmin"]) && $_SESSION["loggedinAdmin"] === true) {
  header("location:admin.php");
  exit;
} else if (isset($_SESSION["loggedinSupervisor"]) && $_SESSION["loggedinSupervisor"] === true) {
  header("location:supervisor.php");
  exit;
} else if (isset($_SESSION["loggedinStd"]) && $_SESSION["loggedinStd"] === true) {
  header("location:std.php");
  exit;
}
?>
<!DOCTYPE html>
<html style="height: 100%;">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>高雄大學宿舍管理系統</title>

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
    .carousel-inner .item {
      text-align: center;
    }

    .center-block {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .carousel-control.left,
    .carousel-control.right {
      background-image: none;
      width: 50%;
    }

    .carousel-control.left {
      margin-left: 0;
    }

    .carousel-control.right {
      margin-right: 0;
    }
  </style>
  <script>
    window.addEventListener('load', function() {
      var link = document.querySelector('.carousel-control.right');
      link.click();
    });
  </script>

</head>

<body class="picture_background">

  <div class="app header-default side-nav-dark">
    <div class="layout">

      <div class="header navbar">
        <div class="header-container">
          <div class="nav-logo">
            <a href="#">
              <b><img src="../image/logo.jpg" alt="" width="50px"></b>
              <span class="logo">
                <img src="../image/logo-text.png" width="200px" alt="">
              </span>
            </a>
          </div>

          <ul class="nav-left">
            <li>
              <a class="sidenav-fold-toggler" href="javascript:void(0);">
                <i class="lni-menu"></i>
              </a>
              <a class="sidenav-expand-toggler" href="javascript:void(0);">
                <i class="lni-menu"></i>
              </a>
            </li>
          </ul>

          <ul class="nav-right">
            <li class="user-profile dropdown dropdown-animated scale-left">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../image/login.png" alt="" style="width:80px;">
              </a>
              <form action="login.php" method="post" id="login">
                <ul class="dropdown-menu dropdown-md" style="padding:5px;">
                  <li>
                    <span>帳號</span>
                    <input style="width:100%;margin-bottom:2px;" required="required" class="form-control" type="text" autocomplete="off" name="username" id="username" placeholder="登入ID">
                  </li>
                  <li>
                    <span>密碼</span>
                    <input style="width:100%;margin-bottom:2px;" required="required" class="form-control" type="password" name="password" id="password" placeholder="密碼">
                  </li>
                  <hr style="margin:5px;">
                  <li>
                    <div style="display: flex; justify-content: space-between;">
                      <button style="width:30%;" type="submit" class="btn btn-common mr-3">登入</button>
                      <button class="btn btn-light" onclick="openForgotPasswordWindow();" align="right">忘記密碼</button>
                    </div>
                  </li>
                </ul>

              </form>



            </li>
          </ul>
        </div>
      </div>

      <div class="side-nav expand-lg">
        <div class="side-nav-inner">
          <ul class="side-nav-menu">

            <li class="nav-item dropdown open">
              <a href="#">
                <span class="icon-holder">
                  <i class="lni-dashboard"></i>
                </span>
                <span class="title">首頁</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="CheckAnnouncementVst.php">
                <span class="icon-holder">
                  <i class="lni-bullhorn"></i>
                </span>
                <span class="title">公告訊息</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="MessageBoardVst.php">
                <span class="icon-holder">
                  <i class="lni-comments-alt"></i>
                </span>
                <span class="title">留言板</span>
              </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                  <span class="icon-holder">
                    <i class="lni-control-panel"></i>
                  </span>
                  <span class="title">宿舍環境</span>
                  <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                </a>
                <ul class="dropdown-menu sub-down">
                  <li>
                    <a href="DormitoryInterior.php">宿舍內部資料</a>
                  </li>
                  <li>
                    <a href="DormitoryDetail.php">校內住宿注意事項</a>
                  </li>
                </ul>
              </li>

          </ul>
        </div>
      </div>

      <div class="page-container">
        <div class="main-content">
          <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
              <div class="col-12 col-lg-3 col-md-6"></div>
              <div class="col-12 col-lg-9 col-md-6">
                <ol class="breadcrumb float-right">
                  <li><a href="#">回首頁</a></li>
                  <li class="active">訪客</li>
                </ol>
              </div>
            </div>
          </div>


          <div id="myCarousel" class="carousel slide">
            <ol class="carousel-indicators" style="margin-left:20%">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
              <div class="item active">
                <img src="../image/學1.png" class="center-block" width="50%">
              </div>

              <div class="item">
                <img src="../image/學2.png" class="center-block" width="50%">
              </div>

              <div class="item">
                <img src="../image/綜合.png" class="center-block" width="50%">
              </div>
            </div>

            <a class="carousel-control left" href="#myCarousel" data-slide="prev" style="padding:0px">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next" style="padding:0px">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>

          <br>

          <div class="container-fluid">
            <div class="card-group">

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex no-block align-items-center">
                        <div>
                          <div class="icon" style="display: flex; align-items: center;">
                            <i class="lni-bullhorn"></i>
                            <h2 class="counter text-primary" style="margin:2px;">學生宿舍服務須知</h2>
                          </div>
                          <img src="../image/time.png" width="90%">
                          <h3 class="text-muted">學生宿舍辦公室專線電話：(07)591-9596、591-9597</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex no-block align-items-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14719.446783820615!2d120.2845572!3d22.7333814!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e0f114a51d53b%3A0xe6e681ecaffe55f2!2z5ZyL56uL6auY6ZuE5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1685194708783!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>



        <footer class="content-footer">
          <div class="footer">
            <div class="copyright">
              <ul>
                
                
                <li>洽詢電話 : 07-591-9596</li>
              </ul>
            </div>
          </div>
        </footer>
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
  <script src="assets/plugins/morris/morris.min.js"></script>
  <script src="assets/plugins/raphael/raphael-min.js"></script>
  <script src="assets/js/dashborad1.js"></script>
  <script>
    var screenWidth = window.screen.width;
    var screenHeight = window.screen.height;
    var windowWidth = 500; // 視窗寬度
    var windowHeight = 400; // 視窗高度

    var left = (screenWidth - windowWidth) / 2;
    var top_distance = windowHeight / 2;

    var features = "width=" + windowWidth + ",height=" + windowHeight + ",left=" + left + ",top=" + top_distance ;

    function openForgotPasswordWindow() {
      window.open("forget_password.php", "_blank", features);
      event.preventDefault();
    }
  </script>



</body>

</html>