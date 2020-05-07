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
@section('topic')
List Parent
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
                <td>{{ $p->email_cc_addCC }}</td>
                <td>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1">
                      <label class="custom-control-label mousechange" for="customSwitch1"></label>
                      <i class="fas fa-edit mousechange"></i>&nbsp;&nbsp;
                      <i class="far fa-trash-alt mousechange"></i></div></td>
                    </div>
                  </div>
                <td>{{ $p->update_at }}</td>
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
</script>
@endsection
