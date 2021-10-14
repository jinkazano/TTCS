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
                    <?php require_once("menu_left.php"); ?>
                </div>
                <div id="content-wrapper" class="d-flex flex-column p-5">
                    <div class="status">
                        <div class="card">
                            <div class="card-header text-right">
                                <?php require_once('home_page.php') ?>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <a class="btn btn-primary" href="duyet-de-tai.php">Duyệt đề tài</a>
                                    <table class="table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên giáo viên</th>
                                                <th>Nhóm</th>
                                                
                                                <th>Tên đề tài</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php 
                                             $sql_total = "select count(id) as total from dsdetai";
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
                                            if ($permission == 'teacher') {
                                                $check = mysqli_query($con,"select * from dsdetai where tengv = '$fullname' limit $start,$limit");
                                            }else{
                                                $check = mysqli_query($con,"select * from dsdetai limit $start,$limit");
                                            }  
                                            //xuất file excel
                                            
                                            if (isset($_POST['export'])) {
                                                require 'Classes/PHPExcel.php';
                                                $objExcel = new PHPExcel;
                                                $objExcel ->setActiveSheetIndex(0);
                                                $sheet = $objExcel->getActiveSheet()->setTitle('ds_de_tai');
                                                $rowCount = 1;
                                                $sheet->setCellValue('A'.$rowCount,'STT');
                                                $sheet->setCellValue('B'.$rowCount,'Tên giáo viên');
                                                $sheet->setCellValue('C'.$rowCount,'Nhóm');
                                                $sheet->setCellValue('D'.$rowCount,'Định hướng');
                                                $sheet->setCellValue('E'.$rowCount,'Đề tài');
                                                $sheet->setCellValue('F'.$rowCount,'Điểm');

                                                while ($rowp = mysqli_fetch_array($check)) {
                                                    $rowCount++;
                                                    $sheet->setCellValue('A'.$rowCount, $rowp['id']);
                                                    $sheet->setCellValue('B'.$rowCount, $rowp['tengv']);
                                                    $sheet->setCellValue('C'.$rowCount, $rowp['nhom']);
                                                    $sheet->setCellValue('D'.$rowCount, $rowp['dinhhuong']);
                                                    $sheet->setCellValue('E'.$rowCount, $rowp['detai']);
                                                    $sheet->setCellValue('F'.$rowCount,'');
                                                }

                                                $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
                                                $filename = 'Danh_sach_de_tai.xlsx';
                                                $objWriter ->save($filename);
                                                
                                                header('Content-Disposition: attachment; filename="'.$filename.'"');
                                                header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
                                                header('Content-Length: '. filesize($filename));
                                                header('Content-Transfer-Encoding: binary');
                                                header('Cache-Control: must-revalidate');
                                                header('Pragma: no-cache');
                                                readfile($filename);
                                                return;
                                            }
                                            
                                            while ($rowq = mysqli_fetch_row($check)) {
                                               ?>
                                               <tr>
                                                   <td><?php echo $rowq['0'] ?></td>
                                                   <td><?php echo $rowq['1'] ?></td>
                                                   <td><?php echo $rowq['2'] ?></td>
                                                   
                                                   <td><?php echo $rowq['3'] ?></td>

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
                                           
                                            echo '<li class="page-item"><a class="page-link" href="danh-sach-de-tai.php?page=' . ($current_page - 1) . '">Previous</a></li>';
                                        }

                                        // Lặp khoảng giữa
                                        for ($i = 1; $i <= $total_page; $i++) { // Nếu là trang hiện tại thì hiển thị thẻ span // ngược lại hiển thị thẻ a
                                            if ($i == $current_page) {
                                                
                                                echo '<li class="page-item"><a class="page-link" href="#">'. $i .'</a></li>';
                                            } else {
                                                
                                                echo '<li class="page-item"><a class="page-link" href="danh-sach-de-tai.php?page=' . $i . '">'. $i .'</a></li>';
                                            }
                                        }
                                        // nếu current_page < $total_page và total_page> 1 mới hiển thị nút prev
                                        if ($current_page < $total_page && $total_page > 1) {
                                        
                                            echo '<li class="page-item"><a class="page-link" href="danh-sach-de-tai.php?page=' . ($current_page + 1) . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                    </nav>
                                   <a  class=" m-2 btn btn-success" name="" href="xuat-de-tai-excel.php?fullname=<?php echo $fullname ?>"><i class="far fa-edit"></i> Xuất file Excel</a>
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