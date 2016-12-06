<?php

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


Route::get("/", "Notification@index");
Route::get("/noti/new", "Notification@new");
Route::post("/noti/new", "Notification@create"); 	
Route::get('/mail',"Mailler@send");
Route::get("/regis","dang_ky_Khoa@status");
Route::get("upload","file_upload@upload");
Route::post("upload","file_upload@store");
Route::get("noti/delete/{id}","Notification@delete");
Route::get("noti/delete/","Notification@delete_index");
Route::get("regis/i1","dang_ky_Khoa@index");
Route::get("regis/i2","dang_ky_Khoa@non_upload");
Route::get("regis/accept/{id}","dang_ky_Khoa@accept");
Route::get("regis/sendmail/{id}","dang_ky_Khoa@send_mail");
Route::get("chot_dang_ky","dang_ky_Khoa@chot_dang_ky");
Route::get("exs", "Document@ExportStudent");
Route::get("export",function(){
	return view("xuat_danh_sach");
});

