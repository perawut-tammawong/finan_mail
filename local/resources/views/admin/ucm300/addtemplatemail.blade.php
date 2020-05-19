@extends('admin.home')
@section('nav_slide_bar_email')

@endsection
@section('head')
 + Add Template Email
@endsection
@section('body')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">แม่แบบ ร่างจดหมายอัตโนมัติ </h3> <br />
            <a href="{{ url('linetemplate') }}"> <-- ย้อนกลับ</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-offset-2 col-md-6">
                <div class="form-group">
                    <form action="{{ url('/adddbtemplatemail') }}" method="get" id="frm_add_field">
                      <label>Subject Email หัวข้อการส่งอีเมลล์</label>
                      <input type="text" class="form-control" name="txtsetFrom_subject" id="txtsetFrom_subject" placeholder="" required>
                      <label>Body เนื้อหาการส่งอีเมลล์</label>

                          <div class="form-group">
                              <textarea id="compose-textarea" class="form-control" name="textareaSet_body" style="height: 300px">
                                <h1><u>Heading Of Message Example</u></h1>
                                <h4>Subheading</h4>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                                  was born and I will give you a complete account of the system, and expound the actual teachings
                                  of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                                  dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                                  how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                                  is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                                  but because occasionally circumstances occur in which toil and pain can procure him some great
                                  pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                                  except to obtain some advantage from it? But who has any right to find fault with a man who
                                  chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                                  produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                                  dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                                  blinded by desire, that they cannot foresee</p>
                                <ul>
                                  <li>List item one</li>
                                  <li>List item two</li>
                                  <li>List item three</li>
                                  <li>List item four</li>
                                </ul>
                                <p>Thank you,</p>
                                <p>John Doe</p>
                              </textarea>
                          </div>


                      <label>คำอธิบาย</label>
                      <input type="text" class="form-control" name="txtsetFrom_description" id="txtsetFrom_description" placeholder="" required>
                    </form>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" onclick="frm_add_field.submit();">ยืนยัน</button>
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



@endsection
@section('javascript_below')
<script>
  $(function () {
    $('#compose-textarea').summernote()
  })
</script>
@endsection
