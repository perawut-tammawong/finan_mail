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
    echo 'hello';
});
Route::get('yearmanament', 'Ucm500Controller@index');
Route::get('addyearnew', 'Ucm500Controller@addyearnew');
Route::get('deleteyear', 'Ucm500Controller@deleteyear');
Route::get('addyear_term','Ucm500Controller@addyear_term');
Route::get('deleteyear_term','Ucm500Controller@deleteyear_term');

Route::get('parentmanament', 'Ucm100Controller@index');
Route::get('addparent', 'Ucm100Controller@addparent');
Route::get('editparent', 'Ucm100Controller@editparent');
Route::get('deleteparent', 'Ucm100Controller@deleteparent');
Route::get('update_enable', 'Ucm100Controller@update_enable');

Route::get('studentmanagement/{idterm}', 'Ucm200Controller@index');
Route::get('studentmanagement/{idterm}/addstudent', 'Ucm200Controller@addstudent');
Route::get('studentupdate', 'Ucm200Controller@studentupdate');
Route::get('delstudent', 'Ucm200Controller@delstudent');
Route::get('editstudent', 'Ucm200Controller@editstudent');
Route::get('sendemailtoparent_stu/{idterm}', 'Ucm200Controller@sendemailtoparent_stu');
Route::get('frm_send_template_mail', 'Ucm200Controller@frm_send_template_mail');
Route::get('frm_send_real_email', 'Ucm200Controller@frm_send_real_email');
Route::get('logsendmail', 'Ucm200Controller@logsendmail');

Route::get('for_sendmail', 'Ucm300Controller@index');
Route::get('seeting_email', 'Ucm300Controller@setting_email');
Route::get('setting_update_email', 'Ucm300Controller@setting_update_email');
Route::get('sendemail_to', 'Ucm300Controller@sendemail_to');
Route::get('linetemplate', 'Ucm300Controller@linetemplate');
Route::get('addtemplatemail', 'Ucm300Controller@addtemplatemail');
Route::get('adddbtemplatemail', 'Ucm300Controller@adddbtemplatemail');
Route::get('editsubjectEmail/{id}', 'Ucm300Controller@editsubjectEmail');
Route::get('editupdateEmail', 'Ucm300Controller@editupdateEmail');
Route::get('delete_email', 'Ucm300Controller@delete_email');

Route::get('addfield', 'Ucm300Controller@addfield');
Route::get('seefield/{id}', 'Ucm300Controller@seefield');
