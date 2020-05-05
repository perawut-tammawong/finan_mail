<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Year_tb;

class Ucm100Controller extends Controller
{
  // $flights = Ucm100::all();
  // return $flights;
    public function index()
    {
      $get_year = Year_tb::orderby('year_id','desc')->get();
      return view('admin.ucm100.parent')
              ->with('year', $get_year);
    }
}
