<a href="index.php" style="text-decoration: none;"><span class="badge badge-success" style="padding: 5px 15px; "><i class="fas fa-home"></i> Trang chủ</span></a>
<?php
if (empty($_SESSION['username'])) {
    header("Location: /TTCS/login.php");
} else {
     include 'lib/connect.php';
    $username = $_SESSION['username'];
    $sql = "select * from user where username='$username'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $row = mysqli_fetch_row($query);
        $fullname = $row[3];
        ?>
        <span class="badge badge-info"><i class="fas fa-user"></i><?php echo " Hi, " . $row[3] . "."; ?></span>
        <?php
        
        ?>
        <a href="logout.php" ><span class="badge badge-danger" style="padding: 5px 15px;"><i class="fas fa-sign-out-alt"></i> Thoát</span></a>
        <?php
    ?>
    <!-- <a href="login.php" >Đăng nhập</a> -->
    <?php
}
}
?>