<?php
$conn = include "config.php";
session_start();
$admin = $_SESSION['AdminID'];
?>
<!DOCTYPE html>

<head>
    <title>管理申請紀錄</title>
    <link rel="stylesheet" href="/Dormitory/css/style.css" />
    <!-- 新 Bootstrap5 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">


    <!-- 最新的 Bootstrap5 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <script>
        function showTable(tableId) {
            // 隐藏所有表格
            var tables = document.getElementsByClassName("my-table");
            for (var i = 0; i < tables.length; i++) {
                tables[i].style.display = "none";
            }

            //顯示指定表格
            var table = document.getElementById(tableId);
            table.style.display = "block";
        }
    </script>
    <button id="button1" onclick="showTable('table1')">退宿申請</button>
    <button onclick="showTable('table2')">換宿申請</button>
    <table id="table1" class="my-table" style="display: none;">
        <!-- 表格1的内容 -->
        <?php
        $sql = "SELECT * FROM `apply_record` WHERE `AR_Type`='2' and `AR_Status`='受理中';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
        ?>
            <thead>
                <tr class="table-primary">
                    <th scope="col">申請人</th>
                    <th scope="col">申請類別</th>
                    <th scope="col">申請日期</th>
                    <th scope="col">申請學期</th>
                    <th scope="col">申請學年度</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) {

                ?>

                        <tr>
                            <td><?php echo $row["Std_ID"]; ?></td>
                            <td>退宿申請</td>
                            <td><?php echo $row["AR_Date"]; ?></td>
                            <td><?php echo $row["AR_Semester"]; ?></td>
                            <td><?php echo $row["AR_Acdm_Year"]; ?></td>
                            <td>
                                <button onclick="handleClick()">通過</button>
                            </td>
                        </tr>
            </tbody>
<?php }
                }
            }
?>

    </table>
    <script>
        function handleClick() {
            // 处理按钮点击事件
            Swal.fire({
                title: '確認操作',
                text: '你確定要執行此操作？',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '是的',
                cancelButtonText: '取消',
            }).then((result) => {
                if (result.isConfirmed) {
                    sessionStorage.setItem('activeButton', "button1");
                    location.reload();
                }
            });
        }
    </script>

    <script>
        window.onload = function() {
            const activeButton = sessionStorage.getItem('activeButton');
            if (activeButton === 'button1') {
                const button1 = document.getElementById('button1');
                if (button1) {
                    button1.classList.add('active');
                }
            }
        };
    </script>

    <table id="table2" class="my-table" style="display: none;">
        <!-- 表格2的内容 -->
        <thead>
            <tr class="table-primary">
                <th scope="col">申請人</th>
                <th scope="col">申請類別</th>
                <th scope="col">申請日期</th>
                <th scope="col">申請學期</th>
                <th scope="col">申請學年度</th>
            </tr>
        </thead>
        <tr>
            <td>表格2的第一行</td>
        </tr>
    </table>




</body>