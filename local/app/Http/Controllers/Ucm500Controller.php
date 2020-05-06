<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Year_tb;
use DB;
use Illuminate\Http\Request;


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

    public function addyearnew(Request $request)
    {
        DB::table('tb_year')->insert(
            ['year' => $request->input('sleYear')]
          );
        return redirect('yearmanament');
    }

    public function deleteyear(Request $request)
    {
      DB::table('tb_year')
          ->where('year_id','=',$request->input('sleYearDel'))
          ->update(['is_delete' => 1]);
          return redirect('yearmanament');
    }

    public function addyear_term(Request $request)
    {
            $get_sel = $request->input('sleTerm');
            if($get_sel == 1){$description = "term 1";}elseif($get_sel == 2){$description = "term 2";
            }elseif($get_sel == 3){$description = "term 3";}elseif($get_sel == 4){$description = "term 4";}

            $getid = Year_tb::select('year_id')
                          ->where('year','=',$request->input('txtYear'))
                          ->where('is_enable','=',1)
                          ->where('is_delete','=',0)
                          ->first();
            DB::table('tb_term')->insert(
              ['term' => $get_sel, 'description' => $description, 'year_id' => $getid->year_id]
            );
            return redirect('yearmanament');
    }

    public function deleteyear_term(Request $request)
    {
                DB::table('tb_term')
                    ->where('term_id','=',$request->input('txtTerm_id_delete'))
                    ->update(['is_delete' => 1]);
        return redirect('yearmanament');
    }

}
