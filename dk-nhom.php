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
    $sql      = "select * from user where username='$username'";
    $query    = mysqli_query($con, $sql);
    if ($query) {
        $row = mysqli_fetch_row($query);
        $sv  = $row['1'];
    }
}
if (isset($_GET['stt'])) {
    $team_id = $_GET['stt'];
    $check   = 0;
    $checksv = mysqli_num_rows(mysqli_query($con, "SELECT id from groupsv where idsv1='$sv' or idsv2='$sv' or idsv3='$sv'"));
    if ($checksv != 0) {
        $check = 1;
        alert("Bạn đã đăng ký nhóm  rồi!");
        replace("dang-ki-nhom.php");
    }

    if ($check == 0) {
        $select_team     = mysqli_query($con, "SELECT * FROM `groupsv` WHERE id='$team_id'");
        $current_team    = mysqli_fetch_array($select_team);
        $current_team_id = $current_team['id'];

        if ($current_team['idsv1'] == "") {
            $sqli_update = "UPDATE groupsv set idsv1='$sv' where id='$current_team_id'";
        } else if ($current_team['idsv2'] == "") {
            $sqli_update = "UPDATE groupsv set idsv2='$sv' where id='$current_team_id'";
        } else {
            $sqli_update = "UPDATE groupsv set idsv3='$sv' where id='$current_team_id'";
        }

        $sql                 = mysqli_query($con, $sqli_update);
        $current_team_idsv1  = mysqli_query($con, "SELECT * from `groupsv` where id='$current_team_id'");
        $current_team        = mysqli_fetch_array($current_team_idsv1);
        $current_team_leader = $current_team['idsv1'];

        $sqli_set_leader = mysqli_query($con, "UPDATE groupsv set leader='$current_team_leader' where id='$current_team_id'");

        if ($sql) {
            # code...

            alert("Đăng ký thành công");
            replace("dang-ki-nhom.php");
        } else {
            alert("Đăng ký thất bại");
            replace("dang-ki-nhom.php");
        }

    }
}
?>
