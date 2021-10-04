<?php
session_start();
if ($_SESSION['username']) {
    include 'lib/connect.php';
    $fullname = $_GET['fullname'];
    $user=mysqli_fetch_array(mysqli_query($con,"SELECT * from user where fullname='$fullname'"));
    $permission=$user['permission'];

    if ($permission == 'teacher') {
        $check = mysqli_query($con, "select * from dsdetai where tengv = '$fullname'");
    } else {
        $check = mysqli_query($con, "select * from dsdetai ");
    }
    //xuất file excel

    require 'Classes/PHPExcel.php';
    $objExcel = new PHPExcel;
    $objExcel->setActiveSheetIndex(0);
    $sheet    = $objExcel->getActiveSheet()->setTitle('ds_de_tai');
    $rowCount = 1;
    $sheet->setCellValue('A' . $rowCount, 'STT');
    $sheet->setCellValue('B' . $rowCount, 'Tên giáo viên');
    $sheet->setCellValue('C' . $rowCount, 'Nhóm');
    
    $sheet->setCellValue('D' . $rowCount, 'Đề tài');
    $sheet->setCellValue('E' . $rowCount, 'Điểm');

    while ($rowp = mysqli_fetch_array($check)) {
        $rowCount++;
        $sheet->setCellValue('A' . $rowCount, $rowp['id']);
        $sheet->setCellValue('B' . $rowCount, $rowp['tengv']);
        $sheet->setCellValue('C' . $rowCount, $rowp['nhom']);
        
        $sheet->setCellValue('D' . $rowCount, $rowp['detai']);
        $sheet->setCellValue('E' . $rowCount, '');
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename  = 'Danh_sach_de_tai.xlsx';
    $objWriter->save($filename);

    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($filename));
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');
    readfile($filename);

    readfile($filename);
    return;

}
