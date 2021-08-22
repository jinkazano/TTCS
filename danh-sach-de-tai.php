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
                                    <a class="btn btn-primary" href="duyet-de-tai.php">Duyệt đề tài</a>
                                    <table class="table table-hover table-inverse">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên giáo viên</th>
                                                <th>Nhóm</th>
                                                <th>Tên định hướng</th>
                                                <th>Tên đề tài</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($permission == 'teacher') {
                                                $check = mysqli_query($con,"select * from dsdetai where tengv = '$fullname'");
                                            }else{
                                                $check = mysqli_query($con,"select * from dsdetai ");
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
                                                   <td><?php echo $rowq['4'] ?></td>
                                                   <td><?php echo $rowq['3'] ?></td>

                                               </tr>
                                               <?php 
                                           }

                                           ?>

                                       </tbody>

                                   </table>
                                   <button type="submit" class=" m-2 btn btn-success" name="export"><i class="far fa-edit"></i> Xuất file Excel</button>
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