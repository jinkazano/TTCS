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
                                <form action="" method="post">

                                    <table class="table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên giáo viên</th>
                                                <th>Nhóm</th>
                                                <th>Tên định hướng</th>
                                                <th>Tên đề tài</th>
                                            </tr>
                                            <?php 
                                            if ($_GET['stt']) {
                                                $stt = $_GET['stt'];
                                                $check = mysqli_query($con,"select * from dsdetaisv where id = '$stt'");

                                            }
                                            while ($rowq = mysqli_fetch_row($check)) {
                                               ?>
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <td><?php echo $rowq['0'] ?></td>
                                                   <td><?php echo $rowq['1'] ?></td>
                                                   <td><?php echo $rowq['2'] ?></td>
                                                   <td><?php echo $rowq['4'] ?></td>
                                                   <td><?php echo $rowq['3'] ?></td>
                                               </tr>
                                               <?php 
                                           }
                                           ?>
                                       </tbody>
                                   </table>
                                   <table class="table table-hover table-inverse">
                                    <thead>
                                        <tr>
                                            <td colspan="2">Nhập lý do bạn muốn xóa đề tài:</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><textarea class="form-control" rows="5" placeholder="Nhập lý do" name="feed"></textarea></td>
                                            <td><button class="btn btn-info mb-2" name="duyet"><i class="fas fa-check" ></i>Xác nhận</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php 
                                if (isset($_POST['duyet'])) {
                                    $row = mysqli_fetch_row(mysqli_query($con,"select * from dsdetaisv where id = '$stt'"));
                                    $feed = $_POST['feed'];
                                    $giaovien = $row[1];
                                    $nhom = $row[2];
                                    $dh = $row[4];
                                    $detai = $row[3];
                                    mysqli_query($con,"Insert into feedback(giaovien,nhom,dinhhuong,detai,feedback) values('$giaovien','$nhom','$dh','$detai','$feed')");
                                    mysqli_query($con,"delete from dsdetaisv where id = '$stt'");
                                    echo "Xóa thành công";
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


    <?php require_once('filejs.php') ?>
</body>
</html>