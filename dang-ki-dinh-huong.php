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
                <div class="sidebar bg-gradient-primary">
                    <?php require_once('menu_left.php') ?>
                </div>
                <div id="content-wrapper" class="d-flex flex-column p-5 ">
                    <div class="card">
                        <div class="card-header text-right">
                            <?php require_once('home_page.php') ?>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center text-uppercase">Đăng kí/Sửa định hướng</h2>
                            <form action="" method="post">
                                <label for="">Định hướng: </label>
                                <textarea type="text" name="dh1" size="30" required="" class="form-control"> </textarea>
                                <input type="submit" name="dangki" class="btn btn-success" value="ĐĂNG KÍ/SỬA" style="display: block; margin: 10px auto;">
                              </textarea>
                                <?php
                                if (isset($_POST['dangki'])) {
                                    $dh1 = $_POST['dh1'];
                                    $check_exist=mysqli_query($con,"SELECT * from dinhhuong where tengv='$fullname'");
                                    if($check_exist==null) {
                                      $sql1 = "INSERT into dinhhuong(tengv,dinhhuong1) value ('$fullname','$dh1')";
                                    }
                                    
                                    else{
                                      $sql1="UPDATE dinhhuong set dinhhuong1='$dh1' where tengv='$fullname'";

                                    }

                                    

                                    
                                    if (mysqli_query($con, $sql1)) {
                                        echo "Đăng kí thành công";
                                    } else
                                    alert("Đăng kí thất bại");
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