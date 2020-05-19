@extends('admin.home')
@section('nav_slide_bar_student')

@endsection
@section('head')
Email for send to parent
<br />
Template Email for send to parent
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
                      <form action="{{ url('/frm_send_template_mail') }}" method="get" id="frm_send_template_mail" />
                      <?php  foreach($get_student as $st){ ?>
                        <tr>
                          <td><input type="checkbox" name="school_id[]" id="checkbox[-<?php echo $st->student_id; ?>]" value="<?php echo $st->student_id; ?>" /></td>
                          <td>{{ $st->school_id }}</td>
                          <td>{{ $st->name }}</td>
                          <td>{{ $st->surname }}</td>
                          <td>{{ $st->nickname }}</td>
                          <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                  <i class="fas fa-edit mousechange" data-toggle="modal" data-target="#modal-editstudent" onclick="student_send_id('<?php echo $st->student_id; ?>','<?php echo $st->school_id; ?>','<?php echo $st->name; ?>','<?php echo $st->surname; ?>','<?php echo $st->nickname; ?>','<?php echo $st->parent_customer_id; ?>','<?php echo $st->term_id; ?>')"></i>&nbsp;&nbsp;
                                  <i class="far fa-trash-alt mousechange" data-toggle="modal" data-target="#modal-delstudent" onclick="student_delete_id(<?php echo $st->student_id; ?>,<?php echo $st->term_id; ?>)" ></i></div></td>
                                </div>
                            </div>
                          </td>
                          <td><lable id="update_stu<?php echo $st->student_id; ?>">{{ $st->updated_at }}</lable></td>
                        </tr>
                      <?php }  ?>
                          <input type="hidden" name="sle_template" id="sle_template" value="" />
                    </form>
              </tbody>
            </table>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sletemplate_email" >กดเพื่อเลือก Template</button>
             </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
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
                        <!-- select -->
                        <div class="form-group">

                          <label>เลือกหัวข้อการส่งจดหมาย</label>
                          <select class="form-control select2bs4" style="width: 100%;" name="sleTemplate_email_id" id="sleTemplate_email_id" onchange="getComboA(this)">
                            <option value="" >กรุณาเลือกชื่อผู้ปกครอง</option>
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
        <button type="button" class="btn btn-primary" onclick="frm_send_template_mail.submit();">ยืนยัน</button>
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
$('#select-all').click(function(event) {
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});


function getComboA(selectObject) {
  var value = selectObject.value;
  document.getElementById("sle_template").value = value;
}
</script>

@endsection
