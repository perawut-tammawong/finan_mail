<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Student_tb;
use App\Http\Model\Year_tb;

use DB;
use Illuminate\Http\Request;

class Ucm400Controller extends Controller
{
  public function index($term_id){
    $get_student = Student_tb::where('term_id','=',$term_id)->where('is_delete','=',0)->get();

    $get_term = DB::table('tb_term')
                        ->select('term_id','term','year_id')
                        ->where('term_id','=',$term_id)
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

                             $check = DB::table('tb_paid')
                                              ->where('student_id','=',$st->student_id)
                                              ->where('term_id','=',$term_id)
                                              ->first();
                            if($check!=null){
                                $get_pay[] = $check;
                            }else{
                                $get_pay[] = 0;
                            }
                        }
    // dd($get_pay);
    return view('admin.ucm400.payslip')
              ->with('year',$get_year->year)
              ->with('term',$get_term->term)
              ->with('term_id',$get_term->term_id)
              ->with('get_student',$get_student)
              ->with('parent',$get_parent)
              ->with('get_pay',$get_pay);
  }

  public function payupdatesuccess($id,Request $request){
        // DB::table('tb_paid')->insert([
        //         'pdf_file_invoice' => none,
        //         'student_id' => $request->input('student_id'),
        //         'reference' => none,
        //         'discount_promotion' => none,
        //         'total_credit_note' => none,
        //         'payment_status' => none,
        //         'term_id' => none
        // ]);
        return $id;
  }

}
