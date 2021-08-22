<?php
session_start();
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
        $_SESSION['username=']="admin2";
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
            $sql = "select * from user where username='$username' and password='$password'";
            $query = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows == 0) {
                echo "Tên đăng nhập hoặc mật khẩu không đúng";
            } else {
                $_SESSION['username'] = $username;
                header("location:index.php");
            }
        }
        ?>
        <body>
            <div class="container">
            
            <section id="content">
                <form action="" method="post" accept-charset="utf-8">
                    <h1>Đăng nhập</h1>
                    <div>
                        <input type="text" name="username" placeholder="Tên đăng nhập" >
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Mật khẩu" >
                    </div>
                    <div>
                        <input type="submit" name="login" value="Đăng nhập">
                        <input type="submit" name="index" value="Trang chủ">
                    </div>
                
                </form>
            </section>
        </div>
        </body>
        <script href="../login.js"></script>

    </body>
</html>