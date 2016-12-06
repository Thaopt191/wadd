<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khoa;
use App\sinh_vien;
use App\tai_khoan;

class dang_ky_Khoa extends Controller
{
    public function status(){
    	$curr_khoa=2;
    	$curr=khoa::where('id',$curr_khoa)->value("mo_dang_ky");
    	return view("register")->with("curr",$curr);
    }

    public function index(){
      $list=sinh_vien::where("nop_ho_so",1)->where("tt_dang_ky",0)->get();
      $user=array();
      foreach ($list as $i) {
      		$temp=tai_khoan::where("id",$i->id)->first();
      		array_push($user, $temp);
      }
      return view("upload_list")->with(["type"=>1,"list"=>$list,"user"=>$user]);
    }

    public function accept($id){
    	$curr=sinh_vien::where("id",$id)->first();
    	if($curr->tt_dang_ky == 0)
    		sinh_vien::where("id",$id)->first()->update(["tt_dang_ky"=>1]);
    	return redirect()->back();
    }

    public function non_upload(){
      $list=sinh_vien::where("nop_ho_so",0)->get();
      $user=array();
      foreach ($list as $i) {
      		$temp=tai_khoan::where("id",$i->id)->first();
      		array_push($user, $temp);
      }
      return view("upload_list")->with(["type"=>2,"list"=>$list,"user"=>$user]);
    }

    public function send_mail($id){
    	## send mail code here!
    	\Session::flash("flash_mess", "Successfully!");
    	return redirect()->back();
    }

    public function chot_dang_ky(){
    	$curr_khoa=2;
    	$status=khoa::where('id',$curr_khoa)->value("mo_dang_ky");
    	$list=array();
    	if($status==1){
    		$list=sinh_vien::where("nop_ho_so",1)->where("id_khoa",$curr_khoa)->where("tt_dang_ky",1)->get();
    		$user=array();
		    foreach ($list as $i) {
		    	$temp=tai_khoan::where("id",$i->id)->first();
		    	array_push($user, $temp);
		    }
    		return view("upload_list")->with(["type"=>3,"list"=>$list,"user"=>$user]);
    	}
    	else{
    		\Session::flash("flash_mess", "Chưa mở đăng ký!");
    		return redirect()->back();
    	}
    }
}
