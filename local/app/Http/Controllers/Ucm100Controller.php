<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Parent_tb;
use DB;
use Illuminate\Http\Request;


class Ucm100Controller extends Controller
{
  // $flights = Ucm100::all();
  // return $flights;
    public function index()
    {
      //echo 'hello'.$idyear;

      $get_Parent = Parent_tb::where('is_enable','=',1)
                            ->where('is_delete','=',0)
                            ->orderby('parent_customer_ id','desc')
                            ->get();
      return view('admin.ucm100.parent')
                  ->with('parent',$get_Parent);
    }


}
