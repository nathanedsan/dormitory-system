<?php
session_start();
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinStd"]) == null) {
  header("location:index.php");
  exit;
}

$sex = $_SESSION["sex"];



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
  <title>宿舍系統學生首頁</title>

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

  <script src="timeout.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<script>
  var screenWidth = window.screen.width;
  var screenHeight = window.screen.height;
  var windowWidth = 500;
  var windowHeight = 400;

  var left = (screenWidth - windowWidth) / 2;
  var top_distance = windowHeight / 2;

  var features = "width=" + windowWidth + ",height=" + windowHeight + ",left=" + left + ",top=" + top_distance;

  function openSetSafeWindow() {
    window.open("set_safe_password.php", "_blank", features);
    event.preventDefault();
  }
</script>

<?php
$question = $_SESSION["question"];
$answer = $_SESSION["answer"];
if ($question == null || $answer == null) {
  echo "<script>openSetSafeWindow();</script>";
}

?>

<body>

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
                <img class="profile-img img-fluid" src="../image/avatar.png" alt="">
              </a>
              <ul class="dropdown-menu dropdown-md">
                <li>
                  <ul class="list-media">
                    <li class="list-item avatar-info">
                      <div class="media-img">
                        <img src="../image/avatar.png" alt="">
                      </div>
                      <div class="info">
                        <span class="title text-semibold"><?php echo $username; ?></span>
                        <span class="sub-title">學生</span>
                      </div>
                    </li>
                  </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="Profile.php">
                    <i class="lni-user"></i>
                    <span>個人資料</span>
                  </a>
                </li>
                <li>
                  <a href="ModifyPasswordFront.php">
                    <i class="lni-cog"></i>
                    <span>更改密碼</span>
                  </a>
                </li>
                <hr style="margin:2px;">
                <li>
                  <a href="logout.php">
                    <i class="lni-lock"></i>
                    <span>登出</span>
                  </a>
                </li>
              </ul>
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
              <a href="MessageBoardStd.php">
                <span class="icon-holder">
                  <i class="lni-comments-alt"></i>
                </span>
                <span class="title">留言板</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="checkAnnounce.php">
                <span class="icon-holder">
                  <i class="lni-bullhorn"></i>
                </span>
                <span class="title">公告訊息</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="DormitoryMenu.php">
                <span class="icon-holder">
                  <i class="lni-apartment"></i>
                </span>
                <span class="title">宿舍申請</span>
              </a>
            </li>

        

            <li class="nav-item dropdown">
              <a href="MaintainanceReport.php">
                <span class="icon-holder">
                  <i class="lni-files"></i>
                </span>
                <span class="title">報修</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="Dormitoryfee.php">
                <span class="icon-holder">
                  <i class="lni-bitcoin"></i>
                </span>
                <span class="title">繳費系統</span>
              </a>
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
                  <li class="active">學生</li>
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




</body>

</html>