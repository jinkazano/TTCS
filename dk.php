<?php
session_start();
if ($_SESSION['username']) {
	include 'lib/connect.php';
	$username = $_SESSION['username'];
	$row1 = mysqli_fetch_row(mysqli_query($con, "select * from user where username = '$username'"));
	$idsv = $row1['1'];
	$row2 = mysqli_fetch_row(mysqli_query($con, "select * from groupsv where idsv1 ='$idsv' "));



	if ($row2['1']=="") {
		echo "Bạn không phải là nhóm trưởng. ";
		echo "Bấm vào ";
		?>
		<a href="dk-gvhuongdan.php">đây</a>
		<?php
		echo " để trở về danh sách giáo viên hướng dẫn.";
	}
	else {
		if ($_GET['id']) {
			$id = $_GET['id'];
			$row3 = mysqli_fetch_row(mysqli_query($con, "select * from dinhhuong where id='$id'"));

			$idnhom = $row2['0'];
			$tengv = $row3['1'];
			$row4 = mysqli_fetch_row(mysqli_query($con, "select * from dkgiaovien where groupsv = '$idnhom'"));
			if($row4[1]!=''){
				echo "Nhóm của bạn đã đăng kí giáo viên. ";
				echo "Bấm vào ";
					?>
					<a href="dk-gvhuongdan.php">đây</a>
					<?php
					echo " để trở về danh sách giáo viên hướng dẫn.";
			}else{
				$check = mysqli_query($con, "insert into dkgiaovien(teacher,groupsv) values ('$tengv','$idnhom')");
				if ($check) {
					echo "Đăng kí thành công. ";
					echo "Bấm vào ";
					?>
					<a href="dk-gvhuongdan.php">đây</a>
					<?php
					echo " để trở về danh sách giáo viên hướng dẫn.";
				} else {
					echo "Đăng kí thất bại";
				}
			}
		}
	}
}
?>
