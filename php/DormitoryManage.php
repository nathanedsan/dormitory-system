<?php
session_start();
$username = $_SESSION["Username"];
include_once("config.php");
?>

<!DOCTYPE html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>管理宿舍</title>

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

            <li class="nav-item dropdown open">
              <a href="#">
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

            <li class="nav-item dropdown">
              <a href="CrewManage.php">
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
                          <div id="operation">
                            <label>功能：</label>
                            <select name="option" id="option" onchange="chooseOP()">
                              <option value="checkDetail" name="checkDetail" selected>查看</option>
                              <option value="insertDorm" name="insertDorm">新增宿舍</option>
                              <option value="insertEq" name="insertEq">新增設備</option>
                              <option value="delete" name="delete">刪除宿舍資訊</option>
                              <option value="update" name="update">修改宿舍資訊</option>
                            </select>
                            <label id="filter_text">&nbsp;大樓篩選：</label>
                            <select name="filter" id="filter" onchange="filterBD()">
                              <option value="0" name="unlimit" selected>不限</option>
                              <option value="1" name="man1">學一(男)</option>
                              <option value="2" name="woman1">學一(女)</option>
                              <option value="3" name="man2">學二(男)</option>
                              <option value="4" name="woman2">學二(女)</option>
                              <option value="5" name="man3">綜合(男)</option>
                              <option value="6" name="woman3">綜合(女)</option>
                            </select>
                          </div>
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

</body>

</html>


<?php
$dorm_fetch = "SELECT * FROM `dorm` ORDER BY `Dorm_BuildingName`, `Dorm_No`";
$dorm_result = mysqli_query($link, $dorm_fetch);

$eq_fetch = "SELECT * FROM `equipment` ORDER BY `Dorm_BuildingName`, `Dorm_No`";
$eq_result = mysqli_query($link, $eq_fetch);
?>


<script>
  window.onload = showBtn()

  function turnback() {
    window.location = "admin.php"
  }

  function chooseOP() {
    var op = document.getElementById("option").value
    var str = ``
    if (op == "checkDetail") {
      $('#turnBack').replaceWith(); // 把返回鍵去掉
      showBtn();
    } else if (op == "insertDorm") {
      $('#turnBack').replaceWith();
      $('#filter').replaceWith();
      $('#filter_text').replaceWith();
      insertDorm();
    } else if (op == "insertEq") {
      $('#turnBack').replaceWith();
      $('#filter').replaceWith();
      $('#filter_text').replaceWith();
      insertEq();
    } else if (op == "delete") {
      $('#turnBack').replaceWith();
      chg('delete');
    } else if (op == "update") {
      $('#turnBack').replaceWith();
      chg('update');
    }
  }

  function filterBD() {
    var arr = []
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    var bdn = $('#filter').val()
    var isExist = false
    var op = $('#option').val()
    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      $D_num = htmlspecialchars($item[0], ENT_COMPAT);
      $D_name = htmlspecialchars($item[1], ENT_COMPAT);
      $P_num = htmlspecialchars($item[2], ENT_COMPAT);
      $cost = htmlspecialchars($item[3], ENT_COMPAT);
      echo "arr.push(['$D_num','$D_name','$P_num','$cost']);"; //格式:[宿舍編號,大樓名稱,容納人數,費用]
    }
    ?>
    $('#turnBack').replaceWith();
    if (arr.length == 0) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }

    //印出宿舍資訊
    str +=
      `<div class="table1">` +
      `<div class="row1">` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `</div>`
    for (var i of arr) {
      if (i[1] == bdn || bdn == 0) {
        isExist = true
        var b = building_Name[parseInt(i[1]) - 1];
        if (op == "checkDetail") {
          str += `<hr><div class="row1"><div class="cell1"><input type="hidden"><label>宿舍房號：${i[0]}</label></div>`
          str += `<div class="cell1">大樓名稱：${b}</div><div class="cell1">可容納人數：${i[2]}</div><div class="cell1">住宿費用：${i[3]}</div>`
          str += `<div class="cell1"><button class="btn btn-secondary mb-3" type="submit" name="dorm_no" onclick='showEq("${i[0]}","${i[1]}")'>詳細資訊</div></div>`
        } else if (op == "delete" || op == "update") {
          str += `<hr><div class="row1"><div class="cell1"><input type="hidden" id="method" value="${op}"><label>宿舍房號：${i[0]}</label></div>`
          str += `<div class="cell1">大樓名稱：${b}</div><div class="cell1">可容納人數：${i[2]}</div><div class="cell1">住宿費用：${i[3]}</div>`
          str += `<div class="cell1"><button class="btn btn-secondary mb-3" type="submit" onclick='showDel_Up("${i[0]}","${i[1]}")'>選擇</button></div></div>`
        }
      }
    }
    str += `</div>`
    if (!isExist) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }
    document.getElementById("detail").innerHTML = str;
  }

  function chg(op) {
    showFilter()
    var btn = `刪除`
    if (op == "update") {
      btn = `修改`
    }
    var arr = []
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    var bdn = $('#filter').val()
    var isExist = false

    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      $D_num = htmlspecialchars($item[0], ENT_COMPAT);
      $D_name = htmlspecialchars($item[1], ENT_COMPAT);
      $P_num = htmlspecialchars($item[2], ENT_COMPAT);
      $cost = htmlspecialchars($item[3], ENT_COMPAT);
      echo "arr.push(['$D_num','$D_name','$P_num','$cost']);"; //格式:[宿舍編號,大樓名稱,容納人數,費用]
    }
    ?>
    $('#turnBack').replaceWith();
    if (arr.length == 0) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }
    //印出宿舍
    str +=
      `<div class="table1">` +
      `<div class="row1">` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `</div>`
    for (var i of arr) {
      if (i[1] == bdn || bdn == 0) {
        isExist = true
        var b = building_Name[parseInt(i[1]) - 1];
        str += `<hr><div class="row1">`
        str += `<div class="cell1"><input type="hidden" id="method" value="${btn}"><label>宿舍房號：${i[0]}</label></div>`
        str += `<div class="cell1">大樓名稱：${b}</div><div class="cell1">可容納人數：${i[2]}</div><div class="cell1">住宿費用：${i[3]}</div>`
        str += `<div class="cell1"><button class="btn btn-secondary mb-3" type="submit" onclick='showDel_Up("${i[0]}","${i[1]}")'>選擇</button></div></div>`
      }
    }
    str += `</div>`
    if (!isExist) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }
    document.getElementById("detail").innerHTML = str;

  }

  function showFilter() {
    $('#filter').replaceWith();
    $('#filter_text').replaceWith();
    var str = `<label style="font-family:Microsoft JhengHei; font-size:20px;" id="filter_text">&nbsp;大樓篩選：</label>
                    <select style="font-family:Microsoft JhengHei; font-size:15px;" name="filter" id="filter" onchange="filterBD()">
                        <option style="font-family:Microsoft JhengHei; font-size:15px;" value="0" name="unlimit" selected>不限</option>
                        <option style="font-family:Microsoft JhengHei; font-size:15px;" value="1" name="man1">學一(男)</option>
                        <option style="font-family:Microsoft JhengHei; font-size:15px;" value="2" name="woman1">學一(女)</option>
                        <option style="font-family:Microsoft JhengHei; font-size:15px;" value="3" name="man2">學二(男)</option>
                        <option style="font-family:Microsoft JhengHei; font-size:15px;" value="4" name="woman2">學二(女)</option>
                        <option style="font-family:Microsoft JhengHei; font-size:15px;" value="5" name="man3">綜合(男)</option>
                        <option style="font-family:Microsoft JhengHei; font-size:15px;" value="6" name="woman3">綜合(女)</option>
                    </select>`
    $('#operation').append(str)
  }

  function showBtn() {
    showFilter()
    var arr = []
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    var arrEq = []

    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      $D_num = htmlspecialchars($item[0], ENT_COMPAT);
      $D_name = htmlspecialchars($item[1], ENT_COMPAT);
      $P_num = htmlspecialchars($item[2], ENT_COMPAT);
      $cost = htmlspecialchars($item[3], ENT_COMPAT);
      echo "arr.push(['$D_num','$D_name','$P_num','$cost']);"; //格式:[宿舍編號,大樓名稱,容納人數,費用]
    }
    ?>
    if (arr.length == 0) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }

    //印出宿舍資訊
    str +=
      `<div class="table1">` +
      `<div class="row1">` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `</div>`
    for (var i of arr) {
      var b = building_Name[parseInt(i[1]) - 1];
      str += `<hr><div class="row1"><div class="cell1"><input type="hidden"><label>宿舍房號：${i[0]}</label></div>`
      str += `<div class="cell1">大樓名稱：${b}</div><div class="cell1">可容納人數：${i[2]}</div><div class="cell1">住宿費用：${i[3]}</div>`
      str += `<div class="cell1"><button class="btn btn-secondary mb-3"  type="submit" name="dorm_no" onclick='showEq("${i[0]}","${i[1]}")'>詳細資訊</div></div>`
    }
    document.getElementById("detail").innerHTML = str;
  }

  function showEq(dorm_no, building_no) {
    var str = ``
    var arrDorm = []
    var arrEq = []
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];

    str = `<button class="btn btn-secondary mb-3" onclick="filterBD()" id="turnBack" style="margin:2px;">返回`;
    $('#operation').append(str);
    str = ``

    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      $D_num = htmlspecialchars($item[0], ENT_COMPAT);
      $D_name = htmlspecialchars($item[1], ENT_COMPAT);
      $P_num = htmlspecialchars($item[2], ENT_COMPAT);
      $cost = htmlspecialchars($item[3], ENT_COMPAT);
      echo "arrDorm.push(['$D_num','$D_name','$P_num','$cost']);"; //格式:[宿舍編號,大樓名稱,容納人數,費用]
    }
    $eq_result = mysqli_query($link, $eq_fetch);
    while ($item = mysqli_fetch_array($eq_result)) {
      $E_name = htmlspecialchars($item[0], ENT_COMPAT);
      $E_num = htmlspecialchars($item[1], ENT_COMPAT);
      $E_sit = htmlspecialchars($item[2], ENT_COMPAT);
      $D_num = htmlspecialchars($item[3], ENT_COMPAT);
      $B_num = htmlspecialchars($item[4], ENT_COMPAT);
      echo "arrEq.push(['$E_name','$E_num','$E_sit','$D_num','$B_num']);";
      //格式:[設備名稱,設備數量,設備狀況,宿舍編號,大樓名稱]
    }
    ?>

    str +=
      `<div class="table1">` +
      `<div class="row1">` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `</div>`
    for (var i of arrDorm) {
      if (i[0] == dorm_no && i[1] == building_no) {
        var b = building_Name[parseInt(i[1]) - 1];
        str += `<hr><div class="row1">`
        str += `<div class="cell1"><label>宿舍房號：${i[0]}</label></div>`
        str += `<div class="cell1">大樓名稱：${b}</div><div class="cell1">可容納人數：${i[2]}</div><div class="cell1">住宿費用：${i[3]}</div></div>`
        break
      }
    }

    if (arrEq.length == 0) {
      str += `</div>`
      document.getElementById("detail").innerHTML = str;
      return
    }

    for (var i of arrEq) {
      if (i[3] == dorm_no && i[4] == building_no) {
        str += `<hr><div class="row1">`
        str += `<div class="cell1"><label>設備名稱：${i[0]}</label></div>`
        str += `<div class="cell1">設備數量：${i[1]}</div>`
        str += `<div class="cell1">設備狀況：${i[2]}</div></div>`
      }
    }
    str += `</div>`


    document.getElementById("detail").innerHTML = str;
  }


  function showDel_Up(dorm_no, building_no) {
    var arrDorm = []
    var arrEq = []
    var op_CN = document.getElementById("method").value
    var op_EN = ``
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];

    console.log("showDel_up - DormNo = " + dorm_no + "  ,BNo = " + building_no);

    if (op_CN == "刪除" || op_CN == "delete") {
      op_CN = `刪除`
      op_EN = `delete`
    } else {
      op_CN = `修改`
      op_EN = `update`
    }

    str = `<button class="btn btn-secondary mb-3" onclick="filterBD()" id="turnBack" style="margin:2px;">返回`;
    $('#operation').append(str);

    str = ``

    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    $eq_result = mysqli_query($link, $eq_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      $D_num = htmlspecialchars($item[0], ENT_COMPAT);
      $D_name = htmlspecialchars($item[1], ENT_COMPAT);
      $P_num = htmlspecialchars($item[2], ENT_COMPAT);
      $cost = htmlspecialchars($item[3], ENT_COMPAT);
      echo "arrDorm.push(['$D_num','$D_name','$P_num','$cost']);"; //格式:[宿舍編號,大樓名稱,容納人數,費用]
    }

    while ($item = mysqli_fetch_array($eq_result)) {
      $E_name = htmlspecialchars($item[0], ENT_COMPAT);
      $E_num = htmlspecialchars($item[1], ENT_COMPAT);
      $E_sit = htmlspecialchars($item[2], ENT_COMPAT);
      $D_num = htmlspecialchars($item[3], ENT_COMPAT);
      $B_num = htmlspecialchars($item[4], ENT_COMPAT);
      echo "arrEq.push(['$E_name','$E_num','$E_sit','$D_num','$B_num']);";
      //格式:[設備名稱,設備數量,設備狀況,宿舍編號,大樓名稱]
    }

    ?>

    if (arrDorm.length == 0) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }

    //印出宿舍資訊

    if (op_CN == "刪除") { //刪除
      str +=
        `<div class="table1">` +
        `<div class="row1">` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `</div>`
      for (var i of arrDorm) {
        if (i[0] == dorm_no && i[1] == building_no) {
          var b = building_Name[parseInt(i[1]) - 1];
          str += `<hr><form class="row1" action="DormitoryManage_${op_EN}Back.php" method="POST">`
          str += `<div class="cell1"><input type="hidden" name="dorm_no" value="${i[0]}"><label>宿舍房號：${i[0]}</label></div>`
          str += `<div class="cell1"><input type="hidden" name="build_name" value="${i[1]}">大樓名稱：${b}</div>
                            <div class="cell1">可容納人數：${i[2]}</div><div class="cell1">住宿費用：${i[3]}</div>`
          str += `<div class="cell1"><button class="btn btn-secondary mb-3" type="submit" name="method" value="dorm">${op_CN}宿舍</div></form>`
          break
        }
      }

      //印出設備資訊
      if (arrEq.length == 0) {
        str += `</div>`
        document.getElementById("detail").innerHTML = str;
        return
      }

      for (var i of arrEq) {
        if (i[3] == dorm_no && i[4] == building_no) {
          var b = building_Name[parseInt(i[4]) - 1];
          str += `<hr><form class="row1" action="DormitoryManage_${op_EN}Back.php" method="POST">`
          str += `<input type="hidden" name="dorm_no" value="${i[3]}">`
          str += `<input type="hidden" name="build_name" value="${i[4]}">`
          str += `<div class="cell1"><input type="hidden" name="eq_name" value="${i[0]}"><label>設備名稱：${i[0]}</label></div>`
          str += `<div class="cell1"><input type="hidden" name="eq_num" value="${i[1]}">設備數量：${i[1]}</div>`
          str += `<div class="cell1"><input type="hidden" name="eq_status" value="${i[2]}">設備狀況：${i[2]}</div>`
          str += `<div class="cell1"><button class="btn btn-secondary mb-3" type="submit" name="method" value="eq">${op_CN}設備</div></form>`
        }
      }
      str += `</div>`
      document.getElementById("detail").innerHTML = str;
    } else { //修改
      //印出宿舍資訊
      str +=
        `<div class="table1">` +
        `<div class="row1">` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `<div class="cell1"></div>` +
        `</div>`
      for (var i of arrDorm) {
        if (i[0] == dorm_no && i[1] == building_no) {
          var b = building_Name[parseInt(i[1]) - 1];
          str += `<hr><div class="row1">`
          str += `<div class="cell1"><input type="radio" name="radio" onchange='textableDorm("${i[0]}","${i[1]}")'>`
          str += `<input type="hidden" name="dorm_no" value="${i[0]}"><label>宿舍房號：${i[0]}</label></div>`
          str += `<div class="cell1"><input type="hidden" name="build_name" value="${i[1]}">大樓名稱：${b}</div>`
          str += `<div class="cell1">可容納人數：${i[2]}</div>
                            <div class="cell1">住宿費用：${i[3]}</div></div>`
          break
        }
      }

      //印出設備資訊
      if (arrEq.length == 0) {
        str += `</div>`
        document.getElementById("detail").innerHTML = str;
        return
      }

      for (var i of arrEq) {
        if (i[3] == dorm_no && i[4] == building_no) {
          str += `<hr><div class="row1">`
          str += `<div class="cell1"><input type="radio" name="radio" onchange='textableEq("${i[0]}","${i[3]}","${i[4]}")'>`
          str += `<input type="hidden" name="dorm_no" value="${i[3]}" id="dorm_no">`
          str += `<input type="hidden" name="build_name" value="${i[4]}">`
          str += `<input type="hidden" name="eq_name" value="${i[0]}"><label>設備名稱：${i[0]}</label></div>`
          str += `<div class="cell1"><input type="hidden" name="eq_num" value="${i[1]}">設備數量：${i[1]}</div>`
          str += `<div class="cell1"><input type="hidden" name="eq_status" value="${i[2]}">設備狀況：${i[2]}</div></div>`
        }
      }
      str += `</div>`


      document.getElementById("detail").innerHTML = str;
    }

  }

  function textableDorm(dorm_no, building_no) {
    var arrDorm = []
    var arrEq = []
    var op = `修改`
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    console.log("textableDorm - DormInfo = " + dorm_no + " ,BNO = " + building_no)
    <?php

    $eq_result = mysqli_query($link, $eq_fetch);

    $dorm_result = mysqli_query($link, $dorm_fetch);


    while ($item = mysqli_fetch_array($dorm_result)) {
      echo "arrDorm.push(['$item[0]','$item[1]','$item[2]','$item[3]']);"; //格式:[宿舍編號,大樓名稱,容納人數,費用]
    }

    while ($item = mysqli_fetch_array($eq_result)) {
      echo "arrEq.push(['$item[0]','$item[1]','$item[2]','$item[3]','$item[4]']);";
      //格式:[設備名稱,設備數量,設備狀況,宿舍編號,大樓名稱]
    }

    ?>
    if (arrDorm.length == 0) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }
    //印出宿舍資訊
    str +=
      `<div class="table1">` +
      `<div class="row1">` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `</div>`
    for (var i of arrDorm) {
      if (i[0] == dorm_no && i[1] == building_no) {
        var b = building_Name[parseInt(i[1]) - 1];
        str += `<hr><form class="row1" action="DormitoryManage_updateBack.php" method="POST" id="updateDorm">`
        str += `<input type="hidden" name="method" id="method" value="dorm">`
        str += `<div class="cell1"><input type="radio" name="radio" onchange='textableDorm("${i[0]}","${i[1]}")' checked>`
        str += `<input type="hidden" name="dorm_no" value="${i[0]}" id="dorm_no"><label>宿舍房號：${i[0]}</label></div>`
        str += `<input type="hidden" name="build_name" value="${i[1]}" id="build_name"><div class="cell1">大樓名稱：${b}</div>`
        str += `<div class="cell1">可容納人數：<input type="text" name="dorm_ppl" id="dorm_ppl" value="${i[2]}" autocomplete="off"
                 oninput="chkDorm_PPL(true)"></div>`
        str += `<div class="cell1">住宿費用：${i[3]}</div>`
        str += `<div class="cell1"><input class="btn btn-secondary mb-3" type="button" value="${op}宿舍" onclick="chkDorm_PPL()"></div></form>`
        break
      }
    }

    //印出設備資訊
    if (arrEq.length == 0) {
      str += `</div>`
      document.getElementById("detail").innerHTML = str;
      return
    }

    for (var i of arrEq) {
      if (i[3] == dorm_no && i[4] == building_no) {
        var b = building_Name[parseInt(i[4]) - 1];
        str += `<hr><form class="row1" action="DormitoryManage_updateBack.php" method="POST">`
        str += `<div class="cell1"><input type="radio" name="radio" onchange='textableEq("${i[0]}","${i[3]}","${i[4]}")'>`
        str += `<input type="hidden" name="dorm_no" value="${i[3]}">`
        str += `<input type="hidden" name="build_name" value="${i[4]}" id="build_name">`
        str += `<input type="hidden" name="eq_name" value="${i[0]}"><label>設備名稱：${i[0]}</label></div>`
        str += `<div class="cell1"><input type="hidden" name="eq_num" value="${i[1]}">設備數量：${i[1]}</div>`
        str += `<div class="cell1"><input type="hidden" name="eq_status" value="${i[2]}">設備狀況：${i[2]}</div></form>`
      }

    }
    str += `</div>`


    document.getElementById("detail").innerHTML = str;
  }

  function chkDorm_PPL(type = false) {
    var dNo = $('#dorm_no').val()
    var bdn = $('#build_name').val()
    var ppl = $('#dorm_ppl').val()
    var ppl_text = document.getElementById("dorm_ppl")
    var arrDorm = []
    var current_ppl = 0

    <?php
    $std_dorm_fetch = "SELECT `Dorm_No`, `Dorm_BuildingName` FROM `student` 
                          ORDER BY `Dorm_BuildingName` , `Dorm_No`";
    $std_dorm_result = mysqli_query($link, $std_dorm_fetch);
    while ($dorm = mysqli_fetch_array($std_dorm_result)) {
      if ($dorm[0] != Null)
        echo "arrDorm.push(['$dorm[0]','$dorm[1]']);";
      // arrDorm = [學生的宿舍房號,學生的大樓名稱]
    }
    ?>

    for (var i of arrDorm) {
      if (i[0] == dNo && i[1] == bdn)
        current_ppl++;
      else if (current_ppl != 0)
        break
    }

    ppl_text.setCustomValidity("");

    if (type)
      return;

    var z = +ppl

    if (!ppl) {
      ppl_text.setCustomValidity(`不可為空`);
      ppl_text.reportValidity();
    } else if (isNaN(z) || z == "0") {
      ppl_text.setCustomValidity("請輸入正整數");
      ppl_text.reportValidity();
    } else if (parseInt(ppl) < current_ppl) {
      ppl_text.setCustomValidity(`請輸入大於${current_ppl}的整數`);
      ppl_text.reportValidity();
    } else {
      document.getElementById("updateDorm").submit();
    }
  }


  function textableEq(eq_name, dorm_no, building_no) {
    var arrDorm = []
    var arrEq = []
    var op = `修改`
    var str = ``
    // var dorm_no = document.getElementById("dorm_no").value

    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];

    console.log("textableEq - eqName = " + eq_name + " ,dormNo = " + dorm_no + " ,building_no = " + building_no)

    <?php
    $eq_result = mysqli_query($link, $eq_fetch);

    $dorm_result = mysqli_query($link, $dorm_fetch);


    while ($item = mysqli_fetch_array($dorm_result)) {
      echo "arrDorm.push(['$item[0]','$item[1]','$item[2]','$item[3]']);"; //格式:[宿舍編號,大樓名稱,容納人數,費用]
    }

    while ($item = mysqli_fetch_array($eq_result)) {
      echo "arrEq.push(['$item[0]','$item[1]','$item[2]','$item[3]','$item[4]']);";
      //格式:[設備名稱,設備數量,設備狀況,宿舍編號,大樓名稱]
    }
    ?>

    if (arrDorm.length == 0) {
      document.getElementById("detail").innerHTML = `查無宿舍資訊!`
      return;
    }
    //印出宿舍資訊
    str +=
      `<div class="table1">` +
      `<div class="row1">` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `<div class="cell1"></div>` +
      `</div>`
    for (var i of arrDorm) {
      if (i[0] == dorm_no && i[1] == building_no) {
        var b = building_Name[parseInt(i[1]) - 1];
        str += `<hr><form class="row1" action="DormitoryManage_updateBack.php" method="POST">`
        str += `<div class="cell1"><input type="radio" name="radio" onchange='textableDorm("${i[0]}","${i[1]}")'>`
        str += `<input type="hidden" name="dorm_no" id="dorm_no" value="${i[0]}"><label>宿舍房號：${i[0]}</label></div>`
        str += `<div class="cell1"><input type="hidden" name="build_name" id="build_name" value="${i[1]}">大樓名稱：${b}</div>
                        <div class="cell1">可容納人數：${i[2]}</div>
                        <div class="cell1">住宿費用：${i[3]}</div></form>`
        break
      }
    }



    //印出設備資訊
    if (arrEq.length == 0) {
      str += `</div>`
      document.getElementById("detail").innerHTML = str;
      return
    }

    for (var i of arrEq) {
      var b = building_Name[parseInt(i[4]) - 1];
      if (i[0] == eq_name && i[3] == dorm_no && i[4] == building_no) {
        str += `<hr><form class="row1" action="DormitoryManage_updateBack.php" method="POST">`
        str += `<div class="cell1"><input type="radio" name="radio" id="eq" onchange='textableEq("${i[0]}","${i[3]}","${i[4]}")' checked>`
        str += `<input type="hidden" name="dorm_no" value="${i[3]}">`
        str += `<input type="hidden" name="build_name" value="${i[4]}">`
        str += `<input type="hidden" name="eq_name" value="${i[0]}"><label>設備名稱：${i[0]}</label></div>`
        str += `<div class="cell1">設備數量：<input type="text" name="eq_num" value="${i[1]}" autocomplete="off"></div>`
        str += `<div class="cell1">設備狀況：<input type="text" name="eq_status" value="${i[2]}" autocomplete="off"></div>`
        str += `<div class="cell1"><button class="btn btn-secondary mb-3" type="submit" name="method" value="eq">${op}設備</div></form>`
      } else if (i[3] == dorm_no && i[4] == building_no) {
        str += `<hr><form class="row1" action="DormitoryManage_updateBack.php" method="POST">`
        str += `<div class="cell1"><input type="radio" name="radio" id="eq" onchange='textableEq("${i[0]}","${i[3]}","${i[4]}")'>`
        str += `<input type="hidden" name="dorm_no" value="${i[3]}">`
        str += `<input type="hidden" name="build_name" value="${i[4]}">`
        str += `<input type="hidden" name="eq_name" value="${i[0]}"><label>設備名稱：${i[0]}</label></div>`
        str += `<div class="cell1"><input type="hidden" name="eq_num" value="${i[1]}">設備數量：${i[1]}</div>`
        str += `<div class="cell1"><input type="hidden" name="eq_status" value="${i[2]}">設備狀況：${i[2]}</div>`
        str += `<div class="cell1"></div></form>`
      }
    }
    str += `</div>`
    document.getElementById("detail").innerHTML = str;
  }

  function insertDorm() {
    var str = ``
    var building_fee = [7500, 7500, 10000, 10000, 9500, 9500]

    str += `<hr><form action="DormitoryManage_add.php" method="POST" name="istDorm" id="istDorm">`
    str += `<input type="hidden" name="Dorm" id="Dorm" value="dorm">`
    str += `<label for="dorm_no">宿舍房號：</label><input type="text" name="dorm_no" id="dorm_no" oninput="chkDorm_No(true)" autocomplete="off"><br>`
    str += `<label for="build_name">大樓名稱：</label>
                <select style="font-family:Microsoft JhengHei; font-size:15px;" name="build_name" id="build_name" onchange="chkDorm_No(true)">
                <option style="font-family:Microsoft JhengHei; font-size:15px;" value="" name="build_null" selected>請選擇</option>
                <option style="font-family:Microsoft JhengHei; font-size:15px;" value="1" name="build1">學一(男)</option>
                <option style="font-family:Microsoft JhengHei; font-size:15px;" value="2" name="build2">學一(女)</option>
                <option style="font-family:Microsoft JhengHei; font-size:15px;" value="3" name="build3">學二(男)</option>
                <option style="font-family:Microsoft JhengHei; font-size:15px;" value="4" name="build4">學二(女)</option>
                <option style="font-family:Microsoft JhengHei; font-size:15px;" value="5" name="build5">綜合(男)</option>
                <option style="font-family:Microsoft JhengHei; font-size:15px;" value="6" name="build6">綜合(女)</option></select><br>`
    str += `<label for="dorm_ppl">可容納人數：</label><input type="text" name="dorm_ppl" id="dorm_ppl" oninput="chkDorm_No(true)" autocomplete="off"><br>`
    str += `<label id="dorm_fee">住宿費用：</label><br>`
    str += `<input class="btn btn-common mb-3"  type="button" onclick="chkDorm_No(false,true)" value="&nbsp;新增&nbsp;"></form>`
    document.getElementById("detail").innerHTML = str;
  }


  function chkDorm_No(type = false, SUB = false) {
    var dNo = $('#dorm_no').val()
    var dNo_text = document.getElementById("dorm_no")
    var bdn = $('#build_name').val()
    var bdn_text = document.getElementById("build_name")
    var ppl = $('#dorm_ppl').val()
    var ppl_text = document.getElementById("dorm_ppl")
    var arr = []
    var hash = {}
    var building_fee_list = [7500, 7500, 10000, 10000, 9500, 9500]
    var str = ``


    if (!bdn)
      str = `<label id="dorm_fee">住宿費用：</label>`
    else
      str = `<label id="dorm_fee">住宿費用：${building_fee_list[parseInt(bdn)-1]}</label>`
    $('#dorm_fee').replaceWith(str)


    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      echo "arr.push(['$item[0]','$item[1]']);";
    }
    ?>
    for (var i = 0; i < arr.length; i++)
      hash[arr[i]] = i;
    // console.log(hash);

    dNo_text.setCustomValidity("");
    bdn_text.setCustomValidity("");
    ppl_text.setCustomValidity("");

    if (type)
      return;

    var z = +ppl
    var y = +dNo

    if (!dNo) {
      dNo_text.setCustomValidity("不可為空");
      dNo_text.reportValidity();
    } else if (isNaN(y) || parseInt(y) <= 0) {
      dNo_text.setCustomValidity("請輸入正整數");
      dNo_text.reportValidity();
    } else if (!bdn) {
      bdn_text.setCustomValidity("請挑選大樓");
      bdn_text.reportValidity();
    } else if (!ppl) {
      ppl_text.setCustomValidity("不可為空");
      ppl_text.reportValidity();
    } else if (isNaN(z) || parseInt(z) <= 0) {
      ppl_text.setCustomValidity("請輸入正整數");
      ppl_text.reportValidity();
    } else if (hash.hasOwnProperty([dNo, bdn])) {
      dNo_text.setCustomValidity("存在相同的房間號碼");
      dNo_text.reportValidity();
    } else if (SUB) {
      document.getElementById("istDorm").submit();
    }
  }


  function insertEq() {
    var arr = []
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      echo "arr.push(['$item[0]', '$item[1]']);"; //格式:[宿舍編號,大樓名稱]
    }
    ?>

    str += `<hr><form id="addEq_form" action="DormitoryManage_add.php" method="POST" name="istEq">`
    str += `<input type="hidden" name="Dorm" id="Dorm" value="Eq">`
    str += `<label>選擇大樓：</label><select name="build_name" id="build_name" onchange="select_the_buildingName()">`
    str += `<option value="null" selected>請選擇</option>`
    for (var i of building_Name) {
      str += `<option value="${building_Name.indexOf(i) + 1}" name="${i}">${i}</option>`
    }
    str += `</select><br><label>選擇宿舍：</label><select name="dorm_no" id="dorm_no" onchange="addVisible()">`
    str += `<option value="null" selected></option>`
    str += `</select></form>`
    document.getElementById("detail").innerHTML = str;
  }

  function select_the_buildingName() {
    var arr = []
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    var bdn = $('#build_name').val(); //大樓的值 type=int;

    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      echo "arr.push(['$item[0]', '$item[1]']);"; //格式:[宿舍編號,大樓名稱]
    }
    ?>

    $('#Eq_detail').replaceWith();
    str = `<select name="dorm_no" id="dorm_no" onchange="addVisible()">`;
    if (bdn == 'null') {
      str += `<option value="null" selected></option></select>`
      $('#dorm_no').replaceWith(str);
      return;
    }
    str += `<option value="null" selected>請選擇</option>`
    for (var i of arr) {
      if (bdn == i[1])
        str += `<option value="${i[0]}" name="${i[0]}">${i[0]}</option>`
    }
    str += `</select>`
    $('#dorm_no').replaceWith(str);
  }


  function addVisible() {
    var arr = []
    var str = ``
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    var bdn = $('#build_name').val(); //大樓的值 type=int;
    var dorm_no = $("#dorm_no").val(); //房號 typr=string;

    <?php
    $dorm_result = mysqli_query($link, $dorm_fetch);
    while ($item = mysqli_fetch_array($dorm_result)) {
      echo "arr.push('$item[0]');"; //格式:[宿舍編號]
    }
    ?>

    $('#Eq_detail').replaceWith();

    if (dorm_no == "null") {
      return;
    }
    str = `<div id="Eq_detail"><label for="eq_name">設備名稱：</label><input type="text" name="eq_name" id="eq_name" oninput="chkEq_Name(true)" autocomplete="off"><br>`
    str += `<label for="eq_num">設備數量：</label><input type="text" name="eq_num" id="eq_num" oninput="chkEq_Name(true)" autocomplete="off"><br>`
    str += `<label for="eq_status">設備狀況：</label><input type="text" name="eq_status" id="eq_status" oninput="chkEq_Name(true)" autocomplete="off"><br>`
    str += `<input class="btn btn-common mb-3" type="button" onclick="chkEq_Name(false,true)" value="&nbsp;新增&nbsp;"></div></form>`
    $('#addEq_form').append(str);
  }

  function chkEq_Name(type = false, SUB = false) {
    var dorm_no = $('#dorm_no').val();
    var bdn = $('#build_name').val();

    var eq_name = $('#eq_name').val();
    var eq_name_text = document.getElementById("eq_name");

    var eq_num = $('#eq_num').val();
    var eq_num_text = document.getElementById("eq_num");

    var eq_status = $('#eq_status').val();
    var eq_status_text = document.getElementById("eq_status");

    var arr = []
    var arrEq = []
    var arrDo = []
    var str = ``

    var exists = false;

    <?php
    $eq_fetch = "SELECT `Eq_Name`,`Dorm_No`,`Dorm_BuildingName` FROM `equipment`";
    $eq_result = mysqli_query($link, $eq_fetch);
    while ($item = mysqli_fetch_array($eq_result)) {
      echo "arrEq.push(['$item[0]','$item[1]','$item[2]']);"; //格式:[設備名稱,宿舍編號,大樓名稱]
    }
    ?>
    for (var i of arrEq) {
      if (i[0] == eq_name && i[1] == dorm_no && i[2] == bdn) {
        exists = true
        break
      }
    }

    eq_name_text.setCustomValidity("");
    eq_num_text.setCustomValidity("");
    eq_status_text.setCustomValidity("");

    if (type)
      return

    if (!eq_name) {
      eq_name_text.setCustomValidity("不可為空");
      eq_name_text.reportValidity();
    } else if (!eq_num) {
      eq_num_text.setCustomValidity("不可為空");
      eq_num_text.reportValidity();
    } else if (!eq_status) {
      eq_status_text.setCustomValidity("不可為空");
      eq_status_text.reportValidity();
    } else if (exists) {
      eq_name_text.setCustomValidity("此設備已存在");
      eq_name_text.reportValidity();
    } else if (SUB) {
      document.getElementById("addEq_form").submit();
    }
  }
</script>