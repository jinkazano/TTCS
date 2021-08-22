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
    $stt=$_GET['stt'];
    $sql = "delete from user where id = $stt";
    mysqli_query($con,$sql);
    header("location:ds-user.php");
}

?>