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
                                <h3 class="text-center text-uppercase">Đăng kí nhóm</h3>
                                <form action="" method="post">
                                    <label for="">Nhóm trưởng:</label>
                                    <input type="text" class="form-control" name="sv1" required="">
                                    <label for="">Thành viên thứ 2:</label >
                                    <input type="text" class="form-control" name="sv2">
                                    <label for="">Thành viên thứ 3:</label>
                                    <input type="text" class="form-control" name="sv3">
                                    <div class="chucnang mt-3">
                                        <button class=" m-2 btn btn-success" name="dangky"><i class="far fa-edit"></i> Đăng kí</button>
                                        <button class="m-2 btn btn-danger" name="reset"><i class="fas fa-sync-alt"></i> Nhập lại</button>
                                    </div>
                                    <?php 
                                    if (isset($_POST['dangky'])) {
                                        # code...
                                        $sv1 = $_POST['sv1'];
                                        $sv2 = $_POST['sv2'];
                                        $sv3 = $_POST['sv3'];
                                        $check=0;

                                        $checksv1=mysqli_fetch_row(mysqli_query($con,"select id from groupsv where idsv1='$sv1' or idsv2='$sv1' or idsv3='$sv1'"));
                                        if ($checksv1!=null) {
                                            $check=1;
                                            alert( "User ".$sv1." đã đăng ký nhóm ");
                                        }
                                        if ($sv2=='') {
                                            $checksv2=true;
                                        }else{
                                            $checksv2 = mysqli_fetch_row(mysqli_query($con,"select id from groupsv where idsv1='$sv2' or idsv2='$sv2' or idsv3='$sv2'"));
                                            if ($checksv2!=null) {
                                                $check = 2;
                                                alert( "User ".$sv2." đã đăng ký nhóm ");
                                            }
                                        }
                                        if ($sv3=='') {
                                            $checksv3=true;
                                        }else{
                                            $checksv3 = mysqli_fetch_row(mysqli_query($con,"select id from groupsv where idsv1='$sv3' or idsv2='$sv3' or idsv3='$sv3'"));
                                            if ($checksv3!=null) {
                                                $check = 3;
                                                alert("User ".$sv3." đã đăng ký nhóm ");
                                            }
                                        }
                                        
                                         $check_exist = 0;
                                        // if((mysqli_query($con,"SELECT id * from user where username='$sv1'")==null)&&($sv1!=null))
                                        // {
                                        // 	$check_exist++;
                                        // 	alert("User ".$sv1." không tồn tại");

                                        	
                                        // }
                                        // if((mysqli_query($con,"SELECT id * from user where username='$sv2'")==null)&&($sv2!=null))
                                        // {
                                        // 	$check_exist++;
                                        // 	alert("User ".$sv2." không tồn tại");
                                        // }
                                        // if((mysqli_query($con,"SELECT id * from user where username='$sv3'")==null)&&($sv3!=null))
                                        // {
                                        // 	$check_exist++;
                                        // 	alert("User ".$sv3." không tồn tại");
                                        // }

                                        if (($check==0)&&($check_exist==0)) {
                                            $sql =  mysqli_query($con,"Insert into groupsv(leader,idsv1,idsv2,idsv3) values('$sv1','$sv1','$sv2','$sv3') ");
                                            if ($sql) {
                                                # code...
                                                alert( "Đăng ký thành công");
                                            }else alert( "Đăng ký thất bại");
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