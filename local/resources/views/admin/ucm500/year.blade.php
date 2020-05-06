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
    <li class="nav-item">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-deleteyear">
        <i class="far fa-circle nav-icon"></i>
        <p>ลบข้อมูลปีการศึกษา</p>
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
              <i class="fas fa-plus mousechange" data-toggle="modal" data-target="#modal-addterm" onclick="passToModel(<?php echo $y->year; ?>)"> เพิ่มภาคการเรียน</i>
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
                <div  data-toggle="modal" data-target="#modal-update_deleteterm" class="col-md-3 mousechange" onclick="passTomodel_delete(<?php echo $y->year; ?>,<?php echo $t->term_id; ?>,<?php echo $t->term; ?>)"><i class="far fa-trash-alt"></i>&nbsp;Del</div>
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
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>ปีการศึกษา</label>
                          <form action="{{ url('/addyearnew') }}" method="get" id="frm_add_year">
                            <select class="form-control" name="sleYear">
                              <option value="<?php echo date('Y', strtotime('+1 year')); ?>"><?php echo date('Y', strtotime('+1 year')); ?></option>
                              <?php
                              $year_start = 2018;
                              $year_end = date('Y');
                              for($i=date('Y');$i>=$year_start;$i--){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                              }
                              ?>
                            </select>
                          </form>
                      </div>
                    </div>
                  </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      <button type="button" class="btn btn-primary" onclick="frm_add_year.submit();">ยืนยัน</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-deleteyear">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">ลบปีการศึกษา</h4>
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
                          <form action="{{ url('/deleteyear') }}" method="get" id="frm_delete_year">
                            <select class="form-control" name="sleYearDel">
                              <?php foreach ($year as $y) { ?>
                                <option value="<?php echo $y->year_id; ?>"><?php echo $y->year; ?></option>';
                              <?php } ?>
                            </select>
                          </form>
                      </div>
                    </div>
                  </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      <button type="button" class="btn btn-primary" onclick="frm_delete_year.submit();">ยืนยัน</button>
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
                          <form action="{{ url('/addyear_term') }}" method="get" id="frm_addyear_term">
                            <input type="hidden" name="txtYear" id="txtYear" value="" />
                            <input type="text" class="form-control" id="txtDitext" placeholder="Enter ..." disabled>
                            <label>เลือกภาคการศึกษา</label>
                            <select class="form-control" name="sleTerm">
                              <option value="1">Term 1</option>
                              <option value="2">Term 2</option>
                              <option value="3">Term 3</option>
                              <option value="4">Summer</option>
                            </select>
                          </form>
                      </div>
                    </div>
                  </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      <button type="button" class="btn btn-primary" onclick="frm_addyear_term.submit();">ยืนยัน</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-update_deleteterm">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">ลบภาคการเรียน</h4>
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
                          <form action="{{ url('/deleteyear_term') }}" method="get" id="frm_delete_update_year">
                            <input type="hidden" name="txtYear_delete" id="txtYear_delete" value="" />
                            <input type="text" class="form-control" id="txtYear_updatedelete_id" placeholder="Enter ..." disabled>
                            <label>ภาคเรียน</label>
                            <input type="hidden" name="txtTerm_id_delete" id="txtTerm_id_delete" value="" />
                            <input type="hidden" name="txtTerm_delete" id="txtTerm_delete" value="" />
                            <input type="text" class="form-control" id="txtTerm_updatedelete_id" placeholder="Enter ..." disabled>

                          </form>
                      </div>
                    </div>
                  </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      <button type="button" class="btn btn-primary" onclick="frm_delete_update_year.submit();">ยืนยัน</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



@endsection
@section('javascript_below')
<script>
function passToModel($id){
     document.getElementById("txtYear").value = $id;
     document.getElementById("txtDitext").placeholder = $id;
}
function passTomodel_delete($year,$term_id,$term){
    document.getElementById("txtYear_delete").value = $year;
    document.getElementById("txtYear_updatedelete_id").placeholder = $year;
    document.getElementById("txtTerm_id_delete").value = $term_id;
    document.getElementById("txtTerm_delete").value = $term;
    document.getElementById("txtTerm_updatedelete_id").placeholder = $term;
}
</script>

@endsection
