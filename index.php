<?php
session_start();
$_SESSION['username'] = "admin";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title>
        Thực tập cơ sở
    </title>
    <?php require_once 'filecss.php'?>
    </meta>
    </meta>
</head>

<body id="page-top">
    <div id="">
        <div class="">
            <?php require_once 'logo.php';?>
            <?php if (isset($_SESSION['username']) == "") {
    ?>
            <center>
                <div class="main">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="status">
                                <div class="card">
                                    <div class="card-header text-right">
                                        <?php require_once 'home_page.php'?>
                                    </div>
                                    <div class="card-body">
                                        <?php require_once 'profile.php'?>
                                    </div>
                                    <div class="card-footer">
                                        <?php require_once 'inf_footer.php'?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </center>
            <?php } else {?>
            <div class="main">
                <div id="wrapper">
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <?php require_once 'menu_left.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div class="d-flex flex-column" id="content-wrapper">
    <!-- main content -->
    <div class="content p-5">
        <div class="card">
            <div class="card-header bg-sweetAiran text-right">
                <?php require_once 'home_page.php'?>
            </div>
            <div class="card-body">
                <?php require_once 'profile.php'?>
            </div>
            <div class="card-footer bg-sweetAiran">
                <?php require_once 'inf_footer.php'?>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php require_once 'filejs.php'?>
<!-- Subiz -->
<script>
(function(s, u, b, i, z) {
    u[i] = u[i] || function() {
        u[i].t = +new Date();
        (u[i].q = u[i].q || []).push(arguments);
    };
    z = s.createElement('script');
    var zz = s.getElementsByTagName('script')[0];
    z.async = 1;
    z.src = b;
    z.id = 'subiz-script';
    zz.parentNode.insertBefore(z, zz);
})(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
subiz('setAccount', 'acqdtbbizzcbfxfjnaro');
</script>
<!-- End Subiz -->