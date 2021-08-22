<?php
session_start();
if (isset($_SESSION['username'])) {
    include 'lib/connect.php';
    $username = $_SESSION['username'];
    $sql = "select * from user where username='$username'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $row = mysqli_fetch_row($query);
        $user = $row['1'];
    }
}
if (isset($_GET['stt'])) {
    $stt = $_GET['stt'];
    $sql1 = "select * from groupsv where id = '$stt'";
    $check = mysqli_query($con, $sql1);
    $row2 = mysqli_fetch_row($check);
    if ($row2['1']==$user) {
        $sql2 = "delete from groupsv where id ='$stt'";
        mysqli_query($con, $sql2);
        echo "Xóa thành công";
        header("location:danh-sach-nhom.php");
        
    } else {
        echo "Bạn không có quyền xóa nhóm";
    }
}
?>