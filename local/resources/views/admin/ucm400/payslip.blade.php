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
 รายชื่อนักเรียนสำหรับชำระเงิน
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
              <th>ดูโค็ด</th>
              <th>รหัสนักเรียน<br /> (iSams)</th>
              <th>ชื่อ<br />Name</th>
              <th>นามสกุล<br />Surname</th>
              <th>ชื่อเล่น<br />Nickname</th>
              <th>ข้อมูลผู้ปกครอง<br />Parent</th>
              <th>บันทึกการจ่ายเงิน<br />Payment</th>
              <th >แก้ไข<br />Edit</th>
              <th>เวลาแก้ไข<br />Update At</th>
            </tr>
            </thead>
            <tbody>
                    <form action="{{ url('/for_sendmail') }}" method="get" id="frm_send_mail" />
                    <?php  foreach($get_student as $st){ ?>
                      <tr>
                        <td>{{ $st->student_id }}/{{ $st->parent_customer_id }}/{{ $st->term_id }}</td>
                        <td>{{ $st->school_id }}</td>
                        <td>{{ $st->name }}</td>
                        <td>{{ $st->surname }}</td>
                        <td>{{ $st->nickname }}</td>
                        <td><?php
                        // dd($parent);
                        foreach($parent as $pa)
                        if($st->parent_customer_id == $pa->parent_customer_id){
                          echo $pa->name."&nbsp;";
                          echo $pa->sur_name;
                        }
                         ?></td>
                         <td align="center">
                         <?php   
                                $check = 0;
                                foreach($get_pay as $gp){
                                    if($gp!="0"){
                                        if($gp->student_id == $st->student_id){ 
                                          $check = 1;
                          ?>
                                          <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-updatepay" onclick="pay_slip_get('{{ $st->student_id }}')">ตรวจสอบหรือยกเลิกชำระเงิน</button>
                          <?php
                                        }
                                    }
                                }
                                if($check == 0){
                          ?>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-updatepay" onclick="pay_slip_get('{{ $st->student_id }}')">บันทึกชำระเงิน</button> 
                          <?php 
                                }
                          ?>
                         </td>
                        <td>
                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input " id="customSwitch_<?php echo $st->student_id; ?>" <?php if($st->is_enable == "1"){ echo 'checked'; }?> onclick="student_update_id(<?php echo $st->student_id; ?>)" >
                                <label class="custom-control-label  mousechange" for="customSwitch_<?php echo $st->student_id; ?>" ></label>

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
          <!-- <div class="modal-footer justify-content-between"> -->
            <!-- <button type="button" class="btn btn-primary" onclick="frm_send_mail.submit();">ยืนยัน</button> -->
          <!-- </div> -->

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<div class="modal fade" id="modal-updatepay">
<div class="modal-dialog modal-ml">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">บันทึกการชำระเงิน</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" text-align="center">
                  <div class="row"  text-align="center">
                    <div class="col-sm-12"  text-align="center">
                      <!-- select -->
                      <div >
                        <label >ข้อมูลผู้ชำระเงิน</label>
                          <div class="from-control" id="txtSchoolcode">รหัสนักเรียน</div>
                          <div class="from-control" id="txtName_surname">ชื่อนักเรียน</div>
                          <div class="from-control" id="txtParent">ชื่อผู้ปกครอง</div>
                          <div class="from-control" id="count_of_pay">จำนวนเงินที่ต้องชำระ</div>
                          <div class="from-control" id="accep_for_pay">ต้องการยืนยันการชำระเงิน</div>
                          <input type="hidden" class="from-control" id="school_id" value="" />
                          <input type="hidden" class="from-control" id="term_id" value="" />
                          <input type="hidden" class="from-control" id="paid_id" value="" />
                          <!-- <form action="{{ url('/delstudent') }}" method="get" id="frm_del_student">
                            <input type="hidden" class="form-control" name="txtStudent_del_id" id="txtStudent_del_id" placeholder="" required>
                            <input type="hidden" class="form-control" name="txtTerm" id="txtTerm" />
                          </form> -->
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
  $(function () {
    $('#compose-textarea').summernote()
  })

 function pay_slip_get($id)
 {
   console.log($id);
   // $test = $('#txtName').val();
   // document.getElementById("txtName").innerHTML ="hello";
   $.ajax({url: "{{ url('payupdatesuccess') }}/{{ $term_id }}",
      data: { student_id:$id },
      success: function(result){
        console.log(result);
    }});
   // $('#count_of_pay').innerHTML = "sss";
   // $('#accep_for_pay').innerHTML = "sss";
   // $('#school_id').innerHTML = "fsdaf";
   // $('#term_id').innerHTML = "sadfsdaf";
   // $('#paid_id').innerHTML = "sadfsdfs";
 }
</script>
@endsection
