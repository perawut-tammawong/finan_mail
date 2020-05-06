<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Year_tb;
use DB;
use Illuminate\Http\Request;


class Ucm100Controller extends Controller
{
  // $flights = Ucm100::all();
  // return $flights;
    public function index($idyear)
    {
      echo 'hello'.$idyear;
    }


}
