@extends('admin.home')
@section('nav_slide_bar')
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
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>เพิ่มข้อมูลปีการศึกษา</p>
      </a>
    </li>
  </ul>
</li>
@endsection
@section('head')
Management Year / Term
@endsection
@section('topic')
All Year
@endsection
@section('body')
<!-- =========================================================== -->
<h5 class="mt-4 mb-2 "></h5>

<?php
foreach ($year as $y) {
?>
<br />
<br />
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ปีการศึกษา  <?php echo $y->year; ?></span>
              <!-- <span class="info-box-number">1,410</span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>



      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ภาคเรียนที่ 1</span>
              <!-- <span class="info-box-number">จำนวนนักเรียน 41,410</span> -->

              <div class="progress">
                <!-- <div class="progress-bar" style="width: 70%"></div> -->
              </div>
              <span class="progress-description">
                <!-- 70% จำนวนนักเรียนที่ชำระเงิน -->
              </span>
              <br />
              <div class="row">
                <div class="col-md-3 mousechange"><i class="fas fa-pen"></i>&nbsp;Edit</div>
                <div class="col-md-3 mousechange"><i class="far fa-trash-alt"></i>&nbsp;Del</div>
              </div>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->

      </div>
      <!-- /.row -->
<?php
}
?>



@endsection
@section('javascript_below')
@endsection
