<form method="post" action="">
    <div>
        <button class="btn btn-success btn-lg" name="dangky"> Đăng kí</button>
    </div>
    <?php

if (isset($_POST['dangky'])) {

    $user = $_SESSION['username'];

    $current_team = (mysqli_fetch_array(mysqli_query($con, "SELECT * from groupsv where leader='$user'")));
    if ($current_team['teacher_registration'] != 0) {
        alert("Nhóm của bạn đã đăng kí giáo viên rồi!");
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
        }
    }

}
?>
</form>