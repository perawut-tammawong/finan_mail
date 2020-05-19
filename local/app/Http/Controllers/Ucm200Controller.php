<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Student_tb;
use App\Http\Model\Year_tb;

use DB;
use Illuminate\Http\Request;


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
                  ->with('term',$get_term->term);
  }

  public function frm_send_template_mail(Request $request){
    $test = $request->input('school_id');
    dd($test);
  }

}
