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
                                <?php 
                                if (isset($_GET['stt'])) {
                                    $stt = $_GET['stt'];
                                    $rowq = mysqli_fetch_row(mysqli_query($con,"select * from user where id='$stt' "));
                                }
                                ?>
                                <h3 class="text-center text-uppercase">Sửa thông tin tài khoản</h3>
                                <form action="" method="post">
                                    <label for="">Tên đăng nhập:</label>
                                    <input type="text" class="form-control" name="username1" value="<?php echo $rowq[1] ?>">
                                    <label for="">Mật khẩu:</label>
                                    <input type="password" class="form-control" name="password" value="<?php echo $rowq[2] ?>">
                                    <label for="">Họ và tên:</label>
                                    <input type="text" class="form-control" name="fullname" value="<?php echo $rowq[3] ?>">
                                    <label for="">Số điện thoại:</label>
                                    <input type="number" class="form-control" name="phone" value="<?php echo $rowq[4] ?>">
                                    <label for="">Email:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $rowq[5] ?>">
                                    <label for="">Phân quyền:</label>
                                    <select class="form-control" name="permission">
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Giáo viên</option>
                                        <option value="student">Sinh viên</option>
                                    </select>
                                    <div class="chucnang mt-3">
                                        <button type="submit" class=" m-2 btn btn-success" name="edit"><i class="far fa-edit"></i> Cập nhật</button>
                                        <button type="submit" class="m-2 btn btn-danger" name="reset"><i class="fas fa-sync-alt"></i> Nhập lại</button>
                                    </div>
                                    <?php
                                    if (isset($_POST['edit'])) {
                                        include 'lib/connect.php';
                                        $username1 = $_POST['username1'];
                                        $password = $_POST['password'];
                                        $password = md5($password);
                                        $fullname = $_POST['fullname'];
                                        $phone = $_POST['phone'];
                                        $email = $_POST['email'];
                                        $permission = $_POST['permission'];
                                        $sql1 = "UPDATE user SET user.username='$username1',user.fullname='$fullname',user.password='$password',user.phone = '$phone',user.email='$email',user.permission='$permission' WHERE user.id='$stt'";
                                        $check = mysqli_query($con, $sql1);
                                        if ($check) {
                                            echo "Cập nhật thông tin thành công.";
                                        } else {
                                            echo "Cập nhật thông tin thất bại.";
                                        }
                                    }
                                    ?>
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