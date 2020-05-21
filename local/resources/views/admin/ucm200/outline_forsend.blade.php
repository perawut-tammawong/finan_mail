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
           <a href="mailbox.html" class="btn btn-primary btn-block mb-3"><font color="white">Back to Inbox</font></a>


           <!-- /.card -->
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">Field ตัวอย่าง</h3>

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
             <div class="card-body">
               <div class="form-group">
                 <input class="form-control" placeholder="To:">
               </div>
               <div class="form-group">
                 <input class="form-control" value="{{ $setFrom_subject }}" placeholder="Subject:">
               </div>
               <div class="form-group">
                   <textarea id="compose-textarea" class="form-control" style="height: 900px">{{ $setFrom_subject }}
                   </textarea>
               </div>

             </div>
             <!-- /.card-body -->
             <div class="card-footer">
               <div class="float-right">
                 <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Preview Email</button>
                 <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
               </div>
             </div>
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


@endsection
@section('javascript_below')
<script>
  $(function () {
    $('#compose-textarea').summernote()
  })
</script>
@endsection
