<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //return view('admin.home');
    return view('admin.ucm100.parent');
    // $get = DB::table('tb_year')->get();
    // dd($get);
});
Route::get('/yearmanament', 'Ucm500Controller@index');




Route::get('/test', 'Ucm100Controller@test');
