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

                                    <table class="danhsachdinhhuong table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th colspan="5"><center>Danh sách định hướng</center></th>
                                            </tr>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên giáo viên</th>
                                                <th>Định hướng </th>
                                               
                                            </tr>
                                            <tr>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include 'lib/connect.php';
                                            $sql_total = "select count(id) as total from dinhhuong";
                                                $data = mysqli_query($con, $sql_total);
                                                $rows = mysqli_fetch_assoc($data);
                                                $total_records = $rows['total'];
                                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                $limit = 5; 
    
                                                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                                                // tổng số trang
                                                $total_page = ceil($total_records / $limit);
                                                // Giới hạn current_page trong khoảng 1 đến total_page
                                                if ($current_page > $total_page) {
                                                    $current_page = $total_page;
                                                } else if ($current_page < 1) {
                                                    $current_page = 1;
                                                }
    
                                                // Tìm Start
                                                $start = ($current_page - 1) * $limit;
                                                $end = $start + $limit;
                                            if ($permission == 'teacher')
                                            {
                                                $sql1 = "select * from dinhhuong where tengv ='$fullname' limit $start,$limit";
                                            }
                                            else $sql1 = "select * from dinhhuong limit $start,$limit";
                                            
                                            $check=mysqli_query($con,$sql1);
                                            while ($row1=mysqli_fetch_row($check)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row1['0']; ?></td>
                                                    <td><?php echo $row1['1']; ?></td>
                                                    <td><pre ><?php echo $row1['2']; ?></pre></td>
                                                </tr>

                                                <?php
                                            }

                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example">
                                     <ul class="pagination justify-content-center">

                                        <?php
                                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                        if ($current_page > 1 && $total_page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="danh-sach-dinh-huong.php?page=' . ($current_page - 1) . '">Previous</a></li>';
                                        }

                                        // Lặp khoảng giữa
                                        for ($i = 1; $i <= $total_page; $i++) { // Nếu là trang hiện tại thì hiển thị thẻ span // ngược lại hiển thị thẻ a 
                                            if ($i == $current_page) {
                                                echo '<li class="page-item"><a class="page-link" href="#">'. $i .'</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="danh-sach-dinh-huong.php?page=' . $i . '">'. $i .'</a></li>';
                                            }
                                        }
                                        // nếu current_page < $total_page và total_page> 1 mới hiển thị nút prev
                                        if ($current_page < $total_page && $total_page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="danh-sach-dinh-huong.php?page=' . ($current_page + 1) . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                    </nav>
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