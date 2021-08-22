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
        <div class="main" >
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
                                <h3 class="text-uppercase text-center">Danh sách nhóm đã đăng kí</h3>
                                <form action="" method="post">
                                    <div class="inline">
                                        <input type="text" class="form-control" placeholder="Nhập mã sinh viên cần tìm">
                                        <button type="submit" name="search" class="ml-2 btn btn-primary">Tìm kiếm</button>
                                    </div>
                                    <table class="colspan table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th colspan="3">Danh sách thành viên</th>
                                                <th rowspan="2">Thao tác</th>
                                            </tr>
                                            <tr>
                                                <th>Nhóm trưởng</th>

                                                <th>Thành viên 1</th>

                                                <th>Thành viên 2</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'lib/connect.php';
                                            if (isset($_POST['search'])) {
                                                $name = $_POST['searchname'];
                                                $sql1 = "select * from groupsv where idsv1='$name' or idsv2='$name' or idsv3='$name' ";
                                            } else {
                                                $sql1 = "select * from groupsv ";
                                            }
                                            $check=mysqli_query($con,$sql1);
                                            while ($row = mysqli_fetch_row($check)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['0']; ?></td>
                                                    <td><?php echo $row['1']; ?></td>
                                                    <td><?php echo $row['2']; ?></td>
                                                    <td><?php echo $row['3']; ?></td>

                                                    <td class="text-center">
                                                        <a class="btn btn-primary" href="sua-nhom.php?stt=<?php echo $row['0'] ?>">Sửa</a>
                                                        <a class="btn btn-danger" href="xoa_nhom.php?stt=<?php echo $row['0'] ?>">Xóa</a>
                                                    </td>
                                                    
                                                </tr>

                                                <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
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