<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 3</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/AdminLTE/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
  .mousechange:hover {
    cursor: pointer;
  }
  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini control-sidebar-slide-open accent-lightblue">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->


      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="{{ url('/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Finance - Email to parent</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-header"></li>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addparent">
               <i class="fas fa-circle nav-icon"></i>
               <p>เพิ่มรายชื่อผู้ปกครอง</p>
             </a>
           </li>
        </ul>

        <li class="nav-header">Parent รายชื่อผู้ปกครอง</li>
        <li class="nav-item">
          <a href="{{ url('parentmanament') }}" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>รายชื่อผู้ปกครอง</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              จัดการรายชื่อ
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link"  data-toggle="modal" data-target="#modal-addparent">
                <i class="far fa-circle nav-icon"></i>
                <p>เพิ่มรายชื่อผู้ปกครอง</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-header">Year ปีการศึกษา</li>
        <li class="nav-item">
          <a href="{{ url('yearmanament') }}" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>การจัดการปีการศึกษา </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              ข้อมูลปีการศึกษา
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addyear">
                <i class="far fa-circle nav-icon"></i>
                <p>เพิ่มข้อมูลปีการศึกษา</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addyear">
                <i class="far fa-circle nav-icon"></i>
                <p>เพิ่มข้อมูลปีการศึกษา</p>
              </a>
            </li>
            @yield('nav_slide_bar_student')
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>การจัดการนักเรียน</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                      ข้อมูลนักเรียน
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addyear">
                        <i class="far fa-circle nav-icon"></i>
                        <p>เพิ่มข้อมูลนักเรียน</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addyear">
                        <i class="far fa-circle nav-icon"></i>
                        <p>เพิ่มข้อมูลนักเรียนแบบไฟล์</p>
                      </a>
                    </li>
                  </ul> -->
          </ul>

          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('head')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">@yield('topic')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
@yield('body')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ url('/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ url('/AdminLTE/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ url('/AdminLTE/dist/js/pages/dashboard3.js') }}"></script>
<script src="{{ url('/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ url('/AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ url('/AdminLTE/plugins/toastr/toastr.min.js') }}"></script>

@yield('javascript_below')

<div class="modal fade" id="modal-addparent">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">เพิ่มชื่อผู้ปกครอง</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>กรุณากรอกข้อมูลให้ครบ</label>
                          <form action="{{ url('/addparent') }}" method="get" id="frm_add_parent">
                            <label>รหัสบัญชีผู้ปกครอง</label>
                            <input type="text" class="form-control" name="txtExpress_id" placeholder="" required>
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="txtName" placeholder="" required>
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" name="txtSurname" placeholder="" required>
                            <label>อีเมลล์ที่สามารถส่งถึง</label>
                            <input type="text" class="form-control" name="txtEmail_to" placeholder="" required>
                            <label>อีเมลล์ที่ต้องการแจ้งให้ทราบ</label>
                            <input type="text" class="form-control" name="txtEmail_CC" placeholder="" required>
                          </form>
                      </div>
                    </div>
                  </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      <button type="button" class="btn btn-primary" onclick="frm_add_parent.submit();">ยืนยัน</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
if (isset($term)==1){ ?>
  <div class="modal fade" id="modal-addstudent">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มชื่อนักเรียน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                          <label>กรุณากรอกข้อมูลให้ครบ</label>
                            <form action="{{ url('/studentmanagement//addstudent') }}" method="get" id="frm_add_student">
                              <label>รหัสนักเรียน</label>
                              <input type="text" class="form-control" name="txtSchool_id" placeholder=""  required>
                              <label>ชื่อ</label>
                              <input type="text" class="form-control" name="txtName" placeholder="" required>
                              <label>นามสกุล</label>
                              <input type="text" class="form-control" name="txtSurname" placeholder="" required>
                              <label>ชื่อเล่น</label>
                              <input type="text" class="form-control" name="txtNickname" placeholder="" required>

                                  <label>เลือกชื่อผู้ปกครอง</label>
                                  <select class="form-control select2 select2-danger" name="sleParent" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <?php
                                    $get_sleparent = DB::table('tb_parent')->get();
                                    foreach($get_sleparent as $pa_sel){ ?>
                                      <option value="{{ $pa_sel->parent_customer_id }}">{{ $pa_sel->name }}&nbsp;{{ $pa_sel->sur_name }}</option>
                                    <?php } ?>
                                  </select>
                              <!-- <label>อีเมลล์ที่ต้องการแจ้งให้ทราบ</label>
                              <input type="text" class="form-control" name="txtEmail_CC" placeholder="" required> -->
                            </form>
                        </div>
                      </div>
                    </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="frm_add_student.submit();">ยืนยัน</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>




</body>
</html>
