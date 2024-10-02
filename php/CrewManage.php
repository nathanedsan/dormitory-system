<?php
session_start();
$username = $_SESSION["Username"];
include_once("config.php");
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
  <title>管理人員</title>

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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        table {
            border-spacing: 0;
            width: 100%;
        }
        tr {
            text-align: center;
            font-size:20px;
        }
        th {
            padding: 10px;
            font-size:20px;
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
    <script src="timeout.js"></script>
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
                        <span class="sub-title">系統管理員</span>
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


            <li class="nav-item dropdown">
              <a href="admin.php">
                <span class="icon-holder">
                  <i class="lni-dashboard"></i>
                </span>
                <span class="title">首頁</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="DormitoryManage.php">
                <span class="icon-holder">
                  <i class="lni-apartment"></i>
                </span>
                <span class="title">管理宿舍</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="AnnounceMessageForAdmin.php">
                <span class="icon-holder">
                  <i class="lni-bullhorn"></i>
                </span>
                <span class="title">管理公告</span>
              </a>
            </li>

            <li class="nav-item dropdown open">
              <a href="#">
                <span class="icon-holder">
                  <i class="lni-emoji-smile"></i>
                </span>
                <span class="title">管理人員</span>
              </a>
            </li>

              <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                  <span class="icon-holder">
                    <i class="lni-timer"></i>
                  </span>
                  <span class="title">管理申請紀錄</span>
                  <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                </a>
                <ul class="dropdown-menu sub-down">
                  <li>
                    <a href="DropApplicationRecord.php">退宿申請</a>
                  </li>
                  <li>
                    <a href="ChangeDormitoryApplication.php">換宿申請</a>
                  </li>
                </ul>
              </li>            

            <li class="nav-item dropdown">
              <a href="AllocateRoomAdmin.php">
                <span class="icon-holder">
                  <i class="lni-package"></i>
                </span>
                <span class="title">入住申請&分配房間</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="Maintainmanageradmin.php">
                <span class="icon-holder">
                  <i class="lni-files"></i>
                </span>
                <span class="title">報修系統</span>
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
                  <li><a href="admin.php">回首頁</a></li>
                  <li class="active">系統管理員</li>
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
                            <div style="font-size:15px;font-family:Microsoft JhengHei;">
                                <div id="operate"></div>
                            </div>
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

</body>

</html>

<script>
    window.onload = func();

    function func() {
        var str = ``;
        str += `<div class="col-12" style="padding-bottom:15px;"><label style="font-size:20px;font-family:Microsoft JhengHei;">篩選：</label>`;
        str += `<input type="checkbox" id="admin" onchange="show()" checked><label style="margin:5px;font-size:20px;font-family:Microsoft JhengHei;">管理員</label>`;
        str += `<input type="checkbox" id="supervisor" onchange="show()" checked><label style="margin:5px;font-size:20px;font-family:Microsoft JhengHei;">舍監</label>`;
        str += `<input type="checkbox" id="student" onchange="show()" checked><label style="margin:5px;font-size:20px;font-family:Microsoft JhengHei;">學生</label>`;
        str += `<button class="btn btn-common mb-3" onclick="addFunc()" style="float:right;font-size:20px;">新增</button></div>`;
        document.getElementById("operate").innerHTML = str;
        show();
    }

    function show() {
        var str = ``;
        var count = 0;
        if (document.getElementById("admin").checked) {
            var arr = [];
            <?php //列出admin
            $ad_fetch = "SELECT * FROM `admin`";
            $ad_result = mysqli_query($link, $ad_fetch);
            while ($row = mysqli_fetch_array($ad_result)) {
                $id_num = htmlspecialchars($row[0], ENT_QUOTES);
                $name = htmlspecialchars($row[1], ENT_QUOTES);
                $mail = htmlspecialchars($row[2], ENT_QUOTES);
                $phone = htmlspecialchars($row[3], ENT_QUOTES);
                $pw = htmlspecialchars($row[4], ENT_QUOTES);
                echo "arr.push([`$id_num`,`$name`,`$mail`,`$phone`,`$pw`]);"; //[身份證字號,姓名,E-mail,手機號碼,密碼]
            }
            ?>
            str += `<div class="col-12" style="padding-bottom:15px;"><label style="font-size:20px;font-family:Microsoft JhengHei;">管理員</label><br>`;
            if (arr.length > 0) {
                str += `<table border=1>`;
                str += `<tr>`;
                str += `<th style="text-align:center;">身分證字號</th>`;
                str += `<th style="text-align:center;">姓名</th>`;
                str += `<th style="text-align:center;">E-mail</th>`;
                str += `<th style="text-align:center;">手機號碼</th>`;
                str += `<th style="text-align:center;">密碼</th>`;
                str += `<th style="text-align:center;">操作</th>`;
                str += `</tr>`;
                for (var i of arr) {
                    str += `<tr>`;
                    str += `<td style="font-size:20px;">${i[0]}</td>`;
                    str += `<td style="font-size:20px;">${i[1]}</td>`;
                    str += `<td style="font-size:20px;">${i[2]}</td>`;
                    str += `<td style="font-size:20px;">${i[3]}</td>`;
                    str += `<td style="font-size:20px;">${i[4]}</td>`;
                    str += `<td style="font-size:20px;">`;
                    str += `<button class="btn btn-common mb-3" style="margin:5px;" value="${i[0]}" onclick="adminUpdate(this)">修改</button><br>`;
                    str += `</td>`;
                    str += `</tr>`;
                }
                str += `</table></div>`;
            }
        }
        if (document.getElementById("supervisor").checked) {
            var arr = [];
            var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
            <?php //列出spuervisor
            $spv_fetch = "SELECT * FROM `supervisor`";
            $spv_result = mysqli_query($link, $spv_fetch);
            while ($row = mysqli_fetch_array($spv_result)) {
                $id_num = htmlspecialchars($row[0], ENT_QUOTES);
                $name = htmlspecialchars($row[1], ENT_QUOTES);
                $mail = htmlspecialchars($row[2], ENT_QUOTES);
                $phone = htmlspecialchars($row[3], ENT_QUOTES);
                $pw = htmlspecialchars($row[4], ENT_QUOTES);
                $mng_building = htmlspecialchars($row[5], ENT_QUOTES);
                echo "arr.push([`$id_num`,`$name`,`$mail`,`$phone`,`$pw`,`$mng_building`]);"; //[身份證字號,姓名,E-mail,手機號碼,密碼,管理的大樓]
            }
            ?>
            str += `<div class="col-12" style="padding-bottom:15px;"><label style="font-size:20px;font-family:Microsoft JhengHei;">舍監</label><br>`;
            if (arr.length > 0) {
                str += `<table border=1>`;
                str += `<tr>`;
                str += `<th style="text-align:center;">身分證字號</th>`;
                str += `<th style="text-align:center;">姓名</th>`;
                str += `<th style="text-align:center;">負責大樓</th>`;
                str += `<th style="text-align:center;">E-mail</th>`;
                str += `<th style="text-align:center;">手機號碼</th>`;
                str += `<th style="text-align:center;">密碼</th>`;
                str += `<th style="text-align:center;">操作</th>`;
                str += `</tr>`;
                for (var i of arr) {
                    var b = building_Name[parseInt(i[5]) - 1];
                    str += `<tr>`;
                    str += `<td style="font-size:20px;">${i[0]}</td>`;
                    str += `<td style="font-size:20px;">${i[1]}</td>`;
                    str += `<td style="font-size:20px;">${b}</td>`;
                    str += `<td style="font-size:20px;">${i[2]}</td>`;
                    str += `<td style="font-size:20px;">${i[3]}</td>`;
                    str += `<td style="font-size:20px;">${i[4]}</td>`;
                    str += `<td style="font-size:20px;">`;
                    str += `<button class="btn btn-common mb-3" style="margin:5px;" value="${i[0]}" onclick="supervisorUpdate(this)">修改</button><br>`;
                    str += `<form action="CrewMethod.php" id="${String(count)}" method="POST">`;
                    str += `<input type="hidden" name="method" value="delete">`;
                    str += `<input type="hidden" name="who" value="spv">`;
                    str += `<input type="hidden" name="id" value="${i[0]}">`;
                    str += `<button class="btn btn-secondary mb-3" type="button" style="margin:5px;" value="${String(count)}" onclick="deleteCheck(this)">刪除</button>`;
                    str += `</form>`;
                    str += `</td>`;
                    str += `</tr>`;
                    count++;
                }
                str += `</table></div>`;
            }
        }
        if (document.getElementById("student").checked) {
            var arr = [];
            var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
            <?php //列出student
            $std_fetch = "SELECT * FROM `student` ORDER BY `Std_ID` asc";
            $std_result = mysqli_query($link, $std_fetch);
            while ($row = mysqli_fetch_array($std_result)) {
                $sch_id = htmlspecialchars($row[0], ENT_QUOTES);
                $year = htmlspecialchars($row[1], ENT_QUOTES);
                $name = htmlspecialchars($row[2], ENT_QUOTES);
                $gen = htmlspecialchars($row[3], ENT_QUOTES);
                $grade = htmlspecialchars($row[4], ENT_QUOTES);
                $mail = htmlspecialchars($row[5], ENT_QUOTES);
                $phone = htmlspecialchars($row[6], ENT_QUOTES);
                $pw = htmlspecialchars($row[7], ENT_QUOTES);
                $d_num = htmlspecialchars($row[8], ENT_QUOTES);
                $bdn = $row[9];
                echo "arr.push([`$sch_id`,`$year`,`$name`,`$gen`,`$grade`,`$mail`,`$phone`,`$pw`,`$d_num`,`$bdn`]);";
                //[學號,入學年度,姓名,性別,年級,信箱,手機,密碼,房號,大樓名稱]
            }
            ?>
            str += `<div class="col-12" style="padding-bottom:15px;"><label style="font-size:20px;font-family:Microsoft JhengHei;">學生</label><br>`;
            if (arr.length > 0) {
                str += `<table border=1>`;
                str += `<tr>`;
                str += `<th style="text-align:center;">學號</th>`;
                str += `<th style="text-align:center;">姓名</th>`;
                str += `<th style="text-align:center;">性別</th>`;
                str += `<th style="text-align:center;">入學年度</th>`;
                str += `<th style="text-align:center;">年級</th>`;
                str += `<th style="text-align:center;">大樓-房號</th>`;
                str += `<th style="text-align:center;">E-mail</th>`;
                str += `<th style="text-align:center;">手機號碼</th>`;
                str += `<th style="text-align:center;">密碼</th>`;
                str += `<th style="text-align:center;">操作</th>`;
                str += `</tr>`;
                for (var i of arr) {
                    str += `<tr>`;
                    str += `<td style="font-size:15px;">${i[0]}</td>`;
                    str += `<td style="font-size:15px;">${i[2]}</td>`;
                    str += `<td style="font-size:15px;">${i[3]}</td>`;
                    str += `<td style="font-size:15px;">${i[1]}</td>`;
                    str += `<td style="font-size:15px;">${i[4]}</td>`;
                    if (i[9] == "")
                        str += `<td style="font-size:15px;">無</td>`;
                    else {
                        var b = building_Name[parseInt(i[9]) - 1];
                        str += `<td style="font-size:15px;">${b}-${i[8]}</td>`;
                    }
                    str += `<td style="font-size:15px;">${i[5]}</td>`;
                    str += `<td style="font-size:15px;">${i[6]}</td>`;
                    str += `<td style="font-size:15px;">${i[7]}</td>`;
                    str += `<td style="font-size:15px;">`;
                    str += `<button class="btn btn-common mb-3" style="margin:5px;" value="${i[0]}" onclick="studentUpdate(this)">修改</button><br>`;
                    str += `<form action="CrewMethod.php" id="${String(count)}" method="POST">`;
                    str += `<input type="hidden" name="method" value="delete">`;
                    str += `<input type="hidden" name="who" value="std">`;
                    str += `<input type="hidden" name="id" value="${i[0]}">`;
                    str += `<button class="btn btn-secondary mb-3" type="button" style="margin:5px;" value="${String(count)}" onclick="deleteCheck(this)">刪除</button>`;
                    str += `</form>`;
                    str += `</td>`;
                    str += `</tr>`;
                    count++;
                }
                str += `</table></div>`;
            }
        }
        document.getElementById("view").innerHTML = str;
    }

    function addFunc() {
        str = ``;
        str += `<div style="display: flex;justify-content: center;">`;
        str += `<button class="btn btn-common mb-3" style="font-size:20px; margin:10px;" onclick="adminAdd()"><b>新增管理員</b></button>`;
        str += `<button class="btn btn-common mb-3" style="font-size:20px; margin:10px;" onclick="supervisorAdd()"><b>新增舍監</b></button>`;
        str += `<button class="btn btn-common mb-3" style="font-size:20px; margin:10px;" onclick="studentAdd()"><b>新增學生</b></button><br>`;
        str += `</div>`
        str += `<div id="operate"></div>`;

        document.getElementById("operate").innerHTML = str;
        adminAdd();
    }

    function adminAdd() {
        str = ``;
        str += `<div style="display: flex;justify-content: center;font-size:18px;">`;
        str += `<form action="CrewMethod.php" method="POST">`;
        str += `<input type="hidden" name="method" value="add">`;
        str += `<div style="text-align: center;"><label style="display: block;">新增管理員</label></div>`;
        str += `<input type="hidden" name="who" value="ad">`;
        str += `<label>身分證字號：</label><input id="id_input" type="text" name="id" oninput="detect()" autocomplete="off" required><br>`;
        str += `<label>姓名：&emsp;&emsp;&emsp;</label><input type="text" name="name" autocomplete="off" required><br>`;
        str += `<label>電子信箱：&emsp;</label><input type="text" name="email" autocomplete="off"><br>`;
        str += `<label>手機號碼：&emsp;</label><input type="text" name="phone" autocomplete="off"><br>`;
        str += `<label>密碼：(預設為身分證字號)</label><br>`;
        str += `<div style="text-align:center;"><button class="btn btn-common mb-3" style="font-size:18px;margin-right:50px;">確定</button>`;
        str += `<button class="btn btn-secondary mb-3" type="button" style="font-size:18px;" onclick="func()">返回</button></div>`;
        str += `</form>`;
        str += `</div>`
        document.getElementById("view").innerHTML = str;
    }

    function supervisorAdd() {
        var str = ``;
        str += `<div style="display: flex;justify-content: center;font-size:18px;">`;
        str += `<form action="CrewMethod.php" method="POST">`;
        str += `<input type="hidden" name="method" value="add">`;
        str += `<div style="text-align:center;"><label style="display: block;">新增舍監</label></div>`;
        str += `<input type="hidden" name="who" value="spv">`;
        str += `<label>身分證字號：</label><input id="id_input" type="text" name="id" oninput="detect()" autocomplete="off" required><br>`;
        str += `<label>姓名：&emsp;&emsp;&emsp;</label><input type="text" name="name" autocomplete="off" required><br>`;
        str += `<label>負責大樓：&emsp;</label><select name="building" id="building" required>
                                            <option value="">請選擇</option>
                                            <option value="1">學一(男)</option>
                                            <option value="2">學一(女)</option>
                                            <option value="3">學二(男)</option>
                                            <option value="4">學二(女)</option>
                                            <option value="5">綜合(男)</option>
                                            <option value="6">綜合(女)</option></select><br>`;
        str += `<label>電子信箱：&emsp;</label><input type="text" name="email" autocomplete="off"><br>`;
        str += `<label>手機號碼：&emsp;</label><input type="text" name="phone" autocomplete="off"><br>`;
        str += `<label>密碼：(預設為身分證字號)</label><br>`;
        str += `<div style="text-align:center;"><button class="btn btn-common mb-3" style="font-size:18px;margin-right:50px;">確定</button>`;
        str += `<button class="btn btn-secondary mb-3" type="button" style="font-size:18px;" onclick="func()">返回</button></div>`;
        str += `</form>`;
        str += `</div>`
        document.getElementById("view").innerHTML = str;
    }

    function studentAdd() {
        var arr = [];
        var str = ``;
        str += `<div style="display: flex;justify-content: center;font-size:18px;">`;
        str += `<form action="CrewMethod.php" method="POST">`;
        str += `<input type="hidden" name="method" value="add">`;
        str += `<div style="text-align:center;"><label style="display: block;">新增學生</label></div>`;
        str += `<input type="hidden" name="who" value="std">`;
        str += `<label>學號：</label><input type="text" id="id_input" name="id" oninput="detect()" autocomplete="off" required>`;
        str += `&nbsp;&nbsp;&nbsp;&nbsp;`;
        str += `<label>姓名：</label><input type="text" name="name" autocomplete="off" required><br>`;
        str += `<label>性別：</label><input type="radio" name="sex" value="男" checked><label>男</label>`;
        str += `&nbsp;&nbsp;<input type="radio" name="sex" value="女"><label>女</label><br>`;
        str += `<label>入學年度：</label>`;
        str += `<select name="acdm" required>`;
        str += `<option value="" >請選擇</option>`;
        str += `<option value="111" selected>111</option>`;
        str += `<option value="110">110</option>`;
        str += `<option value="109">109</option>`;
        str += `<option value="108">108</option>`;
        str += `</select>&nbsp;&nbsp;&nbsp;&nbsp;`;
        str += `<label>年級：</label>`;
        str += `<select name="grade" required>`;
        str += `<option value="">請選擇</option>`;
        str += `<option value="大一" selected>大一</option>`;
        str += `<option value="大二">大二</option>`;
        str += `<option value="大三">大三</option>`;
        str += `<option value="大四">大四</option>`;
        str += `</select>&nbsp;&nbsp;&nbsp;&nbsp;<br>`;
        str += `<label>電子信箱：(預設為"學號@mail.nuk.edu.tw")</label><input type="hidden" name="email" value=""><br>`;
        str += `<label>手機號碼：</label><input type="text" name="phone" autocomplete="off"><br>`;
        str += `<label>密碼：(預設為學號)</label><br>`;
        str += `<div style="text-align:center;"><button class="btn btn-common mb-3" style="font-size:18px;margin-right:50px;">確定</button>`;
        str += `<button class="btn btn-secondary mb-3" type="button" style="font-size:18px;" onclick="func()">返回</button></div>`;
        str += `</form>`;
        str += `</div>`
        document.getElementById("view").innerHTML = str;
    }
    //檢查帳號有無重複
    function detect() {
        var id_input = document.getElementById("id_input");
        var arr = [];
        <?php
        $id_fetch = "SELECT * FROM `admin`";
        $id_result = mysqli_query($link, $id_fetch);
        while ($id = mysqli_fetch_array($id_result)) {
            echo "arr.push([`" . $id[0] . "`]);";
        }
        $id_fetch = "SELECT * FROM `supervisor`";
        $id_result = mysqli_query($link, $id_fetch);
        while ($id = mysqli_fetch_array($id_result)) {
            echo "arr.push([`" . $id[0] . "`]);";
        }
        $id_fetch = "SELECT * FROM `student`";
        $id_result = mysqli_query($link, $id_fetch);
        while ($id = mysqli_fetch_array($id_result)) {
            echo "arr.push([`" . $id[0] . "`]);";
        }
        ?>
        var x = false;
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] == id_input.value)
                x = true;
        }
        if (x) {
            id_input.setCustomValidity("此帳號已存在。");
            id_input.reportValidity();
        } else {
            id_input.setCustomValidity("");
        }
    }

    function adminUpdate(btn) {
        document.getElementById("operate").innerHTML = "";
        var arr = [];
        <?php
        $sql = "SELECT * FROM `admin`";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "arr.push([`$row[0]`,`$row[1]`,`$row[2]`,`$row[3]`,`$row[4]`]);";
        }
        ?>
        var str = ``;
        for (var i of arr) {
            if (i[0] == btn.value) {
                str += `<div class="col-lg-4" style="border:none;background-color:transparent;"></div>`;
                str += `<div class="col-lg-4" style="padding-bottom:15px;font-size:18px;">`;
                str += `<form action="CrewMethod.php" method="POST">`;
                str += `<input type="hidden" name="method" value="update">`;
                str += `<div style="text-align:center;"><label>更新管理員資料</label></div>`;
                str += `<input type="hidden" name="who" value="ad">`;
                str += `<label>身分證字號：${i[0]}</label><input type="hidden" name="id" value = "${i[0]}"><br>`;
                str += `<label>姓名：&emsp;&emsp;</label><input type="text" name="name" value="${i[1]}" autocomplete="off" required><br>`;
                str += `<label>電子信箱：</label><input type="text" name="email" value="${i[2]}" autocomplete="off"><br>`;
                str += `<label>手機號碼：</label><input type="text"  name="phone" value="${i[3]}"autocomplete="off"><br>`;
                str += `<div style="text-align:center;"><button class="btn btn-common mb-3" style="font-size:18px;margin-right:50px;">修改</button>`;
                str += `<button class="btn btn-secondary mb-3" type="button" style="font-size:18px;" onclick="func()">返回</button></div>`;
                str += `</form>`;
                str += `<form name="reset" action="CrewMethod.php" method="POST">`;
                str += `<input type="hidden" name="method" value = "reset">`;
                str += `<input type="hidden" name="who" value = "ad">`;
                str += `<input type="hidden" name="id" value = "${i[0]}">`;
                str += `</form>`;
            }
        }
        document.getElementById("view").innerHTML = str;
    }

    function supervisorUpdate(btn) {
        document.getElementById("operate").innerHTML = "";
        var arr = [];
        var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
        <?php
        $sql = "SELECT * FROM `supervisor`";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "arr.push([`$row[0]`,`$row[1]`,`$row[2]`,`$row[3]`,`$row[4]`,`$row[5]`]);";
        }
        ?>
        var str = ``;
        for (var i of arr) {
            if (i[0] == btn.value) {

                str += `<div class="col-lg-4" style="border:none;background-color:transparent;"></div>`;
                str += `<div class="col-lg-4" style="padding-bottom:15px;font-size:18px;">`;
                str += `<form action="CrewMethod.php" method="POST">`;
                str += `<input type="hidden" name="method" value="update">`;
                str += `<div style="text-align:center;"><label>更新舍監資料</label></div>`;
                str += `<input type="hidden" name="who" value="spv">`;
                str += `<label>身分證字號：${i[0]}</label><input type="hidden" name="id" value = "${i[0]}"><br>`;
                str += `<label>姓名：&emsp;&emsp;</label><input type="text" name="name" value="${i[1]}" autocomplete="off" required><br>`;
                str += `<label>負責大樓：</label><select name="building" id="building">`
                for (var j = 1; j <= 6; j++) {
                    var b = building_Name[j - 1];
                    if (j == parseInt(i[5]))
                        str += `<option value="${j}" select>${b}</option>`
                    else
                        str += `<option value="${j}">${b}</option>`
                }
                str += `</select><br>`;
                str += `<label>電子信箱：</label><input type="text" name="email" value="${i[2]}" autocomplete="off"><br>`;
                str += `<label>手機號碼：</label><input type="text"  name="phone" value="${i[3]}"autocomplete="off"><br>`;
                str += `<div style="text-align:center;"><button class="btn btn-common mb-3" style="font-size:18px;margin-right:50px;">修改</button>`;
                str += `<button class="btn btn-secondary mb-3" type="button" style="font-size:18px;" onclick="func()">返回</button></div>`;
                str += `</form>`;
                str += `<form name="reset" action="CrewMethod.php" method="POST">`;
                str += `<input type="hidden" name="method" value = "reset">`;
                str += `<input type="hidden" name="who" value = "spv">`;
                str += `<input type="hidden" name="id" value = "${i[0]}">`;
                str += `</form>`;
            }
        }
        document.getElementById("view").innerHTML = str;
    }

    function studentUpdate(btn) {
        document.getElementById("operate").innerHTML = "";
        var arr = [];
        var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
        <?php
        $sql = "SELECT * FROM `student`";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "arr.push([`$row[0]`,`$row[1]`,`$row[2]`,`$row[3]`,`$row[4]`,`$row[5]`,`$row[6]`,`$row[7]`,`$row[8]`,`$row[9]`]);";
            //[學號,入學年度,姓名,性別,年級,信箱,手機,密碼,房號,大樓名稱]
        }
        ?>
        var str = ``;
        for (var i of arr) {
            if (i[0] == btn.value) {
                //str += `<div class="col-lg-3" style="border:none;background-color:transparent;"></div>`;
                str += `<div style="display: flex;justify-content: center;font-size:18px;">`;
                str += `<form action="CrewMethod.php" method="POST">`;
                str += `<input type="hidden" name="method" value="update">`;
                str += `<div style="text-align:center;"><label style="display: block;">更新學生資料</label></div>`;
                str += `<input type="hidden" name="who" value="std">`;
                str += `<label>學號：${i[0]}</label><input type="hidden" name="id" value = "${i[0]}">`;
                str += `&nbsp;&nbsp;&nbsp;&nbsp;`;
                str += `<label>姓名：</label><input type="text" name="name" value = "${i[2]}" autocomplete="off" required><br>`;
                if (i[3] == "女") {
                    str += `<label>性別：</label><input type="radio" name="sex" value="男"><label>男</label>`;
                    str += `&nbsp;&nbsp;<input type="radio" name="sex" value="女" checked><label>女</label><br>`;
                } else {
                    str += `<label>性別：</label><input type="radio" name="sex" value="男" checked><label>男</label>`;
                    str += `&nbsp;&nbsp;<input type="radio" name="sex" value="女"><label>女</label><br>`;
                }
                str += `<label>入學年度：</label>`;
                str += `<select name="acdm" required>`;
                if (i[1] == "110") {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="111">111</option>`;
                    str += `<option value="110" selected>110</option>`;
                    str += `<option value="109">109</option>`;
                    str += `<option value="108">108</option>`;
                } else if (i[1] == "109") {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="111">111</option>`;
                    str += `<option value="110">110</option>`;
                    str += `<option value="109" selected>109</option>`;
                    str += `<option value="108">108</option>`;
                } else if (i[1] == "108") {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="111">111</option>`;
                    str += `<option value="110">110</option>`;
                    str += `<option value="109">109</option>`;
                    str += `<option value="108" selected>108</option>`;
                } else {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="111" selected>111</option>`;
                    str += `<option value="110">110</option>`;
                    str += `<option value="109">109</option>`;
                    str += `<option value="108">108</option>`;
                }
                str += `</select>&nbsp;&nbsp;&nbsp;&nbsp;`;
                str += `<label>年級：</label>`;
                str += `<select name="grade" required>`;
                if (i[4] == "大二") {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="大一">大一</option>`;
                    str += `<option value="大二" selected>大二</option>`;
                    str += `<option value="大三">大三</option>`;
                    str += `<option value="大四">大四</option>`;
                } else if (i[4] == "大三") {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="大一">大一</option>`;
                    str += `<option value="大二">大二</option>`;
                    str += `<option value="大三" selected>大三</option>`;
                    str += `<option value="大四">大四</option>`;
                } else if (i[4] == "大四") {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="大一">大一</option>`;
                    str += `<option value="大二">大二</option>`;
                    str += `<option value="大三">大三</option>`;
                    str += `<option value="大四" selected>大四</option>`;
                } else {
                    str += `<option value="">請選擇</option>`;
                    str += `<option value="大一" selected>大一</option>`;
                    str += `<option value="大二">大二</option>`;
                    str += `<option value="大三">大三</option>`;
                    str += `<option value="大四">大四</option>`;
                }
                str += `</select><br>`;
                str += `<label>大樓-房號：`;
                if (i[9] == "")
                    str += `無</label><br>`
                else {
                    var b = building_Name[i[9] - 1];
                    str += `${b}-${i[8]}</label><br>`
                }
                str += `<label>電子信箱：${i[5]}</label><input type="hidden" name="email" value = "${i[5]}"><br>`;
                str += `<label>手機號碼：</label><input type="text" name="phone" value = "${i[6]}" autocomplete="off"><br>`;
                str += `<div style="text-align:center;"><button class="btn btn-common mb-3" style="font-size:18px;margin-right:50px;">修改</button>`;
                str += `<button class="btn btn-secondary mb-3" type="button" style="font-size:18px;" onclick="func()">返回</button></div>`;
                str += `</form>`;
                str += `<form name="reset" action="CrewMethod.php" method="POST">`;
                str += `<input type="hidden" name="method" value = "reset">`;
                str += `<input type="hidden" name="who" value = "std">`;
                str += `<input type="hidden" name="id" value = "${i[0]}">`;
                str += `</form></div>`;
            }
            document.getElementById("view").innerHTML = str;
        }
    }

    function deleteCheck(formID) {
        var oneyo = String(formID.value)
        swal({
            title: "確定要刪除嗎？",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((value) => {
            if (value) {
                document.getElementById(oneyo).submit();
            } else {
                swal('已取消!');
            }
        });
    }
</script>