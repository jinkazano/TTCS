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
                <div id="sidebar">
                    <?php require_once('menu_left.php'); ?>
                </div>
                <div id="content-wrapper" class="d-flex flex-column p-5">
                    <div class="status">
                        <div class="card">
                            <div class="card-header text-right">
                                <?php require_once('home_page.php') ?>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center text-uppercase">Đăng kí nhóm</h3>
                                <form action="" method="post">
                                    
                                    <div class="chucnang mt-3">
                                        <button class=" m-2 btn btn-success" name="dangky"><i class="far fa-edit"></i> Đăng kí</button>
                                        
                                    </div>
                                    <?php 

                                    if (isset($_POST['dangky'])) {
                                        # code...
                                        $sv = $_SESSION['username'];
                                        
                                        $check=0;
                                        $checksv=mysqli_num_rows(mysqli_query($con,"SELECT id from groupsv where idsv1='$sv' or idsv2='$sv' or idsv3='$sv'"));
                                        if ($checksv!=0) {
                                            $check=1;
                                            alert( "Bạn đã đăng ký nhóm  rồi!");
                                        }
                                        
                                        if ($check==0) {
                                            $select_null =  mysqli_query($con,"SELECT * FROM `groupsv` WHERE idsv1='' or idsv2='' or idsv3=''");
                                            $current_team= mysqli_fetch_array($select_null);
                                            $current_team_id= $current_team['id'];



                                            if($current_team['idsv1']=="") {
                                                $sqli_update="UPDATE groupsv set idsv1='$sv' where id='$current_team_id'";
                                            }else  if($current_team['idsv2']=="") {
                                                $sqli_update="UPDATE groupsv set idsv2='$sv' where id='$current_team_id'";
                                            }else {
                                                $sqli_update="UPDATE groupsv set idsv3='$sv' where id='$current_team_id'";
                                            }


                                            $sql= mysqli_query($con,$sqli_update);
                                            $current_team_idsv1= mysqli_query($con,"SELECT * from `groupsv` where id='$current_team_id'");
                                            $current_team=mysqli_fetch_array($current_team_idsv1);
                                            $current_team_leader=$current_team['idsv1'];
                                            
                                            
                                            $sqli_set_leader=mysqli_query($con,"UPDATE groupsv set leader='$current_team_leader' where id='$current_team_id'");


                                            if ($sql) {
                                                # code...

                                                alert( "Đăng ký thành công");
                                            }else alert( "Đăng ký thất bại");
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