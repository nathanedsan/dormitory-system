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
                          <form action = "AddMaintainanceReport.php">
                            <button class="btn btn-common mb-3" style="font-size:15px;margin-right:50px;">新增維修記錄</button>
                          </form>
                          <?php
                            $maintain_fetch = "SELECT * FROM `maintenance_report` WHERE `Std_ID` ='" . $std_id . "'";
                            $maintain_result = mysqli_query($link, $maintain_fetch);

                            if (mysqli_num_rows($maintain_result) > 0) {
                              
                              echo '<table align="center" class="table">';
                              echo '<tr class="table-primary">';
                              echo'<td>申請編號</td>';
                              echo'<td>報修日期</td>';
                              echo'<td>維修日期</td>';
                              echo'<td>報修項目</td>';
                              echo'<td>報修進度</td>';
                              echo '</tr>';
                              
                              while ($row = mysqli_fetch_array($maintain_result)) {
                                echo '<tr>';
                                echo'<td>'.$row['MR_No'].'</td>';
                                echo'<td>'.$row['MR_ApplyDate'].'</td>';
                                echo '<td>'.date('Y-m-d H:i', strtotime($row['MR_WorkDate'])).'</td>';
                                echo'<td>'.$row['MR_Content'].'</td>';
                                echo'<td>'.$row['MR_Progress'].'</td>';
                                echo'</tr>';
                              }
                              echo '</table>';
                            }
                            else echo '<label style="font-size:20px;text-align:center;width:100%;">查無報修記錄</label>';
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
