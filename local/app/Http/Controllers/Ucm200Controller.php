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
    //echo $idterm;

      $get_student = Student_tb::where('term_id','=',$idterm)->where('is_enable','=',0)->where('is_delete','=',0)->get();

      $get_term = DB::table('tb_term')
                          ->select('term','year_id')
                          ->where('term_id','=',$idterm)
                          ->where('is_enable','=',1)
                          ->where('is_delete','=',0)
                          ->first();
      // dd($get_term);
      $get_year = DB::table('tb_year')
                          ->select('year_id','year')
                          ->where('year_id','=',$get_term->year_id)
                          ->where('is_delete','=',0)
                          ->first();
      return view('admin.ucm200.student')
                ->with('year',$get_year->year)
                ->with('term',$get_term->term)
                ->with('get_student',$get_student);


  }

}
