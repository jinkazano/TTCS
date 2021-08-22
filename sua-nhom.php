<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thực tập cơ sở</title>
    <?php require_once('filecss.php') ?>
</head>
<body>
    <div class="container-fluid">
        <?php require_once('logo.php'); ?>
        <div class="main">
            <div id="wrapper">
                <div id="sidebar">
                    <?php require_once('menu_left.php'); ?>
                </div>
                <div id="content-wrapper" class="d-flex flex-column p-5">
                    <div class="status">
                        <div class="card">
                            <div class="card-header text-right">
                                <?php require_once('home_page.php') ?>
                            </div>
                            <div class="card-body">
                                <h3 class="text-uppercase text-center">Chỉnh sửa nhóm</h3>
                                <?php 
                                if (isset($_GET['stt'])) {
                                    $stt = $_GET['stt'];
                                    $sql1 = "select * from groupsv where id='$stt'";
                                    $check = mysqli_query($con,$sql1);
                                    $row1 = mysqli_fetch_row($check);
                                    if (isset($_POST['edit'])) {
                                        if ($row1['1']!=$username) {
                                            echo "Bạn không có quyền chỉnh sửa </br>"; 
                                            echo "Bấm vào ";?>
                                            <a href="danh-sach-nhom.php">đây</a>
                                            <?php
                                            echo " để trở về danh sách nhóm.";                   
                                        }else{
                                            $sv1 = $_POST['sv1'];
                                            $sv2 = $_POST['sv2'];
                                            $sv3 = $_POST['sv3'];
                                            $sql2 = "update groupsv set idsv1 = '$sv1', idsv2 = '$sv2', idsv3='$sv3' where id = '$stt'";
                                            $check2 = mysqli_query($con,$sql2);
                                            echo "Cập nhật thành công </br>";
                                            echo "Bấm vào ";?>
                                            <a href="danh-sach-nhom.php">đây</a>
                                            <?php
                                            echo " để trở về danh sách nhóm.";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <label>Nhóm trưởng:</label>
                                    <input type="text" name="sv1" class="form-control">
                                    <label>Thành viên thứ 2:</label>
                                    <input type="text" name="sv2" class="form-control">
                                    <label>Thành viên thứ 3:</label>
                                    <input type="text" name="sv3" class="form-control">
                                    <input class="mt-3 btn btn-success" type="submit" name="edit" value="Cập nhật" style="display: block; margin: auto;">
                                </form>
                            </div> 
                            <div class="card-footer">
                                <?php require_once('inf_footer.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('filejs.php') ?>
</body>
</html>