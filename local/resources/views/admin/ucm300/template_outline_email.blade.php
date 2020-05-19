@extends('admin.home')
@section('nav_slide_bar_email')

@endsection
@section('head')
Setting Template Email
@endsection
@section('body')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">แม่แบบ ร่างจดหมายอัตโนมัติ </h3> <br />
            <a href="{{ url('addtemplatemail') }}" class="btn btn-success"><font color="white">+ เพิ่มแบบร่างการส่งจดหมาย</font></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="form-group">
                              <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th class="text-center">หัวข้อการส่งอีเมลล์<br /> SetFrom subject</th>
                                  <th class="text-center">เนื้อหาการส่งอีเมลล์<br />Set body</th>
                                  <th class="text-center">คำอธิบาย<br />SetFrom description</th>
                                  <th class="text-center">เนื้อหาที่ต้องการแทรกเพิ่มเติม<br />Field </th>
                                  <th class="text-center">แก้ไข<br />Update At</th>
                                  <th class="text-center">วันเวลาแก้ไขล่าสุด<br />Update At</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($template_mail as $tm){ ?>
                                          <tr>
                                            <td>{{ $tm->setFrom_subject }}</td>
                                            <td>{{ $tm->Set_body }}</td>
                                            <td>{{ $tm->setFrom_description }}</td>
                                            <td class="text-center">
                                              <a href="{{ url('/seefield') }}/<?php echo $tm->template_email_id; ?>" class="btn btn-success btn-sm"><font color="white"><i class="far fa-eye"></i> See Field</font></a>
                                              <button type="button" class="btn btn-success btn-sm" text-align="center" data-toggle="modal" data-target="#modal-AddField" onclick="clear_will_send_meter('<?php echo $tm->template_email_id; ?>')">+ Add Special</button>
                                            </td>
                                            <td class="text-center">
                                <a href="{{ url('editsubjectEmail') }}/<?php echo $tm->template_email_id; ?>" ><font color="black"><i class="fas fa-edit mousechange"></i></font></a>
                                  <i class="far fa-trash-alt mousechange" data-toggle="modal" data-target="#modal-delSubject" onclick="send_id_template('<?php echo $tm->template_email_id; ?>')"  />
                                            </td>
                                            <td>{{ $tm->updated_at }}</td>
                                          </tr>
                                <?php } ?>
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

  <div class="modal fade" id="modal-delSubject">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ลบแม่แบบจดหมาย</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                          <label text-align="center">ต้องการลบ</label>
                            <form action="{{ url('/delete_email') }}" method="get" id="frm_del_templateemail">
                              <input type="hidden" class="form-control" name="txtTemplateemail_del_id" id="txtTemplateemail_del_id" placeholder="" required>
                            </form>
                        </div>
                      </div>
                    </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="frm_del_templateemail.submit();">ยืนยัน</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-AddField">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มฟิลด์ข้อมูล</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                          <!-- <label text-align="center">ต้องการลบ</label> -->
                            <!-- <form action="{{ url('/delete_email') }}" method="get" id="frm_del_templateemail">
                              <input type="hidden" class="form-control" name="txtTemplateemail_del_id" id="txtTemplateemail_del_id" placeholder="" required>
                            </form> -->
                            <label text-align="center">ชื่อฟิวส์</label>
                            <input type="text" class="form-control" name="txtField" id="txtField" placeholder="" required>
                            <label text-align="center">ค่าที่ต้องการ</label>
                            <input type="text" class="form-control" name="txtValue" id="txtValue" placeholder="" required>
                            <input type="hidden" class="form-control" name="txttemplate_email_id" id="txttemplate_email_id" placeholder="" required>
                        </div>
                      </div>
                    </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="send_field_value()">ยืนยัน</button>
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
    function send_id_template($id){
      document.getElementById('txtTemplateemail_del_id').value = $id
    }

    function clear_will_send_meter($id){
        document.getElementById('txtField').value = "";
        document.getElementById('txtValue').value = "";
        document.getElementById('txttemplate_email_id').value = $id;
    }

    function send_field_value(){
      $.ajax({url: "{{ url('addfield') }}",
         data: {template_email_id:document.getElementById('txttemplate_email_id').value,
                 field_name:document.getElementById('txtField').value ,
                 value:document.getElementById('txtValue').value },
         success: function(result){
           console.log(result);
      }});

    }

</script>
@endsection
