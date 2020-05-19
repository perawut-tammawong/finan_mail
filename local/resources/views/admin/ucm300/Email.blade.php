@extends('admin.home')
@section('nav_slide_bar_email')
<!-- <li class="nav-header">การจัดการข้อมูลอีเมลล์</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-circle"></i>
    <p>
      การตั้งค่าอีเมลล์
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('/seeting_email') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>ตั้งค่าระบบอีเมลล์</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addyear">
        <i class="far fa-circle nav-icon"></i>
        <p>ร่างหัวข้อการส่งอีเมลล์ </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-deleteyear">
        <i class="far fa-circle nav-icon"></i>
        <p>ลบข้อมูลปีการศึกษา</p>
      </a>
    </li>
  </ul>
</li> -->
@endsection
@section('head')
Setting Email
@endsection
@section('body')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">การตั้งค่าอีเมลล์ <?php //dd($email); ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-6" >
              <div class="form-group">
                <label>SMTPDebug</label>
                      <input type="text" class="form-control" id="txtSmtpdebug" name="txtSmtpdebug" value="{{ $email->SMTPDebug }}" placeholder="SMTP Debug">
                      <!-- <label>isSMTP</label>
                      <input type="text" class="form-control" id="txt" name="txtisSMTP" value="{{ $email->isSMTP }}" placeholder="isSMTP"> -->
                      <label>Host</label>
                      <input type="text" class="form-control" id="txtHost" name="txtHost" value="{{ $email->Host }}" placeholder="Host">
                      <label>SMTPAuth</label>
                      <input type="text" class="form-control" id="txtSMTPAuth" name="txtSMTPAuth" value="{{ $email->SMTPAuth }}" placeholder="SMTPAuth">
                      <!-- <label>SMTPSecure</label>
                      <input type="text" class="form-control" id="txt" name="SMTPSecure" value="{{ $email->SMTPSecure }}" placeholder="SMTPSecure"> -->
                      <label>Port</label>
                      <input type="text" class="form-control" id="txtPort" name="txtPort" value="{{ $email->Port }}" placeholder="Port">
                      <label>Username</label>
                      <input type="text" class="form-control" id="txtUsername" name="txtUsername" value="{{ $email->Username }}" placeholder="Username">
                      <label>Password</label>
                      <input type="text" class="form-control" id="txtPassword" name="txtPassword" value="{{ $email->Password }}" placeholder="Password">
                      <input type="hidden" class="form-control" name="txtSettingemail_id" id="txtSettingemail_id" value ="" />
             </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" onclick="setting_mail('update_setting');" >บันทึกการตั้งค่า</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-send_test_email"  data-toggle="modal" data-target="#modal-sendemail" >ทดสอบการส่งอีเมลล์</button>
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

  <div class="modal fade" id="modal-send_test_email">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ทดสอบการส่งอีเมลล์</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="row">
                        <!-- select -->
                        <form action="#" method="get" id="frm_email_send">
                        <div class="form-group" >
                              <label>For Testing Email</label>
                              <input type="email" name="txtSendEmail" id="txtSendmail_test" placeholder="กรุณากรอกอีเมลล์" required>
                        </div>
                      </form>
                    </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="sendemail_test()" >ยืนยัน</button>
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
function sendemail_test(){
        $email = document.getElementById("txtSendmail_test").value;
               if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email)){
                          // console.log($email);
                          $.ajax({url: "{{ url('sendemail_to') }}",
                           data: { Sendmail_to:$email  },
                           success: function(result){
                             console.log(result);
                                        const Toast = Swal.mixin({
                                          toast: true,
                                          position: 'top-end',
                                          showConfirmButton: false,
                                          timer: 200
                                        });
                                                      if(result['activity'] == "1"){
                                                            $(document).Toasts('create', {
                                                              class: 'bg-success',
                                                              title: 'อัพเดต',
                                                              autohide: true,
                                                              delay: 30000,
                                                              position: 'bottomRight',
                                                              body: 'การส่งอีเมลล์สำรเร็จ'
                                                            })
                                                          }else{
                                                           $(document).Toasts('create', {
                                                             class: 'bg-warning',
                                                             title: 'อัพเดต',
                                                             autohide: true,
                                                             delay: 30000,
                                                             position: 'bottomRight',
                                                             body: 'เกิดข้อผิดพลาด ตามคำสั่งนี้ '+result['message']
                                                           })
                                                     }
                              }
                           });
                }else{
                  alert("You have entered an invalid email address!")
                  return (false)
                }
}

function setting_mail_send($id){
    // document.getElementById("txtSendEmail").value = $id;
}



function setting_mail(){
  $.ajax({url: "{{ url('setting_update_email') }}",
     data: { Settingemail_id:document.getElementById("txtSettingemail_id").value,
             SMTPDebug:document.getElementById("txtSmtpdebug").value,
             Host:document.getElementById("txtHost").value,
             Port:document.getElementById("txtPort").value,
             Username:document.getElementById("txtUsername").value,
             Password:document.getElementById("txtPassword").value  },
     success: function(result){
       // console.log(result);
          const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 2000
               });
               if(result['settingemail_id'] == "1"){
                 $(document).Toasts('create', {
                   class: 'bg-info',
                   title: 'อัพเดต',
                   autohide: true,
                   delay: 9000,
                   position: 'bottomRight',
                   body: 'Update การตั้งค่า'
                 })
              }
     }});
}
</script>
@endsection
