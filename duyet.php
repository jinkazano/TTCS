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
if ($_SESSION['username']) {
	include 'lib/connect.php';

	if ($_GET['stt']) {
		$stt = $_GET['stt'];
		$q = mysqli_fetch_row(mysqli_query($con,"select * from dsdetaisv where id = '$stt'"));
		$tengv = $q['1'];
		$nhom = $q['2'];
		
		$detai = $q['3'];
		$check = mysqli_fetch_row(mysqli_query($con,"select * from dsdetai where nhom='$nhom'"));
		if ($check) {
			# code...
			
			
			alert("Nhóm đã đăng kí đề tài");
			replace("duyet-de-tai.php");
		}else{
			$duyet = mysqli_query($con,"insert into dsdetai(tengv,nhom,detai) values('$tengv','$nhom','$detai')");
			$xoa = mysqli_query($con,"delete from dsdetaisv where id = '$stt'");
			
			
			alert("Duyệt thành công");
			replace("duyet-de-tai.php");
			
		}
		
	}
}

?>