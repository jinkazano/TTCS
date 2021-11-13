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
    $sheet->setCellValue('D' . $rowCount, 'Nhóm trưởng');
    $sheet->setCellValue('E' . $rowCount, 'Thành viên 2');
    $sheet->setCellValue('F' . $rowCount, 'Thành viên 3');
    
    $sheet->setCellValue('G' . $rowCount, 'Đề tài');

    

    while ($rowp = mysqli_fetch_array($check)) {
        $rowCount++;
        $sheet->setCellValue('A' . $rowCount, $rowp['id']);
        $sheet->setCellValue('B' . $rowCount, $rowp['tengv']);
        $sheet->setCellValue('C' . $rowCount, $rowp['nhom']);
        $id_sv_group=$rowp['nhom'];
        $id_sv= mysqli_fetch_array(mysqli_query($con,"SELECT * from groupsv where id='$id_sv_group'"));

        $sheet->setCellValue('D' . $rowCount, $id_sv['leader']);
        $sheet->setCellValue('E' . $rowCount, $id_sv['idsv2']);
        $sheet->setCellValue('F' . $rowCount, $id_sv['idsv3']);
        $sheet->setCellValue('G' . $rowCount, $rowp['detai']);
        
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
