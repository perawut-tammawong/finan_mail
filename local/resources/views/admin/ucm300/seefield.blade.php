@extends('admin.home')
@section('head')
See Field to merge
@endsection
@section('body')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">แก้ไขแม่แบบ ร่างจดหมาย เพิ่ม Field set</h3> <br />
              <a href="{{ url('linetemplate') }}"> <-- ย้อนกลับ</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                 <div class="form-group row">
                     <div class="col-md-6">
                              <form action="{{ url('/editupdateEmail') }}" method="get" id="frm_edit_field">
                                    <label>Subject Email หัวข้อการส่งอีเมลล์</label>
                                    <input type="text" class="form-control" name="txtsetFrom_subject" id="txtsetFrom_subject" placeholder="" value="<?php echo $template_email->setFrom_subject; ?>" required>
                                    <label>Body เนื้อหาการส่งอีเมลล์</label>
                                          <div class="form-group">
                                              <textarea id="compose-textarea" class="form-control" name="textareaSet_body" style="height: 300px"><?php echo $template_email->Set_body; ?></textarea>
                                                        </div>
                                                        <input type="hidden" class="form-control" name="txtTemplate_email_id" id="txtTemplate_email_id" value="<?php echo $template_email->template_email_id; ?>" placeholder="" required>
                                                  <label>คำอธิบาย</label>
                                              <input type="text" class="form-control" name="txtsetFrom_description" id="txtsetFrom_description" placeholder="" value="<?php echo $template_email->setFrom_description; ?>" required>
                                    </form>
                        </div>
                        <div class="col-md-6">
                          <div class="card card-default">
          
                        </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" onclick="frm_edit_field.submit();">ยืนยัน</button>
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
    <!-- /.content -->

@endsection
@section('javascript_below')
<script>
  $(function () {
    $('#compose-textarea').summernote()
  })
</script>
@endsection
