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
    <title>檢視住宿生資料</title>

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
                          <span class="sub-title">舍監</span>
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
                <a href="supervisor.php">
                  <span class="icon-holder">
                    <i class="lni-dashboard"></i>
                  </span>
                  <span class="title">首頁</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a href="MessageBoardSpv.php">
                  <span class="icon-holder">
                    <i class="lni-comments-alt"></i>
                  </span>
                  <span class="title">管理留言板</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a href="AnnounceMessageForSpv.php">
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
                  <span class="title">檢視住宿生資料</span>
                </a>
              </li>

          
              <li class="nav-item dropdown">
                <a href="Maintainmanagerspv.php">
                  <span class="icon-holder">
                    <i class="lni-files"></i>
                  </span>
                  <span class="title">管理報修系統</span>
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
                    <li><a href="supervisor.php">回首頁</a></li>
                    <li class="active">舍監</li>
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
                            <div id="choose" style="font-size:20px;text-align:center;">
                                <label id="mng_building"></label>
                                <label id="choose_dorm">選擇宿舍：</label>
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

$std_fetch = "SELECT * FROM `student` ORDER BY `Std_ID`,`Dorm_BuildingName`, `Dorm_No`";
$std_result = mysqli_query($link, $std_fetch);

$spv_fetch = "SELECT * FROM `supervisor`";
$spv_result = mysqli_query($link, $spv_fetch);

$spv_ID = $_SESSION["SupervisorID"]
?>



<script>
    window.onload = show()

    function turnback() {
        window.location = "supervisor.php";
    }

    function show() {
        var spv_ID = ``
        var mng_building = ``
        var arr = []
        var str = ``
        var building_Name = [`學一(男)`, `學一(女)`, `學二(男)`, `學二(女)`, `綜合(男)`, `綜合(女)`];
        <?php
        $dorm_result = mysqli_query($link, $dorm_fetch);
        while ($item = mysqli_fetch_array($dorm_result)) {
            echo "arr.push(['$item[0]','$item[1]']);"; //格式:[宿舍編號,大樓名稱]
        }

        // 找舍監ID及其負責的大樓
        $spv_result = mysqli_query($link, $spv_fetch);
        while ($spv_arr = mysqli_fetch_array($spv_result)) {
            echo "console.log('spv_ID = `$spv_arr[0]`');";
            if ($spv_ID == $spv_arr[0]) {
                echo "spv_ID = `$spv_ID`;";
                echo "mng_building = `$spv_arr[5]`;";
                break;
            }
        }
        ?>

        if (mng_building == null) {
            str = `<div id="choose" style="font-size:20px;text-align:center;">此舍監無負責大樓</div>`
            $('#choose').replaceWith(str)
            return
        }
        var b = building_Name[parseInt(mng_building) - 1];
        str = `<label id="mng_building">負責大樓：${b}&emsp;</label>`
        $('#mng_building').replaceWith(str)

        str = `<select name="dorm_no" id="dorm_no" onchange="stdInfo()">`
        str += `<option value="" selected>請選擇</option>`
        for (var i of arr) {
            if (i[1] == mng_building)
                str += `<option value="${i[0]}" name="${i[0]}">${i[0]}</option>`
        }
        str += `</select>`
        $('#choose_dorm').after(str)
    }

    function stdInfo() {
        var arrStd = []
        var arrStd_ID = []
        var str = ``
        var spv_ID = ``
        var mng_building = ``
        var dorm_no = $('#dorm_no').val()

        if (dorm_no == null) {
            $('#detail').replaceWith(`<div id="detail"></div>`)
            return
        }

        <?php
        $std_result = mysqli_query($link, $std_fetch);
        while ($item = mysqli_fetch_array($std_result)) {
            $sch_id = htmlspecialchars($item[0], ENT_COMPAT);
            $year = htmlspecialchars($item[1], ENT_COMPAT);
            $name = htmlspecialchars($item[2], ENT_COMPAT);
            $gen = htmlspecialchars($item[3], ENT_COMPAT);
            $grade = htmlspecialchars($item[4], ENT_COMPAT);
            $mail = htmlspecialchars($item[5], ENT_COMPAT);
            $phone = htmlspecialchars($item[6], ENT_COMPAT);
            $d_num = htmlspecialchars($item[8], ENT_COMPAT);
            $building = htmlspecialchars($item[9], ENT_COMPAT);
            echo "arrStd.push(['$sch_id','$year','$name','$gen','$grade','$mail','$phone','$d_num','$building']);";
        }

        // 找舍監ID及其負責的大樓
        $spv_result = mysqli_query($link, $spv_fetch);
        while ($spv_arr = mysqli_fetch_array($spv_result)) {
            if ($spv_ID == $spv_arr[0]) {
                echo "spv_ID = `$spv_ID`;";
                echo "mng_building = `$spv_arr[5]`;";
                break;
            }
        }
        ?>

        console.log(arrStd)

        for (var i of arrStd) {
            if (i[7] == dorm_no && i[8] == mng_building) {
                console.log("Find STD = "+ i[0])
                arrStd_ID.push(i[0])
            }
        }
        console.log("宿舍：" + dorm_no + "  大樓：" + mng_building)
        console.log("符合STD", arrStd_ID)

        str +=
            `<div class="table1">` +
            `<div class="row1">` +
            `<div class="cell1"></div>` +
            `<div class="cell1"></div>` +
            `<div class="cell1"></div>` +
            `<div class="cell1"></div>` +
            `<div class="cell1"></div>` +
            `<div class="cell1"></div>` +
            `<div class="cell1"></div>` +
            `</div>`

        for (var i of arrStd_ID) {
            for (var j of arrStd) {
                if (i == j[0]) {
                    str += `<hr>`
                    str += `<div class="row1"><div class="cell1"><label style="font-size:18px;">學號: ${j[0]}</label></div>`
                    str += `<div class="cell1"><font size="3">入學年度: ${j[1]}</font></div><div class="cell1"><font size="3">姓名: ${j[2]}</font></div><div class="cell1"><font size="3">性別: ${j[3]}</font></div>`
                    str += `<div class="cell1"><font size="3">年級: ${j[4]}</font></div><div class="cell1"><font size="3">電子信箱: ${j[5]}</font></div><div class="cell1"><font size="3">手機號碼: ${j[6]}</font></div>`
                    str += `</div>`
                    break
                }
            }
        }
        str += `</div>`

        document.getElementById("detail").innerHTML = str;
    }
</script>