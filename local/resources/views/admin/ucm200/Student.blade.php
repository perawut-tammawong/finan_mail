@extends('admin.home')
<!-- @section('nav_slide_bar')
<li class="nav-header">การจัดการข้อมูลปีการศึกษา</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-circle"></i>
    <p>
      ปีการศึกษา
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>ข้อมูลปีการศึกษา</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addyear">
        <i class="far fa-circle nav-icon"></i>
        <p>เพิ่มข้อมูลปีการศึกษา</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-deleteyear">
        <i class="far fa-circle nav-icon"></i>
        <p>ลบข้อมูลปีการศึกษา</p>
      </a>
    </li>
  </ul>
</li>
@endsection -->
@section('head')
Management Student <br />Year {{ $year }}  Term {{ $term }}
@endsection
@section('body')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">รายชื่อนักเรียน</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>


รหัสนักเรียน(iSams)
ชื่อ
นามสกุล
ชื่อเล่น
ชื่อผู้ปกครอง


                <th>รหัสนักเรียน<br /> (iSams)</th>
                <th>ชื่อ<br />Name</th>
                <th>นามสกุล<br />Surname</th>
                <th>ชื่อเล่น<br />Nickname</th>
                <th>ข้อมูลผู้ปกครอง<br />Parent</th>
                <th >แก้ไข<br />Edit</th>
                <th>เวลาแก้ไข<br />Update At</th>
                <th>เวลาสร้างข้อมูล<br />Create At</th>
              </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

@endsection
@section('javascript_below')
@endsection
