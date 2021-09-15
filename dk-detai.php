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
                                <h3 class="text-center">Đăng ký đề tài</h3>
                                 <?php 
                                $rowq = mysqli_fetch_row(mysqli_query($con, "SELECT dkgiaovien.teacher , dkgiaovien.groupsv , dinhhuong.dinhhuong1,  groupsv.id
                                    FROM dkgiaovien 
                                    JOIN dinhhuong ON dkgiaovien.teacher=dinhhuong.tengv
                                    JOIN groupsv ON dkgiaovien.groupsv=groupsv.id AND groupsv.id = (SELECT id FROM groupsv WHERE idsv1='$username' OR idsv2='$username' OR idsv3 = '$username')"));
                                $gv = $rowq['0'];
                                $nhom = $rowq['1'];
                                $dh1 = $rowq['2'];
                                
                                if (isset($_POST['dangki'])) {
                                    $detai = $_POST['detai'];
                                    $dinhhuong = $_POST['sellist1'];
                                    $check=mysqli_query($con, "insert into dsdetaisv(tengv,nhom,detai,dinhhuong) value('$gv','$nhom','$detai','$dinhhuong')");
                                    if ($check) {
                                        echo "Đăng kí thành công.";
                                    } else {
                                        echo "Đăng kí thất bại.";
                                    }
                                }
                                if($permission=='student') {

                                
                                ?> 

                                <form action="" method="post">

                                    <label for="">Giáo viên hướng dẫn</label>
                                    <input type="text" class="form-control" value="<?php echo $gv ?>"readonly>
                                    <label for="">Nhóm: </label>
                                    <input type="text" class="form-control" value="<?php echo $nhom ?>"readonly>
                                    <label for="">Định hướng:</label>
                                    <textarea class="form-control" rows="4" name="dinhhuong" readonly><?php echo $dh1 ?></textarea>
                                    <label for="">Đề tài:</label>
                                    <textarea class="form-control" rows="5" id="comment" placeholder="Nhập đề tài vào đây" name="detai"></textarea>
                                    <div class="text-center mt-3">
                                        <button class=" m-2 btn btn-success" name="dangki"><i class="far fa-edit"></i> Đăng kí</button>
                                    </div>
                                </form>
                                <?php
                                } else if ($permission=='admin') {
                                    ?>
                                     <form action="" method="post">

                                    <label for="">Giáo viên hướng dẫn</label>
                                    <input type="text" class="form-control" value="<?php echo $gv ?>">
                                    <label for="">Nhóm: </label>
                                    <input type="text" class="form-control" value="<?php echo $nhom ?>">
                                    
                                    <label for="">Đề tài:</label>
                                    <textarea class="form-control" rows="5" id="comment" placeholder="Nhập đề tài vào đây" name="detai"></textarea>
                                    <div class="text-center mt-3">
                                        <button class=" m-2 btn btn-success" name="dangki"><i class="far fa-edit"></i> Đăng kí</button>
                                    </div>
                                </form>
                                <?php

                                }
                                ?>

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