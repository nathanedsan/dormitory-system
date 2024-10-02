<?php
session_start();

include_once("config.php");
$msg_fetch = "SELECT * FROM `announce_message` ORDER BY `AM_Date` desc , `AM_No` desc";
$msg_result = mysqli_query($link, $msg_fetch);
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
  <title>公告訊息</title>

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
    option {
      font-family: Microsoft JhengHei;
      font-size: 15px;
    }

    select {
      font-family: Microsoft JhengHei;
      font-size: 15px;
    }

    label {
      font-family: Microsoft JhengHei;
      font-size: 20px;
    }

    [name="am_title"] {
      font-size: 20px;
      color: black;
      font-weight: bold;
    }

    [id="is_title"]:hover {
      color: gray;
    }

    table>thead>tr>th {
      text-align: left;
      border-bottom: 2px solid #c0c0c0;
      font-weight: bold;
      font-size: 20px;
      height: 40px;
    }

    table>tbody>tr {
      border-bottom: 1px solid #ddd;
      border-collapse: collapse;
    }

    #Date_Style {
      width: 150px;
      color: black;

    }

    #Title_Style {
      width: 960px;
      color: black;
    }

    input[type="radio"] {
      text-align: center;
      width: 50px;
    }

    div[id="no_announce"] {
      text-align: center;
      font-weight: bold;
      font-size: 20px;
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

            <li class="nav-item dropdown open">
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
                          <div id="view"></div>
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

<script>
  window.onload = show()

  function show() { //只顯示公告的發布日期與標題
    clean()
    var arr = []
    var str = ``
    var times = 0
    <?php
    $msg_result = mysqli_query($link, $msg_fetch);
    while ($announce = mysqli_fetch_array($msg_result)) { // announce = [編號,日期,標題,內容,adminID]
      $title = htmlspecialchars($announce[2], ENT_QUOTES);
      echo "arr.push(['$announce[0]','$announce[1]','$title']);"; //格式:[編號,日期,標題]
    }
    ?>
    if (arr.length == 0) {
      $('#view').replaceWith(`<div id="detail"><div id="no_announce">查無公告訊息!</div></div>`)
      return;
    }
    str += `<table><thead><tr><th id="Date_Style"><div>日期</div></th>`
    str += `<th id="Title_Style"><div>標題</div></th></thead><tbody>`
    for (var i of arr) {
      var DATE = i[1].split(' ') // 只取出日期用的
      str += `<input type="hidden" id="am_no" value="${i[0]}">`
      str += `<tr name="TR_H_${i[0]}"><td><label style="color:gray;" name="am_date"><div name="DATE">${DATE[0]}</div></label></td>`
      str += `<td><a id="is_title" href="javascript:void(0)" name="am_title" onclick="showContent(false, ${i[0]})"><div name="TITLE_${i[0]}">${i[2]}</div></a></td>`
      str += `</tr>`
    }
    str += `<tbody></table>`
    $('#view').append(str)
    for (var i of arr) {
      changeTR_H(i[0]);
    }
  }

  function showContent(del, am_no) { // 顯示公告的內容
    var str = ``
    var arr = []
    clean()

    <?php
    $msg_result = mysqli_query($link, $msg_fetch);
    while ($announce = mysqli_fetch_array($msg_result)) {
      $getAdminName = "SELECT `Admin_Name` FROM `admin` WHERE `Admin_ID` = '$announce[4]'";
      $AdminName_result = mysqli_query($link, $getAdminName);
      $Admin_name = mysqli_fetch_array($AdminName_result)[0];

      $title = htmlspecialchars($announce[2], ENT_QUOTES);
      $content = htmlspecialchars($announce[3], ENT_QUOTES);

      $content = str_replace("\r\n", "There_will_be_換行です", $content);
      echo "arr.push(['$announce[0]','$title','$content','$Admin_name']);";
      // arr = [編號,標題,內容,Admin_name]
    }
    ?>

    for (var i of arr) {
      if (i[0] == parseInt(am_no)) {
        str += `<div><label name="am_title">${i[1]}</label>`
        str += `<div style="font-size:18px;" name="am_content">內容：<br>${i[2].replaceAll("There_will_be_換行です","<br>")}</div></div>`
        str += `<div style="font-size:18px;text-align: right;" name="admin_ID">發布者：${i[3]}</div>`
        str += `<button class="btn btn-secondary mb-3" href="javascript:void(0)" name="back" onclick="show()">返回</button>`
        break;
      }
    }

    $('#view').append(str)
  }

  function clean() { //把view內的內容都清空
    $("#view").replaceWith('<div id="view"></div>');
  }

  function changeTR_H(num) {
    var word_H = $(`div[name='TITLE_${num}']`).height() + 30;
    console.log("Old = " + $(`div[name='TITLE_${num}']`).height())
    $(`tr[name='TR_H_${num}']`).height(word_H)
    console.log("New = " + $(`tr[name='TR_H_${num}']`).height())
  }
</script>

</html>