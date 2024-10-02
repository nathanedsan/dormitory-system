<?php
session_start();
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinStd"]) == null) {
    header("location:index.php");
    exit;
}
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

                        <li class="nav-item dropdown open">
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

<?php
$msg_fetch = "SELECT * FROM `announce_message` ORDER BY `AM_Date` desc , `AM_No` desc";
$msg_result = mysqli_query($link, $msg_fetch);
?>

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