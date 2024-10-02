<?php
session_start();
include("config.php");
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
  <title>留言板</title>

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
        .button-link {
            background: none;
            border: none;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .flip {
            cursor: pointer;
        }

        .panel {
            display: none;
        }
    </style>
</head>

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

            <li class="nav-item dropdown">
              <a href="index.php">
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

            <li class="nav-item dropdown open">
              <a href="#">
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
                  <li><a href="index.php">回首頁</a></li>
                  <li class="active">訪客</li>
                </ol>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="card-group">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex no-block align-items-center">
                        <div class="container">
                            <div id="detail"></div>
                        </div>
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

<script>
    window.onload = show();

    // 獲取資料
    function get_data(msg_arr, reply_arr) {
        <?php
        //留言
        $msg_fetch = "SELECT * FROM `message_board` ORDER BY `MB_No` desc";
        $msg_result = mysqli_query($link, $msg_fetch);
        while ($row = mysqli_fetch_array($msg_result)) {
            $msg = htmlspecialchars($row[1], ENT_QUOTES);
            echo "msg_arr.push(['$row[2]', '$row[3]', '$msg', '$row[0]',]);"; //姓名,日期,留言,No
        }
        // 回覆
        $reply_fetch = "SELECT * FROM `reply_message`";
        $reply_result = mysqli_query($link, $reply_fetch);
        while ($row = mysqli_fetch_array($reply_result)) {
            $reply = htmlspecialchars($row[1], ENT_QUOTES);
            echo "reply_arr.push(['$row[2]', '$reply', '$row[3]', '$row[0]', '$row[5]', '$row[4]']);"; //姓名,回覆,日期,replyNo,msgNo,ID
        }
        ?>

    }

    function show() {
        var msg_arr = [];
        var reply_arr = [];
        get_data(msg_arr, reply_arr);
        var str = ``;
        var times = 0;
        for (var i of msg_arr) {
            var time = calculate_time(i[1]);
            str += `<font color="blue" size="3">${i[0]}</font><br><font color="gray" size="2">${time}</font>`;
            str += `<br><br><font size="4">${i[2]}</font><br><br><div style="background-color:#f3f4f4;">`;
            // 計算回覆量
            var a = 0;
            for (var j of reply_arr) {
                if (j[4] == i[3])
                    a++;
            }
            // 展開收合
            if (a > 2) {
                str += `<div class="flip" value=${a - 2}>▼ 還有${a - 2}則回覆</div>`;
                str += `<div class="panel" style="background-color:#f3f4f4;">`;
            }
            var counter = a;
            for (var j of reply_arr) {
                if (j[4] == i[3]) {
                    counter--;
                    var time = calculate_time(j[2]);
                    str += `<font color="blue">${j[0]}</font>&nbsp&nbsp&nbsp&nbsp${j[1]}`;
                    str += `<br>${time}<br>`
                }
                if (counter == 2)
                    str += `</div>`;
            }

            if(times != msg_arr.length-1){
                str += `</div><hr>`
                times += 1
            }
        }
        $('#detail').replaceWith(str);
    }

    // 回覆展開收合
    $(document).on('click', '.flip', function() {
        $(this).next().slideToggle("slow");
        let value = $(this).attr('value');
        if ($(this).text() == "▲ 收合回覆")
            $(this).text("▼ 還有" + value + "則回覆");
        else
            $(this).text("▲ 收合回覆");
    });

    // 時間差計算
    function calculate_time(time) {
        var new_date = new Date();
        var old_date = new Date(time);

        var str = ``;
        if (parseInt(new_date - old_date) / 1000 < 60) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000)) + "秒前";
            return str;
        } else if (parseInt(new_date - old_date) / 1000 / 60 < 60) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60)) + "分鐘前";
            return str;
        } else if (parseInt(new_date - old_date) / 1000 / 60 / 60 < 24) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60 / 60)) + "小時前";
            return str;
        } else if (parseInt(new_date - old_date) / 1000 / 60 / 60 / 24 < 365) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60 / 60 / 24)) + "天前";
            return str;
        } else {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60 / 60 / 24 / 365)) + "年前";
            return str;
        }
    }
</script>