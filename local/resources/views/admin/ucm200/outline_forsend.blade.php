@extends('admin.home')
@section('nav_slide_bar_student')

@endsection
@section('head')
Compose New Message
@endsection
@section('body')


   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">
           <a href="{{ url('sendemailtoparent_stu') }}/{{ $term_id }}" class="btn btn-primary btn-block mb-3"><font color="white">Back to Inbox</font></a>


           <!-- /.card -->
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">Field ตัวอย่าง </h3>

               <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                 </button>
               </div>
             </div>
             <!-- /.card-header -->
             <div class="card-body p-0">
               <ul class="nav nav-pills flex-column">
                 <li class="nav-item">
                   <a class="nav-link" href="sdfdsf"><i class="far fa-circle text-danger"></i> ชื่อ นามสกุล</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="test2"><i class="far fa-circle text-warning"></i> จำนวนเงินที่ต้องชำระ</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="test3"><i class="far fa-circle text-primary"></i> กำหนดวันที่ชำระเงิน</a>
                 </li>
               </ul>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
         <div class="col-md-9">
           <div class="card card-primary card-outline">
             <div class="card-header">
               <h3 class="card-title">สร้างเนื้อหาจดหมายของคุณ</h3>
             </div>
             <!-- /.card-header -->
             <form action="{{ url('frm_send_real_email') }}" method="get" id="frm_send_email_student">
             <div class="card-body">
               <div class="form-group">
                              <div class="form-group">
                                <label>Multiple</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" name="sle_student[]" data-placeholder="Select Student" style="width: 100%;">
                                      <?php foreach($all_stu as $stu){ ?>
                                        <option value="{{ $stu->student_id }}"
                                            <?php foreach($student_stu as $stu_select){
                                                      if($stu->student_id == $stu_select){
                                                        echo 'selected';
                                                      }
                                                  }
                                            ?>>{{ $stu->name }}&nbsp;{{ $stu->surname }}</option>
                                          <?php } ?>
                                    </select>
                                </div>
                              </div>
               <div class="form-group">
                 <input class="form-control" name="txtSubject" id="txtSubjectmail" value="{{ $setFrom_subject }}" placeholder="Subject:">
               </div>
               <div class="form-group">
                   <textarea id="compose-textarea" name="txtAreaBody" class="form-control" style="height: 900px">{{ $Set_body }}
                   </textarea>
               </div>
             </div>
             <!-- /.card-body -->
             <div class="card-footer">
               <div class="float-right">
                 <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Preview Email</button>
                 <button type="button" class="btn btn-primary" onclick="student_send_id('hello');" ><i class="far fa-envelope"></i> Send</button>

               </div>
             </div>
           </form>
             <!-- /.card-footer -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->

   <div class="modal fade" id="modal-statusbar">
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
                       <div class="col-sm-12">
                         <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                          </div>
                          <span class="progress-description">
                            <p align="center">70% Increase in 30 Days</p>
                          </span>
                         <!-- select -->
                         <!-- <div class="form-group">
                           <label text-align="center">ต้องการลบ</label>
                             <form action="{{ url('/delstudent') }}" method="get" id="frm_del_student">
                               <input type="hidden" class="form-control" name="txtStudent_del_id" id="txtStudent_del_id" placeholder="" required>
                               <input type="hidden" class="form-control" name="txtTerm" id="txtTerm" />
                             </form>
                         </div> -->
                       </div>
                     </div>
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
         <button type="button" class="btn btn-primary" onclick="frm_del_student.submit();">ยืนยัน</button>
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
  $(function () {
    $('#compose-textarea').summernote()
  })
</script>
<script>
  $(function () {
    $('.select2').select2()
  })

  function send_mail_test(){
    console.log('hello');
    var values = $('.select2').val();
    console.log(values);

  }

</script>
<script>
function student_send_id($test){
  var values = $('.select2').val();
  $("#modal-statusbar").modal();

  // document.getElementsByClassName("progress-bar")[0].style.width = "50%";
  var num = values.length;
  var sum_send_mail = 100 / num;
  var increase = 0;
  var persent_show;
  values.forEach(sendmail);
  function sendmail(item) {

    increase += Math.round(sum_send_mail);
    if(increase>=100){ increase=100; }
    persent_show="width:"+increase+"%";
    // console.log(persent_show);


    $.ajax({url: "{{ url('frm_send_real_email') }}",
       data: { student_id:item,
              txtSubject:$('#txtSubjectmail').val(),
              txtAreaBody:$('#compose-textarea').val()
              },
       success: function(result){
          document.getElementsByClassName("progress-bar")[0].setAttribute("style", persent_show);
       }});
           // student_id:item,
           // txtSubject:$('#txtSubjectmail').val(),
           // txtAreaBody:$('#compose-textarea').val()
  }


}
</script>
@endsection
