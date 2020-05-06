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
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Other browsers</td>
                <td>All others</td>
                <td>-</td>
                <td>-</td>
                <td>U</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </tfoot>
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
<script src="{{ url('/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/AdminLTE/dist/js/adminlte.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
