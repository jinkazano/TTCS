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
        <div class="main">
            <div id="wrapper">
                <div class="sidebar bg-gradient-primary">
                    <?php require_once('menu_left.php'); ?>
                </div>
                <div id="content-wrapper" class="d-flex flex-column p-5">
                    <div class="status">
                        <div class="card">
                            <div class="card-header text-right">
                                <?php require_once('home_page.php') ?>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center text-uppercase">Thêm số lượng nhóm</h3>
                                <label>Số lượng nhóm có thể đăng kí hiện tại:</label>
                                <?php 
                                $count_groupsv=mysqli_num_rows(mysqli_query($con,"SELECT* from groupsv"));
                                echo $count_groupsv;

                                ?>
                                

                                <form action="" method="post" role="form"data-parsley-validate>
                                    <label for="">Số lượng nhóm muốn thêm:</label>
                                    <input type="number" class="form-control" name="add_team_number" required data-parsley-length="[1,5]" data-parsley-min="1">
                                    
                                        <button class=" m-2 btn btn-success" name="dangky"><i class="far fa-edit"></i> Thêm</button>
                                        
                                    </div>
                                    <?php 
                                    if (isset($_POST['dangky'])) {
                                        # code...
                                        $check=0;
                                        $add_number = $_POST['add_team_number'];
                                        for($i=0;$i<$add_number;$i++)
                                        {
                                            $check=mysqli_query($con,"INSERT into groupsv () values()");

                                        }
                                        if($check)
                                        {
                                            alert("Thêm thành công");
                                            replace("admin-them-nhom.php");
                                        }
                                        else{
                                            alert("Thêm thất bại");
                                            replace("admin-them-nhom.php");
                                            
                                        }


                                    }
                                    ?>
                                </form>
                            </div> 
                            <div class="card-footer">
                                <?php require_once('inf_footer.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once('filejs.php') ?>
</body>
</html>