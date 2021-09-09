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
                                <h3 class="text-center text-uppercase">
                                    Đăng kí GV hướng dẫn
                                </h3>
                                <form action="" method="post">
                                    <div class="inline">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                        <button type="submit" name="search" class="ml-2 btn btn-primary">Tìm kiếm</button>
                                    </div>
                                    <table class="colspan table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Tên giáo viên</th>
                                                <th colspan="3">Danh sách định hướng</th>
                                                <th rowspan="2">Số nhóm đã đăng kí</th>
                                                <th rowspan="2">Đăng kí</th>
                                            </tr>
                                            <tr>
                                                <th>Định hướng 1</th>
                                                <th>Định hướng 2</th>
                                                <th>Định hướng 3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'lib/connect.php';
                                            if (isset($_POST['search'])) {
                                                $name = $searchname;
                                                $sql1 = "select * from dinhhuong ";
                                            } else {
                                                if ($permission == 'teacher') {
                                                    $sql1 = "select * from dinhhuong where tengv ='$fullname'";
                                                } else
                                                $sql1 = "select * from dinhhuong ";
                                            }
                                            $check = mysqli_query($con, $sql1);

                                            while ($row1 = mysqli_fetch_row($check)) {
                                                $teacher = $row1['1'];
                                                $row2 = mysqli_fetch_row(mysqli_query($con, "select teacher, count(teacher) from dkgiaovien where  teacher = '$teacher' group by teacher "));
                                                ?>
                                                <tr>
                                                    <td><?php echo $row1['0']; ?></td>
                                                    <td><?php echo $row1['1']; ?></td>
                                                    <td><?php echo $row1['2']; ?></td>
                                                    <td><?php echo $row1['3']; ?></td>
                                                    <td><?php echo $row1['4']; ?></td>
                                                    <td><?php echo $row2['1']; ?></td>
                                                    
                                                    <?php
                                                    if ($row2['1'] < 12) {
                                                        ?><td><a class="btn btn-primary" href="dk.php?id=<?php echo $row1['0']; ?>">Đăng kí</a></td><?php
                                                    } else {
                                                        ?><td><div class="btn btn-danger">Full</div></td><?php
                                                    }
                                                    ?>


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