<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;


class Year_tb extends Model
{

   protected $table = 'tb_year';

   public function get_year(){
     // $get_year = Year_tb::orderby('year_id','desc')->get();
     //
     // foreach($get_year as $gy){
     //   $get_term[$gy->year] = DB::table('tb_term')->where('year_id','=',$gy->year_id)->get();
     // }
     // $data['year'] = $get_year;
     // $data['term'] = $get_term;
     // return $data;
     return 'helo';
   }

}
