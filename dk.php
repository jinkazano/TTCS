
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
if (isset($_GET['teacher'])) {


    $user = $_SESSION['username'];
    $teacher=$_GET['teacher'];

    $current_team = (mysqli_fetch_array(mysqli_query($con, "SELECT * from groupsv where leader='$user'")));
    if ($current_team['teacher_registration'] != 0) {
        alert("Nhóm của bạn đã đăng kí giáo viên rồi!");
        replace("dk-gvhuongdan.php");
    } else {
        $current_teacher = (mysqli_fetch_array(mysqli_query($con, "SELECT *from dkgiaovien where teacher='$teacher'")));
        $current_teacher_id=$current_teacher['id'];
        if ($current_teacher['groupsv'] == '') {
            $current_teacher_groupsv = $current_team['id'];

        } else {
            $current_teacher_groupsv = $current_teacher['groupsv'] . "," . $current_team['id'];
        }

        $current_teacher_slot = $current_teacher['slot'] - 1;
        $sql                  = mysqli_query($con, "UPDATE dkgiaovien set groupsv ='$current_teacher_groupsv' where teacher='$teacher'");

        if ($sql) {
            $sql2 = mysqli_query($con, "UPDATE dkgiaovien set slot ='$current_teacher_slot' where teacher='$teacher'");
            $sql3 = mysqli_query($con, "UPDATE groupsv set teacher_registration =$current_teacher_id where leader='$user' ");

            alert("Đăng kí thành công");
            replace("dk-gvhuongdan.php");

        } else {
            alert("Thất bại");
            replace("dk-gvhuongdan.php");
        }
    }

}
?>
