<?php
$counter = 0;

$date_now = date("m-d");

$get_admin_info = $this->main_model->MOD_GET_ADMIN_INFO($this->session->userdata('current_user_id'));

if ($get_admin_info) {
  foreach ($get_admin_info as $get_admin_info_row) {
    $id = $get_admin_info_row->id;
    $name = $get_admin_info_row->name;
    $user_type = $get_admin_info_row->user_type;
    $image = $get_admin_info_row->image;
    $username = $get_admin_info_row->username;
  }

  if ($image) {
    $image = base_url() . "dist/img/user_upload/" . $image;
  } else {
    $image = base_url() . "dist/img/default_user_image.webp";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Vicinity Entry and Exit System | <?= $current_tab ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>dist/img/logo.png" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker.css">
  <!-- Summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/summernote/summernote-bs4.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Pace-Progress -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- Virtual Select -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/virtual-select/virtual-select.min.css">

  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url() ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url() ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url() ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url() ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url() ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url() ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url() ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.js"></script>
  <!-- Sweetalert -->
  <script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- pace-progress -->
  <script src="<?= base_url() ?>plugins/pace-progress/pace.min.js"></script>
  <!-- TableToExcel -->
  <script type="text/javascript" src="<?= base_url() ?>plugins/table-to-excel/tableToExcel.js"></script>
  <!-- Virtual Select -->
  <script type="text/javascript" src="<?= base_url() ?>plugins/virtual-select/virtual-select.min.js"></script>

  <style>
    .disabled {
      cursor: not-allowed;
      pointer-events: all !important;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed pace-success">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="btn_pushmenu"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="<?= $image ?>" class="rounded-circle img-bordered-sm" style="width: 32px; height: 32px" alt="">&nbsp;&nbsp;<?= $name ?>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" id="btn_edit_admin_profile" href="#" data-toggle="modal" data-target="#edit_admin_profile" admin_id="<?= $id ?>" admin_name="<?= $name ?>" admin_user_type="<?= $user_type ?>" admin_image="<?= $image ?>" admin_username="<?= $username ?>"><i class="fas fa-user-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Account</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#about_the_developers_modal"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;About</a>
            <a class="dropdown-item disabled" href="#" data-toggle="modal" data-target="#settings"><i class="fas fa-cog"></i>&nbsp;&nbsp;&nbsp;&nbsp;Settings&nbsp; <span class="badge badge-danger">Soon</span></a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log Out</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-success elevation-4">
      <!-- Brand Logo -->
      <div class="w-100 text-center pt-4 py-3">
        <img src="<?= base_url() ?>dist/img/logo.png" style="height: auto; width: 200px !important; padding-top: 10px" id="favicon">
      </div>

      <hr class="bg-light">

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Administrator Tabs -->
            <?php if ($user_type == "Administrator") : ?>
              <!-- Attendance Tab -->
              <li class="nav-item">
                <a href="<?= base_url() ?>main/attendance" class="nav-link <?php if ($current_tab == 'Attendance') {
                                                                              echo 'active';
                                                                            } ?> ">
                  <i class="nav-icon far fa-calendar-check"></i>
                  <p>Attendance</p>
                  <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                </a>
              </li>
              <!-- Manage Records Tab -->
              <li class="nav-item <?php if ($current_tab == 'Manage Teacher Account' || $current_tab == 'Manage Student Account') {
                                    echo 'menu-open';
                                  } ?>">
                <a href="#" class="nav-link <?php if ($current_tab == 'Manage Teacher Account' || $current_tab == 'Manage Student Account') {
                                              echo 'active';
                                            } ?>">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    Manage Records
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <!-- Teacher -->
                  <li class="nav-item">
                    <a href="<?= base_url() ?>main/manage_teacher" class="nav-link <?php if ($current_tab == 'Manage Teacher Account') {
                                                                                      echo 'active';
                                                                                    } ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teacher</p>
                      <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                    </a>
                  </li>
                  <!-- Student -->
                  <li class="nav-item">
                    <a href="<?= base_url() ?>main/manage_student" class="nav-link <?php if ($current_tab == 'Manage Student Account') {
                                                                                      echo 'active';
                                                                                    } ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student</p>
                      <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- Attendance Records Tab -->
              <li class="nav-item <?php if ($current_tab == 'Teacher Attendance Record' || $current_tab == 'Student Attendance Record' || $current_tab == 'Visitor Attendance Record') {
                                    echo 'menu-open';
                                  } ?>">
                <a href="#" class="nav-link <?php if ($current_tab == 'Teacher Attendance Record' || $current_tab == 'Student Attendance Record' || $current_tab == 'Visitor Attendance Record') {
                                              echo 'active';
                                            } ?>">
                  <i class="nav-icon far fa-list-alt"></i>
                  <p>
                    Attendance Records
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <!-- Teacher -->
                  <li class="nav-item">
                    <a href="<?= base_url() ?>main/attendance_teacher" class="nav-link <?php if ($current_tab == 'Teacher Attendance Record') {
                                                                                          echo 'active';
                                                                                        } ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teacher</p>
                      <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                    </a>
                  </li>
                  <!-- Student -->
                  <li class="nav-item">
                    <a href="<?= base_url() ?>main/attendance_student" class="nav-link <?php if ($current_tab == 'Student Attendance Record') {
                                                                                          echo 'active';
                                                                                        } ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student</p>
                      <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                    </a>
                  </li>
                  <!-- Visitor -->
                  <li class="nav-item">
                    <a href="<?= base_url() ?>main/attendance_visitor" class="nav-link <?php if ($current_tab == 'Visitor Attendance Record') {
                                                                                          echo 'active';
                                                                                        } ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Visitor</p>
                      <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                    </a>
                  </li>
                </ul>
              </li>
            <?php else : ?>
              <!-- Attendance Records Tab -->
              <li class="nav-item">
                <a href="<?= base_url() ?>main/attendance_teacher_specific" class="nav-link <?php if ($current_tab == 'My Personal Attendance') {
                                                                                              echo 'active';
                                                                                            } ?>">
                  <i class="far fa-calendar-check nav-icon"></i>
                  <p>My Attendance</p>
                  <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>main/attendance_student_specific" class="nav-link <?php if ($current_tab == 'My Students Attendance') {
                                                                                              echo 'active';
                                                                                            } ?>">
                  <i class="fas fa-user-check nav-icon"></i>
                  <p>Student's Attendance</p>
                  <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </aside>