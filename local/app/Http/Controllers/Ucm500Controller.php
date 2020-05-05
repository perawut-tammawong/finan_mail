<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Year_tb;
use DB;

class Ucm500Controller extends Controller
{
  // $flights = Ucm100::all();
  // return $flights;
    public function index()
    {
      $get_year = Year_tb::where('is_enable','=',1)
                            ->where('is_delete','=',0)
                            ->orderby('year_id','desc')
                            ->get();
      foreach($get_year as $gy){
        $get_term[$gy->year] = DB::table('tb_term')
                                    ->where('year_id','=',$gy->year_id)
                                    ->where('is_enable','=',1)
                                    ->where('is_delete','=',0)
                                    ->orderby('term_id','asc')
                                    ->get();
      }
      return view('admin.ucm500.year')
              ->with('year', $get_year)
              ->with('term', $get_term);
    }
}
