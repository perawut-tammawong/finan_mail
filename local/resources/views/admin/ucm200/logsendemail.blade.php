@extends('admin.home')
@section('nav_slide_bar_student')
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-circle"></i>
    <p>
      Stu. Year {{ $year }} / {{ $term }}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('studentmanagement') }}/{{ $term_id }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>รายชื่อ Stu. Year {{ $year }} / {{ $term }}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addstudent">
        <i class="far fa-circle nav-icon"></i>
        <p>เพิ่มข้อมูลนักเรียน</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('payterm') }}/{{ $term_id }}" class="nav-link" >
        <i class="far fa-circle nav-icon"></i>
        <p>การชำระเงินค่าเรียน</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('sendemailtoparent_stu') }}/{{ $term_id }}" class="nav-link" >
        <i class="far fa-circle nav-icon"></i>
        <p>การส่งอีเมลล์แก่ผู้เรียน</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('logsendmail') }}/{{ $term_id }}" class="nav-link" >
        <i class="far fa-circle nav-icon"></i>
        <p>บันทึกส่งอีเมลล์</p>
      </a>
    </li>
  </ul>
@endsection
@section('head')
Compose New Message
@endsection
@section('body')


<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">รายชื่อนักเรียน</h3>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>หมายเลขรายการ</th>
              <th>รหัสนักเรียน<br /> iSams Student</th>
              <th>อีเมลล์ที่ส่งออก<br />Email To send</th>
              <th>อีเมลล์ทีแจ้งรับทราบ<br />email To cc</th>
              <th>หัวข้อที่ส่งอีเมลล์<br />email Subject</th>
              <th>เนื้อหาที่ส่งอีเมลล์ <br />email Body</th>
              <th>สถานะการจัดส่งอีเมลล์ <br />status</th>
              <th>รายละเอียดปัญหา <br />Status send</th>
              <th>เวลาที่สร้าง<br />Create At</th>
            </tr>
            </thead>
                  <tbody>
                    <?php foreach($log_email as $log){ ?>
                    <tr>
                      <td>{{ $log->log_email_id }}</td>
                      <td>{{ $log->student_id }}</td>
                      <td>{{ $log->email_to_send }}</td>
                      <td>{{ $log->email_cc }}</td>
                      <td>{{ $log->setFrom_subject }}</td>
                      <td>{{ $log->Set_body }}</td>
                      <td>{{ $log->status }}</td>
                      <td>{{ $log->Status_send }}</td>
                      <td>{{ $log->create_at }}</td>
                    </tr>
                  <?php } ?>
                  </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modal-sletemplate_email">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">หัวข้อในการส่งอีเมลล์</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>เลือกหัวข้อการส่งจดหมาย</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="sleTemplate_email_id" id="sleTemplate_email_id" onchange="getComboA(this)">
                          <option value="" >กรุณาเลือกแม่แบบจดหมาย</option>
                          <?php
                          $get_Template_email_id = DB::table('tb_template_email')->get();
                          foreach($get_Template_email_id as $get_tm_email){ ?>
                          <option value="{{ $get_tm_email->template_email_id }}">{{ $get_tm_email->setFrom_subject }}</option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      <button type="button" class="btn btn-primary" onclick="check_before_accep();">ยืนยัน</button>
    </div>
  </div>
</div>
</div>

   <!-- <div class="modal fade" id="modal-statusbar">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">สถานะการจัดส่งอีเมลล์</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
                     <div class="row">
                       <div class="col-sm-12" align="center">
                         <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                          </div>
                          <span class="progress-description" >
                            0% Increase send email successfully
                          </span>
                       </div>
                     </div>
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
         <a href="{{ url('logsendemail') }}"><button type="button" class="btn btn-primary" >ตรวจสอบข้อมูลการจัดส่งอีเมลล์</button></a>
       </div>
     </div>
   </div>
   </div> -->


@endsection
@section('javascript_below')
<script>
$(function () {
  $("#example1").DataTable({
    "responsive": true,
  });
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
</script>
@endsection
