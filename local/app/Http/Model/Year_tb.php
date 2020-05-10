<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;


class Year_tb extends Model
{

   protected $table = 'tb_year';

   public function get_year(){
     return 'helo';
   }

}
