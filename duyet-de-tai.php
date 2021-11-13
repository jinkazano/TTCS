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
                                <form action="" method="post">
                                    <h3 class="text-uppercase text-center">Danh sách đề tài chưa duyệt</h3>

                                    <table class="table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên giáo viên</th>
                                                <th>Nhóm</th>
                                                
                                                <th>Tên đề tài</th>
                                                
                                            </tr>
                                            <?php 
                                            if ($permission == 'teacher') {
                                                $check = mysqli_query($con,"select * from dsdetaisv where tengv = '$fullname'");
                                            }else{
                                                $check = mysqli_query($con,"select * from dsdetaisv ");
                                            }  
                                            while ($rowq = mysqli_fetch_row($check)) {
                                             ?>

                                         </thead>
                                         <tbody>

                                             <tr>
                                                 <td><?php echo $rowq['0'] ?></td>
                                                 <td><?php echo $rowq['1'] ?></td>
                                                 <td><?php echo $rowq['2'] ?></td>
                                                 
                                                 <td><?php echo $rowq['3'] ?></td>
                                                 <td class="text-center">
                                                    <a class="btn btn-primary" href="duyet.php?stt=<?php echo $rowq['0'] ?>">Duyệt</a>
                                                    <a class="btn btn-danger" href="xoa_detai.php?stt=<?php echo $rowq['0'] ?>">Xóa</a>
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


    <?php require_once('filejs.php') ?>
</body>
</html>