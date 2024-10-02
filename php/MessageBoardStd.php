<?php
session_start();
$username = $_SESSION["Username"];
$std_id = $_SESSION["stdID"];
if (isset($_SESSION["loggedinStd"]) == null) {
    header("location:index.php");
    exit;
}
include("config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <!--留言板用-->
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
    <title>留言板</title>

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
        .button-link {
            background: none;
            border: none;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .flip {
            cursor: pointer;
        }

        .panel {
            display: none;
            background-color: #f3f4f4;
        }

        [id="choose_msg"]:hover {
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

                        <li class="nav-item dropdown open">
                            <a href="#">
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
                                                <div class="col-12">
                                                    <form action="MessageBoardMethod.php" method="POST">
                                                        <div class="input-group">
                                                            <input type="hidden" name="method" value="add">
                                                            <input type="hidden" name="who" value="std">
                                                            <input class="form-control" style="font-family:Microsoft JhengHei; font-size:15px;text-align:left;" type="text" name="msg" placeholder="請輸入訊息" autocomplete="off" maxlength="200" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-common" style="font-size:15px;">送出</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <hr style="margin-bottom:0;">

                                                    <div style="display: flex;">
                                                        <div style="flex-grow: 1; text-align: center; cursor: pointer;" onclick="show(0)">
                                                            <h2 id="choose_msg" style="padding:1%;">所有留言</h2>
                                                        </div>
                                                        <div style="flex-grow: 1; text-align: center; cursor: pointer;" onclick="show(1)">
                                                            <h2 id="choose_msg" style="padding:1%;">我的留言</h2>
                                                        </div>
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

<script>
    window.onload = show(0);

    // 獲取資料
    function get_data(msg_arr, reply_arr) {
        <?php
        $msg_fetch = "SELECT * FROM `message_board` ORDER BY `MB_No` desc";
        $msg_result = mysqli_query($link, $msg_fetch);

        while ($row = mysqli_fetch_array($msg_result)) {
            $id_fetch = "SELECT * FROM `std_use_mb` WHERE `MB_No` = '$row[0]'";
            $id_result = mysqli_query($link, $id_fetch);
            // 學生的留言
            if (mysqli_num_rows($id_result) >= 1) {
                $id = mysqli_fetch_assoc($id_result)["Std_ID"];
                $msg = htmlspecialchars($row[1], ENT_QUOTES);
                echo "msg_arr.push(['$row[2]', '$row[3]', '$msg', '$row[0]', '$id']);"; //姓名,日期,留言,No,學號           
                //舍監的留言
            } else {
                $id_fetch = "SELECT * FROM `spv_use_mb` WHERE `MB_No` = '$row[0]'";
                $id_result = mysqli_query($link, $id_fetch);
                $id = mysqli_fetch_assoc($id_result)["Supervisor_ID"];
                $msg = htmlspecialchars($row[1], ENT_QUOTES);
                echo "msg_arr.push(['$row[2]', '$row[3]', '$msg', '$row[0]', '$id']);"; //姓名,日期,留言,No,身分證字號             
            }
        }
        // 回覆
        $reply_fetch = "SELECT * FROM `reply_message`";
        $reply_result = mysqli_query($link, $reply_fetch);
        while ($row = mysqli_fetch_array($reply_result)) {
            $reply = htmlspecialchars($row[1], ENT_QUOTES);
            echo "reply_arr.push(['$row[2]', '$reply', '$row[3]', '$row[0]', '$row[5]', '$row[4]']);"; //姓名,回覆,日期,replyNo,msgNo,ID
        }
        ?>
    }

    // 顯示留言 page 0:所有 / page 1:個人
    function show(page) {
        var msg_arr = [];
        var reply_arr = [];
        var msg_count = 0;
        var reply_count = 0;
        var del_count = 0;
        var flip_count = 0;
        get_data(msg_arr, reply_arr);
        var str = ``;
        str += `<div id="detail">`;
        for (var i of msg_arr) {
            if (page == 0) { // 所有
                str += `<hr style="margin-top:0px;">`;
                var time = calculate_time(i[1]);
                str += `<font color="blue" size="3">${i[0]}</font><br><font color="gray" size="2">${time}</font>`;
                var msg_id = "msg" + String(msg_count);
                str += `<span id="${msg_id}">`;
                // 自己的留言顯示編輯按鈕
                var std_id = ``;
                <?php echo "std_id = '$std_id';"; ?>
                if (i[4] == std_id) {
                    // 下拉式選單
                    str += `<div class="dropdown" style="float: right; margin-top:-3%;">`;
                    str += `<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">編輯</button>`;
                    str += `<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">`;
                    // 修改
                    str += `<li>`;
                    str += `<button style="color: black; text-decoration: none;" class="dropdown-item button-link" onclick="update_msg(${page}, ${String(msg_count)}, ${String(del_count)}, '${i[3]}')"><i class="lni-cog"> 修改</i></button>`;
                    str += `</li>`;
                    // 刪除
                    var del_id = "del" + String(del_count);
                    str += `<li>`;
                    str += `<form id="${del_id}" action="MessageBoardMethod.php" method="POST">`;
                    str += `<input type="hidden" name="who" value="std">`;
                    str += `<input type="hidden" name="method" value="delete">`;
                    str += `<input type="hidden" name="No" value="${i[3]}">`;
                    str += `</form>`;
                    str += `<button id="delete" style="color: black; text-decoration: none;" value="${del_id}" class="dropdown-item button-link"><i class="lni-trash"> 刪除</i></button>`;
                    str += `</li>`;
                    str += `</ul>`;
                    str += `</div>`;
                }
            } else { // 個人
                var std_id = ``;
                <?php echo "std_id = '$std_id';"; ?>
                if (i[4] != std_id)
                    continue;
                str += `<hr style="margin-top:0px;">`;
                var time = calculate_time(i[1]);
                str += `<font color="blue" size="3">${i[0]}</font><br><font color="gray" size="2">${time}</font>`;
                var msg_id = "msg" + String(msg_count);
                str += `<span id="${msg_id}">`;
                // 下拉式選單
                str += `<div class="dropdown" style="float: right; margin-top:-3%;">`;
                str += `<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">編輯</button>`;
                str += `<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">`;
                // 修改
                str += `<li>`;
                str += `<button style="color: black; text-decoration: none;" class="dropdown-item button-link" onclick="update_msg(${page}, ${String(msg_count)}, ${String(del_count)}, '${i[3]}')"><i class="lni-cog"> 修改</i></button>`;
                str += `</li>`;
                // 刪除
                var del_id = "del" + String(del_count);
                str += `<li>`;
                str += `<form id="${del_id}" action="MessageBoardMethod.php" method="POST">`;
                str += `<input type="hidden" name="who" value="std">`;
                str += `<input type="hidden" name="method" value="delete">`;
                str += `<input type="hidden" name="No" value="${i[3]}">`;
                str += `</form>`;
                str += `<button id="delete" style="color: black; text-decoration: none;" value="${del_id}" class="dropdown-item button-link"><i class="lni-trash"> 刪除</i></button>`;
                str += `</li>`;
                str += `</ul>`;
                str += `</div>`;
            }
            str += `<br><br><font size="4">${i[2]}</font><br><br>`;
            str += `</span><div style="background-color:#f3f4f4;">`;
            msg_count++;
            del_count++;
            // 計算回覆量
            var a = 0;
            for (var j of reply_arr) {
                if (j[4] == i[3])
                    a++;
            }
            // 展開收合
            if (a > 2) {
                var flip_id = "flip" + String(flip_count);
                str += `<div id="${flip_id}" class="flip" value=${a - 2}>▼ 還有${a - 2}則回覆</div>`;
                str += `<div class="panel">`;
            }
            var counter = a;
            for (var j of reply_arr) {
                if (j[4] == i[3]) {
                    counter--;
                    // 自己的回覆顯示功能鍵
                    var reply_id = "reply" + String(reply_count);
                    var time = calculate_time(j[2]);
                    var del_id = "del" + String(del_count);
                    if (j[5] == std_id) {
                        str += `<font color="blue">${j[0]}</font>&nbsp&nbsp&nbsp&nbsp`;
                        str += `<span id="${reply_id}">${j[1]}`;
                        str += `<br>${time}`
                        str += `<button class="button-link" onclick="update_reply(${page}, ${String(reply_count)}, ${String(del_count)}, '${j[3]}')">修改</button>`;
                        str += `<button class="button-link" id="delete" value="${del_id}">刪除</button>`;
                        str += `<form id="${del_id}" action="ReplyMessage.php" method="POST">`;
                        str += `<input type="hidden" name="who" value="std">`;
                        str += `<input type="hidden" name="method" value="delete">`;
                        str += `<input type="hidden" name="No" value="${j[3]}">`;
                        str += `</form>`;
                        str += `</span>`;
                    } else {
                        str += `<font color="blue">${j[0]}</font>&nbsp&nbsp&nbsp&nbsp`;
                        str += `<span id="${reply_id}">${j[1]}</span>`;
                        str += `<br>${time}<br>`
                    }
                    if (counter == 2)
                        str += `</div>`;
                    reply_count++;
                    del_count++;
                }
            }
            if (a > 2)
                flip_count++;
            // 回覆欄
            str += `<form action="ReplyMessage.php" method="POST">`;
            str += `<input type="hidden" name="who" value="std">`;
            str += `<input type="hidden" name="method" value="add">`;
            str += `<input type="hidden" name="No" value="${i[3]}">`;
            str += `<br>&nbsp<input type="text" name="reply" placeholder="回覆..." autocomplete="off" maxlength="200" required style="margin-bottom:20px;">`;
            str += `<button hidden="hidden">送出</button>`;
            str += `</form></div>`;
        }
        str += `</div>`;

        $('#detail').replaceWith(str);
    }

    // 回覆展開收合
    $(document).on('click', '.flip', function() {
        $(this).next().slideToggle("slow");
        let value = $(this).attr('value');
        if ($(this).text() == "▲ 收合回覆")
            $(this).text("▼ 還有" + value + "則回覆");
        else
            $(this).text("▲ 收合回覆");
    });

    // 避免同時2個修改出現
    var update_now = ``;
    var original_str = ``;

    // 修改留言 [分頁,留言id,刪除id,日期,留言,No]
    function update_msg(page, Mid, Did, No) {
        if (update_now.length != 0) {
            $(update_now).replaceWith(original_str);
            original_str = ``;
        }
        var arr = [];
        <?php
        $msg_fetch = "SELECT * FROM `message_board` ORDER BY `MB_No` desc";
        $msg_result = mysqli_query($link, $msg_fetch);
        while ($row = mysqli_fetch_array($msg_result)) {
            $msg = htmlspecialchars($row[1], ENT_QUOTES);
            echo "arr.push(['$msg', '$row[0]']);"; // [留言,No]
        }
        ?>
        // 抓出對應的留言
        var msg = [];
        for (var i of arr)
            if (i[1] == No)
                msg.push(i[0], i[1]); // [留言, replyNo]

        var msg_id = "msg" + Mid;
        var del_id = "del" + Did;
        //=========================存取被替代的字串=========================
        original_str += `<span id="${msg_id}">`;
        original_str += `<div class="dropdown" style="float: right; margin-top:-3%;">`;
        original_str += `<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">編輯</button>`;
        original_str += `<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">`;
        original_str += `<li>`;
        original_str += `<button style="color: black; text-decoration: none;" class="dropdown-item button-link" onclick="update_msg(${page}, ${Mid}, ${Did}, '${msg[1]}')"><i class="lni-cog"> 修改</i></button>`;
        original_str += `</li>`;
        original_str += `<li>`;
        original_str += `<form id="${del_id}" action="MessageBoardMethod.php" method="POST">`;
        original_str += `<input type="hidden" name="who" value="std">`;
        original_str += `<input type="hidden" name="method" value="delete">`;
        original_str += `<input type="hidden" name="No" value="${msg[1]}">`;
        original_str += `</form>`;
        original_str += `<button id="delete" style="color: black; text-decoration: none;" value="${del_id}" class="dropdown-item button-link"><i class="lni-trash"> 刪除</i></button>`;
        original_str += `</li>`;
        original_str += `</ul>`;
        original_str += `</div>`;
        original_str += `<br><br><font size="4">${msg[0]}</font><br><br>`;
        original_str += `</span>`;
        //=========================新的字串=========================
        msg[0] = msg[0].replaceAll('"', '&quot;'); //轉換雙引號
        var str = ``;
        str += `<span id="${msg_id}">`;
        str += `<br><br>`;
        str += `<form id="update" action="MessageBoardMethod.php" method="POST">`;
        str += `<input type="hidden" name="who" value="std">`;
        str += `<input type="hidden" name="method" value="update">`;
        str += `<input type="hidden" name="No" value="${msg[1]}">`;
        str += `<input type="text" id="text_input" name="msg" value="${msg[0]}" oninput="setCustomValidity('');" placeholder="請輸入訊息" autocomplete="off" maxlength="200">&nbsp`;
        str += `<button hidden="hidden" onclick="detect()">完成</button>`
        str += `<button class="btn btn-secondary mt-3" style="margin-bottom:10px;" onclick="show(${page})">取消</button>&nbsp`;
        str += `<button class="btn btn-common mt-3" style="margin-bottom:10px;" onclick="detect()">完成</button>`;
        str += `</form>`;
        str += `<br>`;
        str += `</span>`;

        msg_id = "#" + msg_id;
        update_now = msg_id;

        $(msg_id).replaceWith(str);
    }

    // 修改回覆 [分頁,回覆id,刪除id,No]
    function update_reply(page, Rid, Did, No) {
        if (update_now.length != 0) {
            $(update_now).replaceWith(original_str);
            original_str = ``;
        }
        var arr = [];
        <?php
        $reply_fetch = "SELECT * FROM `reply_message`";
        $reply_result = mysqli_query($link, $reply_fetch);
        while ($row = mysqli_fetch_array($reply_result)) {
            $reply = htmlspecialchars($row[1], ENT_QUOTES);
            echo "arr.push(['$reply', '$row[3]', '$row[0]']);"; // [回覆,日期,No]
        }
        ?>
        // 抓出對應的回覆
        var reply = [];
        for (var i of arr)
            if (i[2] == No)
                reply.push(i[0], i[1], i[2]); // [回覆,日期,No]

        var reply_id = "reply" + Rid;
        var del_id = "del" + Did;
        //=========================存取被替代的字串=========================
        var time = calculate_time(reply[1]);
        original_str += `<span id="${reply_id}">${reply[0]}<br>${time}`;
        original_str += `<button class="button-link" onclick="update_reply(${page}, ${Rid}, ${Did}, '${reply[2]}')">修改</button>`;
        original_str += `<button id="delete" class="button-link" value="${del_id}">刪除</button>`;
        original_str += `<form id="${del_id}" action="ReplyMessage.php" method="POST">`;
        original_str += `<input type="hidden" name="who" value="std">`;
        original_str += `<input type="hidden" name="method" value="delete">`;
        original_str += `<input type="hidden" name="No" value="${reply[2]}">`;
        original_str += `</form>`;
        original_str += `</span>`;
        //=========================新的字串=========================
        reply[0] = reply[0].replaceAll('"', '&quot;'); //轉換雙引號
        var str = ``;
        str += `<span id="${reply_id}">`;
        str += `<form id="update" action="ReplyMessage.php" method="POST">`;
        str += `<input type="hidden" name="who" value="std">`;
        str += `<input type="hidden" name="method" value="update">`;
        str += `<input type="hidden" name="No" value="${reply[2]}">`;
        str += `<input type="text" id="text_input" name="reply" value="${reply[0]}" oninput="setCustomValidity('');" placeholder="回覆..." autocomplete="off" maxlength="200">&nbsp`;
        str += `<button hidden="hidden" onclick="detect()">完成</button>`
        str += `<button class="btn btn-secondary mt-3" style="margin-bottom:10px;" onclick="show(${page})">取消</button>&nbsp`;
        str += `<button class="btn btn-common mt-3" style="margin-bottom:10px;" onclick="detect()">完成</button>`;
        str += `</form>`;
        str += `</span>`;

        reply_id = "#" + reply_id;
        update_now = reply_id;

        $(reply_id).replaceWith(str);
    }

    // 偵測修改留言或留言是否為空值
    function detect() {
        if ($("#text_input").val() == "") {
            text_input.setCustomValidity("請填寫這個欄位。");
            text_input.reportValidity();
        } else
            document.getElementById('update').submit()
    }

    // 時間差計算
    function calculate_time(time) {
        var new_date = new Date();
        var old_date = new Date(time);

        var str = ``;
        if (parseInt(new_date - old_date) / 1000 < 60) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000)) + "秒前";
            return str;
        } else if (parseInt(new_date - old_date) / 1000 / 60 < 60) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60)) + "分鐘前";
            return str;
        } else if (parseInt(new_date - old_date) / 1000 / 60 / 60 < 24) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60 / 60)) + "小時前";
            return str;
        } else if (parseInt(new_date - old_date) / 1000 / 60 / 60 / 24 < 365) {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60 / 60 / 24)) + "天前";
            return str;
        } else {
            str = String(Math.floor(parseInt(new_date - old_date) / 1000 / 60 / 60 / 24 / 365)) + "年前";
            return str;
        }
    }

    //刪除二次確認
    $(document).on('click', '#delete', function() {
        var id = String($(this).attr('value'));
        Swal.fire({
            title: "確定要刪除嗎？",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancel",
            confirmButtonText: "OK",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed)
                document.getElementById(id).submit();
            else {
                Swal.fire('已取消');
            }
        });
    });
</script>