<?php
    session_start();
    $username = $_SESSION["Username"];
    include("config.php");
    $std_id = $_SESSION["stdID"];
    if (isset($_SESSION["loggedinStd"]) == null) {
        header("location:index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="/Dormitory/css/style.css" />
    <script src="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>報修</title>

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
        form{display:inline;}

    .textarea-wrapper {
        position: relative;
        display: inline-block;
    }

    span[id="charCount"] {
        color:gray;
        position: absolute;
        bottom: 5px;
        right: 5px;
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

              <li class="nav-item dropdown">
                <a href="std.php">
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
                <a href="ViolationRecordStd.php">
                  <span class="icon-holder">
                    <i class="lni-emoji-sad"></i>
                  </span>
                  <span class="title">違規紀錄</span>
                </a>
              </li>

              <li class="nav-item dropdown open">
                <a href="#">
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
                    <li><a href="std.php">回首頁</a></li>
                    <li class="active">學生</li>
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
                            <?php
                                $profile_fetch = "SELECT * FROM `student` WHERE Std_ID = '$std_id'";
                                $profile_result = mysqli_query($link, $profile_fetch);
                                $profile = mysqli_fetch_assoc($profile_result);
                                if($profile["Dorm_BuildingName"] != "" || $profile["Dorm_No"] != ""){
                                  echo '<form action = "MaintainanceReportMethod.php" method = "POST">';
                                  echo '<table align="center">';
                                  echo '<tr>';
                                  echo '<td align = "front"><label>報修人</label></td>';
                                  echo '<td align="center">'.$profile["Std_Name"].'</td>';
                                  echo '</tr>';
                                  echo '<tr>';
                                  echo '<td align = "front"><label>學號</label></td>';
                                  echo '<td align="center">'.$profile["Std_ID"].'</td>';
                                  echo '<input type="hidden" name="id" value='.$profile["Std_ID"].'>';
                                  echo '</tr>';
                                  echo '<tr>';
                                  echo '<td align = "front"><label>聯絡方式</label></td>';
                                  echo '<td align="center">'.$profile["Std_Phone"].'</td>';
                                  echo '<input type="hidden" name="phone" value='.$profile["Std_Phone"].'>';
                                  echo '</tr>';
                                  echo '<tr>';
                                  echo '<td align = "front"><label>宿舍大樓</label></td>';
                                  if($profile["Dorm_BuildingName"] == "1"){
                                      echo '<td align="center">學一(男)';
                                  }
                                  else if($profile["Dorm_BuildingName"] == "2"){
                                      echo '<td align="center">學一(女)</td>';
                                  }
                                  else if($profile["Dorm_BuildingName"] == "3"){
                                      echo '<td align="center">學二(男)</td>';
                                  }
                                  else if($profile["Dorm_BuildingName"] == "4"){
                                      echo '<td align="center">學二(女)</td>';
                                  }
                                  else if($profile["Dorm_BuildingName"] == "5"){
                                      echo '<td align="center">綜合(男)</td>';
                                  }
                                  else if($profile["Dorm_BuildingName"] == "6"){
                                      echo '<td align="center">綜合(女)</td>';
                                  }
                                  echo '<input type="hidden" name="dorm_building" value='.$profile["Dorm_BuildingName"].'>';
                                  echo '</tr>';
                                  echo '<tr>';
                                  echo '<td align = "front"><label>房號</label></td>';
                                  echo '<td align="center">'.$profile["Dorm_No"].'</td>';
                                  echo '<input type="hidden" name="room_no" value='.$profile["Dorm_No"].'>';
                                  echo '</tr>';
                                  echo '<tr>';
                                  echo '<td align = "front"><label>預約維修日期</label></td>';
                                  echo '<td><input type="datetime-local" id="date_repair" name="date_repair" required></input></td>';
                                  echo '</tr>';
                                  echo '<tr>';
                                  echo '<td align = "front"><label>維修項目</label></td>';
                                  echo '<td align="center"><div class="textarea-wrapper"><textarea placeholder="請輸入報修內容" name="content" rows="4" cols="50" required></textarea><span id="charCount">(0/200)</span></div></td>';
                                  echo '</tr>';
                                  echo '<input type="hidden" name="process" value="報修中" >';
                                  echo '</table>';
                                  echo '<div style="text-align:center;margin-top:2px;"><button class="btn btn-common mb-3" style="font-size:15px;margin-right:50px;">送出</button>';
                                  echo '<button type="button" class="btn btn-secondary mb-3" style="font-size:15px;margin-right:50px;" onclick="location.href=\'MaintainanceReport.php\'">返回</button></div>';
                                  echo '</form>';
                              }
                              else echo '<label style="font-size:20px;text-align:center;width:100%;">未分配宿舍，無法使用此功能</label>'
                            ?>
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
    document.addEventListener("DOMContentLoaded", function() {
        var textarea = document.querySelector("textarea");
        var charCount = document.querySelector("#charCount");

        textarea.addEventListener("input", function() {
            var currentLength = textarea.value.length;
            charCount.textContent = "(" + currentLength + "/200)";
        });
    });
</script>

