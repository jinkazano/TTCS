<?php
session_start();
function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="login.css">

    </head>
    <body>
        <?php
        require_once("lib/connect.php");
		$_SESSION['username']='';
//        $sql_test= "select * from user where id='30'";
//        $query_test= mysqli_query($con, $sql_test);
//        $string = mysqli_fetch_row($query_test);
//        echo $string[1]."+".$string[2];
        
        if (isset($_POST['index'])) {
            header("location:index.php");
        }
        if (isset($_POST['login'])) {
			
            $username = $_POST['username'];
            $password = $_POST['password'];
			$password = md5($password);
            $sql = mysqli_query($con, " SELECT * FROM user WHERE username='$username' and password='$password'");
            $count = mysqli_num_rows($sql);
			$row_dangnhap = mysqli_fetch_array($sql);
            if ($count > 0) {
				$_SESSION['username'] = $username;
				header("location:index.php");
            } else {
                alert( "Tên đăng nhập hoặc mật khẩu không đúng");
            }
        }
        ?>
        <body>
            <div class="container">
            
            <section id="content">
                <form action="" method="post" accept-charset="utf-8" data-parsley-validate>
					<img src="static/img/logoKMA.jpg" width="100" height="100">
                    <h1>Học viện Kỹ thuật mật mã</h1>
					<h6>Cổng thông tin sinh viên</h6>
                    <div>
                        <input type="text" name="username" placeholder="Tên đăng nhập" required data-parsley-length="[1,20]">
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Mật khẩu" required data-parsley-length="[1,20]" >
                    </div>
                    <div class="w-100 flex-column">
                        <input type="submit" name="login" value="Đăng nhập"  required="">
                    </div>
                
                </form>
            </section>
        </div>
        </body>
        <script href="../login.js"></script>

    </body>
</html>