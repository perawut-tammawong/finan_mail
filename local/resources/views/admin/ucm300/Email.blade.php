@extends('admin.home')
@section('nav_slide_bar_student')
<!-- <li class="nav-header">การจัดการข้อมูลปีการศึกษา</li>
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
            <h3 class="card-title">การตั้งค่าอีเมลล์</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-6" >
                              <div class="form-group">
                               <label>SMTPDebug</label>
                               <input type="text" class="form-control" id="txt" name="txtSmtpdebug" placeholder="SMTP Debug">
                               <label>isSMTP</label>
                               <input type="text" class="form-control" id="txt" name="txtisSMTP" placeholder="isSMTP">
                               <label>Host</label>
                               <input type="text" class="form-control" id="txt" name="txtHost" placeholder="Host">
                               <label>SMTPAuth</label>
                               <input type="text" class="form-control" id="txt" name="txtSMTPAuth" placeholder="SMTPAuth">
                               <label>SMTPSecure</label>
                               <input type="text" class="form-control" id="txt" name="SMTPSecure" placeholder="SMTPSecure">
                               <label>Port</label>
                               <input type="text" class="form-control" id="txt" name="txtPort" placeholder="Port">
                               <label>Username</label>
                               <input type="text" class="form-control" id="txt" name="txtUsername" placeholder="Username">
                               <label>Password</label>
                               <input type="text" class="form-control" id="txt" name="txtPassword" placeholder="Password">
                             </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" onclick="frm_del_parent.submit();">บันทึกการตั้งค่า</button>
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
// function student_update_id($id){
//   $.ajax({url: "{{ url('studentupdate') }}",
//      data: { student_id:$id },
//      success: function(result){
//        const Toast = Swal.mixin({
//          toast: true,
//          position: 'top-end',
//          showConfirmButton: false,
//          timer: 200
//        });
//        // console.log(result['is_enable']);
//        if(result['is_enable'] == "0") {
//          $(document).Toasts('create', {
//            class: 'bg-warning',
//            title: 'อัพเดต',
//            autohide: true,
//            delay: 900,
//            position: 'bottomRight',
//            body: 'ยกเลิกการรายชื่อนักเรียนชั่วคราว'
//          })
//        }else{
//          $(document).Toasts('create', {
//            class: 'bg-info',
//            title: 'อัพเดต',
//            autohide: true,
//            delay: 900,
//            position: 'bottomRight',
//            body: 'อนุญาติรายชื่อใช้งานได้อีกครั้ง'
//          })
//        }
//        var d = new Date(result['updated_at']);
//        document.getElementById("update_stu"+result['student_id']).innerHTML = d.getFullYear()+"-"+parseInt(d.getMonth()+1, 10)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
//   }});
// }
//
// function student_send_id($student_id,$school_id,$name,$sur_name,$nickname,$parent_customer_id,$term_edit){
//   document.getElementById("txtStudent_id").value = $student_id;
//   document.getElementById("txtSchool_id").value = $school_id;
//   document.getElementById("txtName").value = $name;
//   document.getElementById("txtSurname").value = $sur_name;
//   document.getElementById("txtNickname").value = $nickname;
//   document.getElementById("txtTerm_edit").value = $term_edit;
// }
//
//
// function student_delete_id($id,$term)
// {
//   document.getElementById("txtStudent_del_id").value = $id;
//   document.getElementById("txtTerm").value = $term;
// }
//
// $('#select-all').click(function(event) {
//     if(this.checked) {
//         // Iterate each checkbox
//         $(':checkbox').each(function() {
//             this.checked = true;
//         });
//     } else {
//         $(':checkbox').each(function() {
//             this.checked = false;
//         });
//     }
// });
//
// $(function () {
//     //Initialize Select2 Elements
//     $('.select2').select2()
//
//     //Initialize Select2 Elements
//     $('.select2bs4').select2({
//       theme: 'bootstrap4'
//     })
//
//     //Datemask dd/mm/yyyy
//     $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//     //Datemask2 mm/dd/yyyy
//     $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//     //Money Euro
//     $('[data-mask]').inputmask()
//
//     //Date range picker
//     $('#reservationdate').datetimepicker({
//         format: 'L'
//     });
//     //Date range picker
//     $('#reservation').daterangepicker()
//     //Date range picker with time picker
//     $('#reservationtime').daterangepicker({
//       timePicker: true,
//       timePickerIncrement: 30,
//       locale: {
//         format: 'MM/DD/YYYY hh:mm A'
//       }
//     })
//     //Date range as a button
//     $('#daterange-btn').daterangepicker(
//       {
//         ranges   : {
//           'Today'       : [moment(), moment()],
//           'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//           'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
//           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//           'This Month'  : [moment().startOf('month'), moment().endOf('month')],
//           'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//         },
//         startDate: moment().subtract(29, 'days'),
//         endDate  : moment()
//       },
//       function (start, end) {
//         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
//       }
//     )
//
//     //Timepicker
//     $('#timepicker').datetimepicker({
//       format: 'LT'
//     })
//
//     //Bootstrap Duallistbox
//     $('.duallistbox').bootstrapDualListbox()
//
//     //Colorpicker
//     $('.my-colorpicker1').colorpicker()
//     //color picker with addon
//     $('.my-colorpicker2').colorpicker()
//
//     $('.my-colorpicker2').on('colorpickerChange', function(event) {
//       $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
//     });
//
//     $("input[data-bootstrap-switch]").each(function(){
//       $(this).bootstrapSwitch('state', $(this).prop('checked'));
//     });
//
//   })
</script>
@endsection
