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
<li class="nav-item">
  <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-addstudent">
    <i class="far fa-circle nav-icon"></i>
    <p>เพิ่มข้อมูลนักเรียน</p>
  </a>
</li>
@endsection
@section('head')
Management Student <br />Year {{ $year }}  Term {{ $term }}
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
                <th>ข้อมูลผู้ปกครอง<br />Parent</th>
                <th >แก้ไข<br />Edit</th>
                <th>เวลาแก้ไข<br />Update At</th>
              </tr>
              </thead>
              <tbody>
                      <form action="{{ url('/for_sendmail') }}" method="get" id="frm_send_mail" />
                      <?php  foreach($get_student as $st){ ?>
                        <tr>
                          <td><input type="checkbox" name="checkbox[]" id="checkbox[-<?php echo $st->student_id; ?>]" value="<?php echo $st->student_id; ?>" /></td>
                          <td>{{ $st->school_id }}</td>
                          <td>{{ $st->name }}</td>
                          <td>{{ $st->surname }}</td>
                          <td>{{ $st->nickname }}</td>
                          <td><?php
                          foreach($parent as $pa)
                          if($st->parent_customer_id == $pa->parent_customer_id){
                            echo $pa->name."&nbsp;";
                            echo $pa->sur_name;
                          }
                           ?></td>
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
                    </form>
              </tbody>
            </table>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" onclick="frm_send_mail.submit();">ยืนยัน</button>
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
  <div class="modal fade" id="modal-editstudent">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">แก้ไขข้อมูลนักเรียน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>กรุณากรอกข้อมูลให้ครบ</label>
                            <form action="{{ url('/editstudent') }}" method="get" id="frm_edit_student">
                              <label>รหัสนักเรียน</label>
                              <input type="text" class="form-control" name="txtSchool_id" id="txtSchool_id" placeholder="" required>
                              <label>ชื่อ</label>
                              <input type="text" class="form-control" name="txtName" id="txtName" placeholder="" required>
                              <label>นามสกุล</label>
                              <input type="text" class="form-control" name="txtSurname" id="txtSurname" placeholder="" required>
                              <label>ชื่อเล่น</label>
                              <input type="text" class="form-control" name="txtNickname" id="txtNickname" placeholder="" required>
                              <input type="hidden" class="form-control" name="txtStudent_id" id="txtStudent_id" placeholder="" />
                              <input type="hidden" class="form-control" name="txtTerm_edit" id="txtTerm_edit" placeholder="" />
                                  <div class="form-group">
                                    <label>ชื่อผู้ปกครอง</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="sleParent_id" id="sleParent_id">
                                      <option value="" >กรุณาเลือกชื่อผู้ปกครอง</option>
                                      <?php
                                      $get_sleparent = DB::table('tb_parent')->get();
                                      foreach($get_sleparent as $pa_sel){ ?>
                                      <option value="{{ $pa_sel->parent_customer_id }}">{{ $pa_sel->name }}&nbsp;{{ $pa_sel->sur_name }}</option>
                                      <?php } ?>
                                    </select>
                                  </div>
                            </form>
                        </div>
                      </div>
                    </div>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="frm_edit_student.submit();">ยืนยัน</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-delstudent">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ลบชื่อนักเรียน</h4>
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
                            <form action="{{ url('/delstudent') }}" method="get" id="frm_del_student">
                              <input type="hidden" class="form-control" name="txtStudent_del_id" id="txtStudent_del_id" placeholder="" required>
                              <input type="hidden" class="form-control" name="txtTerm" id="txtTerm" />
                            </form>
                        </div>
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
function student_update_id($id){
  $.ajax({url: "{{ url('studentupdate') }}",
     data: { student_id:$id },
     success: function(result){
       const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 200
       });
       // console.log(result['is_enable']);
       if(result['is_enable'] == "0") {
         $(document).Toasts('create', {
           class: 'bg-warning',
           title: 'อัพเดต',
           autohide: true,
           delay: 900,
           position: 'bottomRight',
           body: 'ยกเลิกการรายชื่อนักเรียนชั่วคราว'
         })
       }else{
         $(document).Toasts('create', {
           class: 'bg-info',
           title: 'อัพเดต',
           autohide: true,
           delay: 900,
           position: 'bottomRight',
           body: 'อนุญาติรายชื่อใช้งานได้อีกครั้ง'
         })
       }
       var d = new Date(result['updated_at']);
       document.getElementById("update_stu"+result['student_id']).innerHTML = d.getFullYear()+"-"+parseInt(d.getMonth()+1, 10)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
  }});
}

function student_send_id($student_id,$school_id,$name,$sur_name,$nickname,$parent_customer_id,$term_edit){
  document.getElementById("txtStudent_id").value = $student_id;
  document.getElementById("txtSchool_id").value = $school_id;
  document.getElementById("txtName").value = $name;
  document.getElementById("txtSurname").value = $sur_name;
  document.getElementById("txtNickname").value = $nickname;
  document.getElementById("txtTerm_edit").value = $term_edit;
}


function student_delete_id($id,$term)
{
  document.getElementById("txtStudent_del_id").value = $id;
  document.getElementById("txtTerm").value = $term;
}

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

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
@endsection
