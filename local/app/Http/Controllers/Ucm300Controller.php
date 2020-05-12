<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;


class Ucm300Controller extends Controller
{
  public function index(Request $request){
    // echo 'hello';
    $tem = $request->input('checkbox');
    dd($tem);
  }

  public function setting_email(){
    return view('admin.ucm300.Email');
  }



}
