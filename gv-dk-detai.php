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
                                <h3 class="text-center">Đăng ký đề tài</h3>
                                 <?php 
                                $rowq = mysqli_fetch_row(mysqli_query($con, "SELECT dkgiaovien.teacher , groupsv.id , dinhhuong.dinhhuong1 
                                    FROM dkgiaovien
                                    JOIN groupsv ON dkgiaovien.id=groupsv.teacher_registration
                                    JOIN dinhhuong ON dkgiaovien.teacher=dinhhuong.tengv AND groupsv.id = (SELECT id FROM groupsv WHERE idsv1='$username' OR idsv2='$username' OR idsv3 = '$username')"));
                                
                                $gv = $row['3'];
                                $id_gv=$row['0'];
                                
                                
                                if (isset($_POST['dangki'])) {
                                    $nhom=$_POST['nhom'];
                                    $detai = $_POST['detai'];
                                    
                                    $check=mysqli_query($con, "insert into dsdetaisv(tengv,nhom,detai) value('$gv','$nhom','$detai')");
                                    if ($check) {
                                        alert("Đăng kí thành công") ;
                                    } else {
                                        alert("Đăng kí thất bại.") ;
                                    }
                                }
                                if($permission=='teacher') {
                                    
                                    

                                
                                ?> 

                                <form action="" method="post" data-parsley-validate>

                                    <label for="">Giáo viên hướng dẫn</label>
                                    <input type="text" class="form-control" value="<?php echo $gv ?>"readonly>
                                    <label for="">Nhóm: </label>
                                    <input type="text" name="nhom" class="form-control" list="sv_group">
                                    <datalist id="sv_group">
                                            
                                        <?php 
                                        
                                        $id_sv_group_query = mysqli_query($con,"SELECT id from groupsv where teacher_registration='$id_gv'");
                                        while($id_sv_group=mysqli_fetch_row($id_sv_group_query))
                                        {
                                            
                                            ?> <option value="<?php echo $id_sv_group[0] ?>">
                                                <?php 
                                        }

                                        ?> 
                                    </datalist>
                                    
                                    <label for="">Đề tài:</label>
                                    <textarea class="form-control" rows="5" id="comment" placeholder="Nhập đề tài vào đây" name="detai" required data-parsley-length=[1,100]></textarea>
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