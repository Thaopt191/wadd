<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;
use DateTime;

class Notification extends Controller
{
    public function index(){
    	
    	$curr_id_khoa=2;//sau này lấy từ session["id_khoa"]
    	$notis=Notifications::where("id_khoa", $curr_id_khoa)->where("status",1)->get();
    	return view("test")->with("notis",$notis);
    }

    public function create(Request $request){
    	$id_khoa=2;
    	$now=new DateTime();
    	$noti=new Notifications;
    	$noti->id_khoa=$id_khoa;
    	$noti->content=$request->content;
    	$noti->status=1;
    	$noti->save();
    	return redirect()->action("Notification@index");
    }
    public function new(){
    	return view("notification/create");
    }

    public function delete_index(){
        $curr_id_khoa=2;//sau này lấy từ session["id_khoa"]
        $notis=Notifications::where("id_khoa", $curr_id_khoa)->get();
        return view("notification/delete")->with("notis",$notis);
    }
    
    public function delete($id){
        Notifications::find($id)->delete();
        return redirect()->action("Notification@delete_index");
    }
}
