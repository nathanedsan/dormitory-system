<?php
session_start();
$username = $_SESSION["Username"];
include_once("config.php");

$choose = 8;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["button1"])) {
    $choose = 8;
  } elseif (isset($_POST["button2"])) {
    $choose = 9;
  }
}
?>

<!DOCTYPE html>

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
    <title>報修系統</title>

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
  <script>
  function buttonDisable(num) {
    for (var i = 1; i <= 2; i++) {
      if (i == num)
        $(`button[name="button${i}"]`).prop('disabled', true)
      else
        $(`button[name="button${i}"]`).prop('disabled', false)
    }
  }
</script>
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

            <li class="nav-item dropdown">
              <a href="AllocateRoomAdmin.php">
                <span class="icon-holder">
                  <i class="lni-package"></i>
                </span>
                <span class="title">入住申請&分配房間</span>
              </a>
            </li>

            <li class="nav-item dropdown open">
              <a href="#">
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
                          
                          <form action="" method="post">
                            <button class="btn btn-secondary mb-3" type="submit" name="button1">目前進度</button>
                            <button class="btn btn-secondary mb-3" type="submit" name="button2">已完成</button>
                          </form>

                            <?php
                              $maintain_fetch = "SELECT * FROM `maintenance_report` ORDER BY `MR_No` DESC";
                              $maintain_result = mysqli_query($link, $maintain_fetch);
                              if (mysqli_num_rows($maintain_result) > 0) {
                                
                                echo '<table align="center" class="table">';
                                echo '<tr class="table-primary">';
                                echo'<td>申請編號</td>';
                                echo'<td>報修人學號</td>';
                                echo'<td>聯繫方式</td>';
                                echo'<td>宿舍大樓</td>';
                                echo'<td>房號</td>';
                                echo'<td>報修日期</td>';
                                echo'<td>維修日期</td>';
                                echo'<td>報修項目</td>';
                                echo'<td>報修進度</td>';
                                echo'<td>操作</td>';
                                echo '</tr>';
                                
                                while ($row = mysqli_fetch_array($maintain_result)) {

                                  if ($choose == 9 && $row['MR_Progress'] != "已完成") {
                                    echo '<script>buttonDisable(2)</script>';
                                    continue;
                                  }

                                  if ($choose == 8 && $row['MR_Progress'] == "已完成") {
                                    echo '<script>buttonDisable(1)</script>';
                                    continue;
                                  }

                                  echo '<tr>';
                                  echo '<form action = "MaintainmanageradminMethod.php" method = "POST">';
                                  echo'<td>'.$row['MR_No'].'</td>';
                                  echo'<td>'.$row['Std_ID'].'</td>';
                                  echo '<input type="hidden" name="mr_no" value='.$row["MR_No"].'>';
                                  echo'<td>'.$row['MR_Contact'].'</td>';
                                  if($row["Dorm_BuildingName"] == "1"){
                                    echo '<td align="center">學一(男)';
                                  }
                                  else if($row["Dorm_BuildingName"] == "2"){
                                      echo '<td align="center">學一(女)</td>';
                                  }
                                  else if($row["Dorm_BuildingName"] == "3"){
                                      echo '<td align="center">學二(男)</td>';
                                  }
                                  else if($row["Dorm_BuildingName"] == "4"){
                                      echo '<td align="center">學二(女)</td>';
                                  }
                                  else if($row["Dorm_BuildingName"] == "5"){
                                      echo '<td align="center">綜合(男)</td>';
                                  }
                                  else if($row["Dorm_BuildingName"] == "6"){
                                      echo '<td align="center">綜合(女)</td>';
                                  }
                                  echo'<td>'.$row['Dorm_No'].'</td>';
                                  echo'<td>'.$row['MR_ApplyDate'].'</td>';
                                  echo '<td>'.date('Y-m-d H:i', strtotime($row['MR_WorkDate'])).'</td>';
                                  echo'<td>'.$row['MR_Content'].'</td>';
                                  echo'<td>';
                                  echo'<select name="options">';
                                  echo'<option value="'.$row['MR_Progress'].'">'.$row['MR_Progress'].'</option>';
                                  if($row['MR_Progress'] == "報修中"){
                                    echo'<option value="處理中">處理中</option>';
                                    echo'<option value="已完成">已完成</option>';
                                  }
                                  else if($row['MR_Progress'] == "處理中"){
                                    echo'<option value="報修中">報修中</option>';
                                    echo'<option value="已完成">已完成</option>';
                                  }
                                  else if($row['MR_Progress'] == "已完成"){
                                    echo'<option value="報修中">報修中</option>';
                                    echo'<option value="處理中">處理中</option>';
                                  }
                                  echo '</select></td>'; 
                                  echo'<td>';
                                  echo '<div style="text-align:center;"><button class="btn btn-common mb-3">送出</button></div>';
                                  echo'</td>';
                                  echo '</form>';
                                  echo '<tr>';
                                }
                                echo '</table>';
                              }
                              else echo '<label style="font-size:20px;text-align:center;width:100%;">查無報修記錄</label>'
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