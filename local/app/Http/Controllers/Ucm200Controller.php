<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Student_tb;
use App\Http\Model\Year_tb;

use DB;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Ucm200Controller extends Controller
{
  public function index($idterm){
      $get_student = Student_tb::where('term_id','=',$idterm)->where('is_delete','=',0)->get();

      $get_term = DB::table('tb_term')
                          ->select('term_id','term','year_id')
                          ->where('term_id','=',$idterm)
                          ->where('is_enable','=',1)
                          ->where('is_delete','=',0)
                          ->first();
      $get_year = DB::table('tb_year')
                          ->select('year_id','year')
                          ->where('year_id','=',$get_term->year_id)
                          ->where('is_delete','=',0)
                          ->first();
                          foreach($get_student as $st){
                              $get_parent[] = DB::table('tb_parent')
                                                ->where('parent_customer_id','=',$st->parent_customer_id)
                                                ->first();
                          }
      return view('admin.ucm200.student')
                ->with('year',$get_year->year)
                ->with('term',$get_term->term)
                ->with('term_id',$get_term->term_id)
                ->with('get_student',$get_student)
                ->with('parent',$get_parent);
  }

  public function addstudent(Request $request){
    $get_term = DB::table('tb_term')
                        ->select('term','year_id')
                        ->where('term_id','=',$idterm)
                        ->where('is_enable','=',1)
                        ->where('is_delete','=',0)
                        ->first();
    $get_year = DB::table('tb_year')
                        ->select('year_id','year')
                        ->where('year_id','=',$get_term->year_id)
                        ->where('is_delete','=',0)
                        ->first();

                        DB::table('tb_student')->insert([
                          'school_id','=>',$request->input('txtSchool_id'),
                          'name','=>',$request->input('txtName'),
                          'surname','=>',$request->input('txtSurname'),
                          'nickname','=>',$request->input('txtNickname'),
                          'term_id','=>',$get_term->$term_id,
                          'year_id','=>',$get_year->year_id
                        ]);
  }

  public function studentupdate(Request $request){

              date_default_timezone_set("Asia/Bangkok");
              $change = Student_tb::select('student_id','is_enable')
                          ->where('student_id','=',$request->input('student_id'))->first();
              // echo $change->is_delete;
              if($change->is_enable == '1'){
                    Student_tb::where('student_id','=',$request->input('student_id'))
                              ->update(['is_enable' => 0]);
              }else{
                    Student_tb::where('student_id','=',$request->input('student_id'))
                          ->update(['is_enable' => 1]);
              }

              $get_is_enable = Student_tb::select('student_id','is_enable','updated_at')
                          ->where('student_id','=',$request->input('student_id'))->first();
              return response()->json(['student_id' => $get_is_enable->student_id,
                                        'is_enable' => $get_is_enable->is_enable,
                                        'updated_at' => $get_is_enable->updated_at ]);
  }

  public function delstudent(Request $request){
      Student_tb::where('student_id','=',$request->input('txtStudent_del_id'))
            ->update([
              'is_delete' => '1'
            ]);
      $url = "studentmanagement/".$request->input('txtTerm');
      return redirect($url);
  }

  public function editstudent(Request $request){
              if($request->input('txtNickname')!=""){
                Student_tb::where('student_id','=',$request->input('txtStudent_id'))
                          ->update(['school_id' => $request->input('txtSchool_id'),
                                    'name' => $request->input('txtName'),
                                    'surname' => $request->input('txtSurname'),
                                    'nickname' => $request->input('txtNickname')
                                    ]);
              }else{
                Student_tb::where('student_id','=',$request->input('txtStudent_id'))
                          ->update(['school_id' => $request->input('txtSchool_id'),
                                    'name' => $request->input('txtName'),
                                    'surname' => $request->input('txtSurname'),
                                    'nickname' => $request->input('txtNickname'),
                                    'parent_customer_id' => $request->input('sleParent_id')
                                    ]);
              }
              $url = "studentmanagement/".$request->input('txtTerm_edit');
              return redirect($url);
  }

  public function sendemailtoparent_stu($idterm){
      $get_student = Student_tb::where('term_id','=',$idterm)->where('is_enable','=',1)->where('is_delete','=',0)->get();
      $get_term = DB::table('tb_term')
                          ->select('term_id','term','year_id')
                          ->where('term_id','=',$idterm)
                          ->where('is_enable','=',1)
                          ->where('is_delete','=',0)
                          ->first();
      $get_year = DB::table('tb_year')
                          ->select('year_id','year')
                          ->where('year_id','=',$get_term->year_id)
                          ->where('is_delete','=',0)
                          ->first();

      return view('admin.ucm200.sendmail_stu')
                  ->with('get_student',$get_student)
                  ->with('year',$get_year->year)
                  ->with('term',$get_term->term)
                  ->with('idterm',$idterm);
  }

  public function frm_send_template_mail(Request $request){
        // dd($request->input('txtTermurl'));
        $get_templatemail = DB::table('tb_template_email')->where('template_email_id','=',$request->input('sle_template'))->first();
        $get_term_student = DB::table('tb_student')->where('term_id','=',$request->input('txtTermurl'))->where('is_delete','=','0')->get();

        return view('admin.ucm200.outline_forsend')
                  ->with('setFrom_subject',$get_templatemail->setFrom_subject)
                  ->with('Set_body',$get_templatemail->Set_body)
                  ->with('term_id',$request->input('txtTermurl'))
                  ->with('student_stu',$request->input('school_id'))
                  ->with('all_stu',$get_term_student);
  }

  public function frm_send_real_email(Request $request){
              $get_setting_mail = DB::table('tb_settingmail')
                                ->where('settingemail_id','=','1')->first();
              $student_id = $request->input('student_id');

                  $get_profile = DB::table('tb_student')
                                      ->select('student_id','parent_customer_id')
                                      ->where('student_id','=',$student_id)
                                      ->first();
                  $get_Parent = DB::table('tb_parent')
                                      ->select('parent_customer_id','name','sur_name','email_to_addaddress','email_cc_addCC')
                                      ->where('parent_customer_id','=',$get_profile->parent_customer_id)
                                      ->first();
                  $result = $this->send_email_script($get_profile->student_id,$get_Parent->parent_customer_id,$get_Parent->name,$get_Parent->sur_name,$get_Parent->email_to_addaddress,$get_Parent->email_cc_addCC,$request->input('txtSubject'),$request->input('txtAreaBody'));
                  return $result;

  }

  public function send_email_script($student_id,$parent_customer_id,$name,$sur_name,$email_to_addaddress,$email_cc_addCC,$Subject,$AreaBody){
            $get_setting_mail = DB::table('tb_settingmail')->where('settingemail_id','=','1')->first();
            $nameemail = "คุณ ".$name." ".$sur_name;
            $mail = new PHPMailer(true);
                                  try {
                                      //$mail->SMTPDebug = 2;                      // Enable verbose debug output
                                      $mail->isSMTP();                                            // Send using SMTP
                                      $mail->Host       = $get_setting_mail->Host;                    // Set the SMTP server to send through
                                      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                      $mail->Username   = $get_setting_mail->Username;                     // SMTP username
                                      $mail->Password   = $get_setting_mail->Password;                              // SMTP password
                                      $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                                      $mail->CharSet = 'UTF-8';
                                      $mail->SMTPOptions = array(
                                                                'ssl' => array(
                                                                    'verify_peer' => false,
                                                                    'verify_peer_name' => false,
                                                                    'allow_self_signed' => true
                                                                )
                                                            );
                                      $mail->setFrom($get_setting_mail->Username, 'From Department Financial');
                                      $mail->addAddress($email_to_addaddress, $nameemail);             // Add a recipient
                                      $mail->addAddress($email_cc_addCC, $nameemail);                  // Add a recipient
                                      $mail->isHTML(true);                                              // Set email format to HTML
                                      $mail->Subject = $Subject;
                                      $mail->Body    = $AreaBody;
                                      $mail->send();

                                      $message = 'Message has been sent';
                                      $this->send_log_database($student_id,$parent_customer_id,$email_to_addaddress,$email_cc_addCC,$message,$Subject,$AreaBody,'1');
                                      return response()->json([
                                                'message' => $message,
                                                'activity' => '1',
                                                'name' => $name,
                                                'sur_name' => $sur_name,
                                                'email_to_addaddress' => $email_to_addaddress,
                                                'email_cc_addCC' => $email_cc_addCC,
                                                'Subject' => $Subject,
                                                'AreaBody' => $AreaBody
                                              ]);
                                  } catch (Exception $e) {
                                      $message = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
                                      $this->send_log_database($student_id,$parent_customer_id,$email_to_addaddress,$email_cc_addCC,$message,$Subject,$AreaBody,'0');
                                      return response()->json([
                                                  'message' => $message,
                                                  'activity' => '0',
                                                  'name' => $name,
                                                  'sur_name' => $sur_name,
                                                  'email_to_addaddress' => $email_to_addaddress,
                                                  'email_cc_addCC' => $email_cc_addCC,
                                                  'Subject' => $Subject,
                                                  'AreaBody' => $AreaBody
                                              ]);
                                  }
  }

  public function send_log_database($student_id,$parent_customer_id,$email_to_addaddress,$email_cc_addCC,$message,$Subject,$AreaBody,$activity){
          DB::table('tb_log_email')->insert([
            'student_id' => $student_id,
            'parent_customer_id' => $parent_customer_id,
            'email_to_send' => $email_to_addaddress,
            'email_cc' => $email_cc_addCC,
            'Status_send' => $message,
            'setFrom_subject' => $Subject,
            'Set_body' => $AreaBody,
            'status' => $activity
          ]);
  }

  public function logsendmail(){
    $get_log_email = DB::table('tb_log_email')->get();
    return view('admin.ucm200.logsendemail')
            ->with('log_email',$get_log_email);
  }


}
