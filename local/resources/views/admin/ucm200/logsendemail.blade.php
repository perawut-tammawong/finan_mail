@extends('admin.home')
@section('nav_slide_bar_student')

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
              <th>Select All <br /> <input type="checkbox" name="select-all" id="select-all" /></th>
              <th>รหัสนักเรียน<br /> (iSams)</th>
              <th>ชื่อ<br />Name</th>
              <th>นามสกุล<br />Surname</th>
              <th>ชื่อเล่น<br />Nickname</th>
              <th >แก้ไข<br />Edit</th>
              <th>เวลาแก้ไข<br />Update At</th>
            </tr>
            </thead>
                  <tbody>
                  </tbody>
          </table>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sletemplate_email" >กดเพื่อเลือก Template</button>
           </div>

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

@endsection
