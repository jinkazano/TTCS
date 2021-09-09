<?php

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if (isset($_SESSION['username'])) {
    include 'lib/connect.php';
    $username = $_SESSION['username'];
    $sqlp     = "select * from user where username='$username'";

    $rowp = mysqli_fetch_row(mysqli_query($con, $sqlp));

    $permission = $rowp['6'];
    ?>

    <!-- Side bar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Divider -->
      <hr class="sidebar-divider my-0">
    <?php if ($permission == 'admin') {
        ?>

    <!-- Nav Item - Dành cho giảng viên -->


    <li class="nav-item active">
        <a  class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseTeacher" aria-expanded="true" aria-controls="collapseTeacher">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>
                Dành cho giáo viên
            </span>
        </a>
        <div id="collapseTeacher"class="collapse"
        aria-labelledby="headingTeacher"data-target="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dành cho giáo viên:</h6>
            <a class="collapse-item" href="dang-ki-dinh-huong.php">Đăng kí định hướng</a>
            <a class="collapse-item" href="danh-sach-dinh-huong.php">Danh sách định hướng</a>
            <a class="collapse-item" href="danh-sach-de-tai.php">Danh sách đề tài</a>
          </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Dành cho sinh viên -->
    <li class="nav-item active">
        <a  class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-book-reader"></i>
            <span>
                Dành cho sinh viên
            </span>
        </a>
        <div id="collapseStudent"class="collapse"
        aria-labelledby="headingStudent"data-target="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dành cho sinh viên:</h6>
            <a class="collapse-item" href="dang-ki-nhom.php">Đăng kí nhóm</a>
            <a class="collapse-item" href="danh-sach-nhom.php">Danh sách đăng kí nhóm</a>
            <a class="collapse-item" href="dk-detai.php.php">Đăng kí đề tài</a>
          </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Tài khoản -->
    <li class="nav-item active">
        <a class="nav-link" href="register.php">
            <i class="fas fa-fw fa-user-edit">
            </i>
            <span>
                Đăng kí user
            </span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Đăng xuất -->
    <li class="nav-item active">
        <a class="nav-link" href="ds-user.php">
            <i class="fas fa-fw fa-address-book">
            </i>
            <span>
                Danh sách user
            </span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle">
        </button>
    </div>
    </hr>
    </hr>
    </hr>
    </hr>
    </hr>
</ul>
<?php
}
    if ($permission == "teacher") {
        ?>
      <!-- Nav Item - Dành cho giảng viên -->


     <li class="nav-item active">
        <a  class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseTeacher" aria-expanded="true" aria-controls="collapseTeacher">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>
                Dành cho giáo viên
            </span>
        </a>
        <div id="collapseTeacher"class="collapse"
        aria-labelledby="headingTeacher"data-target="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dành cho giáo viên:</h6>
            <a class="collapse-item" href="dang-ki-dinh-huong.php">Đăng kí định hướng</a>
            <a class="collapse-item" href="danh-sach-dinh-huong.php">Danh sách định hướng</a>
            <a class="collapse-item" href="danh-sach-de-tai.php">Danh sách đề tài</a>
          </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php

    }
    if ($permission == 'student') {
        $idsv           = $_SESSION['username'];
        $is_leader_sqli = mysqli_num_rows(mysqli_query($con, "SELECT * from groupsv where leader ='$idsv'"));
        if ($is_leader_sqli > 0) {

            ?>
      <!-- Nav Item - Dành cho sinh viên (nhóm trưởng) -->
    <li class="nav-item active">
        <a  class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-book-reader"></i>
            <span>
                Dành cho sinh viên
            </span>
        </a>
        <div id="collapseStudent"class="collapse"
        aria-labelledby="headingStudent"data-target="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dành cho sinh viên:</h6>
            <a class="collapse-item" href="dang-ki-nhom.php">Đăng kí nhóm</a>
            <a class="collapse-item" href="dk-gvhuongdan.php">Đăng kí GV hướng dẫn</a>
            <a class="collapse-item" href="dk-detai.php">Đăng kí đề tài</a>
          </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php

        } else {
            ?>
            <!-- Nav Item - Dành cho sinh viên (không phải nhóm trưởng) -->
    <li class="nav-item active">
        <a  class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-book-reader"></i>
            <span>
                Dành cho sinh viên
            </span>
        </a>
        <div id="collapseStudent"class="collapse"
        aria-labelledby="headingStudent"data-target="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dành cho sinh viên:</h6>
            <a class="collapse-item" href="dang-ki-nhom.php">Đăng kí nhóm</a>

          </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

<?php
}
    }
}
?>