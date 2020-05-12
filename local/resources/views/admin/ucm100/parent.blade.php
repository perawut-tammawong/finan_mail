@extends('admin.home')
<!-- @section('nav_slide_bar')
<li class="nav-header">การจัดการข้อมูลปีการศึกษา</li>
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
</li>
@endsection -->
@section('head')
Management Parent
@endsection
@section('body')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">รายชื่อผู้ปกครอง</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>รหัสบัญชีผู้ปกครอง<br /> Express customer</th>
                <th>ชื่อ<br />Name</th>
                <th>นามสกุล<br />Surname</th>
                <th>อีเมลล์ที่สามารถส่งถึง<br />Email-To</th>
                <th>อีเมลล์ที่ต้องการให้ทราบ<br />Email-CC</th>
                <th >แก้ไข<br />Edit</th>
                <th>เวลาแก้ไข<br />Update At</th>
                <th>เวลาสร้างข้อมูล<br />Create At</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($parent as $p){ ?>
              <tr>
                <td>{{ $p->express_customer_id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->sur_name }}</td>
                <td>{{ $p->email_to_addaddress }}</td>
                <td>{{ $p->email_cc_addCC }} </td>
                <td>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input " id="customSwitch_<?php echo $p->parent_customer_id; ?>" <?php if($p->is_enable == "1"){ echo 'checked'; }?> onclick="parent_update_id(<?php echo $p->parent_customer_id; ?>)" >
                      <label class="custom-control-label  mousechange" for="customSwitch_<?php echo $p->parent_customer_id; ?>" ></label>
                      <i class="fas fa-edit mousechange" data-toggle="modal" data-target="#modal-editparent" onclick="parent_send_id(<?php echo $p->parent_customer_id; ?>,<?php echo $p->express_customer_id; ?>,'<?php echo $p->name; ?>','<?php echo $p->sur_name; ?>','<?php echo $p->email_to_addaddress; ?>','<?php echo $p->email_cc_addCC; ?>')"></i>&nbsp;&nbsp;
                      <i class="far fa-trash-alt mousechange" data-toggle="modal" data-target="#modal-delparent" onclick="parent_delete_id(<?php echo $p->parent_customer_id; ?>)" ></i></div></td>
                    </div>
                  </div>
                <td><lable id="update_<?php echo $p->parent_customer_id; ?>">{{ $p->updated_at }}</lable></td>
                <td>{{ $p->create_at }}</td>
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

  <div class="modal fade" id="modal-editparent">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">แก้ไขข้อมูลผู้ปกครอง</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                          <label>กรุณากรอกข้อมูลให้ครบ</label>
                            <form action="{{ url('/editparent') }}" method="get" id="frm_edit_parent">
                              <label>รหัสบัญชีผู้ปกครอง</label>
                              <input type="text" class="form-control" name="txtExpress_id" id="txtExpress_id" placeholder="" required>
                              <label>ชื่อ</label>
                              <input type="text" class="form-control" name="txtName" id="txtName" placeholder="" required>
                              <label>นามสกุล</label>
                              <input type="text" class="form-control" name="txtSurname" id="txtSurname" placeholder="" required>
                              <label>อีเมลล์ที่สามารถส่งถึง</label>
                              <input type="text" class="form-control" name="txtEmail_to" id="txtEmail_to" placeholder="" required>
                              <label>อีเมลล์ที่ต้องการแจ้งให้ทราบ</label>
                              <input type="text" class="form-control" name="txtEmail_CC" id="txtEmail_CC" placeholder="" required>
                              <input type="hidden" class="form-control" name="txtParent_id" id="txtParent_id" value ="" />
                            </form>
                        </div>
                      </div>
                    </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="frm_edit_parent.submit();">ยืนยัน</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-delparent">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ลบชื่อผู้ปกครอง</h4>
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
                            <form action="{{ url('/deleteparent') }}" method="get" id="frm_del_parent">
                              <input type="hidden" class="form-control" name="txtParenct_del_id" id="txtParenct_del_id" placeholder="" required>
                            </form>
                        </div>
                      </div>
                    </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="frm_del_parent.submit();">ยืนยัน</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


@endsection
@section('javascript_below')
<!-- <script>
function passToModel($id){
     document.getElementById("txtYear").value = $id;
     document.getElementById("txtDitext").placeholder = $id;
}
function passTomodel_delete($year,$term_id,$term){
    document.getElementById("txtYear_delete").value = $year;
    document.getElementById("txtYear_updatedelete_id").placeholder = $year;
    document.getElementById("txtTerm_id_delete").value = $term_id;
    document.getElementById("txtTerm_delete").value = $term;
    document.getElementById("txtTerm_updatedelete_id").placeholder = $term;
}
</script> -->
<!-- DataTables -->

<!-- AdminLTE App -->
<script>
function parent_update_id($id){
          $.ajax({url: "{{ url('update_enable') }}",
             data: { parent_id:$id },
             success: function(result){
               const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 200
               });
               //console.log(result['is_enable']);
               if(result['is_enable'] == "0") {
                 $(document).Toasts('create', {
                   class: 'bg-warning',
                   title: 'อัพเดต',
                   autohide: true,
                   delay: 900,
                   position: 'bottomRight',
                   body: 'ยกเลิกการส่งอีเมลล์ชั่วคราว'
                 })
               }else{
                 $(document).Toasts('create', {
                   class: 'bg-info',
                   title: 'อัพเดต',
                   autohide: true,
                   delay: 900,
                   position: 'bottomRight',
                   body: 'อนุญาติส่งอีเมลล์ได้อีกครั้ง'

                 })
               }
               // console.log(result);

               var d = new Date(result['updated_at']);
               document.getElementById("update_"+result['parent_customer_id']).innerHTML = d.getFullYear()+"-"+parseInt(d.getMonth()+1, 10)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
          }});
}

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
  function parent_send_id($id,$express_customer_id,$name,$sur_name,$email_to_addaddress,$email_cc_addCC){
    document.getElementById("txtParent_id").value = $id;
    document.getElementById("txtExpress_id").value = $express_customer_id;
    document.getElementById("txtName").value = $name;
    document.getElementById("txtSurname").value = $sur_name;
    document.getElementById("txtEmail_to").value = $email_to_addaddress;
    document.getElementById("txtEmail_CC").value = $email_cc_addCC;

    // console.log($id);
  }

  function parent_delete_id($id){
    document.getElementById("txtParenct_del_id").value = $id;
  }



  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>
@endsection
