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
      $get_Parent = Parent_tb::where('is_delete','=',0)
                            ->get();
      return view('admin.ucm100.parent')
                  ->with('parent',$get_Parent);
    }

    public function addparent(Request $request)
    {
      Parent_tb::insert(
          ['express_customer_id' => $request->input('txtExpress_id'),
          'name' => $request->input('txtName'),
          'sur_name' => $request->input('txtSurname'),
          'email_to_addaddress' => $request->input('txtEmail_to'),
          'email_cc_addCC' => $request->input('txtEmail_CC')]
        );
        return redirect('parentmanament');
    }

    public function editparent(Request $request)
    {
      Parent_tb::where('parent_customer_id','=',$request->input('txtParent_id'))
              ->update([
                'express_customer_id' => $request->input('txtExpress_id'),
                'name' => $request->input('txtName'),
                'sur_name' => $request->input('txtSurname'),
                'email_to_addaddress' => $request->input('txtEmail_to'),
                'email_cc_addCC' => $request->input('txtEmail_CC')
              ]);
        return redirect('parentmanament');
    }

    public function deleteparent(Request $request)
    {
      Parent_tb::where('parent_customer_id','=',$request->input('txtParenct_del_id'))
              ->update([
                'is_delete' => '1'
              ]);
        return redirect('parentmanament');
    }

    public function update_enable(Request $request)
    {
            date_default_timezone_set("Asia/Bangkok");
            $change = Parent_tb::select('parent_customer_id','is_enable')
                        ->where('parent_customer_id','=',$request->input('parent_id'))->first();
            // echo $change->is_delete;
            if($change->is_enable == '1'){
                  Parent_tb::where('parent_customer_id','=',$request->input('parent_id'))
                            ->update(['is_enable' => 0]);
            }else{
                  Parent_tb::where('parent_customer_id','=',$request->input('parent_id'))
                        ->update(['is_enable' => 1]);
            }

            $get_is_enable = Parent_tb::select('parent_customer_id','is_enable','updated_at')
                        ->where('parent_customer_id','=',$request->input('parent_id'))->first();
            return response()->json(['parent_customer_id' => $get_is_enable->parent_customer_id,
                                      'is_enable' => $get_is_enable->is_enable,
                                      'updated_at' => $get_is_enable->updated_at ]);
    }

}
