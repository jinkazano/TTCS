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
    <?php require_once('filejs.php') ?>
</head>

<body>
   
    <div class="container-fluid">
        <?php require_once('logo.php'); ?>
        <div class="main">
            <div id="wrapper">
                <div class="sidebar bg-gradient-primary">
                    <?php require_once('menu_left.php'); ?>
                </div>
                <div id="content-wrapper" class="d-flex flex-column p-5">
                    <div class="status">
                        <div class="card">
                            <div class="card-header text-right">
                                <?php require_once('home_page.php') ?>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center text-uppercase">Đăng kí tài khoản</h3>
                                <?php
                                if (isset($_POST['register'])) {
                                    include 'lib/connect.php';
                                    $username1 = $_POST['username1'];
                                    $password = $_POST['password'];
                                    $password = md5($password);
                                    $fullname = $_POST['fullname'];
                                    $phone = $_POST['phone'];
                                    $email = $_POST['email'];
                                    $permission = $_POST['permission'];
                                    $slot=$_POST['slot'];
                                    $check_distinct=mysqli_query($con,"SELECT * from user where username='$username1' or email='$email'");
                                    $check_distinct_index =mysqli_fetch_row($check_distinct);
                                    
                                    if($check_distinct_index!=null ){
                                        alert("User hoặc email đã tồn tại");
                                        

                                    }
                                    
                                    else {
                                        $sql1 = "INSERT into user(username,password,fullname,phone,email,permission)values ('$username1','$password','$fullname','$phone','$email','$permission')";
                                    if($permission=='teacher') {
                                        $check = mysqli_query($con, $sql1);
                                        $add_slot=mysqli_query($con,"INSERT into dkgiaovien(teacher,slot) values ('$fullname','$slot')");
                                        $teacher_user=mysqli_fetch_array(mysqli_query($con,"SELECT * from user where username='$username1'"));
                                        $id_update=mysqli_query($con,"UPDATE dkgiaovien set id='$teacher_user[0]'where teacher='teacher_user[3]' ");
                                        

                                    }

                                
                            
                                    else {
                                        $check = mysqli_query($con, $sql1);
                                    }
                                    
                                    }



                                    
                                    if (isset($check)) {
                                        alert("Đăng kí thành công!!!");
                                          replace("register.php");
                                    } else {
                                        alert("Đăng kí thất bại.") ;
                                          replace("register.php");
                                    }
                                }
                            
                                ?>
                                <form action="" method="post" role="form" data-parsley-validate>
                                    <label for="">Tên đăng nhập:</label>
                                    <input type="text" class="form-control" name="username1" required data-parsley-length="[1,20]">
                                    <label for="">Mật khẩu:</label>
                                    <input type="password" class="form-control" name="password" required data-parsley-length="[1,20]" data-parsley-pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                                    <label for="">Họ và tên:</label>
                                    <input type="text" class="form-control" name="fullname" required data-parsley-length="[1,30]">
                                    <label for="">Số điện thoại:</label>
                                    <input type="number" class="form-control" name="phone" required data-parsley-length="[3,13]">
                                    <label for="">Email:</label>
                                    <input type="email" class="form-control" name="email" required data-parsley-type="email" data-parsley-maxlength="50">
                                    <label for="">Phân quyền:</label>
                                    <select id="permission"class="form-control" name="permission" >
                                        
                                        <option value="teacher" name="teacher">Giáo viên</option>
                                        <option value="student" name="student">Sinh viên</option>
                                        <option value="admin" name="admin">Admin</option>
                                    </select>
                                    <div id="hidden_div"   >
                                        <label for="">Số nhóm hướng dẫn:</label>
                                        <input type="number" id="slot" class="form-control" name="slot" value="1" required data-parsley-length="[1,2]" data-parsley-min="1">
                                    </div>
                                    

                                    <div class="chucnang mt-3">
                                        <button type="submit" class=" m-2 btn btn-success" name="register"><i class="far fa-edit"></i> Đăng kí</button>
                                        <button type="reset" class="m-2 btn btn-danger" name="reset"><i class="fas fa-sync-alt"></i> Nhập lại</button>
                                    </div>
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

