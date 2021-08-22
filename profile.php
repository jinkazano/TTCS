<div class="container-fluid">
<h2>Thông tin cá nhân</h2>
<?php
if (isset($_SESSION['username'])=="") {
    # code...
    ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Cảnh báo!</strong> Bạn chưa đăng nhập
    </div>
    <?php
}
elseif ($permission=='teacher') {
    $rowz=mysqli_fetch_row(mysqli_query($con,"select * from dinhhuong where tengv='$row[3]'"));
    $row2 = mysqli_fetch_row(mysqli_query($con, "select teacher, count(teacher) from dkgiaovien where  teacher = '$row[3]' group by teacher "));
    ?>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Họ Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Danh sách định hướng</th>
            <th>Số nhóm đã đăng kí</td>
                <th>Danh sách nhóm đã đăng kí</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <?php
                if ($rowz[0]==""){
                    ?>
                    <td>Giáo viên chưa đăng kí định hướng.</td>
                    <?php
                }
                else {
                    ?>
                    <td>
                        <div>1: <?php echo $rowz[2]; ?></div>
                        <div>2: <?php echo $rowz[3]; ?></div>
                        <div>3: <?php echo $rowz[4]; ?></div>
                    </td>
                    <?php
                }
                ?>
                <td><?php echo $row2[1]; ?></td>
                <td><a class="btn btn-success" href="ds_nhomdk.php">Xem tại đây</a></td>
            </tr>
        </tbody>
    </table>
    <?php
}
elseif ($permission=='student') {
    $rowa=mysqli_fetch_row(mysqli_query($con,"Select * from groupsv where idsv1='$row[1]' or idsv2='$row[1]' or idsv3='$row[1]'"));
    $rowb=mysqli_fetch_row(mysqli_query($con,"select tengv,dinhhuong,detai from dsdetai where nhom='$rowa[0]'"));
    $rowd=mysqli_fetch_row(mysqli_query($con,"select teacher from dkgiaovien where groupsv='$rowa[0]'"));
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Họ Tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Nhóm</th>
                <th>Giáo viên HD</th>
                <th>Định hướng</th>
                <th>Đề tài</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $rowa[0]; ?></td>
                <td><?php echo $rowd[0]; ?></td>
                <td><?php echo $rowb[1]; ?></td>
                <td><?php echo $rowb[2] ?></td>
            </tr>
        </tbody>
        
    </table>
    <?php 
    $rowc=mysqli_fetch_row(mysqli_query($con,"select * from feedback where nhom='$rowa[0]'"));

    if ($rowc) {
        ?>
        <table>
            <tbody>
                <tr>
                    <td>Đề tài "<?php echo $rowc[4];?>" của nhóm bạn bị giáo viên hướng dẫn xóa với lý do: <?php echo $rowc[5] ?></td>
                </tr>
                <tr>
                    <td>Vui lòng đăng ký lại đề tài</td>
                </tr>
            </tbody>
        </table>
        <?php
    }
    ?>
    <?php
}
elseif ($permission=='admin') {
    ?>
    <table class="table table-hover">
        <thead>

            <tr>
                <th>Họ Tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>

            </tr>
        </thead>
        <tbody>

            <tr>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
            </tr>
        </tbody>
    </table>
    <?php
}

?>
</div>