<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Ucm300Controller extends Controller
{
  public function index(Request $request){
    // echo 'hello';
    $tem = $request->input('checkbox');
    dd($tem);
  }

  public function setting_email(){
    $get_Email = DB::table('tb_settingmail')->first();
    return view('admin.ucm300.Email')
                ->with('email',$get_Email);
  }

  public function setting_update_email(Request $request){

        DB::table('tb_settingmail')
          ->where('settingemail_id','=', '1')
          ->update(['Host' => $request->input('Host'),
                    'Port' => $request->input('Port'),
                    'Username' => $request->input('Username'),
                    'Password' => $request->input('Password')]);
        return response()->json(['settingemail_id' => '1',
                                'Message' => $request->input('Host')]);
  }

  public function sendemail_to(Request $request){
      // Instantiation and passing `true` enables exceptions
      $get_setting_mail = DB::table('tb_settingmail')
                                  ->where('settingemail_id','=','1')->first();
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
                      $mail->SMTPOptions = array(
                                                'ssl' => array(
                                                    'verify_peer' => false,
                                                    'verify_peer_name' => false,
                                                    'allow_self_signed' => true
                                                )
                                            );
          				    $mail->setFrom($get_setting_mail->Username, 'Perawat Tummawong');
          				    $mail->addAddress($request->input('Sendmail_to'), 'Perawat');     // Add a recipient
          				    $mail->isHTML(true);                                              // Set email format to HTML
          				    $mail->Subject = 'Schedule Server';
          				    $mail->Body    = 'Server TesT';
          				    $mail->send();
                      return response()->json([
                                  'message' => 'Message has been sent',
                                  'activity' => '1'
                              ]);
          				} catch (Exception $e) {
                      return response()->json([
                                  'message' => 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo,
                                  'activity' => '0'
                              ]);
          				}
  }

  public function linetemplate(){
    $get_template_mail = DB::table('tb_template_email')
                            ->where('is_delete','=',0)
                            ->get();
    return view('admin.ucm300.template_outline_email')
                ->with('template_mail',$get_template_mail);
  }

  public function addtemplatemail(){
    $get_template_email = DB::table('tb_template_email')->get();
    return view('admin.ucm300.addtemplatemail')
                ->with('addtemplate_email',$get_template_email);
  }

  public function adddbtemplatemail(Request $request){
    DB::table('tb_template_email')->insert([
      'setFrom_subject' => $request->input('txtsetFrom_subject'),
      'Set_body' => $request->input('txtSet_body'),
      'setFrom_description' => $request->input('txtsetFrom_description')
    ]);
    return redirect('linetemplate');
  }

  public function delete_email(Request $request){
    DB::table('tb_template_email')->where('template_email_id','=',$request->input('txtTemplateemail_del_id'))
              ->update([
                'is_delete' => 1
              ]);
    return redirect('linetemplate');
  }

  public function editsubjectEmail($id){
    $get_templatemail = DB::table('tb_template_email')->where('template_email_id','=',$id)->first();
    return view('admin.ucm300.edittemplatemail')
              ->with('templatemail',$get_templatemail);
  }

  public function editupdateEmail(Request $request){
          DB::table('tb_template_email')
                ->where('template_email_id','=',$request->input('txtTemplate_email_id'))
                ->update([
                  'setFrom_subject' => $request->input('txtsetFrom_subject'),
                  'Set_body' => $request->input('textareaSet_body'),
                  'setFrom_description' => $request->input('txtsetFrom_description')
                ]);
                return redirect('linetemplate');
  }

  public function addfield(Request $request){
      return response()->json(['template_email_id' => $request->input('template_email_id'),
                              'field_name' => $request->input('field_name'),
                              'value' => $request->input('value')
                            ]);
  }

  public function seefield($id){
    $get_template_email = DB::table('tb_template_email')->where('template_email_id','=',$id)->first();
    return view('admin.ucm300.seefield')
                ->with('template_email',$get_template_email);
  }

}
