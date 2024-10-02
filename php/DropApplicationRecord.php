<?php
$conn = include "config.php";
session_start();
$admin = $_SESSION['AdminID'];
$username = $_SESSION["Username"];
?>
<!DOCTYPE html>
<html>

<head>
  <!-- 新 Bootstrap5 核心 CSS 文件 -->
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <!-- 最新的 Bootstrap5 核心 JavaScript 文件 -->
  <script src="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>退宿申請</title>

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
    option {
      font-family: Microsoft JhengHei;
      font-size: 15px;
    }

    table {
      border-spacing: 0;
      width: 100%;
      border-collapse: collapse;
    }

    tr {
      text-align: center;
      font-size: 20px;
    }

    th {
      font-size: 20px;
    }

    td {
      word-wrap: break-word;
      max-width: 200px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
    }

    table tbody tr:nth-child(odd) {
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

            <li class="nav-item dropdown">
              <a href="CrewManage.php">
                <span class="icon-holder">
                  <i class="lni-emoji-smile"></i>
                </span>
                <span class="title">管理人員</span>
              </a>
            </li>

            <li class="nav-item dropdown open">
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
                  <a href="#">退宿申請</a>
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
                          <form method="post" action="">
                            <button type="submit" name="table1" value="受理中" class="btn btn-secondary mb-3" id='but1'>受理中</button>

                            <button type="submit" name="table2" value="過去受理" class="btn btn-secondary mb-3" id='but2'>過去受理</button>
                          </form>
                          <?php
                          
                          if ((isset($_POST['table1']))) {
                            $_SESSION['selected_table'] = 'table1';
                            $sql = "SELECT * FROM `apply_record` WHERE `AR_Type`='2' and `AR_Status`='受理中'";
                            $result = mysqli_query($conn, $sql);
                            $data_nums = mysqli_num_rows($result); // 統計總筆數
                            $per = 7; // 每頁顯示項目數量
                            $pages = ceil($data_nums / $per);
                            if (!isset($_GET["page"])) { // 假如 $_GET["page"] 未設置
                              $page = 1; // 則在此設定起始頁數
                            } else {
                              $page = intval($_GET["page"]); // 確認頁數只能是數值資料
                            }

                            $start = ($page - 1) * $per; // 每一頁開始的資料序號
                            $result = mysqli_query($conn, $sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");

                            if (mysqli_num_rows($result) != 0) {
                          ?>
                              <table>
                                <thead>
                                  <tr class="table-primary">
                                    <th scope="col">申請人</th>
                                    <th scope="col">申請日期</th>
                                    <th scope="col">申請學期</th>
                                    <th scope="col">申請學年度</th>
                                    <th scope="col">操作</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {
                                  ?>
                                      <tr class="table-secondary">
                                        <td><?php echo $row["Std_ID"]; ?></td>
                                        <td><?php echo $row["AR_Date"]; ?></td>
                                        <td><?php echo $row["AR_Semester"]; ?></td>
                                        <td><?php echo $row["AR_Acdm_Year"]; ?></td>
                                        <td style="display: flex; flex-direction: column; align-items: center;">
                                          <button class="btn btn-common mb-3" style="margin:5px;" onclick='confirm("<?php echo $row["AR_No"]; ?>","1")'>核准</button>
                                          <button class="btn btn-secondary mb-3" onclick='confirm("<?php echo $row["AR_No"]; ?>","2")'>不核准</button>
                                        </td>
                                      </tr>

                                  <?php
                                    }
                                  }
                                  ?>
                                </tbody>
                              </table>

                              <?php
                              // 分頁頁碼
                              $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                              if ($pages <= 7) {
                                echo '<div style="display: flex; justify-content: center;align-items: center;">';
                                // 若總頁數小於等於 7，直接顯示所有連結
                                for ($i = 1; $i <= $pages; $i++) {
                                  if ($i == $currentPage) {
                                    echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" disabled>' . $i . '</button> ';
                                  } else {
                                    echo '<button class="btn btn-light mb-3" style="margin:3px;" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                  }
                                }
                              } else {
                                // 若總頁數大於 7，使用省略號顯示部分連結
                                if ($currentPage <= 4) {
                                  // 顯示前 5 個連結
                                  for ($i = 1; $i <= 5; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                  echo '... ';
                                } elseif ($currentPage >= $pages - 3) {
                                  // 顯示後 5 個連結
                                  echo '... ';
                                  for ($i = $pages - 4; $i <= $pages; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                } else {
                                  // 顯示當前頁面前後 2 個連結
                                  echo '... ';
                                  for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                  echo '... ';
                                }
                              }

                              echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" onclick="location.href=\'?page=' . $pages . '\'">末頁</button></div>';


                              echo '<div style="display: flex; justify-content: center;"><form method="GET" action="">';
                              echo '<input type="number" name="page" size="3" maxlength="3" required min="1" max="' . $pages . '"> 頁';
                              echo '<input type="submit" value="跳轉"></form></div>';
                            } else { ?>
                              <label style="font-size:20px;text-align:center;width:100%;">查無記錄</label>
                            <?php
                            }
                          } elseif ((isset($_POST['table2']))) {
                            $_SESSION['selected_table'] = 'table2';
                            $sql = "SELECT * FROM `apply_record` WHERE `AR_Type`='2' and `AR_Status`='受理完成'";
                            $result = mysqli_query($conn, $sql);
                            $data_nums = mysqli_num_rows($result); // 統計總筆數
                            $per = 7; // 每頁顯示項目數量
                            $pages = ceil($data_nums / $per);
                            if (!isset($_GET["page"])) { // 假如 $_GET["page"] 未設置
                              $page = 1; // 則在此設定起始頁數
                            } else {
                              $page = intval($_GET["page"]); // 確認頁數只能是數值資料
                            }

                            $start = ($page - 1) * $per; // 每一頁開始的資料序號
                            $result = mysqli_query($conn, $sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");

                            if (mysqli_num_rows($result) != 0) {
                            ?>
                              <table>
                                <thead>
                                  <tr class="table-primary">
                                    <th scope="col">申請人</th>
                                    <th scope="col">申請日期</th>
                                    <th scope="col">申請學期</th>
                                    <th scope="col">申請學年度</th>
                                    <th scope="col">審核結果</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {
                                  ?>
                                      <tr class="table-secondary">
                                        <td><?php echo $row["Std_ID"]; ?></td>
                                        <td><?php echo $row["AR_Date"]; ?></td>
                                        <td><?php echo $row["AR_Semester"]; ?></td>
                                        <td><?php echo $row["AR_Acdm_Year"]; ?></td>
                                        <td><?php echo $row["AR_Result"]; ?></td>
                                      </tr>

                                  <?php
                                    }
                                  }
                                  ?>
                                </tbody>
                              </table>

                              <?php
                              // 分頁頁碼
                              $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                              if ($pages <= 7) {
                                echo '<div style="display: flex; justify-content: center;align-items: center;">';
                                // 若總頁數小於等於 7，直接顯示所有連結
                                for ($i = 1; $i <= $pages; $i++) {
                                  if ($i == $currentPage) {
                                    echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" disabled>' . $i . '</button> ';
                                  } else {
                                    echo '<button class="btn btn-light mb-3" style="margin:3px;" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                  }
                                }
                              } else {
                                // 若總頁數大於 7，使用省略號顯示部分連結
                                if ($currentPage <= 4) {
                                  // 顯示前 5 個連結
                                  for ($i = 1; $i <= 5; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                  echo '... ';
                                } elseif ($currentPage >= $pages - 3) {
                                  // 顯示後 5 個連結
                                  echo '... ';
                                  for ($i = $pages - 4; $i <= $pages; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                } else {
                                  // 顯示當前頁面前後 2 個連結
                                  echo '... ';
                                  for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                  echo '... ';
                                }
                              }

                              echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" onclick="location.href=\'?page=' . $pages . '\'">末頁</button></div>';


                              echo '<div style="display: flex; justify-content: center;"><form method="GET" action="">';
                              echo '<input type="number" name="page" size="3" maxlength="3" required min="1" max="' . $pages . '"> 頁';
                              echo '<input type="submit" value="跳轉"></form></div>';
                            } else { ?>
                              <label style="font-size:20px;text-align:center;width:100%;">查無記錄</label>
                              <?php
                            }
                          } elseif (isset($_SESSION['selected_table'])) {
                            $selectedTable = $_SESSION['selected_table'];
                            if ($selectedTable == 'table1') {
                              $sql = "SELECT * FROM `apply_record` WHERE `AR_Type`='2' and `AR_Status`='受理中'";
                              $result = mysqli_query($conn, $sql);
                              $data_nums = mysqli_num_rows($result); // 統計總筆數
                              $per = 7; // 每頁顯示項目數量
                              $pages = ceil($data_nums / $per);
                              if (!isset($_GET["page"])) { // 假如 $_GET["page"] 未設置
                                $page = 1; // 則在此設定起始頁數
                              } else {
                                $page = intval($_GET["page"]); // 確認頁數只能是數值資料
                              }

                              $start = ($page - 1) * $per; // 每一頁開始的資料序號
                              $result = mysqli_query($conn, $sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");

                              if (mysqli_num_rows($result) != 0) {
                              ?>
                                <table>
                                  <thead>
                                    <tr class="table-primary">
                                      <th scope="col">申請人</th>
                                      <th scope="col">申請日期</th>
                                      <th scope="col">申請學期</th>
                                      <th scope="col">申請學年度</th>
                                      <th scope="col">操作</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                      foreach ($result as $row) {
                                    ?>
                                        <tr class="table-secondary">
                                          <td><?php echo $row["Std_ID"]; ?></td>
                                          <td><?php echo $row["AR_Date"]; ?></td>
                                          <td><?php echo $row["AR_Semester"]; ?></td>
                                          <td><?php echo $row["AR_Acdm_Year"]; ?></td>
                                          <td style="display: flex; flex-direction: column; align-items: center;">
                                            <button class="btn btn-common mb-3" style="margin:5px;" onclick='confirm("<?php echo $row["AR_No"]; ?>","1")'>核准</button>
                                            <button class="btn btn-secondary mb-3" onclick='confirm("<?php echo $row["AR_No"]; ?>","2")'>不核准</button>
                                          </td>
                                        </tr>

                                    <?php
                                      }
                                    }
                                    ?>
                                  </tbody>
                                </table>

                                <?php
                                // 分頁頁碼
                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                if ($pages <= 7) {
                                  echo '<div style="display: flex; justify-content: center;align-items: center;">';
                                  // 若總頁數小於等於 7，直接顯示所有連結
                                  for ($i = 1; $i <= $pages; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" style="margin:3px;" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                } else {
                                  // 若總頁數大於 7，使用省略號顯示部分連結
                                  if ($currentPage <= 4) {
                                    // 顯示前 5 個連結
                                    for ($i = 1; $i <= 5; $i++) {
                                      if ($i == $currentPage) {
                                        echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                      } else {
                                        echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                      }
                                    }
                                    echo '... ';
                                  } elseif ($currentPage >= $pages - 3) {
                                    // 顯示後 5 個連結
                                    echo '... ';
                                    for ($i = $pages - 4; $i <= $pages; $i++) {
                                      if ($i == $currentPage) {
                                        echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                      } else {
                                        echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                      }
                                    }
                                  } else {
                                    // 顯示當前頁面前後 2 個連結
                                    echo '... ';
                                    for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
                                      if ($i == $currentPage) {
                                        echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                      } else {
                                        echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                      }
                                    }
                                    echo '... ';
                                  }
                                }

                                echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" onclick="location.href=\'?page=' . $pages . '\'">末頁</button></div>';


                                echo '<div style="display: flex; justify-content: center;"><form method="GET" action="">';
                                echo '<input type="number" name="page" size="3" maxlength="3" required min="1" max="' . $pages . '"> 頁';
                                echo '<input type="submit" value="跳轉"></form></div>';
                              } else { ?>
                                <label style="font-size:20px;text-align:center;width:100%;">查無記錄</label>
                              <?php
                              }
                            } elseif ($selectedTable == 'table2') {
                              $sql = "SELECT * FROM `apply_record` WHERE `AR_Type`='2' and `AR_Status`='受理完成'";
                              $result = mysqli_query($conn, $sql);
                              $data_nums = mysqli_num_rows($result); // 統計總筆數
                              $per = 7; // 每頁顯示項目數量
                              $pages = ceil($data_nums / $per);
                              if (!isset($_GET["page"])) { // 假如 $_GET["page"] 未設置
                                $page = 1; // 則在此設定起始頁數
                              } else {
                                $page = intval($_GET["page"]); // 確認頁數只能是數值資料
                              }

                              $start = ($page - 1) * $per; // 每一頁開始的資料序號
                              $result = mysqli_query($conn, $sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");

                              if (mysqli_num_rows($result) != 0) {
                              ?>
                                <table>
                                  <thead>
                                    <tr class="table-primary">
                                      <th scope="col">申請人</th>
                                      <th scope="col">申請日期</th>
                                      <th scope="col">申請學期</th>
                                      <th scope="col">申請學年度</th>
                                      <th scope="col">審核結果</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                      foreach ($result as $row) {
                                    ?>
                                        <tr class="table-secondary">
                                          <td><?php echo $row["Std_ID"]; ?></td>
                                          <td><?php echo $row["AR_Date"]; ?></td>
                                          <td><?php echo $row["AR_Semester"]; ?></td>
                                          <td><?php echo $row["AR_Acdm_Year"]; ?></td>
                                          <td><?php echo $row["AR_Result"]; ?></td>
                                        </tr>

                                    <?php
                                      }
                                    }
                                    ?>
                                  </tbody>
                                </table>

                                <?php
                                // 分頁頁碼
                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                if ($pages <= 7) {
                                  echo '<div style="display: flex; justify-content: center;align-items: center;">';
                                  // 若總頁數小於等於 7，直接顯示所有連結
                                  for ($i = 1; $i <= $pages; $i++) {
                                    if ($i == $currentPage) {
                                      echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" disabled>' . $i . '</button> ';
                                    } else {
                                      echo '<button class="btn btn-light mb-3" style="margin:3px;" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                    }
                                  }
                                } else {
                                  // 若總頁數大於 7，使用省略號顯示部分連結
                                  if ($currentPage <= 4) {
                                    // 顯示前 5 個連結
                                    for ($i = 1; $i <= 5; $i++) {
                                      if ($i == $currentPage) {
                                        echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                      } else {
                                        echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                      }
                                    }
                                    echo '... ';
                                  } elseif ($currentPage >= $pages - 3) {
                                    // 顯示後 5 個連結
                                    echo '... ';
                                    for ($i = $pages - 4; $i <= $pages; $i++) {
                                      if ($i == $currentPage) {
                                        echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                      } else {
                                        echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                      }
                                    }
                                  } else {
                                    // 顯示當前頁面前後 2 個連結
                                    echo '... ';
                                    for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
                                      if ($i == $currentPage) {
                                        echo '<button class="btn btn-light mb-3" disabled>' . $i . '</button> ';
                                      } else {
                                        echo '<button class="btn btn-light mb-3" onclick="location.href=\'?page=' . $i . '\'">' . $i . '</button> ';
                                      }
                                    }
                                    echo '... ';
                                  }
                                }

                                echo '<button class="btn btn-light mb-3" style="margin:3px 3px 10px;" onclick="location.href=\'?page=' . $pages . '\'">末頁</button></div>';


                                echo '<div style="display: flex; justify-content: center;"><form method="GET" action="">';
                                echo '<input type="number" name="page" size="3" maxlength="3" required min="1" max="' . $pages . '"> 頁';
                                echo '<input type="submit" value="跳轉"></form></div>';
                              } else { ?>
                                <label style="font-size:20px;text-align:center;width:100%;">查無記錄</label>
                          <?php
                              }
                            }
                            
                          }
                          if ((isset($_SESSION['selected_table']))) {
                            $op = $_SESSION['selected_table'];
                            if ($op == 'table1') {
                              echo '<script>';
                              echo 'var button = document.getElementById("but1");';
                              echo 'button.disabled = true;';
                              echo 'var button = document.getElementById("but2");';
                              echo 'button.disabled = false;';
                              echo '</script>';
                            } else {
                              echo '<script>';
                              echo 'var button = document.getElementById("but1");';
                              echo 'button.disabled = false;';
                              echo 'var button = document.getElementById("but2");';
                              echo 'button.disabled = true;';
                              echo '</script>';
                            }
                          }
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
  function confirm(stdid, type) {
    Swal.fire({
      title: '確認動作',
      text: '確定執行此動作嗎',
      showCancelButton: true,
      confirmButtonText: '確定',
      cancelButtonText: '取消',
    }).then((result) => {
      if (result.isConfirmed) {
        withdrawprocess('adminwithdraw.php', stdid, type);

      } else {
        Swal.fire('已取消');
      }
    });
  }

  function withdrawprocess(url, stdid, type) {
    //提交表單到dormitoryapply.php
    const form = document.createElement("form");
    form.method = "POST";
    form.action = url;

    const optionInput = document.createElement("input");
    optionInput.type = "hidden";
    optionInput.name = "stdid";
    optionInput.value = stdid;

    const optionInput2 = document.createElement("input");
    optionInput2.type = "hidden";
    optionInput2.name = "type";
    optionInput2.value = type;

    form.appendChild(optionInput);
    form.appendChild(optionInput2);
    document.body.appendChild(form);


    form.submit();
  }
</script>