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
                                <h3 class="text-uppercase text-center">Danh sách nhóm đã đăng kí</h3>
                                <form action="" method="post">
                                    <!-- <div class="inline">
                                        <input type="text" class="form-control" placeholder="Nhập mã sinh viên cần tìm">
                                        <button type="submit" name="search" class="ml-2 btn btn-primary">Tìm kiếm</button>
                                    </div> -->
                                    <table class="colspan table table-hover table-inverse">
                                        <thead>
                                            
                                            <tr>
                                                <th >Nhóm</th>
                                                <th>Nhóm trưởng</th>
                                                <th>Thành viên 1</th>
                                                <th>Thành viên 2</th>
                                                <th >Đề tài</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <!-- // -->
                                            <?php 

                                            if ($permission=='teacher') {
                                                
                                                $check = mysqli_query($con,"SELECT * FROM groupsv WHERE teacher_registration='$row[0]' ");
                                            }
                                            if ($permission=='student') {
                                                $check = mysqli_query($con,"SELECT id FROM groupsv WHERE idsv1='$row[1]' or idsv2='$row[1]' or idsv3='$row[1]' ");
                                            }

                                            while ($rowq=mysqli_fetch_row($check)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo  $rowq[0]?></td>
                                                    <?php $row1=mysqli_fetch_row(mysqli_query($con,"SELECT groupsv.id,user.fullname,user.phone,user.email FROM groupsv,user WHERE groupsv.id='$rowq[0]' AND groupsv.idsv1=user.username")); ?>
                                                    <td><?php if ($row1[0]=="") {
                                                        echo "";
                                                    }else{
                                                        echo $row1[1].'<br>'.$row1[2].'<br>'.$row1[3];
                                                    } ?></td>
                                                    <?php $row2=mysqli_fetch_row(mysqli_query($con,"SELECT groupsv.id,user.fullname,user.phone,user.email FROM groupsv,user WHERE groupsv.id='$rowq[0]' AND groupsv.idsv2=user.username")); ?>
                                                    <td><?php if ($row2==null) {
                                                        echo "";
                                                    }else{
                                                        echo $row2[1].'<br>'.$row2[2].'<br>'.$row2[3];
                                                    } ?></td>
                                                    <?php $row3=mysqli_fetch_row(mysqli_query($con,"SELECT groupsv.id,user.fullname,user.phone,user.email FROM groupsv,user WHERE groupsv.id='$rowq[0]' AND groupsv.idsv3=user.username")); ?>
                                                    <td><?php if ($row3==null) {
                                                        echo "";
                                                    }else{
                                                        echo $row3[1].'<br>'.$row3[2].'<br>'.$row3[3];
                                                    } ?></td>
                                                    <td><?php $row4=mysqli_fetch_row(mysqli_query($con,"SELECT * FROM dsdetai WHERE dsdetai.nhom='$rowq[0]'"));
                                                    if ($row4=="") {
                                                        echo "Nhóm chưa có đề tài được duyệt";
                                                    }else echo $row4[3];;
                                                    ?></td>
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