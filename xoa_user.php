<?php
function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function replace($msg)
{
    echo("<script>location.href =\"http://localhost/TTCS/$msg\";</script>");
}
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
    alert("Đã xóa thành công");
    replace("location:ds-user.php");
}

?>