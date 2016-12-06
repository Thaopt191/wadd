<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sinh_vien;
use App\tai_khoan;
class file_upload extends Controller
{
    public function upload(){
      $curr_id=1;
      $curr_tk=tai_khoan::where('id',$curr_id)->first();
      $curr_sv=sinh_vien::where("id",$curr_id)->first();
    	return view("upload")->with(["tk"=>$curr_tk,
                                  "sv"=>$curr_sv]);
    }

    public function store(Request $request){
      
    	$file = $request->file('upload_file');
      $id=$request->id;
      $detai=$request->detai;
    	$destinationPath = base_path().'/public/uploads/ho_so';
      $filename=$id."-".$detai.".".$file->getClientOriginalExtension();
      if (file_exists(public_path('uploads/excels/'.$filename))) {
        \Session::flash("flash_err_mess", "File exists!");
        return redirect()->back();
      }
		  $file->move($destinationPath,$filename);
      sinh_vien::where("id",$id)->first()->update(["nop_ho_so"=>1]);
   		\Session::flash("flash_mess", "File uploaded!");
   		return view("static_pages/home");
    }
}
