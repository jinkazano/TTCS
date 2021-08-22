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
    <!-- <link href="style.css" rel="stylesheet" type="text/css"/> -->
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

                                    <table class="danhsachdinhhuong table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th colspan="5"><center>Danh sách định hướng</center></th>
                                            </tr>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên giáo viên</th>
                                                <th>Định hướng 1</th>
                                                <th>Định hướng 2</th>
                                                <th>Định hướng 3</th>
                                            </tr>
                                            <tr>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include 'lib/connect.php';
                                            if ($permission == 'teacher')
                                            {
                                                $sql1 = "select * from dinhhuong where tengv ='$fullname'";
                                            }
                                            else $sql1 = "select * from dinhhuong ";
                                            
                                            $check=mysqli_query($con,$sql1);
                                            while ($row1=mysqli_fetch_row($check)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row1['0']; ?></td>
                                                    <td><?php echo $row1['1']; ?></td>
                                                    <td><?php echo $row1['2']; ?></td>
                                                    <td><?php echo $row1['3'];?></td>
                                                    <td><?php echo $row1['4'];?></td>


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