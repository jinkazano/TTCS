<?php 
session_start();
if ($_SESSION['username']) {
	include 'lib/connect.php';
	if ($_GET['stt']) {
		$stt = $_GET['stt'];
		$q = mysqli_fetch_row(mysqli_query($con,"select * from dsdetaisv where id = '$stt'"));
		$tengv = $q['1'];
		$nhom = $q['2'];
		$dinhhuong = $q['4'];
		$detai = $q['3'];
		$check = mysqli_fetch_row(mysqli_query($con,"select * from dsdetai where nhom='$nhom'"));
		if ($check) {
			# code...
			echo "Nhóm đã đăng kí đề tài";
		}else{
			$duyet = mysqli_query($con,"insert into dsdetai(tengv,nhom,detai,dinhhuong) values('$tengv','$nhom','$detai','$dinhhuong')");
			$xoa = mysqli_query($con,"delete from dsdetaisv where id = '$stt'");
			header("location:duyet-de-tai.php");
			echo "Duyệt thành công";
		}
		
	}
}

?>