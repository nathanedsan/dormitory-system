<?php
session_start();
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinAdmin"]) == null) {
  header("location:index.php");
  exit;
}
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>入住申請&分配房間</title>

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


    table>thead>tr>th {
      text-align: center;
      border-bottom: 3px solid #c0c0c0;
      font-weight: bold;
      font-size: 20px;
      height: 40px;
      width: 190px;
    }

    table[id="update_panel"]>thead>tr>th {
      text-align: center;
      border-bottom: 3px solid #c0c0c0;
      font-weight: bold;
      font-size: 20px;
      height: 40px;
      width: 275px;
    }

    table[id="update_panel"]>thead>tr>th[id="Change_Title"] {
      width: 80px;
    }


    table>tbody>tr {
      border-bottom: 1px solid #ddd;
      border-collapse: collapse;
    }

    table>tbody>tr>td {
      text-align: center;
      padding: 5px;
      font-size: 18px;
    }

    table>tbody>tr>td>div {
      padding: 5px;
    }

    table>tbody>tr>td>div[id="result_bad"],
    table>tbody>tr>td>div[name="warning"] {
      color: #ff0000;
      font-weight: bold;
    }

    table>tbody>tr>td>div[id="result_good"] {
      color: #00cc00;
      font-weight: bold;
    }

    table>tbody>tr>td>div[id="result_none"] {
      font-weight: bold;
    }

    input[type="radio"] {
      width: 30px;
    }

    div[id="operation"]>button {
      margin: 5px;
    }

    #reset_button,
    #allocate_button,
    #update_reset_button,
    #update_button {
      float: right;
      margin-left: 5px;
      margin-right: 5px;
    }

    #note_1 {
      color: #ff0000
    }

    #title_method_building {
      margin-left: 10px;
    }

    #method_building,
    #method {
      padding: 2px;
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

            <li class="nav-item dropdown open">
              <a href="#">
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
          <br>

          <div class="container-fluid">
            <div id="type_choose">
              <div class="card-group">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div id="operation">
                          <button class="btn btn-secondary mb-3" onclick="listAll_Menu()" id="button_1" disabled>所有入住申請</button>
                          <button class="btn btn-secondary mb-3" onclick="showList()" id="button_2">分配紀錄</button>
                          <button class="btn btn-secondary mb-3" onclick="showUpdate()" id="button_3">修改學生房號</button><br><br>
                        </div>
                        <div id="historyNum"></div><br>
                        <div class="d-flex no-block align-items-center">
                          <div id="AR_list"></div>
                          <form id="UPDATE_DORM" action="AllocateRoom_UpdateMethod.php" method="POST">
                            <div id="Store_Value"></div>
                            <div id="Std_Value"></div>
                          </form>
                        </div>
                        <form id="autoAllocate" action="AllocateRoomMethod.php" method="POST"></form>

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
  window.onload = listAll_Menu();

  function listAll_Menu() {
    buttonDisable(1);
    clean();
    var str = `<label>篩選：</label>`
    str += `<select id="method" onchange="viewChg()">`
    str += `<option value="1" selected>所有申請</option>`
    str += `<option value="2">未分配</option>`
    str += `</select>`
    $('#historyNum').append(str);
    showListAll_Building_Select();
    listAll()
  }

  function viewChg() {
    var v = $('#method').val()
    if (v == 1) {
      showListAll_Building_Select();
      clean(false);
      listAll();
    } else if (v == 2) {
      deleteListAll_Building_Select();
      listUnallocate();
    }
  }

  function viewBuilding() {
    clean(false)
    var bdn = $('#method_building').val();
    listAll(bdn);
  }

  function listAll(bdn = "") {
    clean(false)
    var arr_AR = [];
    var str = ``;

    <?php
    $AR_fetch = "SELECT * FROM `apply_record` ORDER BY `AR_Building`, `AR_AllocateNo`";
    $AR_result = mysqli_query($link, $AR_fetch);
    while ($array = mysqli_fetch_array($AR_result)) {
      $AR_No = htmlspecialchars($array[0], ENT_QUOTES);
      $AR_Acdm_Year = htmlspecialchars($array[1], ENT_QUOTES);
      $AR_Semester = htmlspecialchars($array[2], ENT_QUOTES);
      $AR_Date = htmlspecialchars($array[3], ENT_QUOTES);
      $AR_Result = htmlspecialchars($array[4], ENT_QUOTES);
      $AR_Status = htmlspecialchars($array[5], ENT_QUOTES);
      $AR_Building = htmlspecialchars($array[6], ENT_QUOTES);
      $AR_Type = htmlspecialchars($array[7], ENT_QUOTES);
      $AR_FeeStatus = htmlspecialchars($array[8], ENT_QUOTES);
      $Std_ID = htmlspecialchars($array[9], ENT_QUOTES);
      $AR_AllocateNo = htmlspecialchars($array[10], ENT_QUOTES);

      echo "arr_AR.push([`$AR_No`,`$AR_Acdm_Year`,`$AR_Semester`,`$AR_Date`,`$AR_Result`,
                            `$AR_Status`,`$AR_Building`,`$AR_Type`,`$AR_FeeStatus`,`$Std_ID`,`$AR_AllocateNo`]);";
      // arr = [申請編號,學年度,學期,申請日期,申請結果,申請狀態,偏好大樓,申請類別,繳費狀況,申請人ID,分配時的組別]
    }
    ?>

    if (arr_AR.length == 0) {
      str = `<label>查無申請資料</label>`;
      $('#AR_list').append(str);
      return;
    }

    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    str = `<table><thead><tr>`
    str += `<th id="Std_ID_Title"><div>申請人ID</div></th>`
    str += `<th id="Acdm_Year_Title"><div>申請學年度</div></th>`
    str += `<th id="Semester_Title"><div>申請學期</div></th>`
    str += `<th id="Date_Title"><div>申請日期</div></th>`
    str += `<th id="Building_Title"><div>偏好大樓</div></th>`
    str += `<th id="Allocate_Title"><div>申請結果</div></th></tr></thead>`
    str += `<tbody>`
    var flag = true

    for (var i of arr_AR) {
      if (i[7] == "1" && (bdn == "" || i[6] == bdn)) {
        flag = false;
        var b = building_Name[parseInt(i[6]) - 1];
        var DATE = i[3].split(' ') // 只取出日期用的

        str += `<tr><td><div>${i[9]}</div></td>`; // 申請人ID
        str += `<td><div>${i[1]}</div></td>`; // 申請學年度
        str += `<td><div>${i[2]}</div></td>`; // 申請學期
        str += `<td><div>${DATE[0]}</div></td>`; // 申請日期
        str += `<td><div>${b}</div></td>`; // 偏好大樓
        if (i[4] == "核准")
          str += `<td><div id="result_good">${i[4]}</div></td></tr>`; // 申請結果
        else if (i[4] == "不核准")
          str += `<td><div id="result_bad">${i[4]}</div></td></tr>`; // 申請結果
        else
          str += `<td><div id="result_none">${i[4]}</div></td></tr>`; // 申請結果
      }
    }
    str += `</tbody></table>`
    if (flag) {
      str = `<label>查無該大樓的申請資料</label>`;
      $('#AR_list').append(str);
      return;
    }

    $("#AR_list").append(str);
  }

  function listUnallocate() {
    clean(false)
    var arr_AR = [];
    var str = ``;

    <?php
    $AR_fetch = "SELECT * FROM `apply_record` ORDER BY `AR_Building`, `Std_ID`";
    $AR_result = mysqli_query($link, $AR_fetch);
    while ($array = mysqli_fetch_array($AR_result)) {
      $AR_No = htmlspecialchars($array[0], ENT_QUOTES);
      $AR_Acdm_Year = htmlspecialchars($array[1], ENT_QUOTES);
      $AR_Semester = htmlspecialchars($array[2], ENT_QUOTES);
      $AR_Date = htmlspecialchars($array[3], ENT_QUOTES);
      $AR_Result = htmlspecialchars($array[4], ENT_QUOTES);
      $AR_Status = htmlspecialchars($array[5], ENT_QUOTES);
      $AR_Building = htmlspecialchars($array[6], ENT_QUOTES);
      $AR_Type = htmlspecialchars($array[7], ENT_QUOTES);
      $AR_FeeStatus = htmlspecialchars($array[8], ENT_QUOTES);
      $Std_ID = htmlspecialchars($array[9], ENT_QUOTES);
      $AR_AllocateNo = htmlspecialchars($array[10], ENT_QUOTES);

      echo "arr_AR.push([`$AR_No`,`$AR_Acdm_Year`,`$AR_Semester`,`$AR_Date`,`$AR_Result`,
                            `$AR_Status`,`$AR_Building`,`$AR_Type`,`$AR_FeeStatus`,`$Std_ID`,`$AR_AllocateNo`]);";
      // arr = [申請編號,學年度,學期,申請日期,申請結果,申請狀態,偏好大樓,申請類別,繳費狀況,申請人ID,分配時的組別]
    }
    ?>

    if (arr_AR.length == 0) {
      str = `<label>查無申請資料</label>`;
      $('#historyNum').append(str);
      return;
    }

    var valid = false;
    var num = 0;
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    str = `<table><thead><tr>`
    str += `<th id="Std_ID_Title"><div>申請人ID</div></th>`
    str += `<th id="Acdm_Year_Title"><div>申請學年度</div></th>`
    str += `<th id="Semester_Title"><div>申請學期</div></th>`
    str += `<th id="Date_Title"><div>申請日期</div></th>`
    str += `<th id="Building_Title"><div>偏好大樓</div></th>`
    str += `<th id="Allocate_Title"><div>申請結果</div></th></tr></thead>`
    str += `<tbody>`
    for (var i of arr_AR) {
      if (i[7] == "1" && i[10] == "") {
        num++;
        valid = true;
        var b = building_Name[parseInt(i[6]) - 1];
        var DATE = i[3].split(' ') // 只取出日期用的
        str += `<tr><td id="Std_ID_${num}"><div>${i[9]}</div></td>`; // 申請人ID
        str += `<td id="Acdm_Year_${num}"><div>${i[1]}</div></td>`; // 申請學年度
        str += `<td id="Semester_${num}"><div>${i[2]}</div></td>`; // 申請學期
        str += `<td id="Date_${num}"><div>${DATE[0]}</div></td>`; // 申請日期
        str += `<td id="Building_${num}"><div>${b}</div></td>`; // 偏好大樓
        str += `<td id="Result_${num}"><input id="Radio_${i[9]}" type="radio">不核准</td></tr>`; // 分配結果
      }
    }
    str += `</tbody></table><br>`
    str += `<div id="note_1">*註：若將\"不核准\"打勾，則在自動分配時不會對那筆申請進行分配<button class="btn btn-common mb-3" id="allocate_button" onclick="auto_Allocate_Dorm()">自動分配房號</button>`
    str += `<button class="btn btn-secondary mb-3" id="reset_button" onclick="doubleCheck(true)">復原</button></div>`
    if (!valid) {
      str = `<label>沒有未分配的資料</label>`
      $("#historyNum").append(str);
      return;
    }
    $("#AR_list").append(str);
  }

  function auto_Allocate_Dorm() {
    console.log("\n\nauto_Allocate_Dorm() START!")
    $('#autoAllocate').replaceWith(`<form id="autoAllocate" action="AllocateRoomMethod.php" method="POST"></form>`)
    var arr_AR = []
    var arr_Dorm = []
    var arr_Dorm_PPL = [] // 紀錄目前宿舍的人數
    var arr_Std = [] // 紀錄要申請編號與申請入住的學生與偏好大樓
    var arr_Prefer = [
      [],
      [],
      [],
      [],
      [],
      []
    ] //紀錄每個大樓偏好的學生ID

    <?php
    $AR_fetch = "SELECT * FROM `apply_record` ORDER BY `AR_Building`, `Std_ID`";
    $AR_result = mysqli_query($link, $AR_fetch);
    while ($array = mysqli_fetch_array($AR_result)) {
      $AR_No = htmlspecialchars($array[0], ENT_QUOTES);
      $AR_Acdm_Year = htmlspecialchars($array[1], ENT_QUOTES);
      $AR_Semester = htmlspecialchars($array[2], ENT_QUOTES);
      $AR_Date = htmlspecialchars($array[3], ENT_QUOTES);
      $AR_Result = htmlspecialchars($array[4], ENT_QUOTES);
      $AR_Status = htmlspecialchars($array[5], ENT_QUOTES);
      $AR_Building = htmlspecialchars($array[6], ENT_QUOTES);
      $AR_Type = htmlspecialchars($array[7], ENT_QUOTES);
      $AR_FeeStatus = htmlspecialchars($array[8], ENT_QUOTES);
      $Std_ID = htmlspecialchars($array[9], ENT_QUOTES);
      $AR_AllocateNo = htmlspecialchars($array[10], ENT_QUOTES);

      echo "arr_AR.push([`$AR_No`,`$AR_Acdm_Year`,`$AR_Semester`,`$AR_Date`,`$AR_Result`,
                            `$AR_Status`,`$AR_Building`,`$AR_Type`,`$AR_FeeStatus`,`$Std_ID`,`$AR_AllocateNo`]);";
      // arr_AR = [申請編號,學年度,學期,申請日期,申請結果,申請狀態,偏好大樓,申請類別,繳費狀況,申請人ID,分配時的組別]
    }

    $Dorm_fetch = "SELECT * FROM `dorm` ORDER BY `Dorm_BuildingName`, `Dorm_No`";
    $Dorm_result = mysqli_query($link, $Dorm_fetch);
    while ($array = mysqli_fetch_array($Dorm_result)) {
      echo "arr_Dorm.push([`$array[1]`,`$array[0]`,`$array[2]`]);";
      // arr_Dorm = [大樓名稱, 房號, 容納人數]
    }

    $Std_fetch = "SELECT `Dorm_BuildingName`, `Dorm_No` FROM `student` ORDER BY `Dorm_BuildingName`, `Dorm_No`";
    $Std_result = mysqli_query($link, $Std_fetch);
    $cnt = 0;
    $pre_building = "";
    $pre_dorm = "";
    $flag = true;
    while ($array = mysqli_fetch_array($Std_result)) {
      if ($array[0] != "") {
        if ($flag) {
          $flag = false;
          $cnt = 1;
          $pre_building = $array[0];
          $pre_dorm = $array[1];
        } else if ($pre_building == $array[0] && $pre_dorm == $array[1]) {
          $cnt++;
        } else {
          echo "arr_Dorm_PPL.push([`$pre_building`,`$pre_dorm`,`$cnt`]);";
          // arr_Dorm_PPL = [大樓名稱, 房號, 目前房間人數]
          $cnt = 1;
          $pre_building = $array[0];
          $pre_dorm = $array[1];
        }
      }
    }
    if (!$flag) {
      echo "arr_Dorm_PPL.push([`$pre_building`,`$pre_dorm`,`$cnt`]);";
    }
    ?>

    var pre_building = "";
    var building_num = 1;
    var flag = true;
    var tmp = [];
    var allocateNo_Max = 0;
    for (var i of arr_AR) {
      if (i[7] == "1" && i[10] == "") {
        arr_Std.push([i[0], i[9], i[6], "null"]);
        // arr_std = [申請編號, 學生ID, 偏好大樓, 分配到的房號(預設為"null")]
        if ($(`#Radio_${i[9]}`).is(':checked')) {
          console.log("SKIP:" + i[9])
          continue
        }
        arr_Prefer[parseInt(i[6]) - 1].push(i[9]);
      } else if (i[7] == "1" && parseInt(i[10]) > allocateNo_Max) {
        allocateNo_Max = parseInt(i[10]);
      }
    }
    allocateNo_Max++;

    if (!flag) {
      arr_Prefer.push(tmp);
    }
    console.log("allocateNo_Max = ", allocateNo_Max)
    console.log("arr_Dorm = ", arr_Dorm)
    console.log("arr_Dorm_PPL = ", arr_Dorm_PPL)
    console.log("arr_Std = ", arr_Std)
    console.log("arr_Prefer = ", arr_Prefer)

    //開始隨機分配
    for (var num = 1; num <= 6; num++) {
      var building_Prefer = arr_Prefer[num - 1]
      var apply_num = building_Prefer.length;
      console.log("building_Prefer = ", building_Prefer)
      console.log("apply_num = ", apply_num)
      for (var rm_max of arr_Dorm) {
        if (apply_num == 0) break;
        console.log("rm_max = ", rm_max)
        if (rm_max[0] == num) {
          var cur_ppl = 0;
          for (var rm_cur of arr_Dorm_PPL) {
            if (rm_cur[0] == rm_max[0] && rm_cur[1] == rm_max[1]) {
              console.log("rm_cur = ", rm_cur)
              cur_ppl++;
            }
          }
          for (; cur_ppl < parseInt(rm_max[2]); cur_ppl++) {
            if (apply_num == 0) break;
            var choose = Math.floor(Math.random() * apply_num);
            console.log("choose = ", choose)
            var chosen_ID = building_Prefer.splice(choose, 1)
            apply_num--;
            var z = 0;
            for (var std of arr_Std) {
              if (std[1] == chosen_ID) {
                arr_Std[z][3] = rm_max[1];
                break;
              }
              z++;
            }
          }
        }
      }
    }
    console.log("分配結果 = ", arr_Std)
    var str = ``;
    for (var i of arr_Std) {
      str += `<input type="hidden" name="apply_No[]" value="${i[0]}">`
      str += `<input type="hidden" name="std_ID[]" value="${i[1]}">`
      str += `<input type="hidden" name="building_Name[]" value="${i[2]}">`
      str += `<input type="hidden" name="dorm_No[]" value='${i[3]}'>`
    }
    str += `<input type="hidden" name="allocateNo_Max" value='${allocateNo_Max}'>`
    $('#autoAllocate').append(str)
    doubleCheck(false);
  }

  function showList() {
    buttonDisable(2);
    clean();
    var Max_no = 0;

    <?php
    $AR_fetch = "SELECT * FROM `apply_record` ORDER BY `AR_AllocateNo` desc";
    $AR_result = mysqli_query($link, $AR_fetch);
    $array = mysqli_fetch_array($AR_result);
    $AR_AllocateNo = htmlspecialchars($array[10], ENT_QUOTES);
    echo "Max_no = parseInt($AR_AllocateNo)";
    ?>

    var str = `<label>歷史紀錄：</label>`
    str += `<select id="method" onchange="showHistory()">`
    if (Max_no == 0) {
      str = `<label>無歷史紀錄！</label>`
      $('#historyNum').append(str);
      return;
    }
    str += `<option value="" selected>請選擇</option>`
    for (var i = 1; i <= Max_no; i++) {
      str += `<option value="${i}">第${i}次</option>`
    }
    str += `</select>`
    $('#historyNum').append(str);
  }

  function showHistory() {
    $('#AR_list').replaceWith(`<div id="AR_list"></div>`);
    var val = $('#method').val()
    var arr_AR = []
    console.log("\n\nshowHistory() START!")
    console.log(val)
    if (val == "") {
      $("#AR_list").replaceWith(`<div id="AR_list"></div>`)
      return;
    }
    <?php
    $AR_fetch = "SELECT * FROM `apply_record` ORDER BY `AR_Building`, `Std_ID`";
    $AR_result = mysqli_query($link, $AR_fetch);
    while ($array = mysqli_fetch_array($AR_result)) {
      $AR_No = htmlspecialchars($array[0], ENT_QUOTES);
      $AR_Acdm_Year = htmlspecialchars($array[1], ENT_QUOTES);
      $AR_Semester = htmlspecialchars($array[2], ENT_QUOTES);
      $AR_Date = htmlspecialchars($array[3], ENT_QUOTES);
      $AR_Result = htmlspecialchars($array[4], ENT_QUOTES);
      $AR_Status = htmlspecialchars($array[5], ENT_QUOTES);
      $AR_Building = htmlspecialchars($array[6], ENT_QUOTES);
      $AR_Type = htmlspecialchars($array[7], ENT_QUOTES);
      $AR_FeeStatus = htmlspecialchars($array[8], ENT_QUOTES);
      $Std_ID = htmlspecialchars($array[9], ENT_QUOTES);
      $AR_AllocateNo = htmlspecialchars($array[10], ENT_QUOTES);

      echo "arr_AR.push([`$AR_No`,`$AR_Acdm_Year`,`$AR_Semester`,`$AR_Date`,`$AR_Result`,
                            `$AR_Status`,`$AR_Building`,`$AR_Type`,`$AR_FeeStatus`,`$Std_ID`,`$AR_AllocateNo`]);";
      // arr_AR = [申請編號,學年度,學期,申請日期,申請結果,申請狀態,偏好大樓,申請類別,繳費狀況,申請人ID,分配時的組別]
    }
    ?>

    var num = 0;
    var erase = true;
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
    str = `<table><thead><tr>`
    str += `<th id="Std_ID_Title"><div>申請人ID</div></th>`
    str += `<th id="Acdm_Year_Title"><div>申請學年度</div></th>`
    str += `<th id="Semester_Title"><div>申請學期</div></th>`
    str += `<th id="Date_Title"><div>申請日期</div></th>`
    str += `<th id="Building_Title"><div>偏好大樓</div></th>`
    str += `<th id="Allocate_Title"><div>分配結果</div></th></tr></thead>`
    str += `<tbody>`
    for (var i of arr_AR) {
      if (i[7] == "1" && parseInt(i[10]) == parseInt(val)) {
        erase = false;
        num++;
        var b = building_Name[parseInt(i[6]) - 1];
        var DATE = i[3].split(' ') // 只取出日期用的
        str += `<tr><td id="Std_ID_${num}"><div>${i[9]}</div></td>`; // 申請人ID
        str += `<td id="Acdm_Year_${num}"><div>${i[1]}</div></td>`; // 申請學年度
        str += `<td id="Semester_${num}"><div>${i[2]}</div></td>`; // 申請學期
        str += `<td id="Date_${num}"><div>${DATE[0]}</div></td>`; // 申請日期
        str += `<td id="Building_${num}"><div>${b}</div></td>`; // 偏好大樓
        if (i[4] == "不核准")
          str += `<td id="Allocate_${num}"><div id="result_bad">未抽中</div></td></tr>`; // 分配結果
        else
          str += `<td id="Allocate_${num}"><div id="result_good">已分配宿舍</div></td></tr>`; // 分配結果
      }
    }
    str += `</tbody></table>`;
    if (erase)
      str = `<label>此紀錄已被刪除</label>`
    $('#AR_list').append(str);
  }

  function showUpdate() {
    buttonDisable(3);
    clean();
    showListAll_Building_Select(true);
    updateDorm();
  }

  function updateDorm() {
    console.log("\n\nupdateDorm() START!")
    clean(false);
    var BDN = $('#method_building').val()
    var str = ``;
    var arr_Std = []
    var arr_Dorm = []
    var arr_Dorm_PPL = [] // 紀錄目前宿舍的人數
    var arr_selected_used = [ //填入下拉式選單用
      [],
      [],
      [],
      [],
      [],
      []
    ]
    var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];

    <?php //列出student
    $std_fetch = "SELECT * FROM `student` WHERE `Dorm_BuildingName` IS NOT NULL ORDER BY `Dorm_BuildingName`, `Dorm_No`";
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
      echo "arr_Std.push([`$sch_id`,`$year`,`$name`,`$gen`,`$grade`,`$mail`,`$phone`,`$pw`,`$d_num`,`$bdn`]);";
      //arrStd = [學號,入學年度,姓名,性別,年級,信箱,手機,密碼,房號,大樓名稱]
    }

    $Dorm_fetch = "SELECT * FROM `dorm` ORDER BY `Dorm_BuildingName`, `Dorm_No`";
    $Dorm_result = mysqli_query($link, $Dorm_fetch);
    while ($array = mysqli_fetch_array($Dorm_result)) {
      echo "arr_Dorm.push([`$array[1]`,`$array[0]`,`$array[2]`]);";
      // arr_Dorm = [大樓名稱, 房號, 容納人數]
    }

    $Std_fetch = "SELECT `Dorm_BuildingName`, `Dorm_No` FROM `student` WHERE `Dorm_BuildingName` IS NOT NULL
                  ORDER BY `Dorm_BuildingName`, `Dorm_No`";
    $Std_result = mysqli_query($link, $Std_fetch);
    $cnt = 0;
    $pre_building = "";
    $pre_dorm = "";
    $flag = true;
    while ($array = mysqli_fetch_array($Std_result)) {
      if ($flag) {
        $flag = false;
        $cnt = 1;
        $pre_building = $array[0];
        $pre_dorm = $array[1];
      } else if ($pre_building == $array[0] && $pre_dorm == $array[1]) {
        $cnt++;
      } else {
        echo "arr_Dorm_PPL.push([`$pre_building`,`$pre_dorm`,`$cnt`]);";
        // arr_Dorm_PPL = [大樓名稱, 房號, 目前房間人數]
        $cnt = 1;
        $pre_building = $array[0];
        $pre_dorm = $array[1];
      }
    }
    if (!$flag) {
      echo "arr_Dorm_PPL.push([`$pre_building`,`$pre_dorm`,`$cnt`]);";
    }
    ?>

    if (arr_Std == []) {
      str = `<label>無入住學生</label>`
      $('#AR_list').append(str);
      return;
    }

    // 只記錄顯示畫面上的學生
    var index_start = 0
    var index_cnt = 0;
    var flag = true
    if (BDN != "") {
      for (var i = 0; i < arr_Std.length; i++) {
        if (parseInt(BDN) == parseInt(arr_Std[i][9])) {
          if (flag) {
            index_start = i;
            flag = false
          }
          index_cnt++
        }
      }

      var new_arr = arr_Std.splice(index_start, index_cnt)
      arr_Std = new_arr;
    }

    console.log("arr_Std = ", arr_Std)
    console.log("arr_Dorm = ", arr_Dorm)
    console.log("arr_Dorm_PPL = ", arr_Dorm_PPL)


    for (var d of arr_Dorm) {
      var found = false;
      for (var cur of arr_Dorm_PPL) {
        if (d[0] == cur[0] && d[1] == cur[1]) {
          found = true;
          arr_selected_used[parseInt(d[0]) - 1].push([d[0], d[1], `(${cur[2]}/${d[2]})`])
        }
      }
      if (!found) {
        arr_selected_used[parseInt(d[0]) - 1].push([d[0], d[1], `(0/${d[2]})`])
      }
    }

    console.log("arr_selected_used = ", arr_selected_used)

    str = `<table id="update_panel"><thead><tr>`
    str += `<th id="Std_ID_Title"><div>學號</div></th>`
    str += `<th id="Std_Name_Title"><div>姓名</div></th>`
    str += `<th id="Dorm_Building_Title"><div>所住大樓</div></th>`
    str += `<th id="Dorm_No_Title"><div>房間號碼</div></th>`
    str += `<th id="Change_Title"><div></div></th></tr></thead>`
    str += `<tbody>`
    var num = 0;
    var DB_STR = ``;
    flag = true
    // 印出table
    for (var i of arr_Std) {
      if (BDN == "" || BDN == parseInt(i[9])) {
        DB_STR += `<input type="hidden" name="DB_Std[]" value="(${i[9]}/${i[8]})">`;
        flag = false;
        num++
        var b = building_Name[parseInt(i[9]) - 1];
        str += `<tr><td id="Std_ID_${num}" value="${i[0]}"><div>${i[0]}</div></td>`; // 學號
        str += `<td id="Std_Name_${num}" value="${i[2]}"><div>${i[2]}</div></td>`; // 姓名
        str += `<td id="Dorm_Building_${num}" value="${i[9]}"><div>${b}</div></td>`; // 所住大樓
        str += `<td id="Dorm_No_${num}"><select id="choose_room_${num}" onchange="dynamicDorm('${num}')">`
        var bdn_info = arr_selected_used[parseInt(i[9]) - 1]
        for (var room of bdn_info) { // 確認房間人數
          var ppl_arr = room[2];
          var regex = /\d+/g;
          var ppl = ppl_arr.match(regex); // ppl = [目前人數, 最大人數]
          var cur_ppl = parseInt(ppl[0]);
          var max_ppl = parseInt(ppl[1]);
          var sel = ``,
            dis = ``
          if (cur_ppl == max_ppl)
            dis = `disabled`
          if (room[1] == i[8])
            sel = `selected`
          str += `<option value="${room[1]}" ${sel} ${dis}>${room[1]}-${ppl_arr}</option>`
        }
        str += `</select></td><td><div name="warning" id="change_info_${num}"></div></td></tr>`;
      }
    }

    str += `</tbody></table><br>`
    str += `<div id=note_2><button class="btn btn-common mb-3" id="update_button" onclick="updateDorm_Button()">修改</button>`;
    str += `<button class="btn btn-secondary mb-3" id="update_reset_button" onclick="updateCheck(true)">復原</button></div> `
    if (flag) {
      str = `<label>該大樓無人入住！</label>`
    }
    $('#AR_list').append(str);


    str = ``
    for (var i = 1; i <= num; i++) {
      var chosen_bdn = arr_Std[i - 1][9];
      var chosen_room = document.getElementById('choose_room_' + i).value;
      str += `<input type="hidden" name="pre_chosen[]" value="(${chosen_bdn}/${chosen_room})">`;
    }

    for (var i of arr_selected_used) {
      for (var j of i) {
        var z = j[2];
        var regex = /\d+/g;
        var ppl = z.match(regex);
        var cur_ppl = parseInt(ppl[0]);
        var max_ppl = parseInt(ppl[1]);
        str += `<input type="hidden" name="capacity_dorm[]" value="(${j[0]}/${j[1]}/${cur_ppl}/${max_ppl})">`
      }
    }

    $('#Store_Value').append(DB_STR)
    $('#Store_Value').append(str);
  }

  function dynamicDorm(num) { // 更改宿舍時 動態改變下拉式選單及提醒
    console.log("\n\ndynamicDorm START!")
    var a = document.getElementsByName("pre_chosen[]");
    var b = document.getElementsByName("capacity_dorm[]");
    var aa = document.getElementsByName("DB_Std[]");
    var cur_Dorm = document.getElementById(`choose_room_${num}`).value
    var pre_chosen = [];
    var capacity_dorm = [];
    var DB_Std = [];
    var regex = /\d+/g;

    for (var i = 0; i < a.length; i++)
      pre_chosen.push(a[i].value);
    for (var i = 0; i < b.length; i++)
      capacity_dorm.push(b[i].value);
    for (var i = 0; i < aa.length; i++)
      DB_Std.push(aa[i].value);

    console.log("DB_Std = ", DB_Std)
    console.log("pre_chosen = ", pre_chosen)
    console.log("capacity_dorm = ", capacity_dorm)
    console.log("cur_Dorm = ", cur_Dorm)

    var c = pre_chosen[num - 1]
    var tmp = c.match(regex);
    var target_building = parseInt(tmp[0]);
    var pre_Dorm = parseInt(tmp[1]);
    console.log("pre_Dorm = ", pre_Dorm)
    for (var i = 0; i < capacity_dorm.length; i++) {
      var d = capacity_dorm[i].match(regex);
      var Dorm_Bdn = parseInt(d[0]);
      var Dorm_No = parseInt(d[1]);
      var Cur_PPL = parseInt(d[2]);
      var Max_PPL = parseInt(d[3]);
      if (Dorm_Bdn == target_building && Dorm_No == pre_Dorm) {
        capacity_dorm[i] = `(${Dorm_Bdn}/${Dorm_No}/${Cur_PPL - 1}/${Max_PPL})`
      } else if (Dorm_Bdn == target_building && Dorm_No == cur_Dorm) {
        capacity_dorm[i] = `(${Dorm_Bdn}/${Dorm_No}/${Cur_PPL + 1}/${Max_PPL})`
      }
    }

    console.log("DB_Std = ", DB_Std)
    pre_chosen[num - 1] = `(${target_building}/${cur_Dorm})`
    console.log("After Modify pre_chosen = ", pre_chosen)
    console.log("After Modify capacity_dorm = ", capacity_dorm)

    // 有變動!提醒
    for (var i = 0; i < DB_Std.length; i++) {
      var str = `<div name="warning" id="change_info_${i+1}"></div>`
      if (DB_Std[i] != pre_chosen[i]) {
        str = `<div name="warning" id="change_info_${i+1}">有變動!</div>`
      }

      $(`#change_info_${i+1}`).replaceWith(str);
    }

    //更改下拉式選單
    for (var i = 0; i < pre_chosen.length; i++) {
      var dd = pre_chosen[i]
      var ddd = dd.match(regex);
      var cur_bdn = parseInt(ddd[0]);
      var cur_dno = parseInt(ddd[1]);
      if (cur_bdn == target_building) {
        var str = `<select id="choose_room_${i+1}" onchange="dynamicDorm('${i+1}')">`
        for (var j of capacity_dorm) {
          var e = j.match(regex);
          var Dorm_Bdn = parseInt(e[0]);
          var Dorm_No = parseInt(e[1]);
          var Cur_PPL = parseInt(e[2]);
          var Max_PPL = parseInt(e[3]);
          if (cur_bdn == Dorm_Bdn) {
            var sel = ``;
            var dis = ``;
            if (Cur_PPL == Max_PPL)
              dis = `disabled`
            if (Dorm_No == cur_dno)
              sel = `selected`
            str += `<option value="${Dorm_No}" ${sel} ${dis}>${Dorm_No}-(${Cur_PPL}/${Max_PPL})</option>`
          }
        }
        str += `</select>`
        $(`#choose_room_${i+1}`).replaceWith(str);
      }
    }

    //更新data
    var value_str = `<div id="Store_Value">`
    for (var i of DB_Std) {
      value_str += `<input type="hidden" name="DB_Std[]" value="${i}">`
    }

    for (var i of pre_chosen) {
      value_str += `<input type="hidden" name="pre_chosen[]" value="${i}">`
    }

    for (var i of capacity_dorm) {
      value_str += `<input type="hidden" name="capacity_dorm[]" value="${i}">`
    }
    value_str += `</div>`
    $('#Store_Value').replaceWith(value_str);
  }

  function updateDorm_Button() {
    var pre_chosen = document.getElementsByName("pre_chosen[]");
    var DB_Std = document.getElementsByName("DB_Std[]");
    var no_change = true;
    for (var i = 0; i < DB_Std.length; i++) {
      if (DB_Std[i].value != pre_chosen[i].value) {
        no_change = false
      }
    }

    if (no_change) {
      swal({
        title: "未做任何更動!",
        icon: "error",
        dangerMode: true
      })
      return;
    }

    var arr_Std = []
    <?php //列出student
    $std_fetch = "SELECT * FROM `student` WHERE `Dorm_BuildingName` IS NOT NULL ORDER BY `Dorm_BuildingName`, `Dorm_No`";
    $std_result = mysqli_query($link, $std_fetch);
    while ($row = mysqli_fetch_array($std_result)) {
      $sch_id = htmlspecialchars($row[0], ENT_QUOTES);
      $bdn = $row[9];
      echo "arr_Std.push([`$sch_id`,`$bdn`]);";
      //arrStd = [學號,大樓名稱]
    }
    ?>

    // 只記錄畫面上的學生
    var BDN = $('#method_building').val();
    var index_start = 0;
    var index_cnt = 0;
    var flag = true
    if (BDN != "") {
      for (var i = 0; i < arr_Std.length; i++) {
        if (parseInt(BDN) == parseInt(arr_Std[i][1])) {
          if (flag) {
            index_start = i;
            flag = false
          }
          index_cnt++
        }
      }

      var new_arr = arr_Std.splice(index_start, index_cnt)
      arr_Std = new_arr;
    }


    var str = `<div id="Std_Value">`;
    for (var i of arr_Std) {
      str += `<input type="hidden" name="STD_ID[]" value="${i[0]}">`
    }
    str += `</div>`
    $('#Std_Value').replaceWith(str);
    updateCheck(false);
  }

  function clean(del_sel = true) {
    if (del_sel)
      $('#historyNum').replaceWith(`<div id="historyNum"></div>`)
    $("#AR_list").replaceWith(`<div id="AR_list"></div>`)
    $('#autoAllocate').replaceWith(`<form id="autoAllocate" action="AllocateRoomMethod.php" method="POST"></form>`)
    var str = `<form id="UPDATE_DORM" action="AllocateRoom_UpdateMethod.php" method="POST">`
    str += `<div id="Store_Value"></div><div id="Std_Value"></div></form>`
    $('#UPDATE_DORM').replaceWith(str)
  }

  function buttonDisable(num) {
    for (var i = 1; i <= 3; i++) {
      if (i == num)
        $(`button[id="button_${i}"]`).prop('disabled', true)
      else
        $(`button[id="button_${i}"]`).prop('disabled', false)
    }
  }

  function showListAll_Building_Select(update = false) {
    var str = `<label id="title_method_building">大樓名稱：</label>`
    if (update)
      str += `<select id="method_building" onchange="updateDorm()">`
    else
      str += `<select id="method_building" onchange="viewBuilding()">`
    str += `<option value="" selected>不限</option>`
    str += `<option value="1">學一(男)</option>`
    str += `<option value="2">學一(女)</option>`
    str += `<option value="3">學二(男)</option>`
    str += `<option value="4">學二(女)</option>`
    str += `<option value="5">綜合(男)</option>`
    str += `<option value="6">綜合(女)</option>`
    str += `</select>`
    $('#historyNum').append(str);
  }

  function deleteListAll_Building_Select() {
    $('#method_building').replaceWith();
    $('#title_method_building').replaceWith();
  }


  function updateCheck(reset) {
    var str = "確定要修改嗎？"
    if (reset) {
      str = "確定要復原嗎？"
    }
    swal({
      title: str,
      icon: "warning",
      buttons: true,
      dangerMode: true
    }).then((value) => {
      if (value && !reset) {
        $('#UPDATE_DORM').submit()
      } else if (value && reset) {
        showUpdate()
      } else {
        swal('已取消!');
      }
    });
  }


  function doubleCheck(reset) {
    var str = "確定要分配嗎？"
    if (reset) {
      str = "確定要復原嗎？"
    }
    swal({
      title: str,
      icon: "warning",
      buttons: true,
      dangerMode: true
    }).then((value) => {
      if (value && !reset) {
        $('#autoAllocate').submit()
      } else if (value && reset) {
        listUnallocate()
      } else {
        swal('已取消!');
      }
    });
  }
</script>