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
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addyear">
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
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ปีการศึกษา  <?php echo $y->year; ?></span>
              <i class="fas fa-plus mousechange" data-toggle="modal" data-target="#modal-addterm"> เพิ่มภาคการเรียน</i>
              <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button> -->

              <!-- <span class="info-box-number">1,410</span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>



      </div>
      <div class="row">
        <?php $termquery = $term[$y->year]; ?>
        <?php foreach($termquery as $t){ ?>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-<?php if($t->term == 1){
            echo 'info';
          }elseif($t->term == 2){
            echo 'success';
          }elseif($t->term == 3){
            echo 'warning';
          }elseif($t->term == 4){
            echo 'danger';
          }else{
            echo 'Default';
          }
          ?>">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ภาคเรียนที่ <?php echo $t->term; ?>&nbsp;<?php echo $t->description; ?></span>
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
          </div>
        </div>
    <?php } ?>
  </div>
<?php
}
?>
<div class="modal fade" id="modal-addyear">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">เพิ่มปีการศึกษา</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>One fine body&hellip;</p>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-addterm">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">เพิ่มภาคการเรียน</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>ปีการศึกษา</label>
                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                        <label>เลือกภาคการศึกษา</label>
                        <select class="form-control">
                          <option ="1">Term 1</option>
                          <option ="2">Term 2</option>
                          <option ="3">Term 3</option>
                          <option ="4">Summer</option>
                        </select>
                      </div>
                    </div>
                  </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      <button type="button" class="btn btn-primary">ยืนยัน</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



@endsection
@section('javascript_below')
@endsection
