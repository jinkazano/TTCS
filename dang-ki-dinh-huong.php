  <?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thực tập cơ sở</title>
    <?php require_once('filecss.php') ?>
</head>
<body>
    <div class="container-fluid">
        <?php require_once('logo.php'); ?>
        <div class="main" >
            <div id="wrapper">
                <div id="sidebar">
                    <?php require_once('menu_left.php') ?>
                </div>
                <div id="content-wrapper" class="d-flex flex-column p-5 ">
                    <div class="card">
                        <div class="card-header text-right">
                            <?php require_once('home_page.php') ?>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center text-uppercase">Đăng kí định hướng</h2>
                            <form action="" method="post">
                                <label for="">Định hướng 1: </label>
                                <input type="text" name="dh1" size="30" required="" class="form-control">
                                <label for="">Định hướng 2: </label>
                                <input type="text" name="dh2" size="30" required="" class="form-control">
                                <label for="">Định hướng 3: </label>
                                <input type="text" name="dh3" size="30" required="" class="form-control">
                                <input type="submit" name="dangki" class="btn btn-success" value="ĐĂNG KÍ" style="display: block; margin: 10px auto;">
                                <?php
                                if (isset($_POST['dangki'])) {
                                    $dh1 = $_POST['dh1'];
                                    $dh2 = $_POST['dh2'];
                                    $dh3 = $_POST['dh3'];
                                    $sql1 = "insert into dinhhuong(tengv,dinhhuong1,dinhhuong2,dinhhuong3) 
                                    value ('$fullname','$dh1','$dh2','$dh3')";
                                    if (mysqli_query($con, $sql1)) {
                                        echo "Đăng kí thành công";
                                    } else
                                    echo "Đăng kí thất bại";
                                }
                                ?>

                            </form>
                        </div> 
                        <div class="card-footer text-right">
                           <?php require_once('inf_footer.php') ?>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="js/dropdown.js"></script>
</body>
</html>