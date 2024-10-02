<?php
session_start();
$conn = include "config.php";
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinStd"]) == null) {
    header("location:index.php");
    exit;
}
$ID = $_SESSION["stdID"];
$sex = $_SESSION["sex"];
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
    <title>宿舍申請</title>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        table {
            border-spacing: 0;
            width: 100%;
        }

        tr {
            text-align: center;
            font-size: 20px;
        }

        th {
            padding: 10px;
            font-size: 20px;
        }

        td {
            padding: 10px;
            word-wrap: break-word;
            max-width: 200px;
        }

        table tbody tr:nth-child(odd) {
            background-color: #eee
        }

        [id="is_title"]:hover {
            background-color: #E22A6F;
            color: white;
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

                        <li class="nav-item dropdown open">
                            <a href="#">
                                <span class="icon-holder">
                                    <i class="lni-apartment"></i>
                                </span>
                                <span class="title">宿舍申請</span>
                            </a>
                        </li>

                  
                        <li class="nav-item dropdown">
                            <a href="MaintainanceReport.php">
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
                                                    <div style="display: flex;">
                                                        <div style="flex-grow: 1; text-align: center; cursor: pointer;" onclick="confirmDormitory()">
                                                            <h2 id="is_title" style="padding:3%;"><i class="lni-apartment"></i>申請宿舍</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="container">
                                                    <div style="display: flex;">
                                                        <div style="flex-grow: 1; text-align: center; cursor: pointer;" onclick="drop()">
                                                            <h2 id="is_title" style="padding:3%;"><i class="lni-eraser"></i>申請退宿</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="container">
                                                    <div style="display: flex;">
                                                        <div style="flex-grow: 1; text-align: center; cursor: pointer;" onclick="changeDor()">
                                                            <h2 id="is_title" style="padding:3%;"><i class="lni-ticket-alt"></i>申請換宿</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-group">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="container">
                                                    <div>
                                                        <?php
                                                        $sql = "SELECT * FROM `apply_record` WHERE `Std_ID`='$ID'";
                                                        $result = mysqli_query($conn, $sql);
                                                        if (mysqli_num_rows($result) != 0) {
                                                        ?>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="table-primary">
                                                                        <th scope="col">申請類別</th>
                                                                        <th scope="col">申請日期</th>
                                                                        <th scope="col">申請學期</th>
                                                                        <th scope="col">申請學年度</th>
                                                                        <th scope="col">申請狀態</th>
                                                                        <th scope="col">申請結果</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        foreach ($result as $row) {
                                                                            if ($row['AR_Type'] === '1') {
                                                                                $type = '宿舍申請';
                                                                            } elseif ($row['AR_Type'] === '2') {
                                                                                $type = '退宿申請';
                                                                            } elseif ($row['AR_Type'] === '3') {
                                                                                $type = '換宿申請';
                                                                            }
                                                                    ?>
                                                                            <tr class="table-secondary">
                                                                                <td><?php echo $type; ?></td>
                                                                                <td><?php echo $row["AR_Date"]; ?></td>
                                                                                <td><?php echo $row["AR_Semester"]; ?></td>
                                                                                <td><?php echo $row["AR_Acdm_Year"]; ?></td>
                                                                                <td><?php echo $row["AR_Status"]; ?></td>
                                                                                <td><?php echo $row["AR_Result"]; ?></td>
                                                                            </tr>
                                                                <?php }
                                                                    }
                                                                } ?>
                                                                </tbody>
                                                            </table>
                                                    </div>
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

<script>
    function showDormitoryOptions() {
        var inputOptions = {};
        if (sex === "男") {
            inputOptions.option1 = '學一(男)';
            inputOptions.option3 = '學二(男)';
            inputOptions.option5 = '綜宿(男)';
        } else {
            inputOptions.option2 = '學一(女)';
            inputOptions.option4 = '學二(女)';
            inputOptions.option6 = '綜宿(女)';

        }

        Swal.fire({
            title: '選擇想要申請的宿舍',
            text: "申請後不可取消(請慎選)",
            input: 'select',
            inputOptions: inputOptions,
            inputPlaceholder: '請選擇',
            showCancelButton: true,
            confirmButtonText: '確定',
            cancelButtonText: '取消',
        }).then((result) => {
            if (result.isConfirmed) {

                const selectedOption = result.value;

                switch (selectedOption) {
                    case "option1":

                        handleDormitoryApply("DormitoryApply.php", "1");

                        break;
                    case 'option2':

                        handleDormitoryApply("DormitoryApply.php", "2");
                        break;
                    case 'option3':

                        handleDormitoryApply("DormitoryApply.php", "3");
                        break;
                    case 'option4':

                        handleDormitoryApply("DormitoryApply.php", "4");
                        break;
                    case 'option5':

                        handleDormitoryApply("DormitoryApply.php", "5");
                        break;
                    case 'option6':
                        handleDormitoryApply("DormitoryApply.php", "6");
                        break;
                    default:

                        break;
                }

            } else {
                Swal.fire('已取消');
            }
        });
    }
</script>


<script>
    function changeDor() {

        Swal.fire({
            title: '更換寢室',
            text: "申請後不可取消(請慎選)",
            input: 'text',
            inputPlaceholder: '請輸入欲更換之房號',
            showCancelButton: true,
            confirmButtonText: '確定',
            cancelButtonText: '取消',
        }).then((result) => {
            if (result.isConfirmed) {
                const inputValue = result.value;
                if (inputValue) {
                    // 
                    changeProcess('ChangeProcess.php',inputValue);
                } else {
                    Swal.fire('請輸入有效值');
                }



            } else {
                Swal.fire('已取消');
            }
        });
    }
</script>

<script>
    var sex = "<?php echo $sex; ?>";

    function confirmDormitory() {
        swal({
            title: "注意事項",
            text: "宿舍床位申請上網登錄程序\n一、請務必先啟用高雄大學帳號。\n二、詳閱高雄大學 【112學年度新生學生宿舍申請說明】，上網登錄，完成申請程序。\n三、參考【各類房型房價及床位抽籤代碼表】選填志願。\n四、學生宿舍各類房型設施請參閱宿舍管理官網。\n五、優先住宿資格及更換戶籍學生請另通知系統管理員。",
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((confirmValue) => {
            if (confirmValue) {
                showDormitoryOptions();
            } else {
                swal('已取消！');
            }
        });
    }



    function handleDormitoryApply(url, option) {
        //提交表單到dormitoryapply.php
        const form = document.createElement("form");
        form.method = "POST";
        form.action = url;

        const optionInput = document.createElement("input");
        optionInput.type = "hidden";
        optionInput.name = "option";
        optionInput.value = option;

        form.appendChild(optionInput);
        document.body.appendChild(form);


        form.submit();
    }

    function changeProcess(url, option) {
        //提交表單到changeProcess.php
        const form = document.createElement("form");
        form.method = "POST";
        form.action = url;

        const optionInput = document.createElement("input");
        optionInput.type = "hidden";
        optionInput.name = "option";
        optionInput.value = option;

        form.appendChild(optionInput);
        document.body.appendChild(form);


        form.submit();
    }



    function drop() {

        Swal.fire({
            icon: 'warning',
            title: '警告',
            text: '確定要申請退宿嗎',
            showCancelButton: true,
            showConfirmButton: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "Withdraw.php?confirm=1";
            } else if (result.isDismissed) {
                Swal.fire({
                    icon: 'info',
                    title: '已取消',
                    text: '您已取消退宿申請',
                    showCancelButton: false,
                    showConfirmButton: false,
                });
            }
        });
    }
</script>

</html>