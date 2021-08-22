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
                                <h3 class="text-center">Danh sách thành viên</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tài khoản</th>
                                                <th>Mật khẩu</th>
                                                <th>Họ và Tên</th>
                                                <th>Số điện thoại</th>
                                                <th>Email</th>
                                                <th>Chức vụ</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $check2=mysqli_query($con,"select * from user");
                                            while ($row1=mysqli_fetch_row($check2)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row1[0] ?></td>
                                                    <td><?php echo $row1[1] ?></td>
                                                    <td><?php echo $row1[2] ?></td>
                                                    <td><?php echo $row1[3] ?></td>
                                                    <td><?php echo $row1[4] ?></td>
                                                    <td><?php echo $row1[5] ?></td>
                                                    <td><?php echo $row1[6] ?></td>
                                                    <td>
                                                        <a class="mb-2 btn btn-primary" href="sua_user.php?stt=<?php echo $row1[0] ?>">Sửa</a>
                                                        <a class="btn btn-danger" href="xoa_user.php?stt=<?php echo $row1[0] ?>">Xóa</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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