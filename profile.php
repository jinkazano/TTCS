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
    $current_teacher_register = mysqli_fetch_array(mysqli_query($con, "SELECT * from dkgiaovien where  teacher = '$row[3]' "));
    ?>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Họ Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>

            <th>Số nhóm có thể đăng kí tiếp</td>
            <th>Danh sách nhóm đã đăng kí</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                
                    
                   
                <td><?php echo $current_teacher_register['slot']?></td>
                <td><?php echo $current_teacher_register['groupsv']  ?></td>
                <td><a class="btn btn-success" href="ds_nhomdk.php">Xem chi tiết</a></td>
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
                <td><?php 
                if($rowa!=null) {
                    echo $rowa[0];
                } else echo "Chưa đăng kí";
                 ?></td>
                <td><?php if( $rowd!=null) {
                    echo $rowd[0];
                    }else echo "Chưa đăng kí" ;
                     ?></td>
                <td><?php if($rowb!=null) {
                    echo $rowb[1];
                }else echo "Chưa đăng kí"; 
                ?></td>
                <td><?php if( $rowb!=null) {
                    echo $rowb[2];
                }else echo"Chưa đăng kí";   
                ?></td>
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